<?php

/**
 *
 */
namespace Controllers;
class bookController extends BaseController
{
    private $modelbook = null;
    private $modellibrary = null;


    public function __construct($request)
    {
        parent::__construct($request);
        $this->modelbook = new book();
        //$this->modellibrary= new library();
    }

    public function index()
    {
        $book = new Book;
        $data = $book->all();
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
        $book = new Book;
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
