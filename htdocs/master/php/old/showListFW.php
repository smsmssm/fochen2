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
	if(api_verify_point($usr)==2){
		$sql="select id,Ftitle,Fsubmit_dept,Fsubmiter,Fsubmit_date,Freply_date,Fstate from contract.t_contract ";
		$result = mysql_query($sql,$link);
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
			$row[2]=$api_arr_dept_options[$row[2]];
			$row[6]=$api_arr_contract_state[$row[6]];
			array_push($arr_contract_list,$row);	
		}	
	}
}
$smarty->assign("arr_contract_list",$arr_contract_list);
$smarty->display("contract_list_FW_tpl.html"); 
mysql_close($link);
?>