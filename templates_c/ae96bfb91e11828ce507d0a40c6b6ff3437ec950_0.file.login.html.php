<?php
/* Smarty version 3.1.34-dev-7, created on 2019-08-29 05:59:35
  from 'C:\xampp\htdocs\smartyBoard\templates\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d674da72988f6_42936093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae96bfb91e11828ce507d0a40c6b6ff3437ec950' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smartyBoard\\templates\\login.html',
      1 => 1567051101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d674da72988f6_42936093 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>Message board</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	</head>
	<body>

		<div class="container">
			<form method="post" action="./checkLogin.php" class="form-horizontal">
			

				<fieldset>
				
				<!-- Form Name -->
					<legend><h2>登入</h2></legend>

                        

				<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="ID">帳號Mail</label>  
						<div class="col-md-4">
						<input id="mail" name="mail" type="text" placeholder="請輸入帳號mail" 
								class="form-control input-md" size="30" maxlength="30" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
">
						</div>
					</div>
					
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
							<button type="submit" id="login" name="login" class="btn btn-primary" value="OK">登入</button>
							<button type="submit" id="cancel" name="cancel" class="btn btn-danger" value="cancel">回首頁</button>
						</div>
					</div>
				
				</fieldset>
			</form>

		</div>

	</body>

	<?php echo '<script'; ?>
>
		
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
	<?php echo '</script'; ?>
>
</html><?php }
}
