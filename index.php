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

spl_autoload_register(
    function ($class) {
        include $class . '.php';
    }
);
// On démarre une session
session_start();

$request = new Request();

//Par défaut, l’utilisateur n’est pas identifié, sauf s’il l’est.
$_SESSION['session_valid'] = isset($_SESSION['session_valid']) ? $_SESSION['session_valid'] : false;
$_COOKIE['session_valid'] = isset($_COOKIE['session_valid']) ? $_COOKIE['session_valid'] : false;
/*
* Après a’être connecté, je regarde ma requête HTTP pour savoir ce que veut l’utilisateur
* Par convention, je décide qu’une URI doit toujours contenir une action et un modèle
* Je nomme 'm' le paramètre de l’action, 'a', le paramètre du modèle
* Par exemple, pour lister les livres, m=index&a=book
* Mon but est de tenter de transformer ces deux paramètres en variables $m et $a
* mais pour le faire, je dois a’assurer que ces paramètres existent bien et qu’ils sont
* permis.
* Je définis tout d’abord $m et $a sur les valeurs prévues dans la route par défaut, peu importe
* ce qui est demandé.
*/


/*
* Une fois que m et a sont déterminées, je sais quel contrôleur et quelle méthode
* je dois utiliser. Je crée donc le nom du controlleur (la convention est de concaténer
* le contenu de a avec une majuscule pour commencer avec le mot Controller. Toutes les
* classes de controlleur sont nommées ainsi).
*/

$controllerName = ucfirst($request->m) . 'Controller';


$controller = new $controllerName($request);

/*
* On appelle la méthode dont le nom est contenu dans $m et celle-ci doit
* nécessairement retourner un array (qu’on stocke dans $data) contenant :
* - un array de données (clé 'data')
* - un nom de vue à inclure dans le layout ('clé view')
*/
$data = call_user_func([$controller, $request->a]);
// Finalement, on inclut le layout…

include(VIEW_DIR . 'layout.php');
