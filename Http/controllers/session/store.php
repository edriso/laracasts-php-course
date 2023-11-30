<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email, $password)) {
    return view('session/create', [
        'heading'=> 'Log in',
        'errors'=> $form->getErrors(),
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

header('location: /');
exit();