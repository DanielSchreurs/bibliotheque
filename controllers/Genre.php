<?php

/**
 *
 */
namespace Controllers;

use Models\Genre as ModelGenre;

class Genre extends Base
{
    function __construct($request)
    {
        parent::__construct($request);
        $this->modelGenre = new ModelGenre();
    }

    function index()
    {

        $data = $this->modelGenre->all();
        $title = 'Les genres';
        $view = 'index.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }

    public function view (){
        $data=$this->modelGenre->find($this->request->id);
        $title='Un genre';
        $view='view.php';
        return[
            'data'=>$data,
            'view'=>$view,
            'title'=>$title
        ];
    }

}