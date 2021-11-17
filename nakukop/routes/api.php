<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'configs'], function (Router $router) {
    $router->get('/', 'ConfigController@index');
    $router->get('/{serviceSlug:[\w]+}', 'ConfigController@show');
    $router->put('/{serviceSlug:[\w]+}/{configSlug:[\w]+}', 'ConfigController@update');
});


