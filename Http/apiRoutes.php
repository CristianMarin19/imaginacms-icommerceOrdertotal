<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'icommerceordertotal'], function (Router $router) {
    
    $router->get('/', [
        'as' => 'icommerceordertotal.api.ordertotal.init',
        'uses' => 'IcommerceOrdertotalApiController@init',
    ]);

   

});