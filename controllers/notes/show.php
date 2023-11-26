<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';
$currentUserId = 4; // created a variable to prevent a magic number

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require 'views/notes/show.view.php';