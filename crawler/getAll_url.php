<?php
/*---------------------------------------

URLから店舗詳細のURLを取得するプログラム

このファイルをコマンドラインで実行して
テキストファイルにいれる
$php getAll_url.php > ......txt

DBに登録する

---------------------------------------*/

require_once('phpQuery-onefile.php');
//phpのエラー表示
ini_set('display_errors', "On");

$url_template = 'https://tabelog.com/keywords/モーニングセット/mie/kwdLst/%d';

// curlでhttpリクエストを行う
//セッションを初期化する
$ch = curl_init(); 

//詳細URLを取得する
for ($page=1; $page<=20; $page++) {
    //URLにページをセットする
    $url = sprintf($url_template, $page);
   
    // URLの設定
    curl_setopt($ch, CURLOPT_URL, $url);
    // curl_execの戻り値を文字列にする
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html =  curl_exec($ch);

    //DOM取得
    $doc = phpQuery::newDocument($html);
    
    $shop = [];
    
    #aタグの取得
    #深い場所の子要素の場合、慎重に指定する
    $links = $doc["#column-main > ul > li"];
    
    #$linksはaタグの情報が入っているので、forの中でhrefの情報を取得する
    #attr("href")をtext()に変更すれば、aタグに囲まれたテキストを取得できる
    foreach ($links as $link) {
        echo pq($link)->find("div.list-rst__wrap.js-open-new-window > div.list-rst__header > div > div > div > a")->attr("href");
        echo "\n";
    }
    sleep(1);
}

curl_close($ch); //終了
?>