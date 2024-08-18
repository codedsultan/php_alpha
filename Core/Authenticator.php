<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        // Check if the user exists
        $db = App::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ])->find();


        // If yes, redirect to login page
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            }
        }

        return false;

    }

    public function login($user)
    {
        //mark that the user has logged in
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);

    }

    public function logout()
    {
        Session::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

    }
}
