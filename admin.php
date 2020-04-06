<?php
// 登入檢驗歸納在checksession
// 一開始掛入，也掛入database連線
// require_once("./checkSession.php");
require_once "./db.inc.php";

//SQL 敘述: 取得 students 資料表總筆數
// 去數student ID的欄位
// count(`studentId`)
$sqlTotal = "SELECT count(`mbID`) FROM `mbinfo`";

//取得總筆數                      fectch資料後輸出值，可以先把sql語法放給資料庫，確認回傳的東西，FETCH_ASSO是以key
$total = $pdo->query($sqlTotal)->fetch(PDO::FETCH_NUM)[0];

//每頁幾筆
$numPerPage = 10;

// 總頁數    ceil無條件進位取值，多於5會變成兩頁
$totalPages = ceil($total / $numPerPage);

//目前第幾頁
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

//若 page 小於 1，則回傳 1
$page = $page < 1 ? 1 : $page;

?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員名單</title></title>
    <style>
    .border {
        border: 1px solid;
    }
    .w200px {
        width: 200px;
    }
    </style>
</head>
<body>
<!-- 掛入nav bar -->
<?php require_once "./templates/title.php";?>

<hr />
<form name="myForm" method="POST" action="deletes.php">

    <table class="border">
        <thead>
            <tr>
                <th class="border">mbID</th>
                <th class="border">mbAccount</th></th>
                <th class="border">mbPassword</th>
                <th class="border">mbName</th>
                <th class="border">mbNick</th>
                <th class="border">mbCountry</th>
                <th class="border">mbEmail</th>
                <th class="border">mbPh</th>
                <th class="border">mbInvoice</th>
                <th class="border">mbGender</th>
                <th class="border">mbBd</th>
                <th class="border">mbDes</th>

            </tr>
        </thead>
        <tbody>
        <!-- 計算分頁 -->
        <?php
//SQL 敘述
$sql = "SELECT `serial`,`mbID`, `mbAccount`, `mbPassword`, `mbName`, `mbNick`,
                        `mbCountry`, `mbEmail`, `mbPh`,`mbInvoice`,`mbGender`,`mbBd`,`mbDes`
                FROM `mbinfo`
                ORDER BY `mbID` ASC
                -- 限制資料筆數
                LIMIT ?, ? ";
//  echo"<pre>";
//  print_r($sql);
//  echo"</pre>";

//設定繫結值   LIMIT 資料開始的頁數(0開始), 資料顯示筆數
$arrParam = [($page - 1) * $numPerPage, $numPerPage];

//查詢分頁後的學生資料
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

//資料數量大於 0，則列出所有資料
if ($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($arr); $i++) {
        ?>
            <tr>
            <!-- <td class="border">
            <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['id'] ?>">
            </td> -->
            <td class="border"><?php echo $arr[$i]['mbID'] ?></td>
            <td class="border"><?php echo $arr[$i]['mbAccount'] ?></td>
            <td class="border"><?php echo $arr[$i]['mbPassword']; ?></td>
            <td class="border"><?php echo $arr[$i]['mbName']; ?></td>
            <td class="border"><?php echo $arr[$i]['mbNick']; ?></td>
            <td class="border"><?php echo $arr[$i]['mbCountry']; ?></td>
            <td class="border"><?php echo $arr[$i]['mbEmail']; ?></td>
            <td class="border"><?php echo $arr[$i]['mbPh']; ?></td>
            <td class="border"><?php echo $arr[$i]['mbInvoice']; ?></td>
            <td class="border"><?php echo $arr[$i]['mbGender']; ?></td>
            <td class="border"><?php echo $arr[$i]['mbBd']; ?></td>
                                 <!-- 讓敘述變成分段 -->
            <td class="border"><?php echo nl2br($arr[$i]['mbDes']); ?></td>


                <td class="border">
                     <!-- 利用GET把id帶到第二個頁面 -->
                    <a href="./edit.php?serial=<?php echo $arr[$i]['serial']; ?>">編輯</a>
                    <a href="./delete.php?deleteSerial=<?php echo $arr[$i]['serial']; ?>">刪除</a>
                </td>
            <?php
}
}
?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="11">
                <?php for ($i = 1; $i <= $totalPages; $i++) {?>
                    <a href="?page=<?=$i?>"><?=$i?></a>
                <?php }?>
                </td>
            </tr>
        </tfoot>
    </table>
    <input type="submit" name="smb" value="刪除">
    <a type="button" href="./new.php">新增頁面</a>
    </form>
</body>
</html>
