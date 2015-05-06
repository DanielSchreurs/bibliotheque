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

    function getAuthor($id);

    function books($id);

    public function getAuthorMonth();

    public function getAllName();

    public function update($authorObj, $author_id);

    public function create($authorObj);

}