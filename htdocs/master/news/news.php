<?php
include_once("../pcomm/api.php");
include_once("../php/des.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
//type 1：用友  2：金蝶 3速达 4管家婆 
$cid = $_GET["id"];//用一个对应规则
$arr_new_airticle_list = array();
$arr_commend_airticle_list = array();
$URL=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//如果有?则用分隔符分出来。

$usr=$_COOKIE["usrname"];

if(!api_verify_session()){

  echo api_redirectWithAlert("预览需要登录","/index.html");
  return;
}


$cid = substr($URL,-21,16);
function  isNumber($var ) {
       return ereg ("^[-]?[0-9]+([\.][0-9]+)?$", $var);
    } 
$ss = new helper_des("k5tylvt4r471814t566a6rct","30860152");
$cid = $ss->decrypt(UnsetFromHexString($cid));

$sql = "select id,Ftitle,Fauthor,Fcontent,Fcreate_time,Fkw from t_content where id=".$cid;
mysql_select_db("erpdq", $link);
$result = mysql_query($sql,$link); 
$info = mysql_fetch_array($result,MYSQL_NUM);
$info[1]=iconv("GB2312","UTF-8",$info[1]);
$info[2]=iconv("GB2312","UTF-8",$info[2]);
$info[3]=iconv("GB2312","UTF-8",$info[3]);
$info[5]=iconv("GB2312","UTF-8",$info[5]);


 $info_p;
 $info_n;
if($cid>1)
{
   $pcid = $cid - 1;
    $sql = "select id,Ftitle from t_content where Fis_adopt=1 and  id<".$cid." order by id DESC  limit 0,1";
   $result = mysql_query($sql,$link);
   $row = mysql_fetch_array($result,MYSQL_NUM);
   if(isNumber($row[0]))
   {
     $info_p = mysql_fetch_array($result,MYSQL_NUM);
     $info_p[1]=iconv("GB2312","UTF-8",$row[1]);
     $info_p[0] = "/news/news.php/".SetToHexString($ss->encrypt($row[0])).".html";
	}else
	{
	  $info_p = array();
	  array_push($info_p,"/news/");
	  array_push($info_p,iconv("GB2312","UTF-8","没有了"));
	}	
}else
{
	 $info_p = array();
	 array_push($info_p,"/news/");
	 array_push($info_p,iconv("GB2312","UTF-8","没有了"));
}


  $ncid = $cid + 1;
   $sql = "select id,Ftitle from t_content where Fis_adopt=1 and  id>".$cid." order by id DESC  limit 0,1";
   //echo $sql;
   $result = mysql_query($sql,$link);
   $row = mysql_fetch_array($result,MYSQL_NUM);
   if(isNumber($row[0]))
   {
     $info_n = mysql_fetch_array($result,MYSQL_NUM);
     $info_n[1]=iconv("GB2312","UTF-8",$row[1]);
     $info_n[0] = "/news/news.php/".SetToHexString($ss->encrypt($row[0])).".html";
	}else
	{
	  $info_n = array();
	  array_push($info_n,"/news/");
	  array_push($info_n,iconv("GB2312","UTF-8","没有了"));
	}



//$row[0]==$mail




$sql = "select id,Ftitle,Fauthor,Fcontent,Fcreate_time,Fkw from t_content order by id DESC  limit 0,10";
//mysql_select_db("erpdq", $link);
$result = mysql_query($sql,$link); 
while($row = mysql_fetch_array($result,MYSQL_NUM)){
    $row[0] = SetToHexString($ss->encrypt($row[0]));
	$row[1] = iconv("GB2312","UTF-8",$row[1]);
	$row[2] = iconv("GB2312","UTF-8",$row[2]);
	$row[3] = iconv("GB2312","UTF-8",$row[3]);
	$row[5] = iconv("GB2312","UTF-8",$row[5]);
	array_push($arr_new_airticle_list,$row);
 }
 $sql = "select id,Ftitle,Fauthor,Fcontent,Fcreate_time,Fkw  from t_content where Fcommend=1 order by id DESC  limit 0,10";
//mysql_select_db("erpdq", $link);
$result = mysql_query($sql,$link); 
while($row = mysql_fetch_array($result,MYSQL_NUM)){
    $row[0] = SetToHexString($ss->encrypt($row[0]));
	$row[1] = iconv("GB2312","UTF-8",$row[1]);
	$row[2] = iconv("GB2312","UTF-8",$row[2]);
	$row[3] = iconv("GB2312","UTF-8",$row[3]);
	$row[5] = iconv("GB2312","UTF-8",$row[5]);
	array_push($arr_commend_airticle_list,$row);
 }
 
$smarty->assign("arr_new_airticle_list",$arr_new_airticle_list);
$smarty->assign("arr_commend_airticle_list",$arr_commend_airticle_list);
$smarty->assign("info",$info);
$smarty->assign("info_p",$info_p);
$smarty->assign("info_n",$info_n);
$smarty->display("news.html"); 
?>