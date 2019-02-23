<?php
use Tecks\Framework\Exceptions\HttpException;

require __DIR__.'/vendor/autoload.php';

$router = new Tecks\Framework\Router;

require __DIR__ . '/config/containers.php';
require __DIR__ . '/config/routes.php';

try {
    echo $router->run();
} catch (HttpException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
