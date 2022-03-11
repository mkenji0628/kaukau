<?php

require_once __DIR__ . '/functions.php';

$dbh = connect_db();
?>

<!DOCTYPE html>
<html lang="ja">

<?php include_once __DIR__ . '/_head.html' ?>

<body>

    <div class="wrapper">
        <div class="new-task">
            <h1>商品の一覧を表示</h1>
            <form action="" method="post">
                <input type="text" name="title" placeholder="タスクを入力してください">
                <input type="submit" value="登録" class="btn submit-btn">
            </form>
        </div>
        <div class="notyet-task">
            <h2>商品一覧</h2>
            <ul>
                <li>
                    <a href="" class="btn done-btn">完了</a>
                    <a href="" class="btn edit-btn">編集</a>
                    <a href="" class="btn delete-btn">削除</a>
                    未完了テストタスク
                </li>
            </ul>
        </div>
        <hr>
        <div class="done-task">
            <h2>完了タスク</h2>
            <ul>
                <li>
                    完了テストタスク
                </li>
            </ul>
        </div>

    </div>

</body>

</html>