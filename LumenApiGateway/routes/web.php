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
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['namespace' => '\Rap2hpoutre\LaravelLogViewer'], function () use ($router) {
    $router->get('logs', 'LogViewerController@index');
});
/**
 * router from books
 */
$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    $router->group(['prefix' => 'books'], function () use ($router) {

        $router->get('/', 'BookController@index');
        $router->post('/', 'BookController@store');
        $router->get('/{book}', 'BookController@show');
        $router->put('/{book}', 'BookController@update');
        $router->patch('/{book}', 'BookController@update');
        $router->delete('/{book}', 'BookController@destroy');
    });

    /**
     * router from authors
     */
    $router->group(['prefix' => 'authors'], function () use ($router) {

        $router->get('/', 'AuthorController@index');
        $router->post('/', 'AuthorController@store');
        $router->get('/{author}', 'AuthorController@show');
        $router->put('/{author}', 'AuthorController@update');
        $router->patch('/{author}', 'AuthorController@update');
        $router->delete('/{author}', 'AuthorController@destroy');
    });

    /**
     * router from users
     */
    $router->group(['prefix' => 'users'], function () use ($router) {

        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
        $router->get('/{User}', 'UserController@show');
        $router->put('/{User}', 'UserController@update');
        $router->patch('/{User}', 'UserController@update');
        $router->delete('/{User}', 'UserController@destroy');
    });
});

$router->group(['middleware' => 'auth:api'], function () use ($router) {

    // $router->group(['prefix' => ''], function () use ($router) {
    $router->get('/me', 'UserController@me');
    $router->get('/test', 'UserController@test');
    // });
});
