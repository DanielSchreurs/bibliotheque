<?php

/**
 *
 */
namespace Controllers;

use Components\Session;
use Models\GenreRepositoryInterface as GenreRepository;

class Genre extends Base
{
    function __construct(Request $request, GenreRepository $ModelGenre)
    {
        parent::__construct($request);
        $this->modelGenre = $ModelGenre;
    }

    function index()
    {
        $data = $this->modelGenre->all();
        $title = 'Tous les genres';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function view()
    {
        $data = $this->modelGenre->find($this->request->id);
        $title = 'Un genre';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin_index_genre()
    {
        return $this->index();
    }

    public function admin_show_genre()
    {
        $data = $this->modelGenre->getName($this->request->id);
        $title = 'Supprimer un genre';
        return [
            'data' => $data,
            'title' => $title
        ];
    }
    public function admin_edit_genre()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && empty($this->request->errors)) {
            $this->request->sent->update_at = date("Y-m-d");
            $this->modelGenre->update($this->request->sent,$this->request->id);
            Session::setMessage('Merci ,&laquo;&nbsp' .$this->request->sent->name.'&nbsp;&raquo; a été mis à jour');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=genre&a=admin_index_genre');
            die();
        } else {
            $data['errors'] = $this->request->errors;
            $data['sent'] = $this->request->sent;
        }
        $title = 'Modifier le genre, en quelques clicks';
        $data['genre'] = $this->modelGenre->getName($this->request->id);
        return [
            'data' => $data,
            'title' => $title
        ];//attention il manque la date de modification !
    }
    public function admin_create_genre()
    {
        $data='';
        if(isset($this->request->step)){
            $data['step'] = $this->request->step;

        }
        if ($_SERVER['REQUEST_METHOD'] === "POST" && empty($this->request->errors)) {
            $this->request->sent->create_at = date("Y-m-d");
            $this->modelGenre->create($this->request->sent);
            Session::setMessage('Merci, ce genre a été ajouté avec succès');
            header('Location:' . $_SERVER['PHP_SELF'] . (isset($this->request->step)?'?m=book&a=admin_create_book&step=4':'?m=genre&a=admin_index_genre'));
        } else {
            $data['errors'] = $this->request->errors;
            $data['sent'] = $this->request->sent;
            if(isset($this->request->step)){
                $data['step'] = $this->request->step;

            }
        }
        $title = 'Ajouter un genre';
        return [
            'data' => $data,
            'title' => $title
        ];
    }


    public function admin_delete_genre()
    {
        $books = null;
        if (empty($this->modelGenre->find($this->request->id)[0]->book_id)) {
            $this->modelGenre->delete($this->request->id);
            Session::setMessage('Votre genre a été supprimé avec succe.');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=genre&a=admin_index_genre');
            die();
        } else {
            foreach ($this->modelGenre->find($this->request->id) as $book) {
                $books .= ' - &laquo;&nbsp;' . $book->book_title . '&nbsp;&raquo;';
            }
            Session::setMessage('Ce genre est encore définit pour : ' . $books, 'error');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=genre&a=admin_index_genre');
            die();
        }
    }
}