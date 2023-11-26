<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->fetch();

if(!$note) {
    abort();
}

$currentUserId = 1; // created a variable to prevent a magic number
if($note['user_id'] !== $currentUserId) {
    abort(403);
}

require 'views/note.view.php';