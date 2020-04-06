<?php

// require_once('./checkSession.php');
// require_once('./db.inc.php');

//分頁
$sqlTotal = "SELECT count(1)
             FROM `discount`";
$total = $pdo->query($sqlTotal)->fetch(PDO::FETCH_NUM)[0]; //取得總筆數
$numPerPage= 5; //每頁幾筆
$totalPages = ceil($total/$numPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1 ; //目前第幾頁
$page = $page < 1 ? 1 : $page; //若 page小於1 ，則回傳1

$sqlTotalCategories = " SELECT count(1) FROM `categories`";

$totalCategories = $pdo->query($sqlTotalCategories)->fetch(PDO::FETCH_NUM)[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Gelasio|Noto+Serif+TC|Playfair+Display&display=swap" rel="stylesheet">

    <title>Promotion</title>
    <style>
    body{
        font-family: 'Playfair Display', 'Noto Serif TC',serif;
        color:#F1F3F4;
    }
    form{
        /* margin-left:20px; */
        margin-top:20px;
        /* border:1px solid black; */
        width:1100px;
    }
    .tbody{
        height:300px;
    }
    a{
        text-decoration:none;
        color:#0C4842;
        border-radius:5px;
        display:block;
        /* margin: 5px 0; */
        font-size:14px;
    }
    .flex{
        display:flex;
    }
    .text-center{
        text-align:center;
    }
    .edit{
        height:20px;
        width:30px;
        background:#53ACA0;
        color:white;
        margin-right:5px;
        padding:5px 10px;

    }
    .delete{
        height:20px;
        width:30px;
        background:#C7473B;
        /* margin-left:4px; */
        color:white;
        padding:5px 10px;

    }
    .edit:hover{
        background:#316961; 
    }
    .delete:hover{
        background:#91332A; 
    }
    table{
        width:960px;
        border-collapse:collapse;
        margin: 10px auto;
    }

    thead tr td{
        /* background:#0C4842; */
        color: #0C4842;
        font-size:16px;
        font-weight:bold;
        padding:5px;
        border-bottom:2px solid #BEC23F;
    }
    
    tbody tr td{
        padding:5px;
        font-size:14px;
    }

    tbody tr:hover{
        cursor:pointer;
        background:#EAEAEA;
    }
    .offer{
        font-size:14px;
        font-weight:bold;
        color:#0C4842;
    }
    .page{
        border-top:2px solid #BEC23F;
        /* margin-top:20px; */
        /* padding-left:50px; */
    }
    .page-number{
        display:inline-block;
        border-radius:2px;
        font-size:14px;
        background:#BEC23F;
        /* border:1px solid #f0efef; */
        color:white;
        height:20px;
        width:15px; 
        text-align:center;
    }
    .page-number:hover{
        /* text-decoration:underline; */
        padding:2px;
        font-weight:bold;
    }
    .page-td{
        padding-left:40px;
       
    }
    .delete-input{
        display:block;
        border:none;
        height:30px;
        width:50px;
        padding:5px 10px;
        border-radius:5px;
        font-size:14px;
        margin-left:80px;
        margin-top:10px;
        /* padding-left:40px; */
    }

    
    </style>
</head>
<body>
<div class="flex-dash search">
<label for="search"><p>Search</p> </label>
<input type="text" name="search" placeholder="search" id="searchText" >
</div>
<?php
//若有建立優惠範圍，則顯示優惠清單

if($totalCategories > 0){
    
?>
    <form  action="./deleteIds.php" name="myForm" method="POST" >
        <table  id="tableDataResult"> 
        <!-- id要唯一 -->
            <thead>

                <tr>
                    <td class="text-center" style="width:10%;">選擇</td>
                    <td class="" style="width:15%;">折價券序號</td>
                    <td style="width:40%;">優惠活動</td>
                    <td class="text-center offer">折扣(%)</td>
                    <td style="width:10%;"></td>




                </tr>
            </thead>
            <tbody class="tbody">
            <?php
                 $sql = "SELECT 
                 `discount`.`discountId`,
                 `discount`.`discountName`,
                 `discount`.`discountNo`,
                 `discount`.`discountRange`,
                 `discount`.`discountImg`,
                 `discount`.`discountMinPrice`,
                 `discount`.`discountRate`,
                `discount`.`startDate`,
                `discount`.`dueDate`,
                `discount`.`discountAmt`,
                `discount`.`linkAct`,
                `discount`.`validDate`,
                `categories`.`categoryId`,
                `categories`.`categoryName`

                 FROM `discount` INNER JOIN `categories`
                 ON `discount`.`discountRange` = `categories`.`categoryId`
                 ORDER BY `discount`.`discountId` ASC
                 LIMIT ?,?";

            $arrParam=[
                ($page - 1) * $numPerPage, $numPerPage
            ];     

            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrParam);

            if($stmt->rowCount()>0){
                $arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
                for($i = 0; $i< count($arr); $i++){

               

            ?>
            <tr>
                <td class="text-center">
                <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['discountId'];?> ">
                
                </td>
                <td class=""><a class="" href="./prom-edit.php?editId=<?php echo $arr[$i]['discountId']?>"><?php echo $arr[$i]['discountNo']?></a></td>
                <td><a href="./prom-edit.php?editId=<?php echo $arr[$i]['discountId']?>"><?php echo $arr[$i]['discountName']?></a></td>
                <td class="text-center offer"><?php echo $arr[$i]['discountRate']?></td>
                <td class="flex">
                    <a class="edit" href="./prom-edit.php?editId=<?php echo $arr[$i]['discountId']?>">
                    
                    編輯</a>
                    <a class = "delete" href="./prom-delete.php?deleteId=<?php echo $arr[$i]['discountId']?>">
                    
                    刪除</a>
                </td>
            </tr>
            <?php
               }
            }   
            else{
            ?>
                <tr>
                    <td>沒有資料</td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            <tfoot>
                <tr class="page">
                    <td  class="page-td" colspan="4">
                    <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                      <a  class="page-number" href="?page=<?=$i?>"> <?= $i?></a>
                    <?php } ?>
                    </td>
        
                <?php if($total > 0){ ?>
                    <td >
                        <input class="delete-input delete text-center" type="submit" name="smb" value="刪除">
                    </td>
                </tr>
                <?php } ?>
            
        </table>
    </form>
<?php
}else{
    echo "尚未建立優惠範圍";
}
?>

<script>
    $(document).ready(function(){
       
        $("#searchText").keyup(function(){
           
            var search = $(this).val();
            $.ajax({
                url:'action.php',
                method:'POST',
                data:{query:search},
                success:function(response){
                   
                    $("#tableDataResult").html(response);
                }
            });
        });
    });
</script>
</body>
</html>