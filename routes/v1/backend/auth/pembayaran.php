<?php

declare(strict_types=1);

/** @var Laravel\Lumen\Routing\Router $router */

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
                // resources
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
                        'uses' => 'UserController@show',
                    ]
                );
                $router->put(
                    '/{id}',
                    [
                        'as' => 'update',
                        'uses' => 'UserController@update',
                    ]
                );
                $router->delete(
                    '/{id}',
                    [
                        'as' => 'destroy',
                        'uses' => 'UserController@destroy',
                    ]
                );
            }
        );
    }
);
