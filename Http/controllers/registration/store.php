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

if (! Validator::string($password, 7, 255)) {
    $errors['email'] = 'Please provide a password of at least seven characters.';
}

if (count($errors)) {
    return view('registration/create', [
        'heading'=> 'Register',
        'errors'=> $errors,
     ]);
}

$db = App::resolve(Database::class);

$is_email_exists = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->find();

if ($is_email_exists) {
    $errors['email'] = 'Email address already in use.';

    return view('registration/create', [
        'heading'=> 'Register',
        'errors'=> $errors,
     ]);
}

$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email'=> $email,
    'password'=> password_hash($password, PASSWORD_BCRYPT)
]);

login([
    'email' => $email
]);

header('location: /');
exit();