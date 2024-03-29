<?php
    header("content-type:text/html; charset=utf-8");
    session_start();
    $mail = htmlspecialchars($_POST["mail"]);
    $pwd = htmlspecialchars($_POST["password"])?htmlspecialchars($_POST["password"]):"";
    try
    {
        $db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
        $db->exec("set names utf8");
        $result = $db->prepare("select * from member where mail = :mail && PWD = :PWD ");
        $result->bindValue(':mail', $mail, PDO::PARAM_STR);
        $result->bindValue(':PWD', MD5($pwd), PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        $rowCount = $result->rowCount();


        if(isset($_POST["cancel"]) && ($_POST["cancel"] == "cancel")){

            header("location:index.php");//判斷是否按取消
        }elseif($rowCount == 1){
            $_SESSION['memberMail'] = $row["mail"];
            $_SESSION['memberID'] = $row["memberID"];
            echo "<script> alert('登入成功'); window.location.replace('index.php');</script>";
        }else{
            $_SESSION['mail'] = $mail;
            echo "<script> alert('帳號或密碼錯誤'); window.location.replace('login.php'); </script>";
        }

    } catch (PDOException $err) {
        $db->rollback();
        echo "Error: " . $err->getMessage();
        exit();
    }


	?>