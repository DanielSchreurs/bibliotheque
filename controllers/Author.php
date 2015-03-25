<?php

/**
 *
 */
namespace Controllers;

use Models\AuthorRepositoryInterface as AuthorRepository;

class Author extends Base
{
    function __construct(Request $request, AuthorRepository $modelAuthor)
    {
        parent::__construct($request);
        $this->modelAuthor = $modelAuthor;
    }


    function index()
    {
        $data = $this->modelAuthor->all();
        $title = 'Les auteurs';
        return [
            'data' => $data,
            'title' => $title
        ];
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
}