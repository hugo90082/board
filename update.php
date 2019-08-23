<?php
    header("content-type:text/html; charset=utf-8");
    $id = $_POST["msID"];
    $topic = $_POST["topic"];
    $content = $_POST["content"];

    try
    {
        $db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET CHARACTER SET utf8");
        
        $sql = "UPDATE message SET topic=:topic, content = :content where ID = :ID ";
        $result = $db->prepare($sql);
        $result->bindValue(':ID',$id);
        $result->bindValue(':topic',$topic);
        $result->bindValue(':content',$content);
        $result->execute();

        $db = NULL;
        header("location:index.php");
    } catch (PDOException $err) {
        $db->rollback();
        echo "Error: " . $err->getMessage();
        exit();
    }
?>