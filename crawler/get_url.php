<?php
/*---------------------------------------

食べログのショップ詳細URLを取得する

---------------------------------------*/

require_once('phpQuery-onefile.php');
//phpのエラー表示
ini_set('display_errors', "On");

//詳細URLを取得する
$url = 'https://tabelog.com/keywords/%E3%83%A2%E3%83%BC%E3%83%8B%E3%83%B3%E3%82%B0%E3%82%BB%E3%83%83%E3%83%88/mie/kwdLst/';

//ファイルの内容を全て文字列に読み込む
$html = file_get_contents($url);

$doc = phpQuery::newDocument($html);
$shop = [];

$shop['href'] = trim($doc->find('#column-main > ul > li:nth-child(2) > div.list-rst__wrap.js-open-new-window > div.list-rst__header > div > div > div > a')->attr("href"));

var_dump($shop);
?>
