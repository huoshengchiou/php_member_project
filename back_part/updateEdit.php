<?php
require_once('./checkSession.php');
require_once('./db.inc.php');

$sql = "UPDATE `mbinfo`
        SET 
                `mbID` = ?,
                `mbNick` = ?, 
                `mbCountry` = ?,
                `mbEmail` = ?,
                `mbPh` = ?,
                `mbInvoice` = ?,
                `mbBd` = ?,
                `mbDes` = ?
        WHERE   
                `serial` = ?";


// "SELECT `serial`, `mbID`, `mbAccount`, `mbPassword`, `mbName`, `mbNick`, `mbCountry`, `mbEmail`, `mbPh`,   
//                 `mbInvoice`, `mbGender`, `mbBd`, `mbDes` 
//                 FROM `mbinfo` 
//                 WHERE `serial` = ?";



// echo "<pre>";
// print_r($sql);
// echo "</pre>";
// exit();

$arrParam = 
[
    $_POST['mbID'],
    $_POST['mbNick'],
    $_POST['mbCountry'],
    $_POST['mbEmail'],
    $_POST['mbPh'],
    $_POST['mbInvoice'],
    $_POST['mbBd'],
    $_POST['mbDes'],
    $_POST['serial']
];


$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);





if( $stmt->rowCount() > 0 ){
    header("Refresh: 3; url=./newadmin.php");
    echo "更新成功";
} else {
    header("Refresh: 3; url=./newadmin.php");
    echo "沒有任何更新";
}