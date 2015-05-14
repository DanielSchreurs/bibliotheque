<?php

namespace Controllers;

class Request extends Base
{
    public $m = null;
    public $a = null;
    public $id = null;
    public $page = null;
    public $year = null;
    public $sent = null;

    function __construct()
    {

        include('./config/routes.php');
        $routeParts = explode('/', $routes['default']);//affecte une nouvelle vatriabe à avec l'action et l'entité []
        $this->m = $routeParts[0];// la variable $m est égal à l'action
        $this->a = $routeParts[1];// et la variable $a au model

        if (isset($_REQUEST['m'])) {
            $this->m = $_REQUEST['m'];
        }
        if (isset($_REQUEST['a'])) {
            $this->a = $_REQUEST['a'];
        }
        $route = $this->m . '/' . $this->a;//On formate la route selont le tableau existant
        if (!in_array($route, $routes)) {
            $this->m = 'error';
            $this->a = 'error';
            $this->error = '404';
        }
        if (isset($_REQUEST['id'])) {
            if (is_numeric($_REQUEST['id'])) {
                $this->id = $_REQUEST['id'];
            } else {
                $this->m = 'error';
                $this->a = 'error';
                $this->error = '403';
            }
        }
        if (isset($_REQUEST['page'])) {
            if (is_numeric($_REQUEST['page'])) {
                $this->page = $_REQUEST['page'];
            }
        } else {
            $this->page = 1;
        }
        if (isset($_REQUEST['year'])) {
            if (is_numeric($_REQUEST['year'])) {
                $this->year = $_REQUEST['year'];
            } else {
                $this->m = 'error';
                $this->a = 'error';
                $this->error = '403';
            }
        }
        if (isset($_REQUEST['step'])) {
            if (is_numeric($_REQUEST['step'])) {
                $this->step = $_REQUEST['step'];
            } else {
                $this->m = 'error';
                $this->a = 'error';
                $this->error = '403';
            }
        }
        if (isset($_REQUEST['error'])) {
            if (is_numeric($_REQUEST['error'])) {
                $this->error = $_REQUEST['error'];
            } else {
                $this->m = 'error';
                $this->a = 'error';
                $this->error = '403';
            }
        }
        if (!empty($_POST)) {
            $this->sent = new \stdClass();
            foreach ($_POST as $c => $v) {
                $this->sent->$c = $v;
            }
        }

    }

}