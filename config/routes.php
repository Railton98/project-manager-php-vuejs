<?php

use App\Models\User;

$router->add('GET', '/', function () {
    return 'estamos na homepage';
});

$router->add('GET', '/users/(\d+)', function ($params) use ($container) {
    $user = new User($container);
    $data = $user->get($params[1]);

    if ($data) {
        return 'Meu nome é: ' . $data['name'];
    }
    return 'Usuário não encontrado!';
});
