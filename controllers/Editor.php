<?php

/**
 *
 */
namespace Controllers;

use Models\EditorRepositoryInterface as EditorRepository;

class Editor extends Base
{
    function __construct(Request $request, EditorRepository $ModelEditor)
    {
        parent::__construct($request);
        $this->ModelEditor = $ModelEditor;
    }

    function index()
    {

        $data = $this->ModelEditor->all();
        $title = 'Les éditeurs';
        $view = 'index.php';
        return [
            'data' => $data,
            'title' => $title,
            'view' => $view
        ];
    }

    function view()
    {
        $data = $this->ModelEditor->find($this->request->id);
        $title = 'Un éditeur';
        $view = 'view.php';
        return [
            'data' => $data,
            'title' => $title,
            'view' => $view
        ];
    }
}