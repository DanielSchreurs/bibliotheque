<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Controllers;

use Models\Library as ModelLibrary;

class Library extends Base
{
    function __construct($request)
    {
        parent::__construct($request);
        $this->modelLibrary = new ModelLibrary();
    }

    public function index()
    {

        $data = $this->modelLibrary->all();
        $view = 'index.php';
        $title = 'Nos bibliothèques';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }
    public function view(){
        $data= $this->modelLibrary->view($this->request->id);
    }
}