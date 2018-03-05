<?php
//header('Content-Type:text/html;Charset=utf-8;');
/////判断文章的内容，如果为空或者字数太少则不能存
include_once('sinaEditor.class.php');
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$at =mysql_escape_string($_POST["author"]);///
$an =mysql_escape_string($_POST["articleName"]);
$summary =mysql_escape_string($_POST["summary"]);
$s  =$_POST["submit_style"];///文章类型
$is =$_POST["isSelf"];///是否为原创
$kw=mysql_escape_string($_POST["kw"]);
$usr=$_COOKIE["usrname"];
$aid =$_POST["aid"];///是否为原创
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
$cid=$_COOKIE["usrid"];;
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
// $sql="INSERT INTO  tnews(Ftitle,Fstyle,FcreateTime,Fauthor,Fkeywords,Fcid,Fis_self,Fcontent,Fsummary) VALUES  ('".$an."',"."'".$s."',"."'".$date."',"."'".$at."',"."'".$kw."',"."'".$cid."',"."'".$is."',"."'".$content."',"."'".$summary."')";
 
 
 	$sql = "update tanli set Ftitle="."'".$an."'".",Fstyle="."'".$s."'".",Fkeywords="."'".$kw."'".",Fcontent="."'".$content."'".",Fsummary="."'".$summary."'".",Fstatus=0"." where id='".$aid."'";//" where Fname='".$usr."'";
	

 
 
 mysql_query($sql);
 ///echo $sql;///return;
  
 // $sql="select FcreateTime from xdm294501578_db.tnews where FcreateTime='".$date."'";
 // $result = mysql_query($sql,$link);
 // $row = mysql_fetch_array($result, MYSQL_NUM);
  // mysql_close($link);
   //if($row[0]==$date){
          /// echo "保存成功,审核完后将发布";
		 //  return;
		  echo api_redirectWithAlert("保存成功","show_new_anli.php"); 
      // }
	  // else{
	       // echo "保存失败";
			//return;
	       //echo api_redirectWithAlert("系统忙","airticleSubmit.php");
     // }
  
 /// }/// echo $content;
}

?>
	