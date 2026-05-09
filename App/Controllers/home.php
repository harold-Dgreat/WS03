<?php

use Framework\Database;

$config = require basePath('Config/db.php');

$db = new Database($config);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

loadView('home', [
    'listings' => $listings
]);