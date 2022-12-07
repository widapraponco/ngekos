<?php

$router->group(
    [
        'namespace' => 'Pembayaran',
        'as' => 'pembayaran',
    ],
    function () use ($router) {
        $router->group(
            [
                'prefix' => 'pembayaran',
            ],
            function () use ($router) {
                // deletes
                $router->get(
                    '/deleted',
                    [
                        'as' => 'deleted',
                        'uses' => 'PembayaranDeleteController@deleted',
                    ]
                );
                $router->put(
                    '/{id}/restore',
                    [
                        'as' => 'restore',
                        'uses' => 'PembayaranDeleteController@restore',
                    ]
                );
                $router->delete(
                    '/{id}/purge',
                    [
                        'as' => 'purge',
                        'uses' => 'PembayaranDeleteController@purge',
                    ]
                );

                // resources
                $router->get(
                    '/',
                    [
                        'as' => 'index',
                        'uses' => 'PembayaranController@index',
                    ]
                );
                $router->post(
                    '/',
                    [
                        'as' => 'store',
                        'uses' => 'PembayaranController@store',
                    ]
                );
                $router->get(
                    '/{id}',
                    [
                        'as' => 'show',
                        'uses' => 'PembayaranController@show',
                    ]
                );
                $router->put(
                    '/{id}',
                    [
                        'as' => 'update',
                        'uses' => 'PembayaranController@update',
                    ]
                );
                $router->delete(
                    '/{id}',
                    [
                        'as' => 'destroy',
                        'uses' => 'PembayaranController@destroy',
                    ]
                );
            }
        );
    }
);