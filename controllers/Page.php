<?php

namespace Controllers;


use Models\Help;

class Page extends Base
{
    function __construct(Request $request)
    {
        parent::__construct($request);
        $this->Modelhelp = new Help();
    }


    public function help()
    {
        $date = $this->Modelhelp->getAllQuestions();
        $title = 'Comment ça marche';
        return [
            'data' => $date,
            'title' => $title
        ];
    }

    public function search()
    {
        $data = $this->Modelhelp->searchALL([
                'books' => [
                    'get' => 'title, id',
                    'where' => ['title', 'datepub'],
                    'what' => $_POST['search']
                ],
                'authors' => [
                    'get' => 'first_name, last_name, id',
                    'where' => ['first_name', 'last_name'],
                    'what' => $_POST['search']
                ],
                'editors' => [
                    'get' => 'name, id',
                    'where' => ['website', 'name'],
                    'what' => $_POST['search']
                ]
            ]
        );
        $title = $_POST['search'];
        return [
            'data' => $data,
            'title' => $title
        ];

    }

    public function admin_index()
    {
        $title='Vous n’avez pas le droit d’effectuer cette opération';
        if(isset($_COOKIE['role'])){
            if($_COOKIE['role']=='admin'){
            $this->view='admin/index.php';
            }
        }
        elseif(isset($_SESSION['role'])){
            if($_SESSION['role']=='admin'){
            $this->view='admin/index.php';
            return[
              'title'=>$title
            ];
            }
        }
        else{
            $this->view='error/error.php';
            return[
                'title'=>$title
            ];
        }
    }
}