<?php

declare(strict_types=1);

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'Authorization',
        'as' => 'authorizations',
        'prefix' => 'authorizations',
    ],
    function () use ($router) {
        $router->group(
            [
                'prefix' => 'pembayaran',
            ],
            function () use ($router) {
                // resources
                $router->post(
                    '/pembayaran/add-pembayaran',
                    [
                        'as' => 'store',
                        'uses' => 'PembayaranController@store',
                    ]
                );
                // $router->get(
                //     '/{id}',
                //     [
                //         'as' => 'show',
                //         'uses' => 'PembayaranController@show',
                //     ]
                // );
                // $router->put(
                //     '/{id}',
                //     [
                //         'as' => 'update',
                //         'uses' => 'PembayaranController@update',
                //     ]
                // );
                $router->delete(
                    '/pembayaran/destroy{id}',
                    [
                        'as' => 'destroy',
                        'uses' => 'PembayaranController@destroy',
                    ]
                );
            }
        );
    }
);
