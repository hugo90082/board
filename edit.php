<?php
    header("content-type:text/html; charset=utf-8");
    session_start();

    $id = $_GET["ID"];
    $memberID = $_SESSION['memberID'];

    $db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
    $db->exec("set names utf8");

    $result = $db->prepare("select * from message where ID = :ID and memberID = :memberID");
    $result->bindValue(':ID', $id, PDO::PARAM_STR);
    $result->bindValue(':memberID', $memberID, PDO::PARAM_STR);
    $result->execute();
    $row = $result->fetch();
    $rowCount = $result->rowCount();

	if((!preg_match("/^([0-9]+)$/",$id)) || ($rowCount==0)){
		echo "<script> alert('找無對應文章 將導回首頁'); window.location.replace('index.php');</script>";
		
	}else{
		$rowCount = $result->rowCount();
	}
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

        <div class="container">

            <form method="post" action="update.php" class="form-horizontal">
                
                <fieldset>

                    <!-- Form Name -->
                    <legend><h2>修改主題</h2></legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="topic">標題:</label>  
                        <div class="col-md-4">
                            <input id="topic" name="topic" value="<?php echo $row['topic'];?>" type="text" placeholder="" class="form-control input-md">
                        
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="content">內容:</label>  
                        <div class="col-md-4">
                            <textarea class="form-control input-md" id="content" name="content"><?php echo $row['content'];?></textarea>
                        </div>
                    </div>
                    <input id="msID" name="msID" type="hidden" value="<?php echo $_GET["ID"]?>"> 
                    <?php 
                        
                        $NoValue = isset($_SESSION['NoValue']) ? $_SESSION['NoValue']:"";
                    ?>
                    <h4><p class='text-center text-danger'><?= $NoValue ? $NoValue : ' '?></p></h4>
                    <?php 

                        unset($_SESSION['NoValue']);
                    ?>
                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="okOrCancel"></label>
                        <div class="col-md-8">
                            <button type="submit" id="ok" name="ok" class="btn btn-success" value="OK">確定修改</button>
                            <button type="submit" id="cancel" name="cancel" class="btn btn-danger" value="cancel">取消</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>

    </body>
</html>