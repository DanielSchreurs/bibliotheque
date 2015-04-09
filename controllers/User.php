<?php

namespace Controllers;

use Components\Session;
use Helpers\validate;
use Models\UserRepositoryInterface as UserRepository;

class User extends Base
{
    function __construct(Request $request, UserRepository $modelUser)
    {
        parent::__construct($request);
        $this->modelUser = $modelUser;
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
            $this->modelUser->create($this->request->sent);
            $this->login(true);
        } else {
            $data['errors'] = $this->request->errors;
            $data['sent'] = $this->request->sent;
        }
        if (isset($data['errors'])) {
            $view = 'create.php';
            $title = 'formulaire d’inscription';
            return [
                'data' => $data,
                'view' => $view,
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
    public function admin_index()
    {
        die('ok je suis dans le controleur ');
    }
}