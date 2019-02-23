<?php
use Tecks\Framework\Exceptions\HttpException;

require __DIR__.'/vendor/autoload.php';

$router = new Tecks\Framework\Router;

$router->add('GET', '/', function () {
    return 'estamos na homepage';
});

$router->add('GET', '/projects/(\d+)', function ($params) {
    return 'estamos listando o projeto de id: ' . $params[1];
});

try {
    echo $router->run();
} catch (HttpException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
