<?php

/**
 *
 */
namespace Controllers;

use Components\Session;
use Helpers\Image;
use Models\EditorRepositoryInterface as EditorRepository;

class Editor extends Base
{
    private $errors = null;

    function __construct(Request $request, EditorRepository $modelEditor)
    {
        parent::__construct($request);
        $this->modelEditor = $modelEditor;
    }

    function index()
    {

        $data = $this->modelEditor->getSimpleInfoOffAll();
        $title = 'Liste de tous les éditeurs';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    function view()
    {
        $data = $this->modelEditor->find($this->request->id);
        $title = 'Un éditeur ';
        return [
            'data' => $data,
            'title' => $title,
        ];
    }

    public function admin_index_editor()
    {
        $data = $this->modelEditor->getSimpleInfoOffAll();
        $title = 'Administrer les éditeurs, en quelques clicks';
        return [
            'data' => $data,
            'title' => $title,
        ];
    }

    public function admin_edit_editor()
    {
        $title = 'Modifier un éditeur, en quelques clicks';
        $data['editor'] = $this->modelEditor->getSimpleInfoOffOne($this->request->id);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->errors = $this->modelEditor->validate($this->request->sent, $_FILES);
            if (!isset($this->modelEditor->errors['logo_edit']) && !empty($_FILES['logo_edit']['name'])) {
                if (!Image::isValidSize($_FILES['logo_edit'], 200, 200)) {
                    $this->modelEditor->errors['logo_edit'][] = 'Les dimensions ne sont pas bonnes';
                }
            }
            if ($this->modelEditor->isValid()) {
                if (!empty($_FILES['logo']['name'])) {
                    $logo = Image::renameFileName($this->request->sent->name);
                    Image::saveAs($_FILES['logo'], './img/editors_logos/', $logo);
                    $this->request->sent->logo = $logo;
                } else {
                    $this->request->sent->logo = $data['editor']->logo;
                }
                die('ok on envoie');

                $this->modelEditor->update($this->request->sent, $this->request->id);
                Session::setMessage('Merci, l’éditeur a été mis à jour');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=editor&a=admin_index_editor');
                die();
            } else {
                $data['errors'] = $this->modelEditor->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin_create_editor()
    {
        $data = '';
        if (isset($this->request->step)) {
            $data['step'] = $this->request->step;

        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->errors = $this->modelEditor->validate($this->request->sent, $_FILES);
            if (!isset($this->modelEditor->errors['logo']) && !empty($_FILES['logo']['name'])) {
                if (!Image::isValidSize($_FILES['logo'], 200, 200)) {
                    $this->modelEditor->errors['logo'][] = 'Les dimensions ne sont pas bonnes';
                }
            }

            if ($this->modelEditor->isValid()) {
                $this->request->sent->logo = Image::renameFileName($this->request->sent->name, $_FILES['logo']);
                Image::saveAs($_FILES['logo'], './img/editors_logos/', $this->request->sent->logo);
                $this->modelEditor->create($this->request->sent, $this->request->id);
                Session::setMessage('Merci, l’éditeur a été ajouté avec succès.');
                header('Location:' . $_SERVER['PHP_SELF'] . (isset($this->request->step) ? '?m=genre&a=admin_create_genre&step=3' : '?m=editor&a=admin_index_editor'));
                die();
            } else {
                $data['errors'] = $this->modelEditor->errors;
                $data['sent'] = $this->request->sent;
                if (isset($this->request->step)) {
                    $data['step'] = $this->request->step;

                }
            }
        }
        $title = 'Ajouter un éditeur';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin_show_editor()
    {
        $data = $this->modelEditor->getSimpleInfoOffOne($this->request->id);
        $title = 'Supprimer un éditeur';
        return [
            'data' => $data,
            'title' => $title,
        ];
    }


    public function admin_delete_editor()
    {

        $books = null;
        if (empty($this->modelEditor->find($this->request->id)[0]->book_id)) {
            $this->modelEditor->delete($this->request->id);
            Session::setMessage('L’éditeur a été supprimé avec succès.');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=editor&a=admin_index_editor');
            die();
        } else {
            foreach ($this->modelEditor->find($this->request->id) as $book) {
                $books .= ' - &laquo;&nbsp;' . $book->book_title . '&nbsp;&raquo;';
            }
            Session::setMessage('Cet éditeur éxiste encore pour : ' . $books, 'error');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=editor&a=admin_index_editor');
            die();
        }
    }

}