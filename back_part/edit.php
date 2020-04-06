<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
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
<?php require_once('./templates/title.php'); ?>
<hr />

<form name="myForm" method="POST" action="./updateEdit.php" enctype="multipart/form-data">
    <table class="border">
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `serial`, `mbID`, `mbAccount`, `mbPassword`, `mbName`, `mbNick`, `mbCountry`, `mbEmail`, `mbPh`,   
                `mbInvoice`, `mbGender`, `mbBd`, `mbDes` 
                FROM `mbinfo` 
                WHERE `serial` = ?";

        //設定繫結值
        $arrParam = [(int)$_GET['serial']];
        
        //查詢
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        // <input type="text" name="studentId" value="<?php echo $arr[0]['studentId'];                                      
        //  把原來arr用的[]加入fetch內

        if(count($arr) > 0) {
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
        } 
        else {
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
        </tfoot>
    </table>

    <input type="hidden" name="serial" value="<?php echo (int)$_GET['serial']; ?>">
    <!-- HTML 表單有一個隱藏欄位是 input type=hidden，隱藏欄位的功能是用來儲存一些表單資訊，而不想要直接顯示在表單上，例如一些特定的參數、填寫時間戳記、登入記錄 ... 等，有許多種的應用都可以使用隱藏欄位來記錄，隱藏欄位的值（value）也會傳遞給後端的程式，每一個表單可以安插許多不同名稱的隱藏欄位，傳遞各種表單資訊。 -->
</form>
</body>
</html>