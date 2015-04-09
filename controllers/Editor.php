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
    function __construct(Request $request, EditorRepository $modelEditor)
    {
        parent::__construct($request);
        $this->modelEditor = $modelEditor;
    }

    function index()
    {

        $data = $this->modelEditor->all();
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
        $title = 'Administrer les éditeurs en quelques clicks';
        return [
            'data' => $data,
            'title' => $title,
        ];
    }

    public function admin_edit_editor()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (empty($_FILES['logo']['name'])) {
                $this->request->errors['logo'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage1 = Image::isvalidImage($_FILES['logo'], 200, 200, 'png');
                if (!empty($valideImage1)) {
                    $this->request->errors['logo'] = $valideImage1;
                }
            }

            if(filter_var($this->request->sent->website, FILTER_VALIDATE_URL) === false){
                $this->request->errors['website']='Ooups c’est n’est pas une URL valide ';
            }
            if (empty($this->request->errors)) {
                $logo = Image::renameFileName($this->request->sent->name);
                Image::saveAs($_FILES['logo'], './img/editors_logos/', $logo);
                $this->request->sent->logo = $logo;
                $this->request->sent->update_at = date("Y-m-d");
                $this->modelEditor->update($this->request->sent, $this->request->id);
                Session::setMessage('Merci, l’éditeur a été mis à jour');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=editor&a=admin_index_editor');
                die();
            } else {
                $data['errors'] = $this->request->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'Modifier un éditeur, en quelques clicks';
        $data['editors'] = $this->modelEditor->getSimpleInfoOffOne($this->request->id);

        return [
            'data' => $data,
            'title' => $title
        ];
    }
    public function admin_create_editor()
    {
        $data='';
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (empty($_FILES['logo']['name'])) {
                $this->request->errors['logo'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage1 = Image::isvalidImage($_FILES['logo'], 200, 200, 'png');
                if (!empty($valideImage1)) {
                    $this->request->errors['logo'] = $valideImage1;
                }
            }

            if(filter_var($this->request->sent->website, FILTER_VALIDATE_URL) === false){
                $this->request->errors['website']='Ooups c’est n’est pas une URL valide ';
            }
            if (empty($this->request->errors)) {
                $logo = Image::renameFileName($this->request->sent->name);
                Image::saveAs($_FILES['logo'], './img/editors_logos/', $logo);
                $this->request->sent->logo = $logo;
                $this->request->sent->create_at = date("Y-m-d");
                $this->modelEditor->create($this->request->sent, $this->request->id);
                Session::setMessage('Merci, l’éditeur a été ajouté');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=editor&a=admin_index_editor');
                die();
            } else {
                $data['errors'] = $this->request->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'Ajouter un éditeur, en quelques clicks';
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