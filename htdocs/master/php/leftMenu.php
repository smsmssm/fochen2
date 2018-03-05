<?php
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];

if(api_verify_session()){
	$smarty->assign("arr_action",api_get_menu_list(api_verify_point($usr)) );
	$smarty->assign("arr_edit",api_get_edit_menu_list(api_verify_point($usr)) );
	$smarty->assign("arr_operate",aip_get_operate_menu_list(api_verify_point($usr)) );
}
$smarty->assign("point",api_verify_point($usr));
$smarty->display("left_menu_tpl.html"); 


mysql_close($link);
?>