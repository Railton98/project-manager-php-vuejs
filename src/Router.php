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
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$pattern] = $callback;
    }

    public function getCurrentUrl()
    {
        $url = $_SERVER['PATH_INFO'] ?? '/';

        if (strlen($url) > 1) {
            $url = rtrim($url, '/');
        }
        return $url;
    }

    public function run()
    {
        $url = $this->getCurrentUrl();

        foreach ($this->routes as $route => $action) {
            if (preg_match($route, $url, $params)) {
                return $action($params);
            }
        }

        return 'Página não encontrada!';
    }
}
