<?php

/**
 *
 */
namespace Controllers;

use Models\Editor as ModelEditor;

class Editor extends Base
{
    function __construct($request)
    {
        parent::__construct($request);
        $this->ModelEditor = new ModelEditor();
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

    }
}