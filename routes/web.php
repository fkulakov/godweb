<?php

$router->group([
    'namespace' => 'Times'
], function () use ($router) {
    $router->get('/', 'SiteController@index');
});