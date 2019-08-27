<?php
    header("content-type:text/html; charset=utf-8");
    session_start();
    // 1. 連接資料庫伺服器
    $db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
    $db->exec("set names utf8");
    // 2. 執行 SQL 敘述
    $result = $db->prepare("select * from message");
    $result->execute();
    // 3. 處理查詢結果
    // 4. 結束連線
    // $db = null;
    @$memberMail = $_SESSION['memberMail'];
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
    
    <style>
        .container{
            width:97%
        }
    </style>
    <body>
        <div class="container">
        

        <h3><p class='text-center text-info'>歡迎！<?= $memberMail ? $memberMail : '訪客'?></p></h3>
            
            <?php if(isset($_SESSION['memberID'])){ ?>

                <h2>留言板
                <a href="logout.php" class="btn btn-md btn-success pull-right">登出</a>
                <a href="create.php" class="btn btn-md btn-success pull-right">
                <span class="glyphicon glyphicon-plus"></span> 新增留言</a></h2>
            <?php } ?>



            
            <?php if(!isset($_SESSION['memberID'])){ ?>
                <h2>留言板
                <a href="signUp.php" class="btn btn-md btn-success pull-right">註冊</a>
                <a href="login.php" class="btn btn-md btn-success pull-right">使用者登入</a></h2>
            <?php } ?>



            <table class="table table-hover">
                <thead>
                <tr>
                    <th>標題</th>
                    <th>內容</th>
                    <th>更新時間</th>
                    <th>&nbsp;</th>
                    
                </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch()){ ?>
                        <tr>
                            <td><a href="details.php?ID=<?php echo $row['ID'];?>"><?php echo $row['topic'];?></a></td>
                            <td><?php echo $row['content'];?></td>
                            <td><?php echo $row['datetime'];?></td>
                            <td>
                                <span class="pull-right">

                                    <form method="post" action="delete.php"> 
                                        <a href="details.php?ID=<?php echo $row['ID'];?>" class="btn btn-primary btn-xs"> 詳細內容</a> 
                                        
                                        <?php if($row['memberID'] == $_SESSION['memberID']){ ?>
                                            | <a href="edit.php?ID=<?php echo $row['ID'];?>" class="btn btn-xs btn-info">
                                            <span class="glyphicon glyphicon-pencil"></span> 修改</a> | 

                                            <input id="msID" name="msID" type="hidden" value="<?php echo $row['ID'];?>"> 
                                            <button type="submit" class="btn btn-xs btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> 刪除</button>
                                        <?php } ?>

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