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
        if ($_SESSION['first_name']) {
            header('Location: index.php');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($this->request->sent->username) && isset($this->request->sent->password)) {
                $user = new User;
                if (($user->exists($this->request->sent->username, $this->request->sent->password))) {
                    if (isset($this->request->sent->remember)) {
                        //var_dump($user->getUserInfo($this->request->sent->username, $this->request->sent->password));
                        foreach ($user->getUserInfo($this->request->sent->username,
                            $this->request->sent->password) as $c => $v) {
                            setcookie($c, $v, LIVETIME);
                        }
                    } else {
                        foreach ($user->getUserInfo($this->request->sent->username,
                            $this->request->sent->password) as $c => $v) {
                            $_SESSION[$c] = $v;
                        }
                    }

                    header('Location:http://localhost:8888/bibliotheque');
                } else {
                    $_SESSION['first_name'] = false;
                    setcookie('first_name', false, LIVETIME);
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
        $title = 'S’inscrire en quelques clics';
        $view = 'create.php';
        return [
            // 'data' => $this->create,
            'view' => $view,
            'title' => $title
        ];
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION);
        setcookie('first_name', false, time() - (3600));
        setcookie('last_name', false, time() - (3600));
        setcookie('photo', false, time() - (3600));
        setcookie('role', false, time() - (3600));
        header('Location:http://localhost:8888/bibliotheque/index.php');
    }
}