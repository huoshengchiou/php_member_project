<?php
require_once("./db.inc.php");



//SELECT一定要跟著double quote才是正確語法

$sql = "SELECT *

FROM `mbinfo`

WHERE `mbAccount` like CONCAT('%',?,'%')

-- AND    `mbCountry` like CONCAT('%',?,'%')

-- AND    `mbEmail` like CONCAT('%',?,'%')

-- AND    `mbBd` like CONCAT('%',?,'%')

ORDER BY `mbAccount` ASC

";

$arrParam = [

    // $_POST['keyin'],
    // $_POST['keyin'],
    // $_POST['keyin'],
    $_POST['keyin']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if ($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // html不重複結構
 ?>
    <table cellpadding="0" cellspacing="0" border="0">
    <tbody>
<?php
    for ($i = 0; $i < count($arr); $i++) {
        ?>
            <tr>
            <!-- <td class="border">
            <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['id'] ?>">
            </td> -->
            <td><?php echo $arr[$i]['mbID'] ?></td>
            <td><?php echo $arr[$i]['mbAccount'] ?></td>
            <td id="pwd"><?php echo $arr[$i]['mbPassword']; ?></td>
            <td><?php echo $arr[$i]['mbName']; ?></td>
            <td><?php echo $arr[$i]['mbNick']; ?></td>
            <td><?php echo $arr[$i]['mbCountry']; ?></td>
            <td><?php echo $arr[$i]['mbEmail']; ?></td>
            <td><?php echo $arr[$i]['mbPh']; ?></td>
            <td><?php echo $arr[$i]['mbInvoice']; ?></td>
            <td><?php echo $arr[$i]['mbGender']; ?></td>
            <td><?php echo $arr[$i]['mbBd']; ?></td>
                                 <!-- 讓敘述變成分段 -->
            <td class="border"><?php echo nl2br($arr[$i]['mbDes']); ?></td>


                <td class="border">
                     <!-- 利用GET把id帶到第二個頁面 -->
                    <a class="a-edit" href="./editmem.php?serial=<?php echo $arr[$i]['serial']; ?>">編輯</a>
                    <a class="a-del" href="./memdel.php?deleteSerial=<?php echo $arr[$i]['serial']; ?>">刪除</a>
                </td>
            <?php
}
?>
</tbody>
</table>
<?php
}
else{

    echo '<h1>' . '請重新輸入檢索資料' . '</h1>';
}






?>