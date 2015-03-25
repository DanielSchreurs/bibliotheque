<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Controllers;


class Error extends Base
{
    function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function error()
    {

        $data['view'] = 'error.php';

        if($this->request->error==404){
            $data['title']='Oups, vous semblez demander une page qui n’existe pas.';
        }

        return $data;
    }

}