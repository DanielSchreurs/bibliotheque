<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Controllers;


class Year extends Base{

    function __construct($request){
        parent::__construct($request);
        $this->Modelyears= new \Models\Year();
    }

    public function index()
    {
        $data=$this->Modelyears->all();
        $view='index.php';
        $title='Toutes les années';
        return[
            'data'=>$data,
            'view'=>$view,
            'title'=>$title
        ];
    }
}