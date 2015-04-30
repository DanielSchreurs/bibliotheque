<?php

/**
 *
 */
namespace Controllers;

use Components\Session;
use Helpers\Date;
use Helpers\Image;
use Models\AuthorRepositoryInterface as AuthorRepository;

class Author extends Base
{
    private $errors = null;

    function __construct(Request $request, AuthorRepository $modelAuthor)
    {
        parent::__construct($request);
        $this->modelAuthor = $modelAuthor;
    }


    public function index()
    {
        $data = $this->modelAuthor->all();
        $title = 'Les auteurs';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin()
    {
        $this->view = 'admin/author.php';
    }

    public function view()
    {
        $data = $this->modelAuthor->find($this->request->id);
        $title = $data[0]->first_name . ' ' . $data[0]->last_name;
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    function show()
    {

    }

    public function admin_index_author()
    {
        $data = $this->modelAuthor->getAllName();
        $title = 'Administrer les auteurs en quelques clicks';
        return [
            'data' => $data,
            'title' => $title
        ];

    }

    public function admin_show_author()
    {
        $data = $this->modelAuthor->getAuthor($this->request->id);
        $title = 'Supprimer un auteur';
        return [
            'data' => $data,
            'title' => $title
        ];

    }

    public function admin_edit_author()
    {
        $title = 'Modifier un auteur';
        $data['authors'] = $this->modelAuthor->getAuthor($this->request->id);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->errors = $this->modelAuthor->validate($this->request->sent, $_FILES);
            if (!isset($this->modelAuthor->errors['photo_edit']) && !empty($_FILES['photo_edit']['name'])) {
                if (!Image::isValidSize($_FILES['photo_edit'], 300, 450)) {
                    $this->modelAuthor->errors['photo_edit'][] = 'Oups les dimensions ne sont pas bonnes';
                }
            }
            if (!isset($this->modelAuthor->errors['logo_edit']) && !empty($_FILES['logo_edit']['name'])) {
                if (!Image::isValidSize($_FILES['logo_edit'], 200, 200)) {
                    $this->modelAuthor->errors['logo_edit'][] = 'Oups les dimensions ne sont pas bonnes';
                }
            }

            if ($this->modelAuthor->isValid()) {
                isset($this->request->sent->vedette) ? '' : $this->request->sent->vedette = 0;
                $this->request->sent->datedeath = $this->request->sent->datedeath === '' ? '0000-00-00' : $this->request->sent->datedeath;
                if (!empty($_FILES['photo']['name'])) {
                    $photo = Image::renameFileName('photo');
                    Image::saveAs($_FILES['photo'], './img/authors_photo/', $photo);
                    $this->request->sent->photo = $photo;
                } else {
                    $this->request->sent->photo = $data['authors']->author_photo;
                }
                if (!empty($_FILES['logo']['name'])) {
                    $logo = Image::renameFileName('logo');
                    Image::saveAs($_FILES['logo'], './img/authors_photo/logo/', $logo);
                    $this->request->sent->logo = $logo;
                } else {
                    $this->request->sent->logo = $data['authors']->logo;
                }
                $this->modelAuthor->update($this->request->sent, $this->request->id);
                Session::setMessage('L’auteur a été modifié avec succès.');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=author&a=admin_index_author');
                die();
            } else {
                $data['errors'] = $this->modelAuthor->errors;
                $data['sent'] = $this->request->sent;
            }
        }

        return [
            'data' => $data,
            'title' => $title
        ];

    }

    public function admin_create_author()
    {
        $data = '';
        if (isset($this->request->step)) {
            $data['step'] = $this->request->step;
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->errors = $this->modelAuthor->validate($this->request->sent, $_FILES);

            if (!isset($this->modelAuthor->errors['photo'])) {
                if (!Image::isValidSize($_FILES['photo'], 300, 450)) {
                    $this->modelAuthor->errors['photo'][] = 'Oups les dimensions ne sont pas bonnes';
                }
            }
            if (!isset($this->modelAuthor->errors['logo'])) {
                if (!Image::isValidSize($_FILES['logo'], 200, 200)) {
                    $this->modelAuthor->errors['logo'][] = 'Oups les dimensions ne sont pas bonnes';
                }
            }
            if ($this->modelAuthor->isValid()) {
                $this->request->sent->photo = Image::renameFileName('photo', $_FILES['photo']);
                $this->request->sent->logo = Image::renameFileName('logo', $_FILES['logo']);
                isset($this->request->sent->vedette) ? '' : $this->request->sent->vedette = 0;
                $this->request->sent->datedeath = $this->request->sent->datedeath === '' ? '0000-00-00' : $this->request->sent->datedeath;
                Image::saveAs($_FILES['photo'], './img/authors_photo/', $this->request->sent->photo);
                Image::saveAs($_FILES['logo'], './img/authors_photo/logo/', $this->request->sent->logo);
                $this->modelAuthor->create($this->request->sent);
                Session::setMessage('Merci, l’auteur a été ajouté avec succès.');
                header('Location:' . $_SERVER['PHP_SELF'] . (isset($this->request->step) ? '?m=editor&a=admin_create_editor&step=2' : '?m=author&a=admin_index_author'));
                die();
            } else {
                $data['errors'] = $this->modelAuthor->errors;
                $data['sent'] = $this->request->sent;
                if (isset($this->request->step)) {
                    $data['step'] = $this->request->step;
                }
            }
        }
        $title = 'Ajouter un  auteur';
        return [
            'data' => $data,
            'title' => $title
        ];

    }

    public function admin_delete_author()
    {
        $books = null;
        if (empty($this->modelAuthor->find($this->request->id)[0]->book_id)) {
            $this->modelAuthor->delete($this->request->id);
            Session::setMessage('L’auteur a été supprimé avec succès.');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=author&a=admin_index_author');
            die();
        } else {
            foreach ($this->modelAuthor->find($this->request->id) as $book) {
                $books .= ' - &laquo;&nbsp;' . $book->book_title . '&nbsp;&raquo;';
            }
            Session::setMessage('Cet auteur est encore définit pour : ' . $books, 'error');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=author&a=admin_index_author');
            die();
        }


    }

}