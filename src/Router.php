<?php

namespace Tecks\Framework;

/**
 *
 */
class Router
{
	private $routes = [];

    public function add(String $pattern, $callback)
    {
        $this->routes[$pattern] = $callback;
    }

    public function run()
    {
        $route = $_SERVER['PATH_INFO'] ?? '/';

        if (array_key_exists($route, $this->routes)) {
            return $this->routes[$route]();
        }
        return 'Página não encontrada!';
    }
}
