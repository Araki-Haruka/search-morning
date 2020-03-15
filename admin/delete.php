<?php

require_once('db_connect.php');

$sql = 'DELETE FROM todo where id = :id';
$stmt = $pdo->prepare($sql);
$value = $_POST["btn_delete"];
$stmt -> bindParam(':id', $value, PDO::PARAM_INT);
$stmt -> execute();


header('location: todo.php');
exit();


?>