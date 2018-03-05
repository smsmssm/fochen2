<?php
include_once('sinaEditor.class.php');
include_once("../pcomm/api.php");
$at =mysql_escape_string($_POST["author"]);///
$an =mysql_escape_string($_POST["articleName"]);
$s  =$_POST["submit_style"];///文章类型
$is =$_POST["isSelf"];///是否为原创
$kw=mysql_escape_string($_POST["kw"]);
$usr=$_COOKIE["usrname"];

$content_id = $_GET["content_id"];

$date = date("Y-m-d H:i:s");
extract($_POST);
extract($_GET);
unset($_POST,$_GET);




$usr=$_COOKIE["usrname"];

function loseSpace($pcon){
 //$pcon = preg_replace("/ /","",$pcon);
 //$pcon = preg_replace("/&nbsp;/","",$pcon);
// $pcon = preg_replace("/　/","",$pcon);
 $pcon = preg_replace("/\r\n/","",$pcon);
 //$pcon = str_replace(chr(13),"",$pcon);
 //$pcon = str_replace(chr(10),"",$pcon);
 //$pcon = str_replace(chr(9),"",$pcon);
 return $pcon;
}



if(api_verify_session()){
if(api_verify_point($usr)==2){
	 $content =$gently_editor;
	 
$content = str_replace("'", "{*}", $content);
$content = loseSpace($content);
$content = mysql_escape_string(str_replace("\\","",$content));
  mysql_select_db("erpdq", $link);
  
  
 $sql = "update t_content set Ftitle="."'".$an."'".",Fstyle="."'".$s."'".",Fauthor="."'".$at."'".",Fcreate_time="."'".$date."'".",Fis_self="."'".$is."'".",Fcontent="."'".$content."'"." where id=".$content_id;//" where Fname='".$usr."'";
 //$sql1 = "update consortia.t_content set Fcontent="."'".$content."'"." where id=".$content_id;
 mysql_query($sql,$link);
	
  $sql="select Fcreate_time from t_content where Fcreate_time='".$date."'";
  $result = mysql_query($sql,$link);
  $row = mysql_fetch_array($result, MYSQL_NUM);
   mysql_close($link);
   if($row[0]==$date){
		   echo api_redirectWithAlert("文章保存成功","showArticleList.php"); 
		  //echo $content_id."chenggong".$row[0];
       }
	   else{
	       echo api_redirectWithAlert("系统忙","showArticleList.php");
      }
  
  }/// echo $content;
}

?>
	