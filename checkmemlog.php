<?php
//啟動 session
session_start();

header("Content-Type: text/html; chartset=utf-8");

//引用資料庫連線
require_once './db.inc.php';
// 認證帳號存在
if (isset($_POST['mbAccount']) && isset($_POST['mbPassword'])) {
    //SQL 語法
    $sql = "SELECT `mbAccount`, `mbPassword`,`mbNick`,`mbID`
    FROM  `mbinfo`
    WHERE `mbAccount` = ?
    AND `mbPassword` = ? ";

    $arrParam = [
        // 自訂引述arrParam
        $_POST['mbAccount'],
        sha1($_POST['mbPassword']),
    ];

    $pdo_stmt = $pdo->prepare($sql);
    // 擋掉特殊字元
    // prepare準備好sql後丟給statment，拼成完整的sql
    $pdo_stmt->execute($arrParam);
   
    $arr = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC)[0];

    if (count($arr) > 0) {
        //3 秒後跳頁
        header("Refresh: 3; url=./memCenter.php");

        //將傳送過來的 post 變數資料，連同根據帳號尋找到的資訊放入SESSION

        $_SESSION['username'] = $_POST['mbAccount'];
        $_SESSION['mbNick'] = $arr['mbNick'];
        $_SESSION['mbID'] = $arr['mbID'];
     
        echo "登入成功!!! ";
        exit();
    } else {
        header("Refresh: 3; url=./memberLog.php");
        echo "登入失敗…3秒後自動回登入頁";
        exit();
    }
}
