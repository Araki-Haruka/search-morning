<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Search Morning</title>
        <meta name="description" content="都道府県 市町村からモーニング実施店を検索">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="//typesquare.com/3/tsst/script/ja/typesquare.js?5e116e6299c847de936c08ccac1e0217" charset="utf-8"></script>

    <!-- CSS -->
        <link rel="stylesheet" href="./css/index.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:300&display=swap" rel="stylesheet">
    </head>

    <body>
        <div id="search" class="big-bg">
            <header class="page-header wrapper">
            </header>
            <div class="home-content wrapper">
                <form action="search_result.php" method="GET">
                    <div>
                        <input type="text" name="prefecture" id="prefecture" placeholder="都道府県">
                    </div>
                    <div>
                        <input type="text" name="city" id="city" placeholder="市町村">
                    </div>
                    <input type="submit" class="button" value="Let's Go!">
                </form>
            </div>
        </div>
    </body>
</html>