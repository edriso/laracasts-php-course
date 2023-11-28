<?php

use Core\App;
use Core\Database;
use Core\Validator;

$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($email, 7, 255)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($password, 6)) {
    $errors['password'] = 'Password can not me less than 6 chars required.';
}

$db = App::resolve(Database::class);

$is_email_exists = $db->query('SELECT * FROM users WHERE email = :email LIMIT 1', [
    'email' => $email,
])->find();

if ($is_email_exists) {
    $errors['email'] = 'Email address already in use.';
}

if (count($errors)) {
    return view('registration/create', [
        'heading'=> 'Register',
        'errors'=> $errors,
     ]);
}

$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email'=> $email,
    'password'=> password_hash($password, PASSWORD_BCRYPT)
]);

$_SESSION['user'] = [
    'email' => $email
];

header('location: /');
exit();