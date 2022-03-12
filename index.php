<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

/* 商品登録
--------------------------------------------*/
// 初期化
$title = '';
$errors = [];

// リクエストメソッドの判定
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームに入力されたデータを受け取る
    $title = filter_input(INPUT_POST, 'title');
    $price = filter_input(INPUT_POST, 'price');

    // 商品登録処理の実行
    insert_task($title, $price);
    $errors = insert_validate($title, $price);

    // エラーチェック
    if (!empty($errors)) {
        // 商品登録処理の実行
        insert_task($title, $price);
    }
}

$notyet_tasks = find_task_by_status(TASK_STATUS_NOTYET);

// 売り切れ商品の取得
$done_tasks = find_task_by_status(TASK_STATUS_DONE);
?>

<!DOCTYPE html>
<html lang="ja">

<?php include_once __DIR__ . '/_head.html' ?>

<body>

    <div class="wrapper">
        <div class="new-task">
            <h1>新しい商品を登録</h1>

            <!-- エラーが発生した場合、エラーメッセージを出力 -->
            <?php if ($errors) echo (create_err_msg($errors)) ?>

            <form action="" method="post">
                <input type="text" name="title" placeholder="商品名を入力してください">
                <input type="text" name="price" placeholder="値段を入力してください">
                <input type="submit" value="登録" class="btn submit-btn">
            </form>
        </div>
        <div class="notyet-task">
            <h2 class="in-ribbon">販売商品一覧</h2>

            <ul>
                <?php foreach ($notyet_tasks as $task) : ?>
                    <li>
                        <!-- <div><?php var_dump($task) ?></div> -->
                        <a href="done.php?id=<?= h($task['id']) ?>" class="btn done-btn">売り切れ</a>
                        <!-- edit.php へのパスを追記 -->
                        <a href="edit.php?id=<?= h($task['id']) ?>" class="btn edit-btn">編集</a>
                        <!-- delete.php へのパスを追記 -->
                        <a href="delete.php?id=<?= h($task['id']) ?>" class="btn delete-btn">削除</a>
                        <?= h($task['title']) ?>
                        <?= h($task['price'] . '円') ?>
                        <!-- <?= h($task['title']) ?> -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <hr>
        <div class="done-task">
            <h2 class="in-ribbon">売り切れた商品</h2>
            <ul>
                <?php foreach ($done_tasks as $task) : ?>
                    <li>
                        <a href="cancel.php?id=<?= h($task['id']) ?>" class="btn cancel-btn">販売再開</a>
                        <?= h($task['title']) ?>
                        <?= h($task['price'] . '円') ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</body>

</html>