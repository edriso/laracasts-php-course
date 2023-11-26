<?php

require('Validator.php');

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create a note';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if(! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }

    if(empty($errors)) {
        $currentUserId = 4;
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => $currentUserId,
        ]);
        header('Location: /notes');
    }
}

require 'views/notes/create.view.php';