<?php
include_once("../../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];
//-----------start------------------//
$id=$_GET["id"];
if(api_verify_session()){
	if(api_verify_point($usr)==2){
		$sql="select id,Ftitle,Fsubmit_dept,Fsubmiter,Fsubmit_date from contract.t_contract where id=".$id;
		$result = mysql_query($sql,$link);
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$smarty->assign("arr_contract_ask",$row);
	}
}
$smarty->display("contract_ask_tpl.html"); 
mysql_close($link);
?>