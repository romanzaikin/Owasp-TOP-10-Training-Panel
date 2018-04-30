<?php


class Session {
    /**
     * Constructor.
     */
    public function __construct() {
        session_start();
    }

    /**
     * Destructor.
     */
    public function __destruct() {
        unset($this);
    }

    /**
     * Register the session.
     *
     * @param integer $time.
     */
    public function register() {
        $_SESSION['session_id'] = session_id();
    }

    /**
     * Checks to see if the session is registered.
     *
     * @return  True if it is, False if not.
     */
    public function isRegistered() {
        if (! empty($_SESSION['session_id'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set key/value in session.
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Retrieve value stored in session by key.
     *
     * @var mixed
     */
    public function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    /**
     * Retrieve the global session variable.
     *
     * @return array
     */
    public function getSession() {
        return $_SESSION;
    }

    /**
     * Gets the id for the current session.
     *
     * @return integer - session id
     */
    public function getSessionId() {
        return $_SESSION['session_id'];
    }

    /**
     * Destroys the session.
     */
    public function end() {
        session_destroy();
        $_SESSION = array();
    }
}
