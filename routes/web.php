<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->get('/', 'ClienteController@index');
$router->get('/{id}', 'ClienteController@show');
$router->post('/', 'ClienteController@save');
$router->put('/{id}', 'ClienteController@update');
$router->delete('/{id}', 'ClienteController@destroy');
