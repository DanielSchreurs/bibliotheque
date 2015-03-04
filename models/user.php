<?php

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
}