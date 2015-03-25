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
namespace Controllers;

use Helpers\validate;
use Models\UserRepositoryInterface as UserRepository;

class User extends Base
{
     function __construct(Request $request, UserRepository $modelUser)
     {
         parent::__construct($request);
         $this->modelUser = $modelUser;
     }

    function login()
    {
        if ($_SESSION['first_name']) {
            header('Location: index.php');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($this->request->sent->username) && isset($this->request->sent->password)) {
                if (($this->modelUser->exists($this->request->sent->username, $this->request->sent->password))) {
                    if (isset($this->request->sent->remember)) {
                        foreach ($this->modelUser->getUserInfo($this->request->sent->username,
                            $this->request->sent->password) as $c => $v) {
                            setcookie($c, $v, LIVETIME);
                        }
                    } else {
                        foreach ($this->modelUser->getUserInfo($this->request->sent->username,
                            $this->request->sent->password) as $c => $v) {
                            $_SESSION[$c] = $v;
                        }
                    }
                    header('Location:http://localhost:8888/bibliotheque');
                } else {
                    $_SESSION['first_name'] = false;
                    setcookie('first_name', false, LIVETIME);
                    die('User not found');
                    header('Location:http://localhost:8888/bibliotheque');
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

        $data = null;
        unset($this->request->errors['question'],$this->request->errors['answer']);
        if( $_SERVER['REQUEST_METHOD'] === "POST" && !filter_var($this->request->sent->email,FILTER_VALIDATE_EMAIL)){
            $this->request->errors['email']='Oups, mail nom valide';
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST"&& empty($this->request->errors)) {
            $this->modelUser->create($this->request->sent);
        }
        else{
            $data['errors']=$this->request->errors;
            $data['sent']=$this->request->sent;
        }
        $view = 'create.php';
        $title = 'formulaire d’inscription';
        return [
            'data' => $data,
            'view' => $view,
            'title'=>$title

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