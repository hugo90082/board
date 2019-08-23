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
            <form method="post" action="insert.php" class="form-horizontal">
                <fieldset>

                <!-- Form Name -->
                    <legend>建立留言</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="topic">標題：</label>  
                        <div class="col-md-4">
                            <input id="topic" name="topic" type="text" placeholder="" 
                                class="form-control input-md" pattern="([\u4E00-\u9FFF\w]{1,50})+">
                            
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="content">內容：</label>  
                        <div class="col-md-4">
                            <textarea class="form-control input-md" id="content" name="content" 
                                    pattern="([\u4E00-\u9FFF\w]{1,50})+"></textarea>  
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="okOrCancel"></label>
                        <div class="col-md-8">
                            <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-success" value="OK">送出新增</button>
                            <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-danger" value="cancel">取消清空</button>
                        </div>
                    </div>

                </fieldset>
            </form>


        </div>

    </body>
</html>