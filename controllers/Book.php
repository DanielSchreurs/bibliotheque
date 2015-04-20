<?php

namespace Controllers;

use Components\Session;
use Helpers\Date;
use Helpers\Image;
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

    public function allBooksFromYear()
    {

        $data = $this->modelBook->getBookFromYear($this->request->year);
        $title = 'Nos livres selon une année';
        return [
            'data' => $data,
            'title' => $title
        ];
    }


    public function admin_edit_book()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (!filter_var($_POST['nbpages'], FILTER_VALIDATE_INT,
                    array("min_range" => 2, "max_range" => 999999999)) === true
            ) {
                $this->request->errors['nbpages'] = 'Le nombre de page doit être un nombre positif';
            }

            if (empty($_FILES['front_cover']['name'])) {
                $this->request->errors['front_cover'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage1 = Image::isvalidImage($_FILES['front_cover'], 300, 450, 'jpeg');
                if (!empty($valideImage1)) {
                    $this->request->errors['front_cover'] = $valideImage1;
                }
            }
            if (empty($_FILES['front_cover_presentation']['name'])) {
                $this->request->errors['front_cover_presentation'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage2 = Image::isvalidImage($_FILES['front_cover_presentation'], 270, 200, 'jpeg');

                if (!empty($valideImage2)) {
                    $this->request->errors['front_cover_presentation'] = $valideImage2;
                }
            }
            if (!isset($this->request->errors['datepub'])){
                if(Date::isValidDate($this->request->sent->datepub)!==true){
                    $this->request->errors['datepub'] = Date::isValidDate($this->request->sent->datepub);
                }
            }
            else{
                $this->request->errors['datepub'] = 'La date n’est pas au bon format';
            }

            if (empty($this->request->errors)) {
                $front_cover = Image::renameFileName('book');
                $logo = Image::renameFileName('book', '_small');
                $presentation_cover = Image::renameFileName('book','_presentation_cover');

                Image::imageCopyResampled($_FILES['front_cover'],'./img/books_covers/logo/',$logo,0.5);
                Image::saveAs($_FILES['front_cover'], './img/books_covers/', $front_cover);
                Image::saveAs($_FILES['front_cover_presentation'], './img/books_covers/presentation/',
                    $presentation_cover);

                $this->request->sent->front_cover = $front_cover;
                $this->request->sent->logo = $logo;
                $this->request->sent->presentation_cover = $presentation_cover;
                $this->request->sent->update_at = date("Y-m-d");
                isset($this->request->sent->vedette) ? '' : $this->request->sent->vedette = 0;
                $this->modelBook->update($this->request->sent, $this->request->id);
                Session::setMessage('Merci, votre livre a été mis à jour');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=book&a=admin_index');
                die();
            } else {
                $data['errors'] = $this->request->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'Modifier un livre, en quelques clicks';
        $data['authors'] = $this->modelAuthor->getAllName();
        $data['editors'] = $this->modelEditor->all();
        $data['genres'] = $this->modelGenre->all();
        $data['langues'] = $this->modelBook->getAllLanguages();
        $data['book'] = $this->modelBook->find($this->request->id);
        return [
            'data' => $data,
            'title' => $title
        ];
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

    public function admin_create_book()
    {
        $data='';
        if(isset($this->request->step)){
            $data['step'] = $this->request->step;

        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            if (!filter_var($_POST['nbpages'], FILTER_VALIDATE_INT,
                    array("min_range" => 2, "max_range" => 999999999)) === true
            ) {
                $this->request->errors['nbpages'] = 'Le nombre de page doit être un nombre positif';
            }

            if (empty($_FILES['front_cover']['name'])) {
                $this->request->errors['front_cover'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage1 = Image::isvalidImage($_FILES['front_cover'], 300, 450, 'jpeg');
                if (!empty($valideImage1)) {
                    $this->request->errors['front_cover'] = $valideImage1;
                }
            }
            if (empty($_FILES['front_cover_presentation']['name'])) {
                $this->request->errors['front_cover_presentation'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage2 = Image::isvalidImage($_FILES['front_cover_presentation'], 270, 200, 'jpeg');

                if (!empty($valideImage2)) {
                    $this->request->errors['front_cover_presentation'] = $valideImage2;
                }
            }
            if (!isset($this->request->errors['datepub'])){
                if(Date::isValidDate($this->request->sent->datepub)!==true){
                    $this->request->errors['datepub'] = Date::isValidDate($this->request->sent->datepub);
                }
            }
        else{
                $this->request->errors['datepub'] = 'La date n’est pas au bon format';
            }
            if (empty($this->request->errors)) {
                $front_cover = Image::renameFileName($this->request->sent->title);
                $logo = Image::renameFileName($this->request->sent->title, '_small');
                $presentation_cover = Image::renameFileName($this->request->sent->title, '_presentation_cover');

                Image::imageCopyResampled($_FILES['front_cover'],'./img/books_covers/logo/',$logo,0.5);
                Image::saveAs($_FILES['front_cover'], './img/books_covers/', $front_cover);
                Image::saveAs($_FILES['front_cover_presentation'], './img/books_covers/presentation/',
                    $presentation_cover);

                $this->request->sent->front_cover = $front_cover;
                $this->request->sent->logo = $logo;
                $this->request->sent->presentation_cover = $presentation_cover;
                $this->request->sent->creat_at = date("Y-m-d");
                isset($this->request->sent->vedette) ? '' : $this->request->sent->vedette = 0;
                $this->modelBook->create($this->request->sent, $this->request->id);
                Session::setMessage('Merci, votre livre a été ajouté');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=book&a=admin_index');
                die();
            } else {
                $data['errors'] = $this->request->errors;
                $data['sent'] = $this->request->sent;
                if(isset($this->request->step)){
                    $data['step'] = $this->request->step;

                }
            }
        }
        $title = 'Ajouter un livre, en quelques clicks';
        $data['authors'] = $this->modelAuthor->getAllName();
        $data['editors'] = $this->modelEditor->all();
        $data['genres'] = $this->modelGenre->all();
        $data['langues'] = $this->modelBook->getAllLanguages();
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin_delete_book()
    {
        if ($this->modelBook->delete($this->request->id)) {
            Session::setMessage('Votre livre à été supprimé avec succès');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=book&a=admin_index');
            die();
        } else {
            Session::setMessage('Votre livre a été supprimé avec succes');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=book&a=admin_index');
            die();
        }

    }

}
