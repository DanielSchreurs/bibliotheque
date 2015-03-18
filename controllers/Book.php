<?php

namespace Controllers;

use Models\BookRepositoryInterface as PostRepository;

class Book extends Base
{
    private $modelbook = null;
    private $modellibrary = null;


    public function __construct(Request $request, PostRepository $BookModel)
    {
        parent::__construct($request);
        $this->modelbook = $BookModel;
    }

    public function index()
    {
        $data = $this->modelbook->paginate($this->request->page);
        $title = 'acceuil';
        $nbrPage= ceil(($this->modelbook->getNbrelements()/NBR_BOOKS));
        return [
            'data' => $data,
            'title' => $title,
            'nbrPage'=>$nbrPage,
            'currentPage'=>$this->request->page
        ];

    }

    public function find()
    {
        $data = $this->modelbook->find($this->request->id);
        $title = 'livre d’un auteur';
        $view = 'index.php';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function view()
    {
        $data = $this->modelbook->find($this->request->id);
        $title = 'Un livrer';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function liste()
    {
        $data = $this->modelbook->getBookFromYear($this->request->year);
        $title = 'Un livre selon une année';
        $view = 'index.php';
        return [
            'data' => $data,
            'title' => $title
        ];
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
