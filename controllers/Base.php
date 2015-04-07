<?php

namespace Controllers;

use Components\Session;

class Base
{
    public $view = null;
    public $request = null;
    public $header = 'header';

    function __construct(Request $request)
    {
        $this->view = $request->m . '/' . $request->a . '.php';
        $this->request = $request;
        $name = explode('_', $this->request->a);
        if (Session::isAdmin() && $name[0] == 'admin') {
            $this->view = $request->m . '/admin/' . $name[1] . '.php';
            $this->header = 'admin_header';
        }
        elseif(!Session::isAdmin() && $name[0] == 'admin'){
            header('Location:./index.php?m=error&a=error&error=404');
        }
    }
}