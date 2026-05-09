<?php

$router->get('/WS03/Public/', 'App/Controllers/home.php');

$router->get('/WS03/Public/listings', 'App/Controllers/listings/index.php');
$router->get('/WS03/Public/listings/create', 'App/Controllers/listings/create.php');
$router->get('/WS03/Public/listing/{id}', 'App/Controllers/listings/show.php');

$router->get('/WS03/Public/403', 'App/Controllers/error/403.php');
$router->get('/WS03/Public/404', 'App/Controllers/error/404.php');