<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 4;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// if(! empty($errors)) {
if(count($errors)) {
    return view('notes/edit', [
        'heading'=> 'Edit Note',
        'note'=> $note,
        'errors'=> $errors,
     ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :note_id', [
    'body' => $_POST['body'],
    'note_id' => $note['id'],
]);

header('location: /notes');
die();