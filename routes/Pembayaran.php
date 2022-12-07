<?php

$router->group(
    [
        'as' => 'pembayaran',
    ],
    function () use ($router) {
        $router->post('/pembayaran', ['middleware' => ['auth'], 'uses'=> 'PembayaranController@create',]);
        $router->get('/pembayaran', ['uses' => 'PembayaranController@find',]);
        $router->get('/pembayaran/{id}', ['middleware' => ['auth'], 'uses' => 'PembayaranController@findById',]);
        $router->put('/pembayaran/{id}', ['middleware' => ['auth'], 'uses'=> 'PembayaranController@update',]);
    }
);