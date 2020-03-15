<?php
require_once('db_connect.php');
$stmt = $pdo->prepare("UPDATE shop SET shopname=:shop_name,category_id=:category_id,open_time=:open_time,close_time=:close_time,store_holiday=:store_holiday,prefecture=:prefecture,city=:city,shop_location=:shop_location,shop_tel=:shop_tel,note=:note,shop_url=:shop_url WHERE shop_id = :shop_id");

$id = $_POST["shop_id"];
$name = $_POST["shop_name"];
$categoryId = $_POST["category_id"];
$openTime = $_POST["open_time"];
$closeTime = $_POST["close_time"];
$holiday = $_POST["store_holiday"];
$prefecture = $_POST["prefecture"];
$city = $_POST["city"];
$location = $_POST["shop_location"];
$tel = $_POST["shop_tel"];
$note = $_POST["note"];
$url = $_POST["shop_url"];

$stmt->bindParam(':shop_id', $id, PDO::PARAM_STR);
$stmt->bindParam(':shop_name', $name, PDO::PARAM_STR);
$stmt->bindParam(':category_id', $categoryId, PDO::PARAM_STR);
$stmt->bindParam(':open_time', $openTime, PDO::PARAM_STR);
$stmt->bindParam(':close_time', $closeTime, PDO::PARAM_STR);
$stmt->bindParam(':store_holiday', $holiday, PDO::PARAM_STR);
$stmt->bindParam(':prefecture', $prefecture, PDO::PARAM_STR);
$stmt->bindParam(':city', $city, PDO::PARAM_STR);
$stmt->bindParam(':shop_location', $location, PDO::PARAM_STR);
$stmt->bindParam(':shop_tel', $tel, PDO::PARAM_STR);
$stmt->bindParam(':note', $note, PDO::PARAM_STR);
$stmt->bindParam(':shop_url', $url, PDO::PARAM_STR);

$stmt->execute();

echo "更新完了しました";
//header('location: admin.php');
//exit();
?>