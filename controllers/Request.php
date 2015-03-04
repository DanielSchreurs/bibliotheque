<?php

class Request
{
    public $m = null;
    public $a = null;
    public $id = null;
    public $sent = null;
    public $errors =[];

    function __construct()
    {

        include('./config/routes.php');
        $routeParts = explode('/', $routes['default']);//affecte une nouvelle vatriabe à avec l'action et l'entité []
        $this->m = $routeParts[0];// la variable $m est égal à l'action
        $this->a = $routeParts[1];// la variable $a au model
        /* Ici on m crée la route par défaut*/
        /* Et après on va vérifie si ce qui est demandé existe dans le fichier route et SI il existe alors on écrase les anciennes valeurs*/
            if (isset($_REQUEST['m']) && isset($_REQUEST['a'])) {
            $this->m = $_REQUEST['m'];
            $this->a = $_REQUEST['a'];
            $route = $this->m . '/' . $this->a;//On formate la route selont le tableau existant
            if (!in_array($route, $routes)) {//verifie si la route demandé existe
                die('Les varaible m et a ne correspondent pas à un chemin présent dans la basse de donnée');// Si le chemin n'existe pas dans le tableau on arrête le script
            }
            if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
                $this->id = $_REQUEST['id'];
            }
            if (!empty($_POST)) {
                $this->sent = new stdClass();
                foreach ($_POST as $c => $v) {
                    if (empty($v)) {
                        $this->errors[$c] = $v;
                        $this->sent->$c='';
                    } else {
                        $this->sent->$c=$v;
                    }
                }
            }

        }

    }
}