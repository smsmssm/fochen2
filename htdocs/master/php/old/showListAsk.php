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
$arr_contract_list=array();
if(api_verify_session()){
	if(api_verify_point($usr)==3){
		$sql="select id,Ftitle,Fsubmit_dept,Fsubmiter,Fsubmit_date from contract.t_contract ";
		$result = mysql_query($sql,$link);
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
			array_push($arr_contract_list,$row);	
		}	
	}
}
$smarty->assign("arr_contract_list",$arr_contract_list);
$smarty->display("contract_list_ask_tpl.html"); 
mysql_close($link);
?>