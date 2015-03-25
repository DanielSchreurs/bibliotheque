<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface UserRepositoryInterface
{


    public function exists($username, $password);

    public function getUserInfo($username, $password);

    public function create($obj);
}