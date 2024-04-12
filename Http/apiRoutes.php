<?php

use Illuminate\Routing\Router;

Route::prefix('icommerceordertotal')->group(function (Router $router) {
    
    $router->get('/', [
        'as' => 'icommerceordertotal.api.ordertotal.init',
        'uses' => 'IcommerceOrdertotalApiController@init',
    ]);

   

});