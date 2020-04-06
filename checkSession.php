<?php
session_start();
//確認存入session的變數是否存在，確認使用者身分

if (!isset($_SESSION['username'])) {
    header("Refresh: 3; url=./memberLog.php");
    echo "log in fail";
}
;
