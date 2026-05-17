<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use App\Controllers\ErrorController;
use Framework\Session;
use Framework\Authorization;

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
        $listings = $this->db->query('SELECT * FROM listings ORDER BY created_at DESC')->fetchAll();

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
    /**
     * Store data in database
     * 
     * return void
     */
    public function store()
    {

        $allowedFields = [
            'title',
            'description',
            'salary',
            'tags',
            'company',
            'address',
            'city',
            'state',
            'phone',
            'email',
            'requirements',
            'benefits'
        ];

        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));

        $newListingData['user_id'] = Session::get('user')['id'];

        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['title', 'description', 'salary', 'email', 'city', 'state'];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newListingData[$field]) || !Validation::string($newListingData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required ';
            }
        }
        if (!empty($errors)) {
            // If there are validation errors, reload the form with error messages and old input
            loadView('listings/create', [
                'errors' => $errors,
                'listing' => $newListingData
            ]);
        } else {
            //Submit the data to the database
            // $this->db->query(
            //     'INSERT INTO listings (title, description, salary, tags, company, address, 
            // city, state, phone, email, requirements, benefits, user_id) VALUES (:title, :description, 
            // :salary, :tags, :company, :address, :city, :state, :phone, :email, :requirements, :benefits, :user_id)',
            //     $newListingData
            // );

            $fields = [];

            foreach ($newListingData as $field => $value) {
                $fields[] = $field;
            }
            $fields = implode(', ', $fields);

            $values = [];

            foreach ($newListingData as $field => $value) {
                //Convert empty strings to null
                if ($value === '') {
                    $newListingData[$field] = null;
                }
                $values[] = ':' . $field;
            }
            $values = implode(', ', $values);

            $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";

            $this->db->query($query, $newListingData);

            Session::setFlashMessage('success_message', 'Listing created successfully');

            redirect('/WS03/Public/listings');
        }
    }

    /**
     * Delete listing 
     * 
     * @param array $params
     * return void
     */

    public function destroy($params)

    {
        $id = $params['id'];

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        //Check if listing exists
        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        // Authorize user to delete listing
        if (!Authorization::isOwner($listing->user_id)) {
            Session::setFlashMessage('error_message', 'You are not 
            uthorized to delete this listing');
            redirect('/WS03/Public/listings/' . $listing->id);
            exit;
        }

        $this->db->query('DELETE FROM listings WHERE id = :id', $params);

        //Set a flash message to indicate successful deletion
        Session::setFlashMessage('success_message', 'Listing deleted successfully');

        redirect('/WS03/Public/listings');
    }
    public function edit($params)
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

        // Authorize user to delete listing
        if (!Authorization::isOwner($listing->user_id)) {
            Session::setFlashMessage('error_message', 'You are not 
            uthorized to update this listing');
            redirect('/WS03/Public/listings/' . $listing->id);
            exit;
        }


        loadView('listings/edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update listing data in database
     * 
     * @param array $params
     * return variant
     */

    public function update($params)
    {
        $id = $params['id'] ?? null;
        if (!$id) {
            ErrorController::notFound();
            return;
        }

        $config = require basePath('Config/db.php');
        $db = new \Framework\Database($config);

        // Fetch listing as object
        $listing = $db->query('SELECT * FROM listings WHERE id = :id', ['id' => $id])->fetch(\PDO::FETCH_OBJ);

        if (!$listing) {
            ErrorController::notFound();
            return;
        }

        // Authorization check (only owner can edit)
        if (Session::get('user')['id'] !== $listing->user_id) {
            $_SESSION['error_message'] = 'You are not authorized to edit this listing';
            redirect('/WS03/Public/listings/' . $listing->id);
            exit;
        }

        $allowedFields = [
            'title',
            'description',
            'salary',
            'tags',
            'company',
            'address',
            'city',
            'state',
            'phone',
            'email',
            'requirements',
            'benefits'
        ];

        $updateValues = array_intersect_key($_POST, array_flip($allowedFields));
        $updateValues = array_map('sanitize', $updateValues);

        // Required fields
        $requiredFields = ['title', 'description', 'salary', 'email', 'city', 'state'];
        $errors = [];
        foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !\Framework\Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            loadView('listings/edit', [
                'listing' => $listing,
                'errors' => $errors
            ]);
            exit;
        }

        // Build query
        $fields = [];
        foreach (array_keys($updateValues) as $field) {
            $fields[] = "{$field} = :{$field}";
        }
        $updateQuery = "UPDATE listings SET " . implode(', ', $fields) . " WHERE id = :id";

        $updateValues['id'] = $id;
        $db->query($updateQuery, $updateValues);

        // Success message
        $_SESSION['success_message'] = 'Listing updated successfully';

        redirect('/WS03/Public/listings/' . $id);
        exit;
    }

    /** 
     * Search listings by keyword/location
     * 
     * @return void 
     */

    public function search()
    {
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
        $location = isset($_GET['location']) ? trim($_GET['location']) : '';

        $query = "SELECT * FROM listings WHERE (title LIKE :keywords OR description LIKE
        :keywords OR tags LIKE :keywords OR company LIKE :keywords) AND (city LIKE :location 
        OR state LIKE :location)";

        $params = [
            'keywords' => "%{$keywords}%",
            'location' => "%{$location}%"
        ];

        $listings = $this->db->query($query, $params)->fetchAll();

      loadView('/listings/index',[
        'listings' => $listings,
        'keywords' => $keywords,
        'location' => $location
      ]);
    }
}
