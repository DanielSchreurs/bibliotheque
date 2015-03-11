<?php

namespace Controllers;

use \Models\Book as BookModel;

class Book extends Base
{
    private $modelbook = null;
    private $modellibrary = null;


    public function __construct($request)
    {
        parent::__construct($request);
        $this->modelbook = new BookModel();
    }

    public function index()
    {
        $data = $this->modelbook->all();
        $title = 'acceuil';
        $view = 'index.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }

    public function show()
    {

    }


    public function edit()
    {

    }


    public function update()
    {

    }

    public function getBookFromAuthor($book_id)
    {
        $book = new BookModel();
        $data = $book->getBookfromUser($book_id);
        $title = 'Un livre';
        $view = 'index.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }
}
