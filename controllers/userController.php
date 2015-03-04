<?php

/**
 *
 */
class UserController extends BaseController
{
    function login()
    {
        if ($_SESSION['valid']) {
            header('Location: index.php');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($this->request->sent->username) && isset($this->request->sent->password)){
                $user = new User;
                if (($user->exists($this->request->sent->username,$this->request->sent->password))) {
                    $_SESSION['valid'] = true;
                    var_dump($_SESSION['valid']); die('Connexion établie');
                    //header('Location: index.php');
                } else {
                    $_SESSION['valid'] = false;
                    die('vos identifiants sont incorrects');
                }
            } else {
                die('On essaye de tricher ?');
            }
        } else {
            return [
                'data' => null,
                'view' => 'userlogin.php'
            ];
        }
    }
    public function create(){
        die('je crée un user');
    }
    public function logout()
    {
        $_SESSION['valid'] = false;
        session_destroy();
        header('Location: index.php');
    }
}