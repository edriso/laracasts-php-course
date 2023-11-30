<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email_or_password', 'No matching account found for the email address and password.');
}

return view('session/create', [
    'heading'=> 'Log in',
    'errors'=> $form->errors(),
]);