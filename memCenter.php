<?php
// session_start();
require_once './checkSession.php';
require_once './db.inc.php';

// 確認nickname是否存在，不存在導入預設
if (!isset($_SESSION["mbNick"]) || $_SESSION["mbNick"] == "") {
    $_SESSION["mbNick"] = '不知名的勇者';
}

?>

<!DOCTYPE HTML>
<!-- Tandem_member_center -->
<html>
	<head>
		<title>Tandem</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <style>
         body::-webkit-scrollbar {
         display: none;
         }
        #wrapper{
                min-width:960px;
                /* min-height: 1000px; */
                padding-top:200px;
                display: flex;
                /* position:relative; */
                margin: 0 auto;
                justify-content: space-around;

        }
        #left-part{
            width:320px
        }

        #selfimg{
            width:200px;
            height:200px;
            background-image:url("./images/img5.jpg");
            background:cover center center;
            border-radius: 0  50px 0  50px;
            margin-bottom: 10px;

        }
        #form_part{

             height: 200px;
             bottom: 3vh; */
             text-align: center;

         }

        #value{
        width: 200px;
        height: 70px;
        padding: 5px;
        }
        #value>input{
        width : 100%;
        height: 40%;
        }
        #value>h5{
            font-size: 16px;
            margin-bottom: 0px;
        }
        .is-preload{
           left : 5vw;
           top : 1vh;
        }
        #divline{
            border-bottom: 5px dotted white;
        }
        #header{

            margin-left: 200px;
        }
        #searchBox{

           width: 15vw;
           border: 0px;
        }
        #mytarget{
            width: 255px;
            height: 280px;
            font-size: 12px;
            font-weight:300;
            color: white;
            overflow: auto;
            margin-top: 20px;
            margin-left: 43px;
        }
        #nickname{
            width:100%;
            margin-left:40px;
        }
        #mbdes{
        width: 200px;
        height: 200px;
        margin-bottom:10px;
        border-bottom: 5px dotted white;
        }
        #logout{
            margin-left:67%;
            padding: 5px;
            background: #1cb495;
            border-radius: 5px;
            color: white;
        }

        #search_bg{
            width:350px;
            height:450px;
            background-image:url("./images/search.png");
            background-size: cover;
            padding-top:40px;

        }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
        <div id="wrapper">

        <div id="left-part">
         <!-- <div class="is-preload"> -->
             <div id="top">

		<!-- Header -->

                <h1 style="font-family:'Lobster', cursive;" >Tandem</h1>
                <?php
echo '<p>' . $_SESSION["mbNick"] . '<br>你好!' . '</p>';

?>
                 <div id="selfimg"></div>
                 <a id="logout" href="./memLogout.php?logout=1">登出</a>
			<!-- <header id="header">
			</header> -->

        <!-- Signup Form -->


			<!-- <form id="signup-form" method="post" action="#">
				<input type="email" name="email" id="email" placeholder="Email Address" />
				<input type="submit" value="Sign Up" />
			</form> -->

		<!-- Footer
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Untitled.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</footer> -->

        <!-- Scripts -->
        </div>
        <div id="searchBox">
       <!-- 顯示搜尋資料 -->
       <div id="search_bg">

        <div id="mytarget"></div>
        </div>
        <form id="demo signup-form">
        <input type="text" id="nickname" placeholder="請輸入玩家暱稱">
        <button style="margin-top:10px; margin-left:35px;" type="button" id="btn_ajax">尋找同伴</button>
        </form>
        </div>
        </div>









<!-- -----------------right-part------------------- -->

        <div id="form_part">
        <form name="myForm" method="POST" action="./memupdateEdit.php" enctype="multipart/form-data">
    <!-- <table class="border">
        <tbody> -->
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


if (count($arr) > 0) {
    ?>


        <div id="value">
        <h5>玩家帳號</h5>
        <p><?php echo $arr['mbAccount']; ?></p>
        </div>

        <div id="value">
        <h5>玩家名稱</h5>
        <?php echo $arr['mbName']; ?>
        </div>

        <div id="value">
        <h5>性別</h5>
        <?php echo $arr['mbGender']; ?>
        </div>

        <div id="value">
        <h5>玩家暱稱</h5>
        <input type="text" name="mbNick" value="<?php echo $arr['mbNick']; ?>" maxlength="10" />
        </div>

        <div id="value">
        <h5>來自國度</h5>
        <input type="text" name="mbCountry" value="<?php echo $arr['mbCountry']; ?>" maxlength="10" />
        </div>

        <div id="value">
        <h5>Email</h5>
        <input type="text" name="mbEmail" value="<?php echo $arr['mbEmail']; ?>" maxlength="40" >
        </div>

        <div id="value">
        <h5>手機號碼</h5>
        <input type="text" name="mbPh" value="<?php echo $arr['mbPh']; ?>" maxlength="15" >
        </div>

        <div id="value">
        <h5>手機載具</h5>
        <input type="text" name="mbInvoice" value="<?php echo $arr['mbInvoice']; ?>" maxlength="15" >
        </div>

        <div id="value">
        <h5>西元出生年/月/日</h5>
        <input type="text" name="mbBd" value="<?php echo $arr['mbBd']; ?>" maxlength="15" >
        </div>

        <div id="mbdes">
        <h5>玩家自我描述</h5>
        <textarea name="mbDes" style =" width:197px; height:145px; resize: none; margin-top:10px;"><?php echo $arr['mbDes']; ?></textarea>
        </div>


        <?php
} else {
    ?>
            <h4>沒有資料</h4>
        <?php
}
?>
    
            <input style="width:86px; height:70px; padding-bottom: 0px; text-algin:center;" type="submit" name="smb" value="修改"></td>
       


    <input type="hidden" name="serial" value="<?php echo (int) $_GET['serial']; ?>">
</form>
        </div>


     </div>







     <script src="assets/js/main.js"></script>






     <script>




  //暱稱尋找玩家功能

 $(document).on('click', 'button#btn_ajax', function(){
            $.ajax({
                method: 'POST', 
                url: "lookf.php", 
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
               
                for (let i = 0; i < arr.length; i++){
                    $('div#mytarget').append(


                `勇者簡稱:<br>${arr[i]['mbNick']}<br>
                國家:${arr[i]['mbCountry']}<br>
                勇者描述:${arr[i]['mbDes']}<br>`




                );
                }
                //8秒執行搜尋視窗消除
                setTimeout(clearDiv, 8000);
            });
        });

function clearDiv(){

    $('div#mytarget').html('');

};

</script>
    </body>

</html>