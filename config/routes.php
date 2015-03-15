<?php
/*
 * Déclaration des routes permises
 */


$routes['default'] = 'book/index';
$routes['bookindex'] = 'book/index';
$routes['bookview'] = 'book/view';
$routes['booklist'] = 'book/find';
$routes['bookedit'] = 'book/edit';
$routes['bookupdate'] = 'book/update';
$routes['editorindex'] = 'editor/index';
$routes['editorview'] = 'editor/view';
$routes['authorindex'] = 'author/index';
$routes['authorview'] = 'author/view';
$routes['libraryindex'] = 'library/index';
$routes['genreview'] = 'genre/view';
$routes['genreindex'] = 'genre/index';
$routes['libraryview'] = 'library/view';
$routes['not_found'] = 'error/e_404';
$routes['db_error'] = 'error/e_database';
$routes['userlogin'] = 'user/login';
$routes['userlogout'] = 'user/logout';
$routes['usercreate'] = 'user/create';