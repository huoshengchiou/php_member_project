<?php
$_SESSION["mbNick"]="";
if (!isset($_SESSION["mbNick"])||$_SESSION["mbNick"]==""){
    // echo "hello";
    $_SESSION["mbNick"] = '不知名的勇者';
}
$_SESSION["mbID"] = 'M027';

?>

<!DOCTYPE HTML>
<!-- Tandem_member_center -->
<html>
	<head>
		<title>Tandem</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <style>
            /* .wrapper{
                display: flex;

            } */
         #form_part{
             width: 200px;
             /* height: 200px; */
             background: blue;
             position: absolute;
             left:50vw;
         }
        
        
        </style>
	</head>
	<body>
        <div class="wrapper">
        <div id="form_part">
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
            $_SESSION["mbID"]
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
        </tfoo>
    </table>
    
    <input type="hidden" name="serial" value="<?php echo (int)$_GET['serial']; ?>">
</form> 
    























        </div>
        <div class="is-preload">

		<!-- Header -->
			<header id="header">
                <h1>Tandem</h1>
                <?php 
                 echo '<p style="writing-mode: vertical-rl;">'.$_SESSION["mbNick"].',你好!'.'</p>';

                 ?>
				<!-- <p>A simple template for telling the world when you'll launch<br />
				your next big thing. Brought to you by <a href="http://html5up.net">HTML5 UP</a>.</p> -->
			</header>

        <!-- Signup Form -->
        <form id="demo signup-form">
        <input type="text" id="nickname">
         <button type="button" id="btn_ajax">尋找同伴</button>
        </form>
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
            <script src="assets/js/main.js"></script>
        
     </div>
    </body>
   
</html>