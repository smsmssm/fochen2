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
	if(api_verify_point($usr)==-100){
	
	$ss = new helper_des("k5tylvt4r471814t566a6rct","30860152");
	
		//$sql="select Ftitle,t_content.Fcreate_time,t_content.id,Fis_submit,Fis_adopt from erpdq.t_content  limit ".(($page-1)*20).","."20";
		mysql_select_db($dbName, $link);
		$sql="select Ftitle,Fstatus,FcreateTime,id from tquestions  order by id DESC   limit ".(($page-1)*20).","."20";
		echo $sql;
		$result = mysql_query($sql,$link); 
		$sql = "select count(*) from tquestions";
		$result2 =  mysql_query($sql,$link); 
		$row2     = mysql_fetch_array($result2, MYSQL_NUM);
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
			if($count==0)
			{
			   $row[5] = $page;
			   $row[6] = $row2[0];
			   $count  = $count+1;
			 }
			 
			 if($row[1]==0)
			 {
			   $row[4]="╢ЩиС╨к";
			 }else if($row[1]==-1)
			 {
			   $row[4]="н╢╡иди";
			 }else if($row[1]==1)
			 {
			    $row[4]="ря╡иди";
			 }
			 $row[7] = SetToHexString($ss->encrypt($row[2]));
			 
			array_push($arr_article_list,$row);	
		}	
	}
}
$smarty->assign("arr_article_list",$arr_article_list);
$smarty->display("showNewQuestionList.html"); 
mysql_close($link);
?>