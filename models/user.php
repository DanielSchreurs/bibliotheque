<?php

namespace Models;
class User extends Model
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
        if($res==null){
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
    public function create(){
        //atention il fait faire un exist avant.. Le user name doit être unique
    }
}