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
        $view = 'help.php';
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
                    'where' => ['title','datepub'],
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
        $title= $_POST['search'];
        return [
            'data'=>$data,
            'title'=>$title
        ];

    }

}