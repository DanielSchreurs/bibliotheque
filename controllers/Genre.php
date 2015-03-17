<?php

/**
 *
 */
namespace Controllers;

use Models\GenreRepositoryInterface as PostRepository;

class Genre extends Base
{
    function __construct(Request $request,PostRepository $ModelGenre )
    {
        parent::__construct($request);
        $this->modelGenre = $ModelGenre;
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