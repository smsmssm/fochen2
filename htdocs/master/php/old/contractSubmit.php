<?php
include_once("../../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];
//---------start-----------//
if(api_verify_session()){
	if(api_verify_point($usr)==1){
		$smarty->assign("arr_dept",api_get_array_dept($api_arr_dept_options));
		$smarty->assign("arr_standard",api_get_array_dept($api_arr_standard_contract));
		$smarty->assign("arr_sort",api_get_array_dept($api_arr_contract_sort));	
		$smarty->assign("arr_continue",api_get_array_dept($api_arr_contract_continue));			
	}
}

$smarty->display("contract_submit_tpl.html"); 
mysql_close($link);
?>