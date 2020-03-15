<?php
/*
詳細ページの仕様
* 店舗IDをURLで受け取る
* 店舗IDから店舗情報を取得
* 店舗情報を表示
* 店舗情報がない場合はページが存在しないことを表示する
*/
//shop.php?shop_id=1
error_reporting(E_ALL);
ini_set('display_errors', "On");
$shopId = $_GET['shop_id'];
require_once("index/db_connect.php");

if (!empty($shopId)) {
    $stmt = $pdo->prepare("SELECT * FROM shop WHERE shop_id = ?");

    $stmt->bindParam(1,$shopId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

}
if(!$result) {
    header("HTTP/1.0 404 Not Found");
    echo "ページが存在しません";
  }

?>