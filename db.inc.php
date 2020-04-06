<?php
//資料庫主機設定
$db_host = "localhost"; //可以修正為IP
$db_username = "test";
$db_password = "T1st@localhost";
$db_name = "member";
$db_charset = "utf8mb4";
// 這個編碼方式可以看出表情符號
$db_collate = "utf8mb4_unicode_ci";

//錯誤處理
try {
    //PDO 連線
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name};charset={$db_charset}", $db_username, $db_password);

    //PDO 屬性設定
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //    避免PDO內部的預設，把數值轉成字串，此行關掉
    // The Scope Resolution Operator (also called Paamayim Nekudotayim) or in simpler terms, the double colon, is a token that allows access to static, constant, and overridden properties or methods of a class.
    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES {$db_charset} COLLATE {$db_collate}");
} catch (PDOException $e) {
    echo "資料庫連結失敗，訊息: " . $e->getMessage();
}
