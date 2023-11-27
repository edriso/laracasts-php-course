<?php

use Core\Database;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$currentUserId = 4; // created a variable to prevent a magic number

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show', [
    'heading'=> 'Note',
    'note'=> $note,
 ]);