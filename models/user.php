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
        $sql = 'SELECT password FROM users where username=:username AND password=:password';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':username' => $username,':password'=>$password]);
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

    public function getUserInfo($id)
    {
        $sql = 'SELECT first_name,last_name,photo,role FROM users where id=:id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':id' => $id]);
        return $pdost->fetch();
    }

    public function getUserId($username,$password)
    {
        $sql = 'SELECT id FROM users where username=:username AND password=:password';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':username'=>$username,':password' => $password]);
        return $pdost->fetch();
    }
    public function getUserRole($id)
    {
        $sql = 'SELECT role FROM users where id=:id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':id' => $id]);
        return $pdost->fetch();
    }
    public function create($obj)
    {

        $sql = '
              INSERT INTO users (first_name,last_name,username,password,email,question,answer)
              VALUES (:first_name,:last_name,:username,:password,:email,:question,:answer)';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([
                ':first_name' => $obj->first_name,
                ':last_name' => $obj->last_name,
                ':username' => $obj->username,
                ':password' => sha1($obj->password),
                ':email' => $obj->email,
                ':question' => $obj->question,
                ':answer' => $obj->answer
            ]
        );

    }
}