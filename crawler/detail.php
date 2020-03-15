<?php
/*---------------------------------------

詳細ページのデータを取得し、
DBに登録するプログラム

---------------------------------------*/
require_once('./phpQuery-onefile.php');
//phpのエラー表示
ini_set('display_errors', "On");

//詳細URLを取得する
//改行区切りではいっているのでURLを分割
$urlText = file_get_contents('getAllUrl.txt');
//改行で区切る
$urlList = explode("\n",$urlText);

print_r($urlList);
//全角スペースを半角スペースに変換する関数
function zenkakuTrim($str)
{
    return str_replace('　','',$str);
}

//1つ1つデータを取得する
foreach($urlList as $url){
    
    //URLにアクセスして取得
    $html = file_get_contents($url);
    
    //htmlで帰ってくるのでパースする
    $doc = phpQuery::newDocument($html);
    
    //返り値をDB登録
    $shop = [];
    $shop['name'] = trim($doc->find('#rstdtl-head > div.rstdtl-header > section > div.rdheader-title-data > div.rdheader-rstname-wrap > div > h2 > span')->text());
    $shop['open'] = trim($doc->find('#contents-rstdata > div.rstinfo-table > table:nth-child(2) > tbody > tr:nth-child(7) > td > p:nth-child(2)')->text());
    $shop['holiday'] = trim($doc->find('#contents-rstdata > div.rstinfo-table > table:nth-child(2) > tbody > tr:nth-child(7) > td > p:nth-child(5)')->text());
    $shop['prefecture'] = trim($doc->find('#contents-rstdata > div.rstinfo-table > table:nth-child(2) > tbody > tr:nth-child(5) > td > p > span:nth-child(1)')->text());
    $shop['city'] = trim($doc->find('#contents-rstdata > div.rstinfo-table > table:nth-child(2) > tbody > tr:nth-child(5) > td > p > span:nth-child(2)')->text());
    $shop['location'] = trim($doc->find('#contents-rstdata > div.rstinfo-table > table:nth-child(2) > tbody > tr:nth-child(5) > td > p > span:nth-child(2) > a:nth-child(2)')->text());
    $shop['address'] = trim($doc->find('#contents-rstdata > div.rstinfo-table > table:nth-child(2) > tbody > tr:nth-child(5) > td > p')->text());
    $shop['tel'] = trim($doc->find('#contents-rstdata > div.rstinfo-table > table:nth-child(6) > tbody > tr:nth-child(6) > td > p')->text());
    $shop['url'] = trim($doc->find('#contents-rstdata > div.rstinfo-table > table:nth-child(6) > tbody > tr:nth-child(4) > td > p > a > span')->text());
    $shop = array_map('zenkakuTrim', $shop);

    require_once('db_connect.php');
    
    //新規追加の場合
    $stmt = $pdo->prepare("INSERT INTO shop (shop_name, open_time, shop_holiday, prefecture, city, shop_location, shop_tel, shop_url, created_date, updated_date) VALUES (:shop_name, :open_time, :shop_holiday, :prefecture, :city,:shop_location, :shop_tel, :shop_url, now(),now())");
    
    //既存idの場合更新
    /*
    $name = $shop["shop_name"];
    $categoryId = $_POST["category_id"];
    */
    $name = $shop["name"];
    $open = $shop["open"];
    $holiday = $shop["holiday"];
    $prefecture = $shop["prefecture"];
    $city = $shop["city"];
    $location = $shop["location"];
    $tel = $shop["tel"];
    $address = $shop["address"];
    $url = $shop["url"];
    //$category = $shop["category"];
    
    $stmt->bindParam(':shop_name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':open_time', $open, PDO::PARAM_STR);
    $stmt->bindParam(':shop_holiday', $holiday, PDO::PARAM_STR);
    $stmt->bindParam(':prefecture', $prefecture, PDO::PARAM_STR);
    $stmt->bindParam(':city', $city, PDO::PARAM_STR);
    $stmt->bindParam(':shop_location', $location, PDO::PARAM_STR);
    $stmt->bindParam(':shop_tel', $tel, PDO::PARAM_STR);
    // $stmt->bindParam(':note', $note, PDO::PARAM_STR);
    $stmt->bindParam(':shop_url', $url, PDO::PARAM_STR);

    $stmt->execute();
    //1秒間のスリープ
    sleep(1);

}

// 確認
var_dump($shop);

?>