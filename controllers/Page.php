<?php

namespace Controllers;


use Models\Help;

class Page extends Base
{
    function __construct (Request $request){
        parent::__construct($request);
        $this->Modelhelp= new Help();
    }


    public function help()
    {
            $date=$this->Modelhelp->getAllQuestions();
            $title='Comment ça marche';
            $view='help.php';
            return [
                'data'=>$date,
                'title'=>$title,
                'view'=>$view
            ];
    }

}