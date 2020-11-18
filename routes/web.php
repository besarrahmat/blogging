<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\BlogController;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    return Str::random(32);
});

$router->post(
    'auth/register',
    [
        'uses' => 'BlogController@register'
    ]
);

$router->post(
    'auth/login',
    [
        'uses' => 'BlogController@authenticate'
    ]
);

$router->get('/blog', 'BlogController@index');

$router->get('/blog/{id}', 'BlogController@getBlog');

$router->post('/blog', 'BlogController@postBlog');

$router->put('/blog/{id}', 'BlogController@putBlog');

$router->delete('/blog/{id}', 'BlogController@deleteBlog');

// $router->group(['middleware' => 'jwt.auth'], function() use ($router){
//     $router->get('user/{id}', '');
//     $router->put('user/{id}', '');
//     $router->delete('user/{id}','');
//     $router->get('/blog', 'BlogController@index');
//     $router->get('/blog/{id}', 'BlogController@getBlog');
//     $router->post('/blog', 'BlogController@postBlog');
//     $router->put('/blog/{id}', 'BlogController@putBlog');
//     $router->delete('/blog/{id}', 'BlogController@deleteBlog');
   
// });