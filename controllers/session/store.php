<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password.';
}

if (count($errors)) {
    return view('session/create', [
        'heading'=> 'Log in',
        'errors'=> $errors,
     ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->find();

if (! $user || ! password_verify($password, $user['password'])) {
    $errors['email_or_password'] = 'No matching account found for the email address and password.';

    return view('session/create', [
        'heading'=> 'Log in',
        'errors'=> $errors,
     ]);
}

login($user);