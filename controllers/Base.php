<?php

namespace Controllers;

use Components\Session;

class Base
{
    public $view = null;
    public $request = null;
    public $isAdmin = false;

    function __construct(Request $request)
    {
        $this->view = $request->m . '/' . $request->a . '.php';
        $this->request = $request;
        $name = explode('_', $this->request->a);
        if (Session::isAdmin() && $name[0] == 'admin') {
            $this->isAdmin = true;
            $this->view = $request->m . '/admin/' . $name[1] . '.php';
        }
    }
}