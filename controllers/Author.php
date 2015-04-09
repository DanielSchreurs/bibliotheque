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
        $this->view='admin/author.php';
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

        if ($_SERVER['REQUEST_METHOD'] === "POST") {


            if (empty($_FILES['photo']['name'])) {
                $this->request->errors['photo'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage1 = Image::isvalidImage($_FILES['photo'], 300, 450, 'jpeg');
                if (!empty($valideImage1)) {
                    $this->request->errors['photo'] = $valideImage1;
                }
            }
            if (empty($_FILES['logo']['name'])) {
                $this->request->errors['logo'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage2 = Image::isvalidImage($_FILES['logo'], 200, 200, 'png');

                if (!empty($valideImage2)) {
                    $this->request->errors['logo'] = $valideImage2;
                }
            }
            if(!isset($this->request->errors['datebirth'])){
                if(Date::isValidDate($this->request->sent->datebirth)!==true){
                    $this->request->errors['datebirth']=Date::isValidDate($this->request->sent->datebirth);
                }

            }
            if(isset($this->request->errors['datedeath'])){
                    unset($this->request->errors['datedeath']);
            }
            else{
                if(Date::isValidDate($this->request->sent->datedeath)!==true){
                    $this->request->errors['datedeath']=Date::isValidDate($this->request->sent->datedeath);
                }
            }
            if (empty($this->request->errors)) {

                $photo = Image::renameFileName('photo');
                $logo = Image::renameFileName('logo');

                Image::saveAs($_FILES['photo'], './img/authors_photo/', $photo);
                Image::saveAs($_FILES['logo'], './img/authors_photo/logo/',$logo);

                $this->request->sent->photo = $photo;
                $this->request->sent->logo = $logo;
                $this->request->sent->create_at = date("Y-m-d");
                isset($this->request->sent->vedette) ? '' : $this->request->sent->vedette = 0;
                $this->modelAuthor->update($this->request->sent,$this->request->id);
                Session::setMessage('L’auteur a été modifié avec succès.');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=author&a=admin_index_author');
                die();
            } else {
                $data['errors'] = $this->request->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'Modifier une auteur';
        $data['authors'] = $this->modelAuthor->getAllName();
        return [
            'data' => $data,
            'title' => $title
        ];

    }
    public function admin_create_author()
    {
        $data='';
        if ($_SERVER['REQUEST_METHOD'] === "POST") {


            if (empty($_FILES['photo']['name'])) {
                $this->request->errors['photo'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage1 = Image::isvalidImage($_FILES['photo'], 300, 450, 'jpeg');
                if (!empty($valideImage1)) {
                    $this->request->errors['photo'] = $valideImage1;
                }
            }
            if (empty($_FILES['logo']['name'])) {
                $this->request->errors['logo'][] = 'Oups vous n’avez pas mis d’image';
            } else {
                $valideImage2 = Image::isvalidImage($_FILES['logo'], 200, 200, 'png');

                if (!empty($valideImage2)) {
                    $this->request->errors['logo'] = $valideImage2;
                }
            }
            if(!isset($this->request->errors['datebirth'])){
                if(Date::isValidDate($this->request->sent->datebirth)!==true){
                    $this->request->errors['datebirth']=Date::isValidDate($this->request->sent->datebirth);
                }

            }
            if(isset($this->request->errors['datedeath'])){
                    unset($this->request->errors['datedeath']);
                    $this->request->sent->datedeath='0000-00-00';
            }
            else{
                if(Date::isValidDate($this->request->sent->datedeath)!==true){
                    $this->request->errors['datedeath']=Date::isValidDate($this->request->sent->datedeath);
                }
            }
            if (empty($this->request->errors)) {
                $photo = Image::renameFileName('photo');
                $logo = Image::renameFileName('logo');

                Image::saveAs($_FILES['photo'], './img/authors_photo/', $photo);
                Image::saveAs($_FILES['logo'], './img/authors_photo/logo/',$logo);

                $this->request->sent->photo = $photo;
                $this->request->sent->logo = $logo;
                $this->request->sent->create_at = date("Y-m-d");
                isset($this->request->sent->vedette) ? '' : $this->request->sent->vedette = 0;
                $this->modelAuthor->create($this->request->sent);
                Session::setMessage('L’auteur a été crée avec succès.');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=author&a=admin_index_author');
                die();
            } else {
                $data['errors'] = $this->request->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'Modifier une auteur';
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