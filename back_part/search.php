<?php
require_once("./db.inc.php");


// $sql = "SELECT `serial`,`mbID`, `mbAccount`, `mbPassword`, `mbName`, `mbNick`,
//                         `mbCountry`, `mbEmail`, `mbPh`,`mbInvoice`,`mbGender`,`mbBd`,`mbDes`
//                 FROM `mbinfo`
//                 ORDER BY `mbID` ASC
//                 -- 限制資料筆數
//                 LIMIT ?, ? ";

//SELECT一定要跟著double quote才是正確語法

$sql = "SELECT * 

FROM `mbinfo` 

WHERE `mbNick` like CONCAT('%',?,'%')

ORDER BY `mbID` ASC

";

$arrParam = [

    '一'
];



$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);


$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($arr);
echo "</pre>";
exit();





?>