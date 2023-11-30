<?php

use Core\App;
use Core\Database;
use Core\Authenticator;
use Http\Forms\RegisterForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new RegisterForm();

if (! $form->validate($email, $password)) {
    return view('registration/create', [
        'heading'=> 'Register',
        'errors'=> $form->errors(),
    ]);
}

(App::resolve(Database::class))->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email'=> $email,
    'password'=> password_hash($password, PASSWORD_BCRYPT)
]);

(new Authenticator)->login([
    'email' => $email
]);

redirect('/');