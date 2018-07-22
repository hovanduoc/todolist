<?php

return [
    'database' => [
        'dbname' => 'todolist',
        'username' => 'root',
        'password' => '',
        'driver' => 'mysql',
        'host' => 'localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ],
    ],
    'DEBUG' => true,
];
