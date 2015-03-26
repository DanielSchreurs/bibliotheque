<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface LibraryRepositoryInterface
{


    public function all();

    public function view($id_library);

}