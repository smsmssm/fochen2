<?php
//header('Content-Type:text/html;Charset=utf-8;');
/////判断文章的内容，如果为空或者字数太少则不能存
include_once('sinaEditor.class.php');
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
///$at =mysql_escape_string($_POST["author"]);///
$an =mysql_escape_string($_POST["articleName"]);
$summary =mysql_escape_string($_POST["summary"]);
$s  =$_POST["submit_style"];///文章类型
///$is =$_POST["isSelf"];///是否为原创
$kw=mysql_escape_string($_POST["kw"]);
$usr=$_COOKIE["usrname"];



$date = date("Y-m-d H:i:s");


///extract($_POST);
///extract($_GET);
///unset($_POST,$_GET);



/*$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";*/
$usr=$_COOKIE["usrname"];
$cid = $_COOKIE["cid"];

///$cid=$_COOKIE["usrid"];;
function api_get_array_extrafile($arr){
	$arr_temp=array();
	for($i=0;$i<count($arr);$i++){
		$arr_t=array($i,$arr[$i],urlencode($arr[$i]));
		array_push($arr_temp,$arr_t);	
	}
	return	$arr_temp;
}


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
	///if(api_verify_point($usr)==-100){
 
 
 
 $content  =mysql_real_escape_string($_POST["content"]);
 ///echo " *** > ".$content;
//$content = $gently_editor;
$content = str_replace("'", "{*}", $content);
$content = loseSpace($content);
$content = mysql_escape_string(str_replace("\\","",$content));
 
 
 $db_conf = get_windows_db_conf();
  
 mysql_select_db($dbName, $link);
 $sql="INSERT INTO  tanli(Ftitle,Fstyle,FcreateTime,Fkeywords,Fcid,Fcontent,Fsummary) VALUES  ('".$an."',"."'".$s."',"."'".$date."',"."'".$kw."',"."'".$cid."',"."'".$content."',"."'".$summary."')";
 
 mysql_query($sql);
 ///echo $sql;///return;
  
  $sql="select FcreateTime from tanli where FcreateTime='".$date."'";
  $result = mysql_query($sql,$link);
  $row = mysql_fetch_array($result, MYSQL_NUM);
   mysql_close($link);
   if($row[0]==$date){
           //echo "保存成功";
		   //return;
		   echo api_redirectWithAlert("保存成功","show_new_anli.php"); 
       }
	   else{
	       echo api_redirectWithAlert("系统忙","show_new_anli.php");
      }
  
 /// }/// echo $content;
}

?>
	