<?php

declare(strict_types=1);

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'Admin',
        'as' => 'admins',
    ],
    function () use ($router) {
        $router->group(
            [
                'prefix' => 'admins',
            ],
            function () use ($router) {

                // resources
                $router->get(
                    '/',
                    [
                        'as' => 'index',
                        'uses' => 'AdminController@index',
                    ]
                );
            }
        );
    }
);
