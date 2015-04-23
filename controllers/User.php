<?php

namespace Controllers;

use Components\Session;
use Helpers\validate;
use Models\UserRepositoryInterface as UserRepository;
use Models\BookRepositoryInterface as BookRepository;

class User extends Base
{
    function __construct(Request $request, UserRepository $modelUser,BookRepository $modelBook)
    {
        parent::__construct($request);
        $this->modelUser = $modelUser;
        $this->modelBook=$modelBook;
    }

    function login($register = false)
    {
        if (isset($_SESSION['first_name'])) {
            header('Location:' . $_SERVER['PHP_SELF']);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($this->request->sent->username) && isset($this->request->sent->password)) {
                if (($this->modelUser->exists($this->request->sent->username, sha1($this->request->sent->password)))) {
                    if (isset($this->request->sent->remember)) {
                        setcookie('userId', $this->modelUser->getUserId($this->request->sent->username,
                            sha1($this->request->sent->password))->id, LIVETIME);
                        setcookie('role', $this->modelUser->getUserRole($_COOKIE['userId'])->role, LIVETIME);
                        
                    } else {
                        $_SESSION['userId'] = $this->modelUser->getUserId($this->request->sent->username,
                            sha1($this->request->sent->password))->id;
                        $_SESSION['role'] = $this->modelUser->getUserRole($_SESSION['userId'])->role;
                    }
                    if (!$register) {
                        Session::setMessage('Vous êtes connecté.');
                    } else {
                        Session::setMessage('Merci pour votre inscription, vous êtes mainteant connecté.');
                    }
                    header('Location:' . $_SERVER['PHP_SELF']);
                    die();
                } else {
                    Session::setMessage('Oups, votre login ou mot de pass semble erroné', 'error');
                    header('Location:' . $_SERVER['PHP_SELF']);
                    die();
                }
            } else {
                Session::setMessage('On essaye de tricher ?');
                header('Location:' . $_SERVER['PHP_SELF']);
                die();
            }
        } else {
            return [
                'data' => null,
                'view' => 'userlogin.php'
            ];
        }
    }

    public function create()
    {
        unset($this->request->errors['question'], $this->request->errors['answer']);
        if ($_SERVER['REQUEST_METHOD'] === "POST" && !filter_var($this->request->sent->email, FILTER_VALIDATE_EMAIL)) {
            $this->request->errors['email'] = 'Oups, mail nom valide';
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST" && empty($this->request->errors)) {
            if( $this->modelUser->userNameExist($this->request->sent->username)){
                Session::setMessage('Malheursement ce nom d’utilisateur existe déjà.','error');
                header('Location:' . $_SERVER['PHP_SELF'].'?m=user&a=create');
                die();
            }
            $this->modelUser->create($this->request->sent);
            $this->login(true);
        } else {
            $data['errors'] = $this->request->errors;
            $data['sent'] = $this->request->sent;
        }
        if (isset($data['errors'])) {
            $title = 'formulaire d’inscription';
            return [
                'data' => $data,
                'title' => $title
            ];
        } else {
            Session::setMessage('Merci, pour votre inscription. Vous pouvez vous connecter.');
            header('Location:' . $_SERVER['PHP_SELF']);
            die();
        }

    }

    public function logout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['role']);
        setcookie('userId', false, time() - (3600));
        setcookie('role', false, time() - (3600));
        Session::setMessage('Vous êtes déconnecté.');
        header('Location:' . $_SERVER['PHP_SELF']);
        die();
    }

    public function user_userIndex()
    {

        $data['user']=$this->modelUser->getUserInfo($this->request->id);
        $data['books']=$this->modelBook->getReservedBooksFromUser($this->request->id);
        $title='Mon compte';
        return[
            'data'=>$data,
            'title'=>$title

        ];
    }
    public function admin_usersIndex()
    {
        die('ok je suis dans le controleur ');
    }
}