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
        // role - user
        $router->post(
            '/add-new-customer',
            [
                'as' => 'add-new-customer',
                'uses' => 'CustomerController@create',
            ]
        );
    }
);
