<?php
include_once("../pcomm/api.php");
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
//---------start-----------//
if(api_verify_session()){
	if(api_verify_point($usr)<=2){
		$sql="select id,Fmail,FcompanyName,Fsname,FwebSite,Fintroduce,Fprovince,Fcity,Faddr,FzipCode,Ftel,Ffax,Farea,FcontactPerson,Frange,Fqq,FstaffNumber,Fsetup,Fcustomer,Fproduct,Ftype from erpdq.tcompany where Femail='".$usr."'";
		echo $sql;
		$result = mysql_query($sql,$link);
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$smarty->assign("arr_conIfo_list",$row);
		//-------------extra file start-----------------//
		$file_url="../extra_file/".($id%100)."/".$usr."/";
		$arr_extraFile=api_get_array_extrafile(api_list_dir($file_url));
		$smarty->assign("file_url",$file_url); 
		$smarty->assign("arr_extraFile",$arr_extraFile);
	   //------------------------------ÆÕÍ¨ÓÃ»§
	    $smarty->display("company_edit.html"); 
	}	
}
mysql_close($link);
?>