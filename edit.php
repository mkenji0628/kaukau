<?php
require_once __DIR__ . '/functions.php';

// index.php から渡された id を受け取る
$id = filter_input(INPUT_GET, 'id');

// 受け取った id のレコードを取得
$task = find_by_id($id);


/* タスク更新処理
---------------------------------------------*/
// 初期化
$title = '';
$errors = [];

// リクエストメソッドの判定
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームに入力されたデータを受け取る
    $title = filter_input(INPUT_POST, 'title');
    $price = filter_input(INPUT_POST, 'price');


    // バリデーション
    $errors = update_validate($title, $task);

    // エラーチェック
    if (empty($errors)) {
        // タスク更新処理の実行
        update_task($id, $title, $price);

        // index.php にリダイレクト
        header('Location: index.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="ja">


<?php include_once __DIR__ . '/_head.html' ?>

<body>
    <div class="wrapper">
        <h1>商品情報変更</h1>
        <!-- エラーが発生した場合、エラーメッセージを出力 -->
        <?php if ($errors) echo (create_err_msg($errors)) ?>
        <form action="" method="post">

            <input type="text" name="title" value="<?= h($task['title']) ?>">
            <input type="text" name="price" value="<?= h($task['price']) ?>">
            <input type="submit" value="商品名変更" class="btn submit-btn">
        </form>
        <a href="index.php" class="btn return-btn">戻る</a>
    </div>
</body>

</html>