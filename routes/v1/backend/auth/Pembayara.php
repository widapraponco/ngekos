<?php

declare(strict_types=1);

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(
    [
        'namespace' => 'Pembayaran',
        'prefix' => 'pembayaran',
    ],
    function () use ($router) {
        include 'pembayaran.php';
    }
);
