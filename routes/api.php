<?php

$router->group([
    'namespace' => 'Times',
    'prefix' => 'api'
], function () use ($router) {
    $router->get('times', 'ApiController@times');
    $router->post('reset', 'ApiController@reset');
});