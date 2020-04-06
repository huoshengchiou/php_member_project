<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// exit();


// 照片資料先不處理

//先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
// $sqlGetImg = "SELECT `studentImg` FROM `students` WHERE `id` = ? ";
// $stmtGetImg = $pdo->prepare($sqlGetImg);

//加入繫結陣列
// $arrGetImgParam = [
//     (int)$_GET['deleteSerial']
// ];

//執行 SQL 語法
// $stmtGetImg->execute($arrGetImgParam);
// if (!$stmtGetImg){
//     // <pre>是對結果進行格式化，提升可讀性
//     // 提出sql語法的錯誤地方
//     print_r($pdo->errorInfo());
//     exit();
// }

//若有找到 studentImg 的資料
// if($stmtGetImg->rowCount() > 0) {
//     //取得指定 id 的學生資料 (1筆)
//     $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC)[0];

//     //若是 studentImg 裡面不為空值，代表過去有上傳過
//     if($arrImg['studentImg'] !== NULL){
//         // if($arrImg[0]['studentImg'] !== NULL){
//         //刪除實體檔案
//         @unlink("./files/".$arrImg['studentImg']);

//         // @unlink("./files/".$arrImg[0]['studentImg']);
//     }     
// }

//SQL 語法，刪除資料庫紀錄
$sql = "DELETE FROM `mbinfo` WHERE `serial` = ? ";

$arrParam = [
    (int)$_GET['deleteSerial']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./newadmin.php");
    echo "刪除成功";
} else {
    header("Refresh: 3; url=./newadmin.php");
    echo "刪除失敗";
}