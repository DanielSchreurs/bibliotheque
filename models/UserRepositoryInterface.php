<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface UserRepositoryInterface
{
    public function exists($username, $password);

    public function userNameExist($username);

    public function getUserInfo($id);

    public function getUserId($username, $password);

    public function getUserRole($id);


    public function create($obj);
}