<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create a note';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trimmedBody = trim($_POST['body']);
    $errors = [];

    if(strlen($trimmedBody) === 0) {
        $errors['body'] = 'Note can not be empty.';
    }

    if(strlen($trimmedBody) > 1000) {
        $errors['body'] = 'Note can not be more than 1,000 characters.';
    }

    if(empty($errors)) {
        $currentUserId = 4;
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $trimmedBody,
            'user_id' => $currentUserId,
        ]);
        header('Location: /notes');
    }
}

require 'views/note-create.view.php';