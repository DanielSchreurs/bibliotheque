<?php

namespace Controllers;


class Error extends Base
{
    function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function error()
    {
        switch($this->request->error){
            case 404:
                $data['title'] = 'Oups, vous semblez demander une page qui n’existe pas.';
                break;
            case 403:
                $data['title']='Vous n’avez pas le droit de faire ça';
                break;
            default:
                $data['title']='Oups, une erreur s’est produite';
                break;
        }
        return $data;
    }

}