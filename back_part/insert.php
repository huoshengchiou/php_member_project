<?php
header("Content-Type: text/html; chartset=utf-8");
// echo"<pre>";
// // 可以確認傳送過來的file物件的狀態
// print_r ($_POST);
// print_r ($_FILES);
// echo"</pre>";

//引入判斷是否登入機制，調用session內的值辨認
require_once('./checkSession.php'); 

//引用資料庫連線
require_once('./db.inc.php');

//SQL 敘述
$sql = "INSERT INTO `students` 
        (`studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber`, `studentDescription`, `studentImg`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

if( $_FILES["studentImg"]["error"] === 0 ) {
    //為上傳檔案命名，利用時間來對檔案另外命名
    $studentImg = date("YmdHis");
    
    //找出副檔名
    $extension = pathinfo($_FILES["studentImg"]["name"], PATHINFO_EXTENSION);

    //建立完整名稱
    $imgFileName = $studentImg.".".$extension;


    // if判斷式撰寫習慣，錯誤先寫
    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if( !move_uploaded_file($_FILES["studentImg"]["tmp_name"], "./files/".$imgFileName) ) {
        header("Refresh: 3; url=./admin.php");
        echo "圖片上傳失敗";
        exit();
    }
}

//繫結用陣列，sql預備語法
$arr = [
    $_POST['studentId'],
    $_POST['studentName'],
    $_POST['studentGender'],
    $_POST['studentBirthday'],
    $_POST['studentPhoneNumber'],
    $_POST['studentDescription'],
    $imgFileName
];
// 沒有圖片會報錯
$pdo_stmt = $pdo->prepare($sql); 
// prepare當輸入為!@~會變成 \!\@\~
$pdo_stmt->execute($arr);
if($pdo_stmt->rowCount() > 0) {
    header("Refresh: 3; url=./admin.php");
    echo "新增成功";
    exit();
} else {
    header("Refresh: 3; url=./admin.php");
    echo "新增失敗";
    exit();
}