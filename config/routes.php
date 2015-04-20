<?php
/*
 * Déclaration des routes publiques
 */
$routes['default'] = 'page/accueil';
$routes['bookindex'] = 'book/index';
$routes['bookview'] = 'book/view';
$routes['book/find'] = 'book/find';
$routes['bookcreate'] = 'book/create';
$routes['bookupdate'] = 'book/update';
$routes['bookliste'] = 'book/liste';
$routes['bookliste'] = 'book/allBooksFromYear';
$routes['editorindex'] = 'editor/index';
$routes['editorview'] = 'editor/view';
$routes['authorindex'] = 'author/index';
$routes['authorview'] = 'author/view';
$routes['libraryindex'] = 'library/index';
$routes['genreview'] = 'genre/view';
$routes['genreindex'] = 'genre/index';
$routes['yearsindex'] = 'year/index';
$routes['libraryview'] = 'library/view';
$routes['not_found'] = 'error/error ';
$routes['db_error'] = 'error/e_database';
$routes['userlogin'] = 'user/login';
$routes['userlogout'] = 'user/logout';
$routes['usercreate'] = 'user/create';
$routes['useradmin'] = 'user/admin';
$routes['pagehelp'] = 'page/help';
$routes['pageabout'] = 'page/about';
$routes['pagesearch'] = 'page/search';

/*
 * Routes pour l'administration
 * */

$routes['bookadmin_indext'] = 'book/admin_index';
$routes['bookadmin_edit_book'] = 'book/admin_edit_book';
$routes['bookadmin_delete_book'] = 'book/admin_delete_book';
$routes['bookadmin_show_book'] = 'book/admin_show_book';
$routes['bookadmin_create_book'] = 'book/admin_create_book';


$routes['authoradmin_index'] = 'author/admin_index_author';
$routes['authoradmin_edit_author'] = 'author/admin_edit_author';
$routes['authoradmin_delete_author'] = 'author/admin_delete_author';
$routes['authoradmin_show_author'] = 'author/admin_show_author';
$routes['authoradmin_create_author'] = 'author/admin_create_author';

$routes['editoradmin_index'] = 'editor/admin_index_editor';
$routes['editoradmin_edit_editor'] = 'editor/admin_edit_editor';
$routes['editoradmin_delete_editor'] = 'editor/admin_delete_editor';
$routes['editoradmin_show_editor'] = 'editor/admin_show_editor';
$routes['editoradmin_create_editor'] = 'editor/admin_create_editor';

$routes['genreadmin_index'] = 'genre/admin_index_genre';
$routes['genreadmin_edit_genre'] = 'genre/admin_edit_genre';
$routes['genreadmin_delete_genre'] = 'genre/admin_delete_genre';
$routes['genreadmin_show_genre'] = 'genre/admin_show_genre';
$routes['genreadmin_create_genre'] = 'genre/admin_create_genre';