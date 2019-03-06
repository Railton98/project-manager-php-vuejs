<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function show($container, $request)
    {
        $user = new User($container);
        $user->create(['name' => 'Tecks']);
        return $data = $user->get($request->attributes->get(1));
    }
}
