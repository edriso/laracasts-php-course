<?php

require 'functions.php';

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if (isset($routes[$uri])) {
    require $routes[$uri];
} else {
    require 'controllers/404.php';
}