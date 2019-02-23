<?php

$router->add('GET', '/', function () use ($container) {
    $db = $container['db'];
    var_dump($db);
    return 'estamos na homepage';
});

$router->add('GET', '/projects/(\d+)', function ($params) {
    return 'estamos listando o projeto de id: ' . $params[1];
});
