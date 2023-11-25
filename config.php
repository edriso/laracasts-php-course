<?php

// we can use this file for our entire application (it's like .env file)
return [
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'myapp',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
    ],
    // 'services' => [
        // you often work with external services and apis and often those companies will give you
        // tokens or secret keys that you need to reference in your code
    // ]
];