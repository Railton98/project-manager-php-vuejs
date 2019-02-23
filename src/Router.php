<?php

namespace Tecks\Framework;

/**
 *
 */
class Router
{
	private $routes = [];

    public function add(String $method, String $pattern, $callback)
    {
        $method = strtolower($method);
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$method][$pattern] = $callback;
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
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if (empty($this->routes[$method])) {
            return 'Página não encontrada!';
        }

        foreach ($this->routes[$method] as $route => $action) {
            if (preg_match($route, $url, $params)) {
                return $action($params);
            }
        }
        return 'Página não encontrada!';
    }
}
