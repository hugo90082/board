<?php 
    header("content-type:text/html; charset=utf-8");
    session_start();
    session_unset();
    $_SESSION['memberID'] = "";
    echo "<script> alert('登出成功'); window.location.replace('index.php');</script>";
?>