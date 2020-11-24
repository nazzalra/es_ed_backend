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
//     return $router->app->version();
// });

$router->group(['middleware'=>'cors'], function() use ($router){
    $router->get('/gejala','GejalaController@getGejala');
    $router->get('/identifikasi','GejalaController@identifikasi');
    $router->get('/testing',function(){
        return 'hello';
    });
});
