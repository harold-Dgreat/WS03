<?php

use App\Controllers\ListingController;

$router->get('/WS03/Public/', 'HomeController@index');

$router->get('/WS03/Public/listings', 'ListingController@index');
$router->get('/WS03/Public/listings/create', 'ListingController@create', ['auth']);
$router->get('/WS03/Public/listings/edit/{id}', 'ListingController@edit', ['auth']);
$router->get('/WS03/Public/listings/search', 'ListingController@search');
$router->get('/WS03/Public/listings/{id}', 'ListingController@show');

$router->post('/WS03/Public/listings', 'ListingController@store', ['auth']);
$router->put('/WS03/Public/listings/{id}', 'ListingController@update', ['auth']);
$router->delete('/WS03/Public/listings/{id}', 'ListingController@destroy', ['auth']);

$router->get('/WS03/Public/auth/register', 'UserController@create', ['guest']);
$router->get('/WS03/Public/auth/login', 'UserController@login', ['guest']);

$router->post('/WS03/Public/auth/register', 'UserController@store', ['guest']);
$router->post('/WS03/Public/auth/logout', 'UserController@logout', ['auth']);
$router->post('/WS03/Public/auth/login', 'UserController@authenticate', ['guest']);
