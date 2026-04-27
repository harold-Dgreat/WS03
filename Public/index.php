<?php

require __DIR__ . '/../helpers.php';

require basePath('Router.php');

$router = new Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$base = '/WS03/Public';

if (str_starts_with($uri, $base)) {
    $uri = substr($uri, strlen($base));
}

$uri = $uri === '' ? '/' : $uri;

$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
