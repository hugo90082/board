<?php
	header("content-type:text/html; charset=utf-8");
	session_start();
	$db = new PDO("mysql:host=localhost;dbname=message_board;port=3306", "root", "");
	$db->exec("set names utf8");
	$id = htmlspecialchars($_GET["ID"]);
	//顯示主題及內容的SQL
	$result = $db->prepare("select * from message
							message left join member
                            ON message.memberID = member.memberID
							where ID = :ID");
	$result->bindValue(':ID', $id, PDO::PARAM_STR);
	$result->execute();
	$row = $result->fetch();
    $rowCount = $result->rowCount();
	//顯示主題及內容的SQL
	if((!preg_match("/^([0-9]+)$/",$id)) || ($rowCount==0)){
		echo "<script> alert('找無對應文章 將導回首頁'); window.location.replace('index.php');</script>";
		
	}else{
		$rowCount = $result->rowCount();
	}
	//顯示回復的SQL
	$resultReply = $db->prepare("
		select reply.ID, reply.reply, reply.datetime, mail from message 
			message join reply 
				ON message.ID = reply.messageID 
			join member 
				ON reply.memberID = member.memberID 
		where message.ID = :ID");
	$resultReply->bindValue(':ID', $id, PDO::PARAM_STR);
	$resultReply->execute();
	//$rowReply = $resultReply->fetch();


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
	<style>
        .container{
            width:90%
        }
    </style>
	<body>

		<div class="container">
			<form method="post" action="index.php" class="form-horizontal">

				<fieldset>
				
					<!-- Form Name -->
					<legend>
						<h2>詳細留言內容
							<button type="submit" class="btn btn-md btn-danger pull-right" id="back" name="back" value="back">回首頁</button>
						</h2>	

						<h4 class='pull-right text-warning'><?="&nbsp;&nbsp;".$row["datetime"]?></h4>
						<h4 class='pull-right text-warning'>  主題建立者：<?=$row["mail"]?> || </h4>
					
					</legend>
					

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
						<tr><legend></legend>
							
						</tr>
					</table>
				</fieldset>	
			</form>
			<?php 
				$rowReplyCount = $resultReply->rowCount();
				if($rowReplyCount!=0){
			?>
			<h3>回復：</h3>
			<table class="table table-hover">
				<?php while ($rowReply = $resultReply->fetch()){ ?>
				
					<tr>
						<td>
							<h4><?=$rowReply['reply'];?></h4>
						</td>
						<td>
							<h5 class='pull-right text-warning'><?="&nbsp;&nbsp;".$rowReply['datetime'];?></h5>
							<h5 class='pull-right text-warning'>建立者：<?=$rowReply['mail'];?> || </h5>
						</td>	
					</tr>

				<?php }?>
			</table>
			<?php }?>
			<form method="post" action="detailsReply.php?ID=<?=$id?>" class="form-horizontal">		
				<textarea cols="100" rows="2" class="form-control input-md" id="reply" name="reply"></textarea><legend></legend>
				<button type="submit" class="btn btn-md btn-primary pull-right" id="send" name="send" value="send">回復</button>

				<h4><p class='text-center text-danger'><?=isset($_SESSION['NoValue'])?$_SESSION['NoValue']:'<br>'?></p></h4>
				<?php 

					unset($_SESSION['NoValue']);
				?>
			</form>		
				
			

		</div>

	</body>
</html>