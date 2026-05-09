<?php

use Framework\Database;
// echo "listings index";

$config = require basePath('Config/db.php');
$db = new Database($config);

$listings = $db->Query('SELECT * FROM listings LIMIT 6')->fetchAll();

// inspect($listings);

loadView('listings/index', [
    'listings' => $listings
]);

?>
