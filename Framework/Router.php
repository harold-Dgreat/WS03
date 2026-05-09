<?php

namespace Framework;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        $this->routes[] = [
            'method' => 'GET',
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function post($uri, $controller)
    {
        $this->routes[] = [
            'method' => 'POST',
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            $routePattern = preg_replace('/\{[a-zA-Z_]+\}/', '([^/]+)', $route['uri']);
            $routePattern = '#^' . $routePattern . '$#';

            if (
                preg_match($routePattern, $uri) &&
                $route['method'] === $method
            ) {
                $controllerPath = basePath($route['controller']);

                if (file_exists($controllerPath)) {
                    require $controllerPath;
                    return;
                }
            }
        }

        http_response_code(404);
        require basePath('App/Controllers/error/404.php');
    }
}