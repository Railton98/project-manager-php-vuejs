<?php

use App\Models\User;

$router->add('GET', '/', function () {
    return 'estamos na homepage';
});

$router->add('GET', '/users/(\d+)', '\App\Controllers\UserController::show');
