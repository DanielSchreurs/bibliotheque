<?php

namespace Controllers;

class Base
{
    public $view = null;
    public $request = null;

    function __construct(Request $request)
    {
        $this->view = $request->m . '/' . $request->a . '.php';
        $this->request = $request;
    }
}