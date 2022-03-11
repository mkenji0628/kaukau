<?php

// 設定ファイルを読み込む
require_once __DIR__ . '/config.php';

// 接続処理を行う関数
function connect_db()
{
    // try ~ catch 構文
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        // 接続がうまくいかない場合こちらの処理が実行される
        echo $e->getMessage();
        exit;
    }
}

// エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


// タスク登録時のバリデーション
function insert_validate($title)
{
    // 初期化
    $errors = [];

    if ($title == '') {
        $errors[] = MSG_TITLE_REQUIRED;
    }

    return $errors;
}



// タスク登録
function insert_task($title, $price)
{
    // データベースに接続
    $dbh = connect_db();

    // レコードを追加
    $sql = <<<EOM
    INSERT INTO
        product
        (title, price)
    VALUES
        (:title, :price)
    EOM;
    
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->execute();
}


// エラーメッセージ作成
function create_err_msg($errors)
{
    $err_msg = "<ul class=\"errors\">\n";

    foreach ($errors as $error) {
        $err_msg .= "<li>" . h($error) . "</li>\n";
    }

    $err_msg .= "</ul>\n";
    
    return $err_msg;
}



// タスク完了
// function update_status_to_done($id)
// {
//     // データベースに接続
//     $dbh = connect_db();

//     // $id を使用してデータを更新
//     $sql = <<<EOM
//     UPDATE
//         product
//     SET
//         status = 'done'
//     WHERE
//         id = :id
//     EOM;

//     // プリペアドステートメントの準備
//     $stmt = $dbh->prepare($sql);

//     // パラメータのバインド
//     $stmt->bindParam(':id', $id, PDO::PARAM_INT);

//     // プリペアドステートメントの実行
//     $stmt->execute();
// }


function update_status($id, $status)
{
    $dbh = connect_db();

    $sql = <<<EOM
    UPDATE
        product
    SET
        status = :status
    WHERE
        id = :id
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->execute();
}



function find_task_by_status($status)
{
require_once __DIR__ . '/functions.php';

$dbh = connect_db();

$sql = <<<EOM
SELECT
    *
FROM 
    product
WHERE 
    status = :status;
EOM;

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// 受け取った id のレコードを取得
function find_by_id($id)
{
    // データベースに接続
    $dbh = connect_db();

    // $id を使用してデータを取得
    $sql = <<<EOM
    SELECT
        * 
    FROM 
        product
    WHERE 
        id = :id;
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // プリペアドステートメントの実行
    $stmt->execute();

    // 結果の取得
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// タスク更新時のバリデーション
function update_validate($title, $task)
{
    // 初期化
    $errors = [];

    if ($title == '') {
        $errors[] = MSG_TITLE_REQUIRED;
    }

    if ($title == $task['title']) {
        $errors[] = MSG_TITLE_NO_CHANGE;
    }

    return $errors;
}

// タスク更新
function update_task($id, $title, $price)
{
    // データベースに接続
    $dbh = connect_db();

    // $id を使用してデータを更新
    $sql = <<<EOM
    UPDATE
        product
    SET
        title = :title,
        price = :price
    WHERE
        id = :id
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // プリペアドステートメントの実行
    $stmt->execute();
}

// タスク削除
function delete_task($id)
{
    // データベースに接続
    $dbh = connect_db();

    // $id を使用してデータを削除
    $sql = <<<EOM
    DELETE FROM
        product
    WHERE
        id = :id
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // プリペアドステートメントの実行
    $stmt->execute();
}
