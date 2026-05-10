<?php

$router->get('/WS03/Public/', 'HomeController@index');

$router->get('/WS03/Public/listings', 'ListingController@index');
$router->get('/WS03/Public/listings/create', 'ListingController@create');
$router->get('/WS03/Public/listing/{id}', 'ListingController@show');