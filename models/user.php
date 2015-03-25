<?php

namespace Models;

class User extends Model implements UserRepositoryInterface
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function exists($username, $password)
    {
        $sql = 'SELECT password FROM users where username=:username';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':username' => $username]);
        $res = $pds->fetch();
        if ($res == null) {
            return false;
        }
        return true;
    }

    public function userNameExist($username)
    {
        $sql = 'SELECT id FROM users WHERE username=:username ';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':username' => $username]);
        $res = $pdost->fetch();
        if ($res == null) {
            return false;
        }
        return true;
    }

    public function getUserInfo($username, $password)
    {
        $sql = 'SELECT first_name,last_name,photo,role FROM users where username=:username and password=:password';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':username' => $username, 'password' => $password]);
        return $pdost->fetch();
    }

    public function create($obj)
    {
        $sql = '
              INSERT INTO users (first_name,last_name,email,username,password,question,answer)
              VALUES (:first_name,:last_name,:username,:email,:password,:question,:answer)';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([
                ':first_name' => $obj->first_name,
                ':last_name' => $obj->last_name,
                ':username' => $obj->username,
                ':email' => $obj->email,
                ':password' => $obj->password,
                ':question' => $obj->question,
                ':answer' => $obj->answer
            ]
        );

    }
}