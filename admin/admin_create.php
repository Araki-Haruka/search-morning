<?php
require_once('db_connect.php');

//新規追加の場合
$stmt = $pdo->prepare("INSERT INTO shop (shop_name, category_id, open_time, close_time, shop_holiday, prefecture, city, shop_location, shop_tel, shop_url, note, created_date, updated_date) VALUES (:shop_name, :category_id, :open_time, :close_time, :shop_holiday, :prefecture, :city,:shop_location, :shop_tel, :shop_url, :note, now(),now())");

//既存idの場合更新

$name = $_POST["shop_name"];
$categoryId = $_POST["category_id"];
$openTime = $_POST["open_time"];
$closeTime = $_POST["close_time"];
$holiday = $_POST["shop_holiday"];
$prefecture = $_POST["prefecture"];
$city = $_POST["city"];
$location = $_POST["shop_location"];
$tel = $_POST["shop_tel"];
$note = $_POST["note"];
$url = $_POST["shop_url"];

$stmt->bindParam(':shop_name', $name, PDO::PARAM_STR);
$stmt->bindParam(':category_id', $categoryId, PDO::PARAM_STR);
$stmt->bindParam(':open_time', $openTime, PDO::PARAM_STR);
$stmt->bindParam(':close_time', $closeTime, PDO::PARAM_STR);
$stmt->bindParam(':shop_holiday', $holiday, PDO::PARAM_STR);
$stmt->bindParam(':prefecture', $prefecture, PDO::PARAM_STR);
$stmt->bindParam(':city', $city, PDO::PARAM_STR);
$stmt->bindParam(':shop_location', $location, PDO::PARAM_STR);
$stmt->bindParam(':shop_tel', $tel, PDO::PARAM_STR);
$stmt->bindParam(':note', $note, PDO::PARAM_STR);
$stmt->bindParam(':shop_url', $url, PDO::PARAM_STR);

$stmt->execute();

header('location: admin.php');
exit();





?>