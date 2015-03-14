<?php
include('config/config.php');
include_once(CONFIG_DIR . 'routes.php');
include_once(CONFIG_DIR . 'database.php');
setlocale(LC_ALL,$language);
// Définition du chemin d’inclusion pour y ajouter le dossier des classes controleurs et modèles
set_include_path(
    get_include_path() .
    ':' . dirname(__FILE__) . ROUTE_DELIMITER . CONTROLLERS_DIR .
    ':' . dirname(__FILE__) . ROUTE_DELIMITER . MODELS_DIR .
    ':' . dirname(__FILE__) . ROUTE_DELIMITER . HELPERS_DIR .
    ':' . dirname(__FILE__) . ROUTE_DELIMITER . CARBON_DIR
);
// Mise en place de l’auto-chargement des classes

require './vendor/autoload.php';
// On démarre une session
session_start();
$request = new \Controllers\Request();
$html= new \Helpers\Html();
$date=new \Carbon\Carbon();
//Par défaut, l’utilisateur n’est pas identifié, sauf s’il l’est.
$_SESSION['first_name'] = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : false;
$_COOKIE['first_name'] = isset($_COOKIE['first_name']) ? $_COOKIE['first_name'] : false;
(isset($_SESSION['first_name']) && $_SESSION['first_name'] == true) || (isset($_COOKIE['first_name']) && $_COOKIE['first_name'] == true) ? $userConnec = true : $userConnec = false;

$controllerName = '\Controllers\\'.ucfirst($request->m);

$controller = new $controllerName($request);

/*
* On appelle la méthode dont le nom est contenu dans $m et celle-ci doit
* nécessairement retourner un array (qu’on stocke dans $data) contenant :
* - un array de données (clé 'data')
* - un nom de vue à inclure dans le layout ('clé view')
*/
$data = call_user_func([$controller, $request->a]);
include(VIEW_DIR . 'layout.php');
