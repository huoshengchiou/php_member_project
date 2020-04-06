<?php
//使用者註冊完成後，在session寫入資料
// session_start();
require_once('./checkSession.php');
require_once("./db.inc.php");

// && isset($_POST['mbPassword2'])

//資料新增顯示狀態array
$objResponse = [];

// 必填欄位檢驗

if ($_POST['mbAccount'] == "" || $_POST['mbName'] == "" || $_POST['mbPassword'] == "" || $_POST['mbPassword2'] == "" || $_POST['mbEmail'] == "" || $_POST['mbPh'] == "" || @$_POST['mbGender'] == "") {

    echo "欄位缺少";
    header("Refresh: 3; url=./memberLog.php");
    exit();
} else {
    //雙重密碼一致驗證
    if ($_POST["mbPassword"] === $_POST["mbPassword2"]) {

        // echo"密碼一致";
        // exit();

        //帳號重複性檢核
        //sql
        $sql = "SELECT  `mbAccount`, `mbName`, `mbNick`
        FROM `mbinfo`
        WHERE `mbAccount`=?";
        //sql補充
        $arrParam = [
            $_POST['mbAccount'],
        ];
        $reg_stmt = $pdo->prepare($sql);
        $reg_stmt->execute($arrParam);
        //找到sql資料
        if ($reg_stmt->rowCount() > 0) {

            echo "此帳號註冊過囉，請重新輸入!!";
            header("Refresh: 3; url=./memberLog.php");
            exit();
        } else {
            //將資料放進資料庫
            //取得資料表中最後的mbID

            //查詢sql
            $total_sql = "SELECT count(`mbID`)
                   FROM `mbinfo`
                    ";
            //取得mbID總數量
            $total_mbID = $pdo->query($total_sql)->fetch(PDO::FETCH_NUM)[0];

            //增加mbID，未完全開發，需自動補0
            $new_mbID = $total_mbID + 1;
            // 新增自動補零           
            // $new_mbID = str_pad($total_mbID,3,'0',STR_PAD_LEFT);

            // 需要調整登錄資訊為serial，唯一碼
            
            //新增mbID資訊
            $str_mbID = "M0{$new_mbID}";

            //預設暱稱
            $mbNick = "不知名旅人";

            //將新增帳號導入資料庫
            //sql語法
            $sql = "INSERT INTO `mbinfo`(
                        `mbID`,
                        `mbAccount`,
                        `mbPassword`,
                        `mbName`,
                        `mbEmail`,
                        `mbPh`,
                        `mbGender`,
                        `mbNick`
                        )
                       VALUES (?,?,?,?,?,?,?,?)";
            //sql補充
            $arrParam = [
                $str_mbID,
                $_POST['mbAccount'],
                //雜湊密碼
                sha1($_POST['mbPassword']),
                $_POST['mbName'],
                $_POST['mbEmail'],
                $_POST['mbPh'],
                $_POST['mbGender'],
                $mbNick,
            ];

// echo("<pre>");
            // print_r($_SESSION);
            // print_r($arrParam);
            // echo("</pre>");
            // exit();

            $addmember_stmt = $pdo->prepare($sql);
            $addmember_stmt->execute($arrParam);
            if ($addmember_stmt->rowCount() > 0) {

                //新增完成後資料寫入session
                $_SESSION['username'] = $_POST['mbAccount'];
                $_SESSION['mbNick'] = $mbNick;
                $_SESSION['mbID'] = $str_mbID;

                $objResponse['success'] = true;
                $objResponse['code'] = 200;
                $objResponse['info'] = "註冊成功";
                echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
                header("Refresh: 3; url=./memCenter.php");
                exit();
            } else {
                //引導頁再確認
                header("Refresh: 3; url=./memberLog.php");
                $objResponse['success'] = false;
                $objResponse['code'] = 400;
                $objResponse['info'] = "註冊失敗";
                echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
                exit();

            }

        }

        //雙重密碼認證失敗
    } else {
        echo "你輸入的密碼不一致";
        //跳頁
        header("Refresh: 3; url=./memberLog.php");
        exit();
    }

}
