<?php
class Router
{
    protected $routes = [];

    public function registerRoutes($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    /**
     * Add GET route
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function get($uri, $controller)
    {
        $this->registerRoutes('GET', $uri, $controller);
    }

    /**
     * Add POST route
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function post($uri, $controller)
    {
        $this->registerRoutes('POST', $uri, $controller);
    }

    /**
     * Add PUT route
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function put($uri, $controller)
    {
        $this->registerRoutes('PUT', $uri, $controller);
    }


    /**
     * Add DELETE route
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function delete($uri, $controller)
    {
        $this->registerRoutes('DELETE', $uri, $controller);
    }

    /**
     * Add load error page
     * 
     * @param int $httpCode
     * 
     * @return void
     */

    public function error($httpCode = 404)
    {

        // If no route is found, return 404
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }

    /**
     * Route the request to the appropriate controller
     * 
     * @param string $uri
     * @param string $method
     * @return void
     */

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require basePath($route['controller']);
                return;
            }
        }
        $this->error();
    }
}
