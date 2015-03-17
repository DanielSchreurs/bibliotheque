<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Controllers;

use Models\YearRepositoryInterface as PostRepository;
class Year extends Base{

    function __construct(Request $request,PostRepository $ModelLibrary){
        parent::__construct($request);
        $this->Modelyears= $ModelLibrary;
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