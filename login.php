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
			<form method="post" action="checkLogin.php" class="form-horizontal">
			

				<fieldset>
				
				<!-- Form Name -->
					<legend><h2>登入</h2></legend>
					<?php 
                        session_start();
                        $mail = $_SESSION['mail']??"";
                    ?>
				<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="ID">帳號Mail</label>  
						<div class="col-md-4">
						<input id="mail" name="mail" type="text" placeholder="請輸入帳號mail" 
								class="form-control input-md" size="30" maxlength="30" value="<?=$mail?>">
						</div>
					</div>
					<?php 
						unset($_SESSION['mail']);
						
					?>
					<h4><p class='text-center text-danger' id="mailValue"></p></h4>

					<!-- Password input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="password">密碼</label>
						<div class="col-md-4">
						<input id="password" name="password" type="password" placeholder="請輸入密碼" 
								 class="form-control input-md" size="20" maxlength="20">
						
						</div>
					</div>
					
					<!-- Button (Double) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="button1id"></label>
						<div class="col-md-8">
							<button type="submit" disabled="disabled" id="login" name="login" class="btn btn-primary" value="OK">登入</button>
							<button type="submit" id="cancel" name="cancel" class="btn btn-danger" value="cancel">回首頁</button>
						</div>
					</div>
				
				</fieldset>
			</form>

		</div>

	</body>

	<script>
		
		mail.onkeyup = function(){
			var mail = this.value;
			var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;//判斷格式

			if(reg.test(mail)){
				document.getElementById('mailValue').innerHTML = "格式正確";
				document.getElementById('login').disabled = false;
			}else{
				document.getElementById('mailValue').innerHTML = "mail格式不正確";
				document.getElementById('login').disabled = true;
			}
		}
	</script>
</html>