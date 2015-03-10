<?php

/**
 *
 */
namespace Controllers;
class editorController extends BaseController
{
    function __construct()
    {
        ;
    }

    function index()
    {
        $editor = new editor;
        $data = $editor->all();
        $view = 'editorindex.php';
        return [
            'data' => $data,
            'view' => $view
        ];
    }

    function show()
    {

    }
}