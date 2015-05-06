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
    private $errors = null;


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
        $data['data'] = $this->modelBook->find($this->request->id);
        $data['isDispo'] = $this->modelBook->isDispo($this->request->id) === true;
        $title = 'Un livre';
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
        $title = 'Modifier un livre, en quelques clicks';
        $data['authors'] = $this->modelAuthor->getAllName();
        $data['editors'] = $this->modelEditor->getSimpleInfoOffAll();
        $data['genres'] = $this->modelGenre->all();
        $data['langues'] = $this->modelBook->getAllLanguages();
        $data['book'] = $this->modelBook->find($this->request->id);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->errors = $this->modelBook->validate($this->request->sent, $_FILES);

            if (!isset($this->modelAuthor->errors['front_cover_edit']) && !empty($_FILES['front_cover_edit']['name'])) {
                if (!Image::isValidSize($_FILES['front_cover_edit'], 300, 450)) {
                    $this->modelAuthor->errors['front_cover_edit'][] = 'Oups les dimensions ne sont pas bonnes';
                }
            }
            if (!isset($this->modelAuthor->errors['front_cover_presentation_edit']) && !empty($_FILES['front_cover_presentation_edit']['name'])) {
                if (!Image::isValidSize($_FILES['front_cover_presentation_edit'], 270, 200)) {
                    $this->modelAuthor->errors['front_cover_presentation_edit'][] = 'Oups les dimensions ne sont pas bonnes';
                }
            }
            if ($this->modelBook->isValid()) {
                if (!empty($_FILES['front_cover_edit']['name'])) {
                    $this->request->sent->front_cover_edit = Image::renameFileName('book');
                    $this->request->sent->front_cover_presentation_edit = Image::renameFileName('book',
                        '_presentation_cover');
                    Image::saveAs($_FILES['front_cover_edit'], './img/books_covers/',
                        $this->request->sent->front_cover_edit);
                    Image::saveAs($_FILES['front_cover_presentation_edit'], './img/books_covers/presentation/',
                        $this->request->sent->presentation_cover);
                } else {
                    $this->request->sent->front_cover_edit = $data['book']->front_cover;
                    $this->request->sent->front_cover_presentation_edit = $data['book']->presentation_cover;
                }
                if (!empty($_FILES['front_cover_presentation']['name'])) {
                    $logo = Image::renameFileName('book', '_small');
                    Image::imageCopyResampled($_FILES['front_cover'], './img/books_covers/logo/', $logo, 0.5);
                    $this->request->sent->logo = $logo;
                } else {
                    $this->request->sent->logo = $data['book']->logo;
                }
                isset($this->request->sent->vedette) ? '' : $this->request->sent->vedette = 0;
                $this->modelBook->update($this->request->sent, $this->request->id);
                Session::setMessage('Merci, votre livre a été mis à jour');
                $this->headerLocation('book', 'admin_index');
            } else {
                $data['errors'] = $this->modelBook->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin_index()
    {
        $title = 'Administrer les livres, en quelques clicks';
        $data['books'] = $this->modelBook->all();
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin_show_book()
    {
        $title = 'Supprimer ce livre';
        $data = $this->modelBook->find($this->request->id);
        return [
            'title' => $title,
            'data' => $data
        ];
    }

    public function admin_create_book()
    {
        $title = 'Ajouter un livre, en quelques clicks';
        $data['authors'] = $this->modelAuthor->getAllName();
        $data['editors'] = $this->modelEditor->getSimpleInfoOffAll();
        $data['genres'] = $this->modelGenre->all();
        $data['langues'] = $this->modelBook->getAllLanguages();
        if (isset($this->request->step)) {
            $data['step'] = $this->request->step;

        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->errors = $this->modelBook->validate($this->request->sent, $_FILES);
            if (!isset($this->modelBook->errors['front_cover'])) {
                if (!Image::isValidSize($_FILES['front_cover'], 300, 450)) {
                    $this->modelBook->errors['front_cover'][] = 'Oups les dimensions ne sont pas bonnes';
                }
            }
            if (!isset($this->modelBook->errors['front_cover_presentation'])) {
                if (!Image::isValidSize($_FILES['front_cover_presentation'], 270, 200)) {
                    $this->modelBook->errors['front_cover_presentation'][] = 'Oups les dimensions ne sont pas bonnes';
                }
            }
            if ($this->modelBook->isValid()) {
                $this->request->sent->front_cover = Image::renameFileName('book');
                $logo = Image::renameFileName('book', '_small');
                $this->request->sent->presentation_cover = Image::renameFileName('book', '_presentation_cover');
                $this->request->sent->logo = $logo;
                Image::imageCopyResampled($_FILES['front_cover'], './img/books_covers/logo/', $logo, 0.5);
                Image::saveAs($_FILES['front_cover'], './img/books_covers/', $this->request->sent->front_cover);
                Image::saveAs($_FILES['front_cover_presentation'], './img/books_covers/presentation/',
                    $this->request->sent->presentation_cover);
                isset($this->request->sent->vedette) ? '' : $this->request->sent->vedette = 0;
                $this->modelBook->create($this->request->sent);
                Session::setMessage('Merci, votre livre a été ajouté');
                $this->headerLocation('book', 'admin_index');
            } else {
                $data['errors'] = $this->modelBook->errors;
                $data['sent'] = $this->request->sent;
                if (isset($this->request->step)) {
                    $data['step'] = $this->request->step;
                }
            }
        }
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin_delete_book()
    {
        if ($this->modelBook->delete($this->request->id)) {
            Session::setMessage('Votre livre à été supprimé avec succès');
            $this->headerLocation('book', 'admin_index');
        } else {
            Session::setMessage('Votre livre a été supprimé avec succes');
            $this->headerLocation('book', 'admin_index');
        }

    }

    public function user_reserve()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            if (!isset($this->request->errors['from'])) {
                if (Date::isValidDate($this->request->sent->from, false) !== true) {
                    $this->request->errors['from'] = Date::isValidDate($this->request->sent->from, false);
                }
            }
            if (!isset($this->request->errors['to'])) {
                if (Date::isValidDate($this->request->sent->to, false) !== true) {
                    $this->request->errors['to'] = Date::isValidDate($this->request->sent->to, false);
                }
            }
            if ((!isset($this->request->errors['to'])) && (!isset($this->request->errors['from']))) {
                if (Date::getAge($this->request->sent->from, $this->request->sent->to, 'm') > 1) {
                    $this->request->errors['to'] = 'Oups, vous ne pouvez pas réserver pour plus d’un mois';
                }

            }
            if (empty($this->request->errors)) {
                if ($this->modelBook->isDispo($this->request->id, $this->request->sent->to) === true) {
                    $this->modelBook->reserveBook($this->request->sent);
                    Session::setMessage('Ce livre a été réservé pour vous avec succès. Vous pouver modifier la date depuis votre compte.');
                    $this->headerLocation();
                } else {
                    Session::setMessage('Malheureusement ce livre n’est plus diposible à ce moment', 'error');
                    $this->headerLocation();
                }
            } else {
                $data['errors'] = $this->request->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        $data['data'] = $this->modelBook->find($this->request->id);
        $title = 'Réserver un livre';
        return [
            'title' => $title,
            'data' => $data,
        ];
    }

    public function user_UpdateReserve()
    {


        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            if (!isset($this->request->errors['from'])) {
                if (Date::isValidDate($this->request->sent->from, false) !== true) {
                    $this->request->errors['from'] = Date::isValidDate($this->request->sent->from, false);
                }
            }
            if (!isset($this->request->errors['to'])) {
                if (Date::isValidDate($this->request->sent->to, false) !== true) {
                    $this->request->errors['to'] = Date::isValidDate($this->request->sent->to, false);
                }
            }
            if ((!isset($this->request->errors['to'])) && (!isset($this->request->errors['from']))) {
                if (Date::getAge($this->request->sent->from, $this->request->sent->to, 'm') > 1) {
                    $this->request->errors['to'] = 'Oups, vous ne pouvez pas réserver pour plus d’un mois';
                }

            }
            if (empty($this->request->errors)) {
                if ($this->modelBook->isDispo($this->request->sent->book_id, $this->request->sent->to) === true) {
                    $this->modelBook->updateReserveBook($this->request->sent);
                    Session::setMessage('La date de modification a été modifié avec succès.');
                    $this->headerLocation('user', 'user_userIndex', ['id' => $this->request->sent->user_id]);
                } else {
                    Session::setMessage('Malheureusement ce livre n’est plus diposible à ce moment', 'error');
                    $this->headerLocation();
                }
            } else {
                $data['errors'] = $this->request->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        $data['data'] = $this->modelBook->getReservedInfo($this->request->id);
        $title = 'Modifier la date de réservation';
        return [
            'title' => $title,
            'data' => $data,
        ];
    }

}
