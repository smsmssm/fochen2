<?php
include_once("../../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];
function api_get_array_extrafile($arr){
	$arr_temp=array();
	for($i=0;$i<count($arr);$i++){
		$arr_t=array($i,$arr[$i],urlencode($arr[$i]));
		array_push($arr_temp,$arr_t);	
	}
	return	$arr_temp;
}
//-----------start------------------//
$id=$_GET["id"];
if(api_verify_session()){
	if(api_verify_point($usr)==1){
		$sql="select id,Fsubmiter,Fsubmit_dept,Ftitle,Fpartner,Fmoney,Flength,Fproduct,Fmode,Fstandard,Fsort,Fcontinue,Fstate,Fsubmit_date,Freply_date from contract.t_contract where id=".$id;
		$result = mysql_query($sql,$link);
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$row[2]=$api_arr_dept_options[$row[2]];
		$row[9]=$api_arr_standard_contract[$row[9]];
		$row[10]=$api_arr_contract_sort[$row[10]];
		$row[11]=$api_arr_contract_continue[$row[11]];
		$row[12]=$api_arr_contract_state[$row[12]];
		$smarty->assign("arr_contract_list",$row);
		//-------------extra file start-----------------//
		$file_url="../extra_file/".($id%100)."/".$id."/";
		$arr_extraFile=api_get_array_extrafile(api_list_dir($file_url));
		$smarty->assign("file_url",$file_url); 
		$smarty->assign("arr_extraFile",$arr_extraFile); 
	}
}
$smarty->display("contract_content_tpl.html"); 
mysql_close($link);
?>