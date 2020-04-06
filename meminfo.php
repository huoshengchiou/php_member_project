<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    #value{
        width: 200px;
        height: 50px;
        border-bottom: 1px solid black;
    }
    #value>input{
        width : 100%;
    }
    
    
    
    </style>
</head>
     
<body>
    <div id="formpart">

        <div id="value">
        <h5>勇者帳號</h5>
        <?php echo $arr['mbAccount']; ?>
        </div>
        
        <div id="value">
        <h5>勇者名稱</h5>
        <?php echo $arr['mbName']; ?>    
        </div>

        <div id="value">
        <h5>性別</h5>
        <?php echo $arr['mbGender']; ?>
        </div>

        <div id="value">
        <h5>勇者暱稱</h5>
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

        <div id="value">
        <h5>英雄稱號</h5>
        <textarea name="mbDes"><?php echo $arr['mbDes']; ?></textarea>
        </div>
    </div>


















    <!-- keep--------------------------------------------- -->

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











            <tr>
                <td class="border" colspan="6">沒有資料</td>
            </tr>




</body>
</html>