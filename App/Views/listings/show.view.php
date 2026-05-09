<?php

use Framework\Database;

$config = require basePath('Config/db.php');

$db = new Database($config);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$parts = explode('/', trim($uri, '/'));

$id = end($parts);

$listing = $db->query('SELECT * FROM listings WHERE id = :id', [
    'id' => $id
])->fetch();

if (!$listing) {
    http_response_code(404);
    require basePath('App/Controllers/error/404.php');
    exit;
}

loadView('listings/show', [
    'listing' => $listing
]);