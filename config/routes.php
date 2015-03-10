<?php
/*
 * Déclaration des routes permises
 */


$routes['default'] = 'page/home';
$routes['bookindex'] = 'book/index';
$routes['bookshow'] = 'book/show';
$routes['bookedit'] = 'book/edit';
$routes['bookupdate'] = 'book/update';
$routes['editorindex'] = 'editor/index';
$routes['editorshow'] = 'editor/show';
$routes['authorindex'] = 'author/index';
$routes['authorshow'] = 'author/show';
$routes['not_found'] = 'error/e_404';
$routes['db_error'] = 'error/e_database';
$routes['userlogin'] = 'user/login';
$routes['userlogout'] = 'user/logout';
$routes['usercreate'] = 'user/create';