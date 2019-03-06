<?php
use Tecks\Framework\Exceptions\HttpException;
use Tecks\Framework\Response;

require __DIR__.'/vendor/autoload.php';

$router = new Tecks\Framework\Router;

require __DIR__ . '/config/containers.php';
require __DIR__ . '/config/middlewares.php';
require __DIR__ . '/config/events.php';
require __DIR__ . '/config/routes.php';

try {
    $result = $router->run();

    $response = new Response;
    $params = [
        'container' => $container,
        'params' => $result['params'],
    ];

    foreach ($middlewares['before'] as $middleware) {
        $middleware($container);
    }

    $response($result['action'], $params);

    foreach ($middlewares['after'] as $middleware) {
        $middleware($container);
    }

} catch (HttpException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
