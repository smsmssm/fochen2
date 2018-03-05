<?php
include_once("../pcomm/api.php");
include_once("des.php");
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
$arr_article_list=array();
if(api_verify_session()){
	if(api_verify_point($usr)==-100||api_verify_point($usr)==1){
	
	$ss = new helper_des("k5tylvt4r471814t566a6rct","30860152");
	    mysql_select_db($dbName, $link);
		$sql="select Ftitle,Fstatus,FcreateTime,tnews.id from tnews where  limit ".(($page-1)*20).","."20";
		$result = mysql_query($sql,$link);
		echo  $sql;return;
		$sql = "select count(*) from tnews";
		$result2 =  mysql_query($sql,$link); 
		$row2     = mysql_fetch_array($result2, MYSQL_NUM);
		
		
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
		    
			if($row[1]==0)
			{
			  $row[4]="点击提交";
			}else
			{
			   $row[4]="已提交";
			}
			
			if($row[1]==0)
			{
		       $row[1] = "未发布";
			}else if($row[1]==1)
			{
			   $row[1] = "已被采纳";
			}else if($row[1]==-1)
			{
			  $row[1] = "未被采纳";
			}else if($row[1]==2)
			{
			  $row[1]="已发布，等待结果";
			}
						
			if($count==0)
			{
			   $row[5] = $page;
			   $row[6] = $row2[0];
			   $count  = $count+1;
			 }/**/
			 $row[7] = SetToHexString($ss->encrypt($row[3]));
			 
			array_push($arr_article_list,$row);	
		}	
	}
}
$smarty->assign("arr_article_list",$arr_article_list);
$smarty->display("showArticleList.html"); 
mysql_close($link);
?>