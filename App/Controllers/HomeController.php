<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{
    public function index()
    {
        $config = require basePath('Config/db.php');

        $db = new Database($config);

        $listings = $db->query('SELECT * FROM listings ORDER BY created_at DESC LIMIT 6')->fetchAll();

        loadView('home', [
            'listings' => $listings
        ]);
    }
}