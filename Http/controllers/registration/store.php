<?php

use Core\App;
use Core\Session;
use Core\Database;
use Core\Authenticator;
use Http\Forms\RegisterForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new RegisterForm();

if ($form->validate($email, $password)) {
    (App::resolve(Database::class))->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email'=> $email,
        'password'=> password_hash($password, PASSWORD_BCRYPT)
    ]);
    
    (new Authenticator)->login([
        'email' => $email
    ]);
    
    redirect('/');
}

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $email
]);

redirect('/register');