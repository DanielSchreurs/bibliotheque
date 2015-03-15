<?php

/**
 *
 */
namespace Controllers;

use Models\Author as ModelAuthor;

class Author extends Base
{
    function __construct($request)
    {
        parent::__construct($request);
        $this->modelAuthor = new ModelAuthor();
    }

    function index()
    {
        $data = $this->modelAuthor->all();
        $title = 'Les auteurs';
        $view = 'index.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }

    public function view (){
        $user = new ModelAuthor();
        $data = $user->find($this->request->id);
        $title = 'Les auteurs';
        $view = 'index.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }
    function show()
    {

    }
}