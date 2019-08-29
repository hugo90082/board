<?php
    require_once 'header.php';
    // 1. 連接資料庫伺服器
    $db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
    $db->exec("set names utf8");
    // 2. 執行 SQL 敘述
    $result = $db->prepare("select * from 
                            message left join member
                            ON message.memberID = member.memberID");//join 發文的人帳號
    $result->execute();
    // 3. 處理查詢結果
    // 4. 結束連線
    $db = null;
    @$memberMail = $_SESSION['memberMail'];
    //$_SESSION['memberID'] = "";

    


    
    $smarty->assign('result', $result);
    $smarty->assign('memberMail', $memberMail);


    $smarty->display('index.html');


