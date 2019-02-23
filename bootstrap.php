<?php
use Tecks\Framework\Exceptions\HttpException;
use Tecks\Framework\Response;

require __DIR__.'/vendor/autoload.php';

$router = new Tecks\Framework\Router;

require __DIR__ . '/config/containers.php';
require __DIR__ . '/config/routes.php';

try {
    $result = $router->run();

    $response = new Response;
    $response($result['action'], $result['params']);

} catch (HttpException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
