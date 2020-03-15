<?php

require_once('../crawler/db_connect.php');
$stmt = $pdo->query('SELECT * FROM shop');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shop管理</title>
    <meta charset="UTF-8">
    <meta name="description" content="Shop管理">
    <link rel="stylesheet" href="./css/admin.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Shop管理</h1>
        <!-- shop情報 -->
        <form action="admin_create.php" method="POST" class="add_form">
            <div class="form-group">
                <label for="shop_name" class="shop_lavel">店舗名</label>
                <div class="col">
                    <input type="text" name="shop_name" id="shop_name" class="form_control">
                </div>
                <label for="category_id" class="category_id">カテゴリー</label>
                <div class="cp_ipselect cp_sl01">
                    <select name="category_id">
                        <option value="" hidden>Choose</option>
                        <option value="1">和食</option>
                        <option value="2">洋食</option>
                        <option value="3">中華</option>
                    </select>
                </div>
                <label for="shop_url"" class="url_lavel">店舗URL</label>
                <div class="col">
                    <input type="text" name="shop_url" id="shop_url" class="form_control">
                </div>
                <label for="open_time" class="open_time">OpenTime</label>
                <div class="col">
                    <input type="text" name="open_time" id="open_time" class="form_control">
                </div>
                <label for="close_time" class="close_time">CloseTime</label>
                <div class="col">
                    <input type="text" name="close_time" id="close_time" class="form_control">
                </div>
                <label for="shop_holiday" class="shop_holiday">店休日</label>
                <div class="col">
                    <input type="text" name="shop_holiday" id="shop_holiday" class="form_control">
                </div>
                <label for="prefecture" class="prefecture">都道府県</label>
                <div class="col">
                    <input type="text" name="prefecture" id="prefecture" class="form_control">
                </div>
                <label for="city" class="city">市町村</label>
                <div class="col">
                    <input type="text" name="city" id="city" class="form_control">
                </div>
                <label for="shop_location" class="location_lavel">以下住所</label>
                <div class="col">
                    <input type="text" name="shop_location" id="shop_location" class="form_control">
                </div>
                <label for="tel" class="tel_lavel">電話番号</label>
                <div class="col">
                    <input type="text" name="shop_tel" id="shop_tel" class="form_control">
                </div>
                <label for="note" class="note_lavel">備考欄</label>
                <div class="col">
                    <input type="text" name="note" id="note" class="form_control">
                </div>
            </div>
            <!-- Add Button -->
            <div class="form_group">
                <div class="btn">
                    <button type="submit" class="button">追加</button>
                </div>
            </div>
        </form>

        <!-- Current  -->
        <h2>ショップ一覧</h2>
        <table class="shop_table">
            <thead>
                <tr>
                    <th>店舗名</th>
                    <th>都道府県</th>
                    <th>市町村</th>
                    <th>住所</th>
                    <th>TEL</th>
                    <th>Open</th>
                    <th>Close</th>
                    <th>店休日</th>
                    <th>URL</th>
                    <th>その他</th>
                    <th>追加日</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <td><?php echo $row['shop_name']; ?></td>
                        <td><?php echo $row['prefecture']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['shop_location']; ?></td>
                        <td><?php echo $row['shop_tel']; ?></td>
                        <td><?php echo $row['open_time']; ?></td>
                        <td><?php echo $row['close_time']; ?></td>
                        <td><?php echo $row['shop_holiday']; ?></td>
                        <td><?php echo $row['shop_url']; ?></td>
                        <td><?php echo $row['note']; ?></td>
                        <td><?php echo $row['created_date']; ?></td>
                        <form action="admin_delete.php" method="POST" name="delete" class="shop_form_delete">
                            <td><button type="submit" name="btn_delete" value="<?php echo $row['shop_id']; ?>" class="button">削除</button></td>
                        </form>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>

