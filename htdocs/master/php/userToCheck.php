<?php
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];
$page=$_GET["page"];
$count=0;

//---------start-----------//
if($page=="")
  $page = 1;
//$limit = ($page-1)*20;
$arr_user_list=array();
if(api_verify_session()){
	if(api_verify_point($usr)==-100){
	
	    mysql_select_db($dbName, $link);
		$sql="select id,FcreateTime,Fname,Femail,Fstatus,FisCloud,FisBigData,FisFangan,FisGongye,FisNongye,FisJiaju,FisYiliao from tcompany where Fstatus=0 order by id DESC   limit ".(($page-1)*20).","."20";
		$result = mysql_query($sql,$link); 
		$sql = "select count(*) from xdm294501578_db.tcompany";
		$result2 =  mysql_query($sql,$link); 
		$row2     = mysql_fetch_array($result2, MYSQL_NUM);
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
		   if($row[4]==-100)continue;
		   
		    $row[1] = substr($row[1],5,5) ;
			if($count==0)
			{
			   $row[5] = $page;
			   $row[6] = $row2[0];
			   $count  = $count+1;
			 }
			 if($row[4]==0)
			 {
			    $row[4] = "未审核";
			 }else if($row[4]==-1)
			 {
			   $row[4] = "未通过审核";
			 }else  if($row[4]==2)
			 {
			    $row[4] = "推荐";
			 }else   if($row[4]==1)
			 {
			   $row[4] = "通过审核";
			 }
			 $type= "";
			 if($row[5]==1)
			 {
			    $type ="云";
			 }
			 if($row[6]==1)
			 {
			    $type =$type." 大数据";
			 }
			 if($row[7]==1)
			 {
			    $type =$type." 方案";
			 }
			 if($row[8]==1)
			 {
			    $type =$type." 工业";
			 }
			 if($row[9]==1)
			 {
			    $type =$type." 农业";
			 }
			 if($row[10]==1)
			 {
			    $type =$type." 家居";
			 }
			 if($row[11]==1)
			 {
			    $type =$type." 医疗";
			 }
			 $row[5] = $type;
			 
			array_push($arr_user_list,$row);	
		}	
	}
}

$smarty->assign("page",$page);
$smarty->assign("total",$row2[0]);
$smarty->assign("arr_user_list",$arr_user_list);
$smarty->display("toCheckList.html"); 
mysql_close($link);
?>