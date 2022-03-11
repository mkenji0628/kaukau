<?php
require_once __DIR__ . '/functions.php';

// index.php から渡された id を受け取る
$id = filter_input(INPUT_GET, 'id');

// 受け取った id のレコードを取得
$task = find_by_id($id);
?>

<!DOCTYPE html>
<html lang="ja">


<?php include_once __DIR__ . '/_head.html' ?>

<body>
    <div class="wrapper">
        <h2>商品情報変更</h2>
        <form action="" method="post">

            <input type="text" name="title" value="<?= h($task['title']) ?>">
            <input type="text" name="price" value="<?= h($task['price']) ?>">
            <input type="submit" value="商品名変更" class="btn submit-btn">
        </form>
    </div>

    <div class="wrapper">
        <a href="index.php" class="btn return-btn">戻る</a>
    </div>
</body>

</html>