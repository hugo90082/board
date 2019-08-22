<?php
header("content-type:text/html; charset=utf-8");

$db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
$db->exec("set names utf8");
$id = $_GET["ID"];

$result = $db->prepare("select * from message where ID = :ID");
$result->bindValue(':ID', $id, PDO::PARAM_STR);
$result->execute();
$row = $result->fetch();

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
<legend>修改留言</legend>

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

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="okOrCancel"></label>
  <div class="col-md-8">
    <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-success" value="OK">確定修改</button>
    <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-danger" value="cancel">取消</button>
  </div>
</div>

</fieldset>
</form>


</div>

</body>
</html>