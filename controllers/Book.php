<?php

namespace Controllers;

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
        LibraryRepositoryInterface $modelLibrary)
    {
        parent::__construct($request);
        $this->modelbook = $modelBook;
        $this->modelAuthor= $modelAuthor;
        $this->modelEditor= $modelEditor;
        $this->modelGenren= $modelGenre;
        $this->modellibrary= $modelLibrary;
    }

    public function index()
    {
        $data = $this->modelbook->paginate($this->request->page);
        $title = 'acceuil';
        $nbrPage = ceil(($this->modelbook->getNbrelements() / NBR_BOOKS));
        return [
            'data' => $data,
            'title' => $title,
            'nbrPage' => $nbrPage,
            'currentPage' => $this->request->page
        ];

    }

    public function find()
    {
        $data = $this->modelbook->find($this->request->id);
        $title = 'livre d’un auteur';
        $view = 'index.php';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function view()
    {
        $data = $this->modelbook->find($this->request->id);
        $title = 'Un livrer';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function liste()
    {
        $data = $this->modelbook->getBookFromYear($this->request->year);
        $title = 'Un livre selon une année';
        $view = 'index.php';
        return [
            'data' => $data,
            'title' => $title
        ];
    }


    public function create()
    {
            $title='Ajouter une livre';
            $data['authors']=$this->modelAuthor->all();
            $data['editors']=$this->modelEditor->all();
            $data['genres']=$this->modelGenre->all();
            $data['librarys']=$this->modelLibrary->all();
        return[
            'data'=>$data,
            'title'=>$title
        ];
    }


    public function update()
    {

    }

    public function getBookFromAuthor($book_id)
    {
        $book = new BookModel();
        $data = $book->getBookfromUser($book_id);
        $title = 'Un livre';
        $view = 'index.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }
}
