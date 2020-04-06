<?php
// session_start();
require_once('./checkSession.php');
require_once('./db.inc.php');

$sql = "UPDATE `mbinfo`
        SET
                `mbNick` = ?,
                `mbCountry` = ?,
                `mbEmail` = ?,
                `mbPh` = ?,
                `mbInvoice` = ?,
                `mbBd` = ?,
                `mbDes` = ?
        WHERE
                `mbID` = ?";



$arrParam =
    [
    $_POST['mbNick'],
    $_POST['mbCountry'],
    $_POST['mbEmail'],
    $_POST['mbPh'],
    $_POST['mbInvoice'],
    $_POST['mbBd'],
    $_POST['mbDes'],
    $_SESSION['mbID'],
];



$stmt = $pdo->prepare($sql);


$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./memCenter.php");
    $_SESSION['mbNick'] = $_POST['mbNick'];
    echo "個人資料更新成功";
} else {
    header("Refresh: 3; url=./memCenter.php");
    echo "沒有任何更新";
}
