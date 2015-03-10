<?php

namespace Controllers;

use Models\Book as BookModel;

class Page extends Base
{

    public function index()
    {
        $book = new BookModel();
        $data = $book->all();
        $title = 'acceuil';
        $view = 'index.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }

}