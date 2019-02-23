<?php

require __DIR__.'/vendor/autoload.php';

$router = new Tecks\Framework\Router;

$router->add('/', function () {
    return 'estamos na homepage';
});

$router->add('/projects', function () {
    return 'estamos listando projetos';
});

echo $router->run();
