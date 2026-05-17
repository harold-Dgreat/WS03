<?php
namespace Framework\Middleware;

use Framework\Session;

class Authorize
{
    /**
     * Check if user is authenticated
     */
    public static function isAuthenticated()
    {
        return Session::has('user');
    }

    /**
     * Handle the user's request
     */
    public function handle($role)
    {
        // Logged-in user trying to access guest page
        if ($role === 'guest' && self::isAuthenticated()) {
            redirect('/WS03/Public');
            exit; // stop further execution
        }

        // Guest trying to access protected page
        if ($role === 'auth' && !self::isAuthenticated()) {
            redirect('/WS03/Public/auth/login');
            exit; // stop further execution
        }
    }
}