<?php
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];

if(api_verify_session()&&api_verify_point($usr)==-100){
	$smarty->display("operate_tpl.html"); 
}



mysql_close($link);
?>