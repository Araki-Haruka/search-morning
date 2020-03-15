<?php

require_once('db_connect.php');

$sql = 'DELETE FROM shop where shop_id = :shop_id';
$stmt = $pdo->prepare($sql);
$value = $_POST["btn_delete"];
$stmt -> bindParam(':shop_id', $value, PDO::PARAM_INT);
$stmt -> execute();

header('location: admin.php');
exit();


?>