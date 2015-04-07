<?php

namespace Controllers;

use Components\Session;
use Models\AuthorRepositoryInterface;
use Models\BookRepositoryInterface as BookRepository;
use Models\EditorRepositoryInterface;
use Models\GenreRepositoryInterface;
use Models\LibraryRepositoryInterface;


class Book extends Base
{
    private $modelBook = null;
    private $modelAuthor = null;
    private $modelEditor = null;
    private $modelGenre = null;
    private $modelLibrary = null;


    public function __construct(
        Request $request,
        BookRepository $modelBook,
        AuthorRepositoryInterface $modelAuthor,
        EditorRepositoryInterface $modelEditor,
        GenreRepositoryInterface $modelGenre,
        LibraryRepositoryInterface $modelLibrary
    ) {
        parent::__construct($request);
        $this->modelBook = $modelBook;
        $this->modelAuthor = $modelAuthor;
        $this->modelEditor = $modelEditor;
        $this->modelGenre = $modelGenre;
        $this->modelLibrary = $modelLibrary;
    }

    public function index()
    {
        $data = $this->modelBook->paginate($this->request->page);
        $title = 'acceuil';
        $nbrPage = ceil(($this->modelBook->getNbrelements() / NBR_BOOKS));
        return [
            'data' => $data,
            'title' => $title,
            'nbrPage' => $nbrPage,
            'currentPage' => $this->request->page
        ];

    }

    public function find()
    {
        $data = $this->modelBook->find($this->request->id);
        $title = 'livre d’un auteur';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function view()
    {
        $data = $this->modelBook->find($this->request->id);
        $title = 'Un livrer';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function liste()
    {
        $data = $this->modelBook->getBookFromYear($this->request->year);
        $title = 'Un livre selon une année';
        return [
            'data' => $data,
            'title' => $title
        ];
    }


    public function admin_edit_book()
    {
        if(!$_SERVER['REQUEST_METHOD']=='get'){
        $title = 'Modifier un livre, en quelques clicks';
        $data['book']=$this->modelBook->find($this->request->id);
        $data['authors'] = $this->modelAuthor->all();
        $data['editors'] = $this->modelEditor->all();
        $data['genres'] = $this->modelGenre->all();
        $data['langues'] = $this->modelBook->getAllLanguages();
        return [
            'data' => $data,
            'title' => $title
        ];
        }
        elseif($_SERVER['REQUEST_METHOD']=='post'){
            die('ok');
        }
    }


    public function admin_index()
    {
            $title = 'Administrer, en quelques clicks';
            $data['books'] = $this->modelBook->all();

            return [
                'data' => $data,
                'title' => $title
            ];

    }

    public function admin_show_book()
    {
        $title = 'Supprimer un livre';
        $data = $this->modelBook->find($this->request->id);
        return [
            'title' => $title,
            'data' => $data
        ];
    }

    public function admin_delete_book()
    {
        if ($this->modelBook->delete($this->request->id)) {
            Session::setMessage('Votre livre à été supprimé avec succès');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=book&a=admin_index');
            die();
        } else {
            Session::setMessage('Oups, une erreur s’est produite, nous vous invitons à réessyer', 'error');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=book&a=admin_index');
            die();
        }

    }

}
