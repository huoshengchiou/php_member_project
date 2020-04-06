<?php
//引入判斷是否登入機制
require_once './checkSession.php';

//引用資料庫連線
require_once './db.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BackAdmin</title>
    <!-- jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">



    <style>
   


    a{
   text-decoration: none;
   padding: 5px;
   background: white;
   color: black;
   font-weight:700;
   border-radius: 5px;
    }

a:hover{
  color:gray;
}  
h1{
  font-size: 30px;
  color: black;
  text-transform: uppercase;
  font-weight: 500;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  /* table-layout: fixed; */
}

.tbl-header{
  margin-top: 10px;
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:160px;
  overflow-x:auto;
  margin-top: 0px;
  border: 3px solid rgba(255,255,255,0.3);
}
.tbl-content>input{
  width:30%;
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 700;
  font-size: 16px;
  color: black;
  text-transform: uppercase;
}
input{
  border: 0px ;
}
/* td{
  padding-left: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 16px;
  color: black;
  border-bottom: solid 1px rgba(255,255,255,0.1);
} */


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #84fab0, #8fd3f4);
  background: linear-gradient(to right, #84fab0, #8fd3f4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 80px;
}


#pwd{
    font-size: 12px;
}


.a-edit{
    text-decoration: none;
    color: black;
    padding: 5px;
    background-color: #81C7D4;
    border-radius: 5px;
    margin: 0 5px;
}
.a-edit:hover{
    background-color: #0089A7;
}
.a-del{
    text-decoration: none;
    color: grey;
    padding: 5px;
    background-color: #FEDFE1;
    border-radius: 5px;
    margin: 0 5px;

}
.a-del:hover{
    background-color: #F4A7B9;
}
/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 10px;
}
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}

.sub{
  background-color: #F4A7B9
}
#edit-btn{
  
}
#edit-btn:hover{
  color:gray;
}

    </style>
</head>
<body>
<section>
  <!--for demo wrap-->
  <h1>Tandem BackAdmin</h1>
   <a href="./newadmin.php">管理首頁</a>|<a href="./logOut.php?logout=1">登出</a>
  <div class="tbl-header">
  <form name="myForm" method="POST" action="UpdateEdit.php">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>會員編號</th>
            <th>會員帳號</th>
            <th>會員名稱</th>
            <th>性別</th>
            <th>會員暱稱</th>
            <th>國籍</th>
            <th>Email</th>
            <th>手機</th>
            <th>發票載具/</th>
            <th>出生年月日</th>
            <th>個人描述</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <?php
//SQL 敘述
$sql = "SELECT `serial`, `mbID`, `mbAccount`, `mbPassword`, `mbName`, `mbNick`, `mbCountry`, `mbEmail`, `mbPh`,
                `mbInvoice`, `mbGender`, `mbBd`, `mbDes`
                FROM `mbinfo`
                WHERE `serial` = ?";

//設定繫結值
$arrParam = [(int) $_GET['serial']];

//查詢
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
// <input type="text" name="studentId" value="<?php echo $arr[0]['studentId'];
//  把原來arr用的[]加入fetch內

if (count($arr) > 0) {
    ?>
            <tr>
                <td>
                <input style="width:50%;" type="text" name="mbID" value="<?php echo $arr['mbID']; ?>" maxlength="4"/>
                </td>
                <td>
                <?php echo $arr['mbAccount']; ?>
                </td>
                <td class="border">
                <?php echo $arr['mbName']; ?>
                </td>
                <td class="border">
                <?php echo $arr['mbGender']; ?>
                </td>
                <td class="border">
                    <input style="width:60%;" type="text" name="mbNick" value="<?php echo $arr['mbNick']; ?>" maxlength="40" />
                </td>
                <td class="border">
                    <input  style="width:40%;" type="text" name="mbCountry" value="<?php echo $arr['mbCountry']; ?>" maxlength="20" />
                </td>
                <td class="border">
                <input style="width:80%;" type="text" name="mbEmail" value="<?php echo $arr['mbEmail']; ?>" maxlength="20" />
                </td>
                <td class="border">
                <input style="width:80%;" type="text" name="mbPh" value="<?php echo $arr['mbPh']; ?>" maxlength="15"/>
                </td>
                <td class="border">
                <input style="width:50%;" type="text" name="mbInvoice" value="<?php echo $arr['mbInvoice']; ?>" maxlength="9"/>
                </td>
                <td class="border">
                <input style="width:80%;" type="text" name="mbBd" value="<?php echo $arr['mbBd']; ?>" maxlength="20"/>
                </td>
                <td class="border">
                    <textarea style="width:100%;height:100px;"name="mbDes"><?php echo $arr['mbDes']; ?></textarea>
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
            <td class="border" colspan="11">
            <input style="padding:10px; font-weight:700; font-size:16px; border-radius:5px;" id="edit-btn" type="submit" name="smb" value="修改"></td>
            </tr>
        </tfoot>
        <!-- 隱藏傳值，資料庫管理採取唯一值 -->
        <input type="hidden" name="serial" value="<?php echo (int) $_GET['serial']; ?>">
        </form>
  </div>
</section>






<script>// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>



</body>
</html>
