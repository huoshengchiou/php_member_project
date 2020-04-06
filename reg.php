<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="./newReg.php" method="POST" id="regForm">
    <!-- value是預先填值 -->
    使用者帳號:<input type="text" name="mbAccount" value="" placeholder="必填"/><br />
    真實姓名:<input type="text" name="mbName" value="" placeholder="必填"/><br />
    密碼設定 :<input type="password" name="mbPassword" value="" placeholder="必填" /><br />
    密碼再次確認:<input type="password" name="mbPassword2" value="" placeholder="必填"/><br />
    遊戲暱稱:<input type="text" name="mbNick" value="" /><br />
    居住國家:<input type="text" name="mbCountry" value="" /><br />
    Email:<input type="text" name="mbEmail" value="" placeholder="必填"/><br />
    手機號碼:<input type="text" name="mbPh" value="" placeholder="必填"/><br />
    使用載具/<input type="text" name="mbInvoice" value="" /><br />
    <label for="">性別:</label>
    <label for="Female">Female</label>
    <input type="radio" name="mbGender" value="Female" >
    <label for="Male">Male</label>
    <input type="radio" name="mbGender" value="Male" >
    <br />

    <!-- 性別:<input type="text" name="mbGender" value="" /><br /> -->
    西元出生/年/月/日:<input type="text" name="mbBd" value="" placeholder="必填"/><br />
    個人描述:<textarea name="mbDes" id="" cols="30" rows="10"></textarea><br />
    <input type="submit" value="註冊" />
    </form>
</body>
</html>