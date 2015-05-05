<?php

namespace Models;

use Components\Validator;

class User extends Model implements UserRepositoryInterface
{
    use Validator;
    protected $table = 'users';
    public $validationRules = [
        'create_at' => [
            ['ruleName' => 'isDate'],
            ['ruleName' => 'dateIsPast']
        ],
        'update_at' => [
            ['ruleName' => 'isDate'],
            ['ruleName' => 'dateIsPast']
        ],
        'first_name' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le prénom est obligatoire.']
        ],
        'last_name' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le nom de famille est obligatoire.']
        ],
        'username' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le nom d’utilisateur est obligatoire.']
        ],
        'email' => [
            ['ruleName' => 'notEmpty', 'error' => 'L’e-mail est obligatoire.'],
            ['ruleName' => 'isValidEmail', 'error' => 'L’e-mail n’est pas au bon format.']
        ],
        'password' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le mot de passe est obligatoire.'],
            ['ruleName' => 'isValidPassWord', 'error' => 'Le mot de passe n’est pas au format demandé.']
        ]
    ];

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function exists($username, $password)
    {
        $sql = 'SELECT password FROM users where username=:username AND password=:password';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':username' => $username, ':password' => $password]);
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
    public function getUserQuestion($userName)
    {
        $sql = 'SELECT question FROM users where username=:userName';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':userName' => $userName]);
        return $pdost->fetch();
    }
    public function getUserByQuestionAndAnswer($question,$answer)
    {
        $sql = 'SELECT id FROM users where question=:question AND answer=:answer';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':question' => $question,':answer'=>$answer]);
        return $pdost->fetch();
    }


    public function getUserId($username, $password)
    {
        $sql = 'SELECT id FROM users where username=:username AND password=:password';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':username' => $username, ':password' => $password]);
        return $pdost->fetch();
    }

    public function getUserRole($id)
    {
        $sql = 'SELECT role FROM users where id=:id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':id' => $id]);
        return $pdost->fetch();
    }
    public function resetPasseword($password,$id)
    {
        $sql = 'UPDATE users
                SET password=:password
                WHERE id=:id';

        $pdost = $this->cx->prepare($sql);
        $pdost->execute([
            ':password' => $password,
            ':id' => $id
        ]);
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