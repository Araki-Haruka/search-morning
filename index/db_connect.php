<?php

$dsn = "mysql:dbname=sample;host=127.0.0.1;port=8889;charset=utf8mb4";
$username = "root";
$password = "root";
$driver_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $username, $password, $driver_options);

?>