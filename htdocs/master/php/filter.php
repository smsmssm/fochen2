<?php
//header('Content-Type:text/html;Charset=utf-8;');
/////判断文章的内容，如果为空或者字数太少则不能存
include_once('sinaEditor.class.php');
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
//$at=$_POST["author"];///
///$cn =$_POST["sortiaName"];///公会名称
//$an =$_POST["articleName"];///文章名称
//$s =$_POST["submit_style"];///文章类型
//$is =$_POST["isSelf"];///是否为原创
//$usr=$_COOKIE["usrname"];
//$date = date("Y-m-d H:i:s");

extract($_POST);
extract($_GET);
unset($_POST,$_GET);

$usr=$_COOKIE["usrname"];

echo api_verify_point($usr);
if(api_verify_session()){
	if(api_verify_point($usr)==-100){
$content =$gently_editor;// htmlspecialchars($gently_editor,ENT_QUOTES);//$gently_editor;//htmlspecialchars($gently_editor,ENT_QUOTES); 
$content = str_replace("\\","",$content);

if(strlen($content)<100)
{
  echo api_redirectWithAlert("你文章容内少于50字，请重新发布.","airticleSubmit.php");
  
}else if(strlen($content)>=100)
{
  $db_conf = get_windows_db_conf();
  
 mysql_select_db("consortia", $link);
 
 
 //-------------------------过滤脏话库----------------
 $querry = "select Fword  from erpdq.t_dirty";
 $d_result = mysql_query($querry,$link);
 ///$d_row = mysql_fetch_array($d_result, MYSQL_NUM);
 $i=0;
  while($d_row = mysql_fetch_array($d_result, MYSQL_NUM))//$i<sizeof($d_row))
  {
    if(strpos($content,$d_row[0])>0)
     {
       echo "<script>alert('你所发表的内容包含不文明词，请修正后再发表!');</script>";
	   return;
     }
   }
   echo "aaaaaab";
   echo "<script>window.parent.submit();</script>";// echo 
  }/// echo $content;
 }
}

?>