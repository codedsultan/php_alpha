<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form inputs
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email addres';
}

if (!Validator::string($password, 7, 25)) {
    $errors['password'] = 'Please provide a  password of at least 7 chars.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
            'errors' => $errors
        ]
    );
}


// Check if the user exists

$db = App::resolve(Database::class);
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();


// If yes, redirect to login page
if ($user) {

    //then someone with that email exxists and has accout
    //if Yes redirect to log in
    header('Location: /');
    exit;

} else {

    // If not, then create , log and redirect
    $db->query('INSERT INTO users(email,password) VALUES (:email,:password) ', [
        'email' => $email,
        'password' => password_hash($password,PASSWORD_BCRYPT)
    ]);

    login($user);

    header('Location: /');
    exit;
}


