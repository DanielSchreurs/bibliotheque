<?php

/**
 *
 */
namespace Controllers;

use Models\Author as ModelAuthor;
use Models\AuthorRepositoryInterface as PostRepository;

class Author extends Base
{
    function __construct(Request  $request, PostRepository $modelAuthor)
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

    public function view (){
        $user = new ModelAuthor();
        $data = $user->find($this->request->id);
        $title = $data->first_name.' '.$data->last_name;
        return [
            'data' => $data,
            'title' => $title
        ];
    }
    function show()
    {

    }
}