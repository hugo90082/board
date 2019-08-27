<?php
	header("content-type:text/html; charset=utf-8");
	$db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
	$db->exec("set names utf8");
	$id = htmlspecialchars($_GET["ID"]);

	$result = $db->prepare("select * from message where ID = :ID");
	$result->bindValue(':ID', $id, PDO::PARAM_STR);
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
<html lang="zh-TW">
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
			<form method="post" action="index.php" class="form-horizontal">

				<fieldset>
				
					<!-- Form Name -->
					<legend><h2>詳細留言內容</h2></legend>
					<table>
						<!-- Text input-->
						<tr>
							<h2><div class="form-group">
									<p class="bg-success">
										主題：<?=$row["topic"];?>
									</p>
								</div>
							</h2>
						</tr>
						<tr> 
							<!-- Password input-->
							<h4> 
								<div class="text-info">
									內容：<?=$row["content"];?>

								</div>
							</h4>
						</tr>
						<!-- Button (Double) -->
						<tr>
							<div class="col-md-8">
								<button type="submit" style="padding-right" id="login" name="login" class="btn btn-danger" value="cancel">回首頁</button>
							</div>

						</tr>
					</table>
				</fieldset>
			</form>

		</div>

	</body>
</html>