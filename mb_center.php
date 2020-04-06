<?php
// 補身分登入驗證
session_start();
// echo"<pre>";
// print_r($_SESSION);
// echo"</pre>";
// exit();
require_once "./db.inc.php";
//之後可以寫入check判斷
$_SESSION["mbNick"] = "";
if (!isset($_SESSION["mbNick"]) || $_SESSION["mbNick"] == "") {
    echo "hello";
    $_SESSION["mbNick"] = '不知名的勇者';
}

$_SESSION["mbID"] = 'M027';
?>






<?php
//引入判斷是否登入機制
// require_once('./checkSession.php');
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員中心</title>
    <style>
    .border {
        border: 1px solid;
    }
    .w200px {
        width: 200px;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>



<!-- 歡迎字串 -->

<?php
echo '<h5>' . $_SESSION["mbNick"] . ',你好!' . '</h5>';

?>
<hr />

<h5>你所登入的勇者資料</h5>

<form name="myForm" method="POST" action="./memupdateEdit.php" enctype="multipart/form-data">
    <table class="border">
        <tbody>
        <?php
//SQL 敘述
$sql = "SELECT `serial`, `mbID`, `mbAccount`, `mbPassword`, `mbName`, `mbNick`, `mbCountry`, `mbEmail`, `mbPh`,
                `mbInvoice`, `mbGender`, `mbBd`, `mbDes`
                FROM `mbinfo`
                WHERE `mbID` = ?";

//設定繫結值
$arrParam = [
    $_SESSION["mbID"],
];

//查詢
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
// echo"<pre>";
// print_r($arr);
// echo"</pre>";
// exit();

// <input type="text" name="studentId" value="<?php echo $arr[0]['studentId'];
//  把原來arr用的[]加入fetch內

if (count($arr) > 0) {
    ?>
            <tr>
                <td class="border">使用者編號</td>
                <td class="border">
                <?php echo $arr['mbID']; ?>
                </td>
            </tr>
            <tr>
                <td class="border">使用者帳號</td>
                <td class="border">
                <?php echo $arr['mbAccount']; ?>
                </td>
            </tr>
            <tr>
                <td class="border">mbName</td>
                <td class="border">
                    <?php echo $arr['mbName']; ?>
                </td>
            </tr>
            <tr>
                <td class="border">mbGender</td>
                <td class="border">
                <?php echo $arr['mbGender']; ?>

                </td>
            </tr>
            <tr>
                <td class="border">mbNick</td>
                <td class="border">
                    <input type="text" name="mbNick" value="<?php echo $arr['mbNick']; ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">mbCountry</td>
                <td class="border">
                    <input type="text" name="mbCountry" value="<?php echo $arr['mbCountry']; ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">mbEmail</td>
                <td class="border">
                    <textarea name="mbEmail"><?php echo $arr['mbEmail']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="border">mbPh</td>
                <td class="border">
                    <textarea name="mbPh"><?php echo $arr['mbPh']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="border">mbInvoice /</td>
                <td class="border">
                    <textarea name="mbInvoice"><?php echo $arr['mbInvoice']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="border">mbBd</td>
                <td class="border">
                    <textarea name="mbBd"><?php echo $arr['mbBd']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="border">mbDes</td>
                <td class="border">
                    <textarea name="mbDes"><?php echo $arr['mbDes']; ?></textarea>
                </td>
            </tr>


        <?php
} else {
    ?>
            <tr>
                <td class="border" colspan="6">沒有資料</td>
            </tr>
        <?php
}
?>
        </tbody>
        <tfoot>
            <tr>
            <td class="border" colspan="6"><input type="submit" name="smb" value="修改"></td>
            </tr>
        </tfoo>
    </table>

    <input type="hidden" name="serial" value="<?php echo (int) $_GET['serial']; ?>">
</form>
<div id="mytarget"></div>
<!-- 搜尋欄 -->
<form id="demo">
    暱稱：<input type="text" id="nickname">
    <button type="button" id="btn_ajax">尋找好友</button>
</form>
<script>
 $(document).on('click', 'button#btn_ajax', function(){
            $.ajax({
                method: 'POST', // GET
                url: "lookf.php", // 23-1-1.php?getMethod=1
                // 指定回傳檔案格式，自動轉JOSN或HTML
                //另外一邊表頭已經設定就不用再開
                // datatype:'json',
                data: {
                    //組成POST到後頁的key/value pair
                    nickname: $("#nickname").val(),
                    postMethod: "1"
                }
            }).done(function(data) {
                let arr = JSON.parse(data);
                // console.log(arr);
                // console.log(arr[0]['mbNick']);
                //將回傳的array，變成字串顯示
                for (let i = 0; i < arr.length; i++){
                    $('div#mytarget').append(
                `mbNick:${arr[i]['mbNick']}<br>
                國家:${arr[i]['mbCountry']}<br>
                勇者描述:${arr[i]['mbDes']}<br>`
                );
                }

            });
        });




</script>



</body>
</html>










