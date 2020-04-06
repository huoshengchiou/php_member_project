<?php

// $i = "koko";

// print_r($i);

// echo "<h1>love</h1>";

require_once("./db.inc.php");



//SELECT一定要跟著double quote才是正確語法

$sql = "SELECT *

FROM `mbinfo`

WHERE `mbNick` like CONCAT('%',?,'%')

ORDER BY `mbID` ASC

";

$arrParam = [

    $_POST['keyin'],
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if ($stmt->rowCount() > 0) {
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<h1>' . $arr[0]['mbName'] . '</h1>';
}else{

    echo '<h1>' . '查無此人' . '</h1>';
}
// echo "<pre>";
// print_r($arr);
// echo "</pre>";
// exit();









?>
