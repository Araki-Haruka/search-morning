<?php
/*---------------------------------------

クローラーのサンプル

---------------------------------------*/

require_once('phpQuery-onefile.php');
//phpのエラー表示
ini_set('display_errors', "On");
 
$url = 'https://tabelog.com/keywords/%E3%83%A2%E3%83%BC%E3%83%8B%E3%83%B3%E3%82%B0%E3%82%BB%E3%83%83%E3%83%88/mie/A2402/A240201/kwdLst/cafe/';
$html = file_get_contents($url);

$doc = phpQuery::newDocument($html);

foreach ($doc->find('.list-rst__rst-name') as $tmp){
        $div = pq($tmp);
    
        $shop = [
            'shop_name' => $div->find('a')->text(),
            'category' => $div->find('span')->text(),
            'shop_url' => $div->find('a')->attr('href'),
        ];

}
// 確認
var_dump($shop);

?>