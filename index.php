<?php
include('config/config.php');
include(CONFIG_DIR . 'routes.php');
include(CONFIG_DIR . 'database.php');
setlocale(LC_ALL, $language);
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Définition du chemin d’inclusion pour y ajouter le dossier des classes controleurs et modèles
set_include_path(
    get_include_path() .
    PATH_SEPARATOR . dirname(__FILE__) . DIRECTORY_SEPARATOR . CONTROLLERS_DIR .
    PATH_SEPARATOR . dirname(__FILE__) . DIRECTORY_SEPARATOR . MODELS_DIR .
    PATH_SEPARATOR . dirname(__FILE__) . DIRECTORY_SEPARATOR . HELPERS_DIR .
    PATH_SEPARATOR . dirname(__FILE__) . DIRECTORY_SEPARATOR . CARBON_DIR
);
// Mise en place de l’auto-chargement des classes

require './vendor/autoload.php';
// On démarre une session
session_start();
$container = new Illuminate\Container\Container();
foreach (include('liaisons.php') as $interface => $concrete) {
    $container->bind($interface, $concrete);
}
$request = new \Controllers\Request();
$html = new \Helpers\Html();
$date = new \Carbon\Carbon();
//Par défaut, l’utilisateur n’est pas identifié, sauf s’il l’est.

$controllerName = '\Controllers\\' . ucfirst($request->m);

$controller = $container->make($controllerName);
/*
* On appelle la méthode dont le nom est contenu dans $m et celle-ci doit
* nécessairement retourner un array (qu’on stocke dans $data) contenant :
* - un array de données (clé 'data')
* - un nom de vue à inclure dans le layout ('clé view')
*/
$data = call_user_func([$controller, $request->a]);
include(VIEW_DIR . 'layout.php');
