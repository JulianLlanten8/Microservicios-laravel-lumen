<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('cartera',  'CarteraController@ObtenerTodo');
$router->get('cartera/{id}', ['uses' => 'CarteraController@ObtenerUno']);
$router->post('cartera', ['uses' => 'CarteraController@Crear']);
$router->put('cartera/{id}', ['uses' => 'CarteraController@actualizar']);
$router->delete('cartera/{id}', ['uses' => 'CarteraController@Deshabilitar']);
