<?php
    /**
     * Example Application
     *
     * @package Example-application
     */
    ini_set("display_errors", "On");
    require './libs/Smarty.class.php';
    $smarty = new Smarty;
    $smarty->left_delimiter = '{{';
    $smarty->right_delimiter = '}}';


    header("content-type:text/html; charset=utf-8");
    session_start();

?>