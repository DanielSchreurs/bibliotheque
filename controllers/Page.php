<?php

namespace Controllers;


use Models\Help;
use Models\Library;

class Page extends Base
{
    function __construct(Request $request)
    {
        parent::__construct($request);
        $this->Modelhelp = new Help();
        $this->ModelLibrary= new Library();
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

    public function about()
    {
        $data= $this->ModelLibrary->view(1);
        $title='&Agrave; propos de nous';
        return[
            'data'=>$data,
            'title'=>$title
        ];
    }
}