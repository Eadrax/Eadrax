<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Eadrax\Core\Tool;

interface Authenticator
{
    /**
     * Checks whether or not the user is currently logged in.
     *
     * Example:
     * $auth = new Authenticator;
     * if ($auth->logged_in() === TRUE) {} // Use is logged in
     *
     * @return bool
     */
    public function logged_in();

    /**
     * Retrieves the currently logged in user in the form of a Data\User.
     *
     * Example:
     * $auth->get_user()->get_username();
     *
     * @return Eadrax\Core\Data\User
     */
    public function get_user();

    /**
     * Logs in the user with the details provided
     *
     * Example:
     * $auth->login('username', 'password');
     * var_dump($auth->logged_in()); // bool(true)
     *
     * @param string $username The username of the user
     * @param string $password The password of the user
     * @return bool Whether or not the login operation succeeded
     */
    public function login($username, $password);

    /**
     * Logs out the currently logged in user.
     *
     * Example:
     * $auth->logout();
     *
     * @return void
     */
    public function logout();
}
