<?php

namespace Controllers;

class Base
{
    public $view = null;
    public $request = null;

    function __construct($request)
    {
        $this->view = $request->m . '/' . $request->a . '.php';
        $this->request = $request;
        $this->loadModel();
    }

    protected function loadModel($nomDuModel = null)
    {
        if (is_null($nomDuModel)) {// On passe ici à la première fois quand le model n'existe pas encore
            $nomDuModel = '\Models\\' . ucfirst($this->request->m);
        }
        $this->$nomDuModel = new $nomDuModel();
    }
}