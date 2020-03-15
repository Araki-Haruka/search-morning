<?php

$dsn = "mysql:dbname=LAA1143272-morning;host=mysql141.phy.lolipop.lan;charset=utf8mb4";
$username = "LAA1143272";
$password = "Jaiantojaiko10";
$driver_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $username, $password, $driver_options);

?>