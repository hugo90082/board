<?php
    header("content-type:text/html; charset=utf-8");
    $id = $_POST["msID"];
    try
    {
        $db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET CHARACTER SET utf8");
        
        $sql = "DELETE FROM message where ID = :ID ";
        $result = $db->prepare($sql);
        $result->bindValue(':ID',$id);
        $result->execute();

        $db = NULL;
        echo "<script> alert('刪除成功'); window.location.replace('index.php');</script>";
    } catch (PDOException $err) {
        $db->rollback();
        echo "Error: " . $err->getMessage();
        exit();
    }
?>