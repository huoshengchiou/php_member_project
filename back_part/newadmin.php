<?php

require_once "./checkSession.php";

require_once "./db.inc.php";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BackAdmin</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->




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
  table-layout: fixed;
}

.tbl-header{
  margin-top: 10px;
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:600px;
  overflow-x:auto;
  margin-top: 0px;
  border: 3px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 700;
  font-size: 16px;
  color: black;
  text-transform: uppercase;
}
td{
  padding-left: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 16px;
  color: black;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #84fab0, #8fd3f4);
  background: linear-gradient(to right, #84fab0, #8fd3f4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}







/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: black;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
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


    </style>
</head>
<body>
<section>
  <!--for demo wrap-->
  <h1>Tandem BackAdmin</h1>
  <!-- | <a href="./addmem.php">新增</a>  -->
  <a href="./newadmin.php">管理首頁</a> | <a href="./logOut.php?logout=1">登出</a>

  <div class="tbl-header">
  <form name="myForm" method="POST" action="deletes.php">
    <table cellpadding="0" cellspacing="0" border="0">

      <thead>
        <tr>
                <th>會員編號</th>
                <th>會員帳號<input style="width:100%;"type="text" id="keyin" placeholder="帳號查詢"></th>
                
                <th>會員密碼</th>
                <th>會員名稱</th>
                <th>會員暱稱<input style="width:100%;" id="inputNick" name="inputNick" type="text" value="" placeholder="暱稱查詢"></th>
                <th>國籍</th>
                <th>Email<input id="inputEmail"  style="width:100%;" name="inputEmail" type="text" value="" placeholder="Email查詢"></th>
                <th>手機</th>
                <th>發票載具</th>
                <th>性別</th>
                <th>出生年月日<input id="inputBd" style="width:100%;" name="inputBd" type="text" value="" placeholder="生日查詢"></th>
                <th>個人描述</th>
                <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content" id="showData">
    <table cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <!-- 計算分頁 -->
        <?php
//SQL 敘述
$sql = "SELECT `serial`,`mbID`, `mbAccount`, `mbPassword`, `mbName`, `mbNick`,
                        `mbCountry`, `mbEmail`, `mbPh`,`mbInvoice`,`mbGender`,`mbBd`,`mbDes`
                FROM `mbinfo`
                ORDER BY `mbID` ASC
                -- 限制資料筆數
                ";
// LIMIT ?, ? ";
//  echo"<pre>";
//  print_r($sql);
//  echo"</pre>";

//設定繫結值   LIMIT 資料開始的頁數(0開始), 資料顯示筆數
// $arrParam = [($page - 1) * $numPerPage, $numPerPage];
$arrParam = [];

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
            <td><?php echo $arr[$i]['mbID'] ?></td>
            <td><?php echo $arr[$i]['mbAccount'] ?></td>
            <td id="pwd"><p style="word-wrap:break-word;
            "><?php echo $arr[$i]['mbPassword']; ?></p></td>
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
}
?>
        </tbody>

        <!-- newadminleft -->




    </table>

    </form>
    <!-- </table> -->
  </div>
</section>


<!-- follow me template -->
<div class="made-with-love">
  Made with
  <i>♥</i> by
  <a target="_blank" href="https://codepen.io/nikhil8krishnan">Nikhil Krishnan</a>
</div>




<script>// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();

//inputAccount
$('#keyin').on('keyup', function(e){
e.preventDefault();

$.ajax({
    type:'POST',
    url:'multiple.php',
    beforeSend:function(){
        // append可以實現()內的html
        $('#showData').append('<div id="load">loading</div>');
    },
    // timeout:6000,
    complete:function(){
        $('#load').remove();
    },
    //POST data
    data:{
        keyin:$('#keyin').val(),
        inputNick:$('#inputNick').val(),
        inputEmail:$('#inputEmail').val(),
        inputBd:$('#inputBd').val()
    },
    success:function(data){
     $('#showData').html(data);
    },
    fail:function(){
        $('#showData').append('<div id="error">someting wrong</div>');
    }
//ajax-end
});

});





// inputNick_li
$('#inputNick').on('keyup', function(e){
e.preventDefault();

$.ajax({
    type:'POST',
    url:'multiple.php',
    beforeSend:function(){
        // append可以實現()內的html
        $('#showData').append('<div id="load">loading</div>');
    },
    // timeout:6000,
    complete:function(){
        $('#load').remove();
    },
    //POST data
    data:{
        // 抓取既有的值
        keyin:$('#keyin').val(),
        inputNick:$('#inputNick').val(),
        inputEmail:$('#inputEmail').val(),
        inputBd:$('#inputBd').val()

        },
    success:function(data){
     $('#showData').html(data);
    },
    fail:function(){
        $('#showData').append('<div id="error">someting wrong</div>');
    }
//ajax-end
});

});


// inputEmail_li
$('#inputEmail').on('keyup', function(e){
e.preventDefault();

$.ajax({
    type:'POST',
    url:'multiple.php',
    beforeSend:function(){
        // append可以實現()內的html
        $('#showData').append('<div id="load">loading</div>');
    },
    // timeout:6000,
    complete:function(){
        $('#load').remove();
    },
    //POST data
    data:{
          // 抓取既有的值
        keyin:$('#keyin').val(),
        inputNick:$('#inputNick').val(),
        inputEmail:$('#inputEmail').val(),
        inputBd:$('#inputBd').val()},
    success:function(data){
     $('#showData').html(data);
    },
    fail:function(){
        $('#showData').append('<div id="error">someting wrong</div>');
    }
//ajax-end
});

});


// inputBd_li
$('#inputBd').on('keyup', function(e){
e.preventDefault();

$.ajax({
    type:'POST',
    url:'multiple.php',
    beforeSend:function(){
        // append可以實現()內的html
        $('#showData').append('<div id="load">loading</div>');
    },
    // timeout:6000,
    complete:function(){
        $('#load').remove();
    },
    //POST data
    data:{  // 抓取既有的值
        keyin:$('#keyin').val(),
        inputNick:$('#inputNick').val(),
        inputEmail:$('#inputEmail').val(),
        inputBd:$('#inputBd').val()},
    success:function(data){
     $('#showData').html(data);
    },
    fail:function(){
        $('#showData').append('<div id="error">someting wrong</div>');
    }
//ajax-end
});

});

















</script>



</body>
</html>
