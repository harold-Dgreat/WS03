<?php

namespace App\Controllers;

use Framework\Database;
use App\Controllers\ErrorController;

class ListingController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('Config/db.php');

        $this->db = new Database($config);
    }

    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();

        loadView('listings/index', [
            'listings' => $listings
        ]);
    }
    public function create()
    {
        loadView('listings/create');
    }

    public function show($params)
    {
        $id = $params['id'] ?? null;

        if (!$id) {
            ErrorController::notFound();
            return;
        }

        $config = require basePath('Config/db.php');
        $db = new \Framework\Database($config);

        $listing = $db->query('SELECT * FROM listings WHERE id = :id', [
            'id' => $id
        ])->fetch();

        if (!$listing) {
            ErrorController::notFound();
            return;
        }

        loadView('listings/show', [
            'listing' => $listing
        ]);
    }
}
