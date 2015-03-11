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
        $title = 'Les auteurs';
        $view = 'index.php';
        return [
            'data' => $data,
            'title'=>$title,
            'view' => $view
        ];
    }
    function show()
    {

    }
}