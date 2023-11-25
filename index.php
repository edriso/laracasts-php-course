<?php

require 'functions.php';
// require 'router.php';
require 'Database.php';

$config = require('config.php');

$db = new Database($config['database']);

$id = $_GET['id'] ?? '1';

$query = "SELECT * FROM posts where id = ?";

$post = $db->query($query, [$id])->fetch(); //fetches single record
// $posts = $db->query($query)->fetchAll();

//another way
// $query = "SELECT * FROM posts where id = :id";
// $post = $db->query($query, ['id' => $id])->fetch();
// $post = $db->query($query, [':id' => $id])->fetch();

echo "<li>{$post['title']}</li>";