<?php
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];
$cid=$_COOKIE["usrid"];
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
	if($point==1){
	  
	  $row1[0] ="";
	  $row1[1] ="aaaa"."{#}"."bbbb"."{#}"."1111@2222@3333";
	  $row1[2] = $cid;
	  $smarty->assign("arr_Info_list",$row1);
		//-------------extra file start-----------------//
		$file_url="../extra_file/".($id%100)."/".$id."/";
		$arr_extraFile=api_get_array_extrafile(api_list_dir($file_url));
		$smarty->assign("file_url",$file_url); 
		$smarty->assign("arr_extraFile",$arr_extraFile);
	   //------------------------------ÆÕÍ¨ÓÃ»§
	   mysql_close($link);
	   //echo $row[0]." && ".$row[1];
	    $smarty->display("airticleSubmit.html"); 
	}
}

$smarty->display("addquestion.html"); 
?>