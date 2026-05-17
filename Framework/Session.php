<?php

namespace Framework;

class Session
{
    /**
     * Start a session
     * 
     * @return void
     */
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            \session_start();
        }
    }
    /**
     * Set a session key-value pair
     * 
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
    /**
     * Get a session value by key
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed $value
     */
    public static function get(string $key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }
    /**
     * Ccheck if session key exists
     * 
     * @param string $key
     * @return bool
     */

    public static function has(string $key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Clear a session by key
     * 
     * @param string $key
     * @return void
     */
    public static function clear(string $key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    /**
     * Clear all session data
     * 
     * @return void
     */
    public static function clearAll(){
        session_unset();
        session_destroy();
    }
    /**
     * Set a flash message that will be available for the next request and then cleared
     * @param string $key
     * @param string $message
     * @return void
     */

    public static function setFlashMessage($key, $message)
    {
        self::set('flash_' . $key, $message);
    }
    /**
     * Get a flash message and unset it from the session
     * @param string $key
     * @return mixed $default
     * @return void
     */
    public static function getFlashMessage($key, $default = null){
        $message = self::get('flash_' . $key, $default);
        self::clear('flash_' . $key);
        return $message;
    }

}
