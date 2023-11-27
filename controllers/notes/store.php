<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if(! empty($errors)) {
    return view('notes/create', [
        'heading'=> 'Create a Note',
        'errors'=> $errors,
     ]);
}

$currentUserId = 4;
$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 4,
]);

header('location: /notes');
die();