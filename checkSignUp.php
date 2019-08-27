<?php
    header("content-type:text/html; charset=utf-8");
    session_start();

    $mail = htmlspecialchars($_POST["mail"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordCheck = htmlspecialchars($_POST["passwordCheck"]);

    try
    {
        
        
        if(@$_POST["cancel"] == "cancel"){
            header("location:index.php");//判斷是否按取消

        }else if($mail == "" ||$password == "" || $passwordCheck == "" ){ //判斷是否空值
            
            echo "<script> alert('欄位不得為空值'); window.location.replace('signUp.php');</script>";
            
        }else if($password!=$passwordCheck){
            echo "<script> alert('兩次密碼不相符'); window.location.replace('signUp.php');</script>";
        }else{//送入資料庫
            $db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET utf8");
            
            $sql = "INSERT INTO member (memberID, mail,PWD) VALUES ('', :mail, :passwordCheck)";
            $result = $db->prepare($sql);
            $result->bindValue(':mail',$mail);
            $result->bindValue(':passwordCheck',MD5($passwordCheck));
            
            $result->execute();

            $db = NULL;
            
            echo "<script> alert('註冊成功 請重新登入'); window.location.replace('login.php');</script>";
        }


    } catch (PDOException $err) {
        
        
        echo "<script> alert('此帳號已被註冊'); window.location.replace('signUp.php');</script>";
        $db->rollback();
        exit();
    }
?>