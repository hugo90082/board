<?php
header("content-type:text/html; charset=utf-8");

$db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
$db->exec("set names utf8");


$result = $db->prepare("select * from message where ID = :ID");
$result->bindValue(':ID', $id, PDO::PARAM_STR);
$result->execute();
$row = $result->fetch();
?>