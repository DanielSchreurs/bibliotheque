<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface AuthorRepositoryInterface
{


    public function all();

    function find($id);


    function books($id);

    public function getAuthorMonth();

    public function getAllName();

}