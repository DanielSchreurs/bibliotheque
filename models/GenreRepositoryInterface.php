<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface GenreRepositoryInterface
{

    public function all();

    public function find($id_genre);

}