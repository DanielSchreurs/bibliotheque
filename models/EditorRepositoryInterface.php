<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */
namespace Models;


interface EditorRepositoryInterface
{

    function books($id);

    public function all();

    public function find($id_editors);

}