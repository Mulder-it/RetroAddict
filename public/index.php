<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';
//Constante
// Amène au dossier des vues
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
//Amène au dossier public
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'retroaddictdb');
define('DB_HOST', '127.0.0.1:3308');
define('DB_USER', 'root');
define('DB_PWD', '');


//Récupération de l'url
$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/tags/:id', 'App\Controllers\BlogController@tag');

$router->get('/login', '\App\Controllers\UserController@login');
$router->post('/login', '\App\Controllers\UserController@loginPost');
$router->get('/logout', '\App\Controllers\UserController@logout');
$router->get('/register', '\App\Controllers\UserController@register');
$router->post('/register', '\App\Controllers\UserController@registeruser');

$router->get('/users', '\App\Controllers\UserController@index');
$router->get('/users/editUser/:id', '\App\Controllers\UserController@editUser' );
$router->post('/users/editUser/:id', '\App\Controllers\UserController@updateUser' );
$router->post('/users/deleteUser/:id', '\App\Controllers\UserController@deleteUser');
$router->get('/users/profil/:id', '\App\Controllers\UserController@editProfil' );
$router->post('/users/profil/:id', '\App\Controllers\UserController@updateUser' );


$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');
$router->get('/admin/posts', 'App\Controllers\Admin\PostController@indexuser');
$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');
$router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');


try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}