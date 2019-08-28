<?php
/* Smarty version 3.1.34-dev-7, created on 2019-08-28 11:53:38
  from 'C:\xampp\htdocs\boardSmarty\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d664f221b5e14_98746330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '004fa629d8cbb3904a37c2d29552afd78f1cc6e3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\boardSmarty\\templates\\index.html',
      1 => 1566986016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d664f221b5e14_98746330 (Smarty_Internal_Template $_smarty_tpl) {
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
    
    <style>
        .container{
            width:97%
        }
    </style>
    <body>
        <div class="container">
        

        <h3><p class='text-center text-info'>歡迎！<?php if ($_smarty_tpl->tpl_vars['memberMail']->value) {
echo $_smarty_tpl->tpl_vars['memberMail']->value;
} else {
echo "訪客";
}?></p></h3>
            
            <?php if (isset($_SESSION['memberID'])) {?>

                <h2>留言板
                <a href="logout.php" class="btn btn-md btn-danger pull-right">登出</a>
                <a href="create.php" class="btn btn-md btn-success pull-right">
                <span class="glyphicon glyphicon-plus"></span> 新增留言</a></h2>
            <?php }?>



            
            <?php if (!isset($_SESSION['memberID'])) {?>
                <h2>留言板
                <a href="signUp.php" class="btn btn-md btn-danger pull-right">註冊</a>
                <a href="login.php" class="btn btn-md btn-success pull-right">使用者登入</a></h2>
            <?php }?>



            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>標題</th>
                        <th>內容</th>
                        <th>建立者</th>
                        <th>更新時間</th>
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php echo '<?php ';?>
while ($row = $result->fetch()){ <?php echo '?>';?>

                        <tr>
                            <td><a href="details.php?ID=<?php echo '<?php ';?>
echo $row['ID'];<?php echo '?>';?>
"><?php echo '<?php ';?>
echo $row['topic'];<?php echo '?>';?>
</a></td>
                            <td><?php echo '<?php ';?>
echo $row['content'];<?php echo '?>';?>
</td>
                            <td><?php echo '<?php ';?>
echo $row['mail'];<?php echo '?>';?>
</td>
                            <td><?php echo '<?php ';?>
echo $row['datetime'];<?php echo '?>';?>
</td>
                            <td>
                                <span class="pull-right">

                                    <form method="post" action="delete.php"> 
                                         
                                        
                                        <?php echo '<?php ';?>
if(@$_SESSION['memberID'] == 1 || $row['memberID'] == @$_SESSION['memberID']){ <?php echo '?>';?>

                                            <input id="msID" name="msID" type="hidden" value="<?php echo '<?php ';?>
echo $row['ID'];<?php echo '?>';?>
"> 
                                            <button type="submit" class="btn btn-xs btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> 刪除</button> | 

                                            <a href="edit.php?ID=<?php echo '<?php ';?>
echo $row['ID'];<?php echo '?>';?>
" class="btn btn-xs btn-info">
                                            <span class="glyphicon glyphicon-pencil"></span> 修改</a> | 

                                        <?php echo '<?php ';?>
} <?php echo '?>';?>


                                        <a href="details.php?ID=<?php echo '<?php ';?>
echo $row['ID'];<?php echo '?>';?>
" class="btn btn-primary btn-xs"> 詳細內容</a>

                                    </form>

                                </span>
                            </td>
                        </tr>
                    <?php echo '<?php ';?>
}<?php echo '?>';?>


            

                </tbody>
            </table>
        </div>

    </body>
</html><?php }
}
