<?php
header("content-type:text/html; charset=utf-8");
// 1. 連接資料庫伺服器
$db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
$db->exec("set names utf8");
// 2. 執行 SQL 敘述
//$result = $db->query("select * from message");
$result = $db->prepare("select * from message");
//$result->bindValue(':ID', $ID, PDO::PARAM_STR);
$result->execute();


// $result = $this->db->prepare("select * from article a ,member m where a.member_id = m.member_id and title like :keyword order by time desc"); 
// $result->bindValue(':keyword','%'.$keyword.'%', PDO::PARAM_STR);
// $result->execute();

// 3. 處理查詢結果
// while ($row = $result->fetch())
// {
//   echo "ID：{$row['ID']}<br>";
//   echo "topic：{$row['topic']}<br>";
//   echo "<HR>";
//   echo "content：{$row['content']}<br>";
// }
// 4. 結束連線
// $db = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Message board</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<style>
.container{
    width:97%
}
</style>

<div class="container">
  

    <h2>
    <a href="logout.php" class="btn btn-md btn-success pull-right">
        登出</a>
    <a href="create.php" class="btn btn-md btn-success pull-right">
    <span class="glyphicon glyphicon-plus"></span> 新增留言</a>

    留言板    
    <a href="login.php" class="btn btn-md btn-success pull-right">
        使用者登入</a></h2>




  <table class="table table-hover">
    <thead>
      <tr>
        <th>標題</th>
        <th>內容</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch()){ ?>
        <tr>
            <td><a href="details.php?ID=<?php echo $row['ID'];?>"><?php echo $row['topic'];?></a></td>
            <td><?php echo $row['content'];?></td>
            <td>
                <span class="pull-right">

                    <form method="post" action="delete.php"> 
                        <a href="details.php?ID=<?php echo $row['ID'];?>" class="btn btn-primary btn-xs"> 詳細內容</a> |
                        <a href="edit.php?ID=<?php echo $row['ID'];?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> 修改</a> | 


                        <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> 刪除</button>
                    </form>

                </span>
            </td>
        </tr>
    <?php }?>

 

    </tbody>
  </table>
</div>

</body>
</html>