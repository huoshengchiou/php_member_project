<?php
require_once("./db.inc.php");
$output='';
if(isset($_POST['query']) && !empty($_POST['query']) ){
    $search = $_POST['query'];

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>"
    // exit();
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
                 WHERE `discountName` LIKE CONCAT('%',?,'%' )
                 OR `discountNo` LIKE CONCAT('%',?,'%' )
                 OR `discountRate` LIKE CONCAT('%',?,'%' )";
                

                $arrParam = [
                    $search,
                    $search,
                    $search
                ]; 
                
                $stmt = $pdo->prepare($sql);
                $result= $stmt->execute($arrParam); 
                
                if($stmt->rowCount()>0){
                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);//標頭不用重複
                    $output = '
                    <thead>
                        <tr>
                            <td class="text-center" style="width:10%;">選擇</td>
                            <td class="" style="width:15%;">折價券序號</td>
                            <td style="width:40%;">優惠活動</td>
                            <td class="text-center offer">折扣(%)</td>
                            <td style="width:10%;"></td>
                        </tr>
                    </thead>
                    <tbody class="tbody">';
                    for($i = 0; $i< count($arr); $i++){  
                                $output .='
                                <tr>
                                <td class="text-center">
                                <input type="checkbox" name="chk[]" value="'.$arr[$i]['discountId'].'">
                                
                                </td>
                                <td class=""><a class="" href="./prom-edit.php?editId='.$arr[$i]['discountId'].'">'. $arr[$i]['discountNo'].'</a></td>
                                <td><a href="./prom-edit.php?editId='. $arr[$i]['discountId'].'">'. $arr[$i]['discountName'].'</a></td>
                                <td class="text-center offer">'. $arr[$i]['discountRate'].'</td>
                                <td class="flex">
                                    <a class="edit" href="./prom-edit.php?editId='. $arr[$i]['discountId'].'">
                                    
                                    編輯</a>
                                    <a class = "delete" href="./prom-delete.php?deleteId='.$arr[$i]['discountId'].'">
                                    
                                    刪除</a>
                                </td>
                                <tr>'; 
                            }
                            $output .='</tbody>';
                            echo $output;
                }else{
                    echo "<h3>沒有資料...</h3>";
                }
   
} else{
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
                 ON `discount`.`discountRange` = `categories`.`categoryId`";
                
   $stmt = $pdo->prepare($sql);
         
    $stmt->execute();
    
    // $result = $stmt->get_result();

    if($stmt->rowCount()>0){
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $output = '
        <thead>
            <tr>
                <td class="text-center" style="width:10%;">選擇</td>
                <td class="" style="width:15%;">折價券序號</td>
                <td style="width:40%;">優惠活動</td>
                <td class="text-center offer">折扣(%)</td>
                <td style="width:10%;"></td>
            </tr>
        </thead>
        <tbody class="tbody">';
        for($i = 0; $i< count($arr); $i++){  
                    $output .='
                    <tr>
                    <td class="text-center">
                    <input type="checkbox" name="chk[]" value="'.$arr[$i]['discountId'].'">
                    
                    </td>
                    <td class=""><a class="" href="./prom-edit.php?editId='.$arr[$i]['discountId'].'">'. $arr[$i]['discountNo'].'</a></td>
                    <td><a href="./prom-edit.php?editId='. $arr[$i]['discountId'].'">'. $arr[$i]['discountName'].'</a></td>
                    <td class="text-center offer">'. $arr[$i]['discountRate'].'</td>
                    <td class="flex">
                        <a class="edit" href="./prom-edit.php?editId='. $arr[$i]['discountId'].'">
                        
                        編輯</a>
                        <a class = "delete" href="./prom-delete.php?deleteId='.$arr[$i]['discountId'].'">
                        
                        刪除</a>
                    </td>
                    <tr>'; 
                }
                $output .='</tbody>';
                echo $output;
    }else{
        echo "<h3>沒有資料...</h3>";
    }
}   

?>