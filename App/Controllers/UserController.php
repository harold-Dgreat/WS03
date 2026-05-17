<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class UserController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('Config/db.php');

        $this->db = new Database($config);
    }

    /**
     * Show login page
     */
    public function login()
    {
        \loadView('users/login');
    }

    /**
     * Show registration page
     */
    public function create()
    {
        \loadView('users/create');
    }

    /**
     * Store user data in database
     */
    public function store()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $city = $_POST['city'] ?? '';
        $state = $_POST['state'] ?? '';
        $password = $_POST['password'] ?? '';
        $password_confirmation = $_POST['password_confirmation'] ?? '';

        $errors = [];
        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address';
        }

        if (!Validation::string($name, 2, 50)) {
            $errors['name'] = 'Name must be at least 2 and at most 50 characters long';
        }

        if (!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be at least 6 and at most 50 characters long';
        }

        if (!Validation::match($password, $password_confirmation)) {
            $errors['password_confirmation'] = 'Passwords do not match';
        }

        if (!empty($errors)) {
            \loadView('users/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state
                ]
            ]);
            exit;
        }

        // Check if email already exists
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if ($user) {
            $errors['email'] = 'Email already exists';
            \loadView('users/create', [
                'errors' => $errors
            ]);
            exit;
        }

        // Create user account
        $params = [
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->db->query('INSERT INTO users (name, email, city, state, password) 
        VALUES (:name, :email, :city, :state, :password)', $params);

        // Get user id
        $userid = $this->db->conn->lastInsertId();

        // Set user session
        Session::set('user', [
            'id' => $userid,
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state
        ]);

        // Redirect to login after registration
        \redirect('/WS03/Public/auth/login');
        exit;
    }

    /**
     * Logout a user and destroy session
     */
    public function logout()
    {
        Session::clearAll('user');
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
        \redirect('/WS03/Public/');
        exit;
    }

    /**
     * Authenticate user with email and password
     */
    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $errors = [];

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address';
        }

        if (!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be at least 6 characters long';
        }

        if (!empty($errors)) {
            \loadView('users/login', [
                'errors' => $errors,
                'user' => [
                    'email' => $email
                ]
            ]);
            exit;
        }

        // Check if user exists
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if (!$user) {
            $errors['email'] = 'Incorrect credentials';
            \loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Verify password
        if (!password_verify($password, $user->password)) {
            $errors['email'] = 'Incorrect credentials';
            \loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Set session
        Session::set('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'city' => $user->city,
            'state' => $user->state
        ]);

        // Redirect after successful login
        \redirect('/WS03/Public/');
        exit;
    }
}
