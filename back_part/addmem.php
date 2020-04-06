<?php
require_once("./db.inc.php");


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
  height:150px;
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

    </style>
</head>
<body>
<section>
  <!--for demo wrap-->
  <h1>Tandem BackAdmin</h1>
   - <a href="./newadmin.php">會員總覽</a>| <a href="">會員查詢</a>| <a href="./logOut.php?logout=1">登出</a>
  <div class="tbl-header">
  <form name="myForm" method="POST" action="insert.php">
    <table cellpadding="0" cellspacing="0" border="0">
   
      <thead>
        <tr>
            <th class="border">學號</th>
            <th class="border">姓名</th>
            <th class="border">性別</th>
            <th class="border">生日</th>
            <th class="border">手機號碼</th>
            <th class="border">個人描述</th>
            <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <tr>
            <td class="border">
                <input type="text" name="studentId" id="studentId" value="" maxlength="9" />
            </td>
            <td class="border">
                <input type="text" name="studentName" id="studentName" value="" maxlength="10" />
            </td>
            <td class="border">
                <select name="studentGender" id="studentGender">
                    <option value="男" selected>男</option>
                    <option value="女">女</option>
                </select>
            </td>
            <td class="border">
                                                                                         <!-- 限制輸入字元，避免傳入惡意碼 -->
                <input type="text" name="studentBirthday" id="studentBirthday" value="" maxlength="10" />
            </td>
            <td class="border">
                <input type="text" name="studentPhoneNumber" id="studentPhoneNumber" value="" maxlength="10" />
            </td>
            <td class="border">
                                                    <!-- in line調整寬高 -->
                <textarea  style="width:300px;height:100px; border: 0px;" name="studentDescription" col="100" row="100"></textarea>
            </td>
            <!-- <td>
            <input class="sub"type="submit" name="smb" value="新增">
            </td> -->
            
        </tr>
        </tbody>
        <tfoot>
        <tr>
             
            <td class="border" colspan="7">
            <input class="sub"type="reset" name="clear" value="清空欄位">
              <input class="sub"type="submit" name="smb" value="新增"></td>
        </tr>
        </tfoot>
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
