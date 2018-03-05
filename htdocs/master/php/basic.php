<?php
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];


$anli = 0;
$fangan= 0;
$chanpin = 0;
$wenzhang = 0;


if(api_verify_session()){

     $cid=$_COOKIE["cid"];
	//$smarty->assign("arr_action",api_get_menu_list(api_verify_point($usr)) );
	//$smarty->assign("arr_edit",api_get_edit_menu_list(api_verify_point($usr)) );
	//$smarty->assign("arr_operate",aip_get_operate_menu_list(api_verify_point($usr)) );
	 mysql_select_db($dbName, $link);
     $sql = "select count(*) from tfangan where Fcid = ".$cid;
	 $result2 =  mysql_query($sql,$link); 
	 $row2     = mysql_fetch_array($result2, MYSQL_NUM);
	 $fangan= $row2[0];
	 
	 $sql = "select count(*) from tanli where Fcid = ".$cid;
	 $result2 =  mysql_query($sql,$link); 
	 $row2     = mysql_fetch_array($result2, MYSQL_NUM);
	 $anli= $row2[0];
	 
	 $sql = "select count(*) from tchanpin where Fcid = ".$cid;
	 $result2 =  mysql_query($sql,$link); 
	 $row2     = mysql_fetch_array($result2, MYSQL_NUM);
	 $chanpin= $row2[0];
	 
     $sql = "select count(*) from tnews where Fcid = ".$cid;
	 $result2 =  mysql_query($sql,$link); 
	 $row2     = mysql_fetch_array($result2, MYSQL_NUM);
	 $wenzhang= $row2[0];
	 
	 
     
	 $fanganCount = 0;	 
	 $sql="select FvisitTimes  from tfangan where Fcid = ".$cid;;
	 $result = mysql_query($sql,$link); 
	 while($row = mysql_fetch_array($result, MYSQL_NUM)){
		$fanganCount = $fanganCount + 	$row[0];
	  }	
	  
	$anliCount = 0;	 
	 $sql="select FvisitTimes  from tanli where Fcid = ".$cid;;
	 $result = mysql_query($sql,$link); 
	 while($row = mysql_fetch_array($result, MYSQL_NUM)){
		$anliCount = $anliCount + 	$row[0];
	  }	  
	  
	 $chanpinCount = 0;	 
	 $sql="select FvisitTimes  from tchanpin where Fcid = ".$cid;;
	 $result = mysql_query($sql,$link); 
	 while($row = mysql_fetch_array($result, MYSQL_NUM)){
		$chanpinCount = $chanpinCount + 	$row[0];
	  }	 
	 
	 $wenzhangCount = 0;	 
	 $sql="select FvisitTimes  from tnews where Fcid = ".$cid;;
	 $result = mysql_query($sql,$link); 
	 while($row = mysql_fetch_array($result, MYSQL_NUM)){
		$wenzhangCount = $wenzhangCount + 	$row[0];
	  }	
}
///$smarty->assign("point",api_verify_point($usr));




$smarty->assign("fangan",$fangan);
$smarty->assign("anli",$anli);
$smarty->assign("chanpin",$chanpin);
$smarty->assign("wenzhang",$wenzhang);

$smarty->assign("fanganCount",$fanganCount);
$smarty->assign("anliCount",$anliCount);
$smarty->assign("chanpinCount",$chanpinCount);
$smarty->assign("wenzhangCount",$wenzhangCount);


$smarty->display("basic.html"); 


mysql_close($link);
?>