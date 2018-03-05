<?php
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];

$user_id = "";
if(isset($_GET["id"]))
{
  $user_id = $_GET["id"];
}else
{
  $user_id = $_COOKIE["cid"];
}

function api_get_array_extrafile($arr){
	$arr_temp=array();
	for($i=0;$i<count($arr);$i++){
		$arr_t=array($i,$arr[$i],urlencode($arr[$i]));
		array_push($arr_temp,$arr_t);	
	}
	return	$arr_temp;
}
//-----------start------------------//
///$name=$_GET["name"];
if(api_verify_session()){
    $point = api_verify_point($usr);
	if($point==1||$point==-100){
	    mysql_select_db($dbName, $link);
		$sql="select id,Femail,Fname,FshortName,Fwebsite,Fintroduce,Fprovince,Fcity,Faddress,Ftel,FfoundTime,Fsummary,Fproducts,Fintroduce,Fcustomers,Flinkman from tcompany where id=".$user_id;
		//echo $sql;
		$result = mysql_query($sql,$link);
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$smarty->assign("arr_conIfo_list",$row);
		//-------------extra file start-----------------//
		$file_url="../extra_file/".($id%100)."/".$usr."/";
		$arr_extraFile=api_get_array_extrafile(api_list_dir($file_url));
		$smarty->assign("file_url",$file_url); 
		$smarty->assign("arr_extraFile",$arr_extraFile);
	   //------------------------------普通用户
	    $smarty->display("editCompany.html"); 
	}
}

mysql_close($link);
?>