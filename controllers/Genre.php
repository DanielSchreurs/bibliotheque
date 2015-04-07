<?php

/**
 *
 */
namespace Controllers;

use Models\GenreRepositoryInterface as GenreRepository;

class Genre extends Base
{
    function __construct(Request $request, GenreRepository $ModelGenre)
    {
        parent::__construct($request);
        $this->modelGenre = $ModelGenre;
    }

    function index()
    {

        $data = $this->modelGenre->all();
        $title = 'Tous les genres';
        $view = 'index.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }

    public function view()
    {
        $data = $this->modelGenre->find($this->request->id);
        $title = 'Un genre';
        $view = 'view.php';
        return [
            'data' => $data,
            'view' => $view,
            'title' => $title
        ];
    }

}