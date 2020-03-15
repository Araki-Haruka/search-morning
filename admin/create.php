<?php
require_once('db_connect.php');

$stmt = $pdo->prepare("INSERT INTO todo (body) VALUES (:body)");
$body = $_POST["data"];
$stmt->bindParam(':body', $body, PDO::PARAM_STR);
$stmt->execute();

header('location: todo.php');
exit();

?>


