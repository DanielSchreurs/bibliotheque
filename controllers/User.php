<?php

namespace Controllers;

use Components\Session;
use Helpers\validate;
use Models\BookRepositoryInterface as BookRepository;
use Models\UserRepositoryInterface as UserRepository;

class User extends Base
{
    function __construct(Request $request, UserRepository $modelUser, BookRepository $modelBook)
    {
        parent::__construct($request);
        $this->modelUser = $modelUser;
        $this->modelBook = $modelBook;
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
        $data = '';
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->errors = $this->modelUser->validate($this->request->sent, $_FILES);
            if ($this->request->sent->username) {
                if ($this->modelUser->userNameExist($this->request->sent->username)) {
                    $this->modelUser->errors['username'][] = 'Ce nom d’utilisateur existe déjà.';
                }
            }
            if ($this->modelUser->isValid()) {
                $this->modelUser->create($this->request->sent);
                $this->login(true);
                Session::setMessage('Merci, pour votre inscription. Vous pouvez vous connecter.');
               $this->headerLocation();
            } else {
                $data['errors'] = $this->modelUser->errors;
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'formulaire d’inscription';
        return [
            'data' => $data,
            'title' => $title
        ];

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
        $data['user'] = $this->modelUser->getUserInfo($this->request->id);
        $data['books'] = $this->modelBook->getReservedBooksFromUser($this->request->id);
        $title = 'Mon compte';
        return [
            'data' => $data,
            'title' => $title

        ];
    }

    public function forgot()
    {
        $title = 'Réinitialiser son mot de passe';
        $_SESSION['step'] = isset($_SESSION['step']) ? $_SESSION['step'] : 1;
        $data['step'] = $_SESSION['step'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->modelUser->validate($this->request->sent);
            if (empty($this->modelUser->errors)) {
                if ($_SESSION['step'] == 1) {
                    if ($this->modelUser->userNameExist($this->request->sent->username)) {
                        $data['question'] = $this->modelUser->getUserQuestion($this->request->sent->username)->question;
                        $_SESSION['question'] = $data['question'];
                        if ($_SESSION['question'] === null) {
                            Session::setMessage('Il n’existe pas de question pour cet identifiant', 'error');
                            $this->headerLocation();
                        } else {
                            $_SESSION['step'] = 2;
                        }
                    } else {
                        $this->modelUser->errors['username'][] = 'Cet identifiant n’existe pas.';

                    }
                } elseif ($_SESSION['step'] == 2) {
                    $user = ($this->modelUser->getUserByQuestionAndAnswer($_SESSION['question'],
                        $this->request->sent->answer));
                    if (!empty($user)) {
                        $_SESSION['step'] = 3;
                        $_SESSION['forgotId'] = $user->id;
                    } else {
                        $_SESSION['step'] = 2;
                        $data['question'] = $_SESSION['question'];
                        $this->modelUser->errors['answer'][] = 'Ce n’est pas la bonne réponse.';
                    }
                } elseif ($_SESSION['step'] == 3) {
                    $this->modelUser->resetPasseword(sha1($this->request->sent->password), $_SESSION['forgotId']);
                    unset($_SESSION['question']);
                    unset($_SESSION['forgotId']);
                    unset($_SESSION['step']);
                    Session::setMessage('Votre mot de passe à été mis à jour.');
                  $this->headerLocation();
                }
            }
            $data['step'] = $_SESSION['step'];
            $data['errors'] = $this->modelUser->errors;
            $data['sent'] = $this->request->sent;
        }
        return [
            'title' => $title,
            'data' => $data
        ];
    }

    public
    function admin_usersIndex()
    {
        die('ok je suis dans le controleur ');
    }
}