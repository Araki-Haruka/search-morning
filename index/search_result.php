<?php
//結果表示ページ
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once('db_connect.php');


$prefecture = "三重県";
$city = "四日市市";

if (!empty($prefecture) && !empty($city)) {
    $stmt = $pdo->prepare("SELECT * FROM shop WHERE prefecture = ? AND city = ?");

    $stmt->bindParam(1,$prefecture);
    $stmt->bindParam(2,$city);
    $stmt->execute();

} elseif(!empty($prefecture)) {
    $stmt = $pdo->prepare("SELECT * FROM shop WHERE prefecture = ?");
    $stmt->bindParam(1,$prefecture);
    $stmt->execute();

} elseif(!empty($city)) {
    $stmt = $pdo->prepare("SELECT * FROM shop WHERE city = ?");
    $stmt->bindParam(1,$city);
    $stmt->execute();

} else {
    echo "error!";
}

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Shops</title>
        <meta name="description" content="朝食検索結果">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:300&display=swap" rel="stylesheet">
        <link href="./css/index.css" rel="stylesheet">
        <script type="text/javascript" src="typeScare.js" charset="utf-8"></script>
        <script type="text/javascript" src="//typesquare.com/3/tsst/script/ja/typesquare.js?5e116e6299c847de936c08ccac1e0217" charset="utf-8"></script>
    </head>
    <body>
        <div id="shops" class="big-bg">
            <header class="page-header wrapper">
                <h1><a href=""><img class="" src="" alt=""></h1>
                <nav>
                    <ul class="main-nav">
                        <li><a href="search.php">SEARCH</a></li>
                    </ul>
                </nav>
            </header>

            <div class="menu-content wrapper">
                <h2 class=""></h2>
            </div><!-- /.menu-content -->
        </div><!-- /#menu -->

        <div class="wrapper grid">
            <h2>▷検索結果</h2>
                <p>都道府県：<?php echo $prefecture; ?></p>
                <p>市町村：<?php echo $city; ?></p>
<?php foreach($stmt as $loop){ ?>
    <?php $open = ".".$loop["open_time"]."."; ?>
    <?php $close = ".".$loop["close_time"]."."; ?>
            <div class="item">
                <p><a href="<?php echo $loop["shop_url"]; ?>"><?php echo $loop["shop_name"]; ?></a></p>
                <!--<p>Category：<?php //echo $loop["category_id"]; ?></p>-->
                <p>Open：<?php echo date('G:i', strtotime($open)); ?></p>
                <p>Close：<?php echo date('G:i', strtotime($close)); ?></p>
                <p>店休日：<?php echo $loop["shop_holiday"]; ?></p>
                <p>住所：<?php echo $loop["shop_location"]; ?></p>
                <p>Tel：<?php echo $loop["shop_tel"]; ?></p>
                <p>備考：<?php echo $loop["note"]; ?></p>
            </div>
<?php } ?>
        </div><!-- /.grid -->
    </body>
</html>