<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function show($container, $params)
    {
        $user = new User($container);
        $data = $user->get($params[1]);

        return 'Meu nome é: ' . $data['name'];
    }
}
