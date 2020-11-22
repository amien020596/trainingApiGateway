<?php

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

// $router->get('/', function () use ($router) {
//     return "test ok";
// });
$router->group(['prefix' => 'authors'], function () use ($router) {

    $router->get('/', 'AuthorController@index');
    $router->post('/', 'AuthorController@store');
    $router->get('/{author}', 'AuthorController@show');
    $router->put('/{author}', 'AuthorController@update');
    $router->patch('/{author}', 'AuthorController@update');
    $router->delete('/{author}', 'AuthorController@destroy');
});

$router->group(['namespace' => '\Rap2hpoutre\LaravelLogViewer'], function () use ($router) {
    $router->get('logs', 'LogViewerController@index');
});
