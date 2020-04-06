<?php
//啟動 session
session_start();

header("Content-Type: text/html; chartset=utf-8");

//引用資料庫連線
require_once('./db.inc.php');

if( isset($_POST['admname']) && isset($_POST['pwd']) ){
    //SQL 語法
    $sql = "SELECT `username`, `pwd` 
    FROM `admin` 
    WHERE `username` = ? 
    AND `pwd` = ? ";

    $arrParam = [
        // 自訂引述arrParam
        $_POST['admname'],
        sha1($_POST['pwd'])
    ];
    // print_r($sql);

    $pdo_stmt = $pdo->prepare($sql);
                        // 擋掉特殊字元
    // prepare準備好sql後丟給statment，拼成完整的sql
    $pdo_stmt->execute($arrParam);
    // $i = $pdo_stmt->rowCount();
    // echo "<pre>";
    // print_r($i);
    // echo "</pre>";}
    // print_r($pdo_stmt);
    if( $pdo_stmt->rowCount() > 0 ){
        //3 秒後跳頁
        header("Refresh: 3; url=./newadmin.php");
        
        //將傳送過來的 post 變數資料，放到 session，
        $_SESSION['admname'] = $_POST['admname'];

        echo "登入成功!!! ";
        exit();
    } else {
        header("Refresh: 3; url=./loginPage.php");
        echo "登入失敗…3秒後自動回登入頁";
        exit();
    }
} 