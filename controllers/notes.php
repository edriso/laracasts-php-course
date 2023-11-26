<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';

$id = $_GET['id'] ?? '4';
$query = "SELECT * FROM notes WHERE user_id = :id";
$notes = $db->query($query, [':id' => $id])->fetchAll(); 

require 'views/notes.view.php';