<?php

use Framework\Database;
$config = require basePath('Config/db.php');
$db = new Database($config);

$id = $_GET['id'] ?? '';
$params =
[
    'id' => $id
];

$listing = $db->Query('SELECT * FROM listings WHERE id = :id', $params)->fetch();



loadView('listings/show',
    [
        'listing' => $listing
    ]
);
