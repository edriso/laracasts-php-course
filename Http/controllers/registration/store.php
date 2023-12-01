<?php

use Core\App;
use Core\Database;
use Core\Authenticator;
use Http\Forms\RegisterForm;

$form = RegisterForm::validate($attributes = [
    'email'=> $_POST['email'],
    'password'=> $_POST['password']
]);

(App::resolve(Database::class))->query(
    'INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email'=> $attributes['email'],
        'password'=> password_hash($attributes['password'], PASSWORD_BCRYPT)
    ]
);

(new Authenticator)->login([
    'email' => $email
]);

redirect('/');