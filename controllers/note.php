<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';

$query = "SELECT * FROM notes WHERE user_id = 4 AND id = :id";
$note = $db->query($query, ['id' => $_GET['id']])->fetch(); 

require 'views/note.view.php';