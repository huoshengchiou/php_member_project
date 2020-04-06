<?php
session_start();
//確認存入session的變數是否存在

if ( !isset($_SESSION['admname'])){
    header("Refresh: 3; url=./loginPage.php");
    echo "log in fail";
};