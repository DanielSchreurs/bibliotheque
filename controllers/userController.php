<?php

/**
 * Ceci est le constructeur qui est appelé lorsqu’un utilisateur essaye de se connecter. Si la méthode « exist » du
 * « modele » « user » revoit « true », c’est que l’utilisateur existe déjà dans la basse de donnée. Et donc on ne
 * redirige pas vers le formulaire d’inscription.  Cependant, deux possibilités existent encore. Le cas où
 * l’utilisateur veut garder sa session active, ainsi une
 * variable de type « bolean » est stockée non pas dans « $_SESSION»,  mais dans « $_COOKIES » (La durée de vie est
 * définie dans le fichier config). Si l’utilisateur ne veut pas garder sa session active, on stoke la variable
 * dans la « $_SESSION».
 **/
class UserController extends BaseController
{
    function login()
    {
        if ($_SESSION['session_valid']) {
            header('Location: index.php');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($this->request->sent->username) && isset($this->request->sent->password)) {
                $user = new User;
                if (($user->exists($this->request->sent->username, $this->request->sent->password))) {
                    if (isset($this->request->sent->remember)) {
                        setcookie('session_valid', true, LIVETIME);
                    } else {
                        $_SESSION['session_valid'] = true;
                    }
                    header('Location:http://localhost:8888/bibliotheque');
                } else {
                    $_SESSION['session_valid'] = false;
                    setcookie('session_valid', false, LIVETIME);
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

    public function create()
    {
        die('je crée un user');
    }
    public function logout()
    {
        unset($_SESSION);
        unset($_COOKIE);
        session_destroy();
        header('Location:http://localhost:8888/bibliotheque/index.php');
    }
}