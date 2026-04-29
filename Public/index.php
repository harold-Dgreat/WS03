<?php

require '../helpers.php';

require basePath('Router.php');
require basePath('Database.php');

$config = require basePath('Config/db.php');

$db = new Database($config);

$router = new Router();

$routes = require basePath('routes.php');

/*
|--------------------------------------------------------------------------
| Get clean URI
|--------------------------------------------------------------------------
| Example:
| Full URL path: /WS03/Public/listings
| Router needs:  /listings
|--------------------------------------------------------------------------
*/

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = dirname($_SERVER['SCRIPT_NAME']);

if ($basePath !== '/' && str_starts_with($uri, $basePath)) {
    $uri = substr($uri, strlen($basePath));
}

$uri = $uri === '' ? '/' : $uri;

$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);