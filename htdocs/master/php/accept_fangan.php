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
 
 
 
 
 
     $forder="../../pictemp/fangan/";
	 $icon_url = "../../uploadfile/img/fangan/";
	  $picname = time();
	  
	   $exit_name=array(".jpg",".gif",".png","jpeg");
		  $upfile=$_FILES['File']['name'];
          $uperror=$_FILES['File']['error'];
		  $upfiletmp=$_FILES['File']['tmp_name'];
		  if($upfile=="")
		  {
		     $picname = ""; 
		    ///  return;
		  }
		 
	  if($picname!="")
	  {
	   $maxSize = 2000;
          if($_FILES['File']['size']> $maxSize*1024)
	      die( "<script>alert('文件过大,不准超过2M！');history.back();</script>");
		switch ($uperror) {
            case 1:
            die("<div align=\"center\">上传真过PHP设置充许的最大值<a href=\"javascript.:history.back();\">点击返回</a></div>");
            break;
            case 2:
            die("<div align=\"center\">上传超过了表单充许的最大值<a href=\"javascript.:history.back();\">点击返回</a></div>");
            break;
            case 3:
            die("<div align=\"center\">文件只有部分被上传了<a href=\"javascript.:history.back();\">点击返回</a></div>");
            break;
            case 4:
            die("<div align=\"center\">文件不有被上传<a href=\"javascript.:history.back();\">点击返回</a></div>");
            break;
        }
	  
	   $exname=strtolower(strrchr($upfile,"."));//判断取得扩展名是否在要求的扩展名内
          if(!in_array($exname,$exit_name))
          die("<script>alert('不允许上传该类型的文件！-808');history.back();</script>");
		  if ($uperror==6)
          die("<div align=\"center\">找不到临时上传文件，上传失败<a href=\"javascript.:history.back();\">点击返回</a></div>");
	  $goodupfile=@move_uploaded_file($upfiletmp,$forder.$picname.$exname);
	  
	   $picUrlName = $forder.$picname; 
	  
	  if (!$goodupfile){
          die("<div align=\"center\">上传图片失败<a href=\"javascript.:history.back();\">点击返回</a></div>");
        }else{
		       if($_FILES['File']['size']){//
			   echo "test:".$_FILES['File']['type'];
                if($_FILES['File']['type'] == "image/pjpeg"||$_FILES['File']['type'] == "image/jpeg"){
                  $im = imagecreatefromjpeg($picUrlName.$exname);///$bigaddrname
                 }elseif($_FILES['File']['type'] == "image/x-png"||$_FILES['File']['type'] == "image/png"){
                   $im = imagecreatefrompng($picUrlName.$exname);
                  }elseif($_FILES['File']['type'] == "image/gif"){
                   $im = imagecreatefromgif($picUrlName.$exname);
                  }
			   ResizeImage($im,150,150,$icon_url.$picname);
			   imagejpeg($img,$icon_url.$picname, 90); 
			   ImageDestroy ($im);
			}
			//$sql = "update ttuwenlianjie set Fhaibao='".$icon_url."' where FcreateTime='".$date."'";
		//	mysql_query($sql);
			//echo " aaaaaaaaaaaaa  ";//
		
		}
 
     }
 
 
 
 
 
 
 
 
 
 $content  =mysql_real_escape_string($_POST["content"]);
/// echo " *** > ".$content;
//$content = $gently_editor;
$content = str_replace("'", "{*}", $content);
$content = loseSpace($content);
$content = mysql_escape_string(str_replace("\\","",$content));
 
 
 $db_conf = get_windows_db_conf();
  
 mysql_select_db($dbName, $link);
 $sql="INSERT INTO  tfangan(Ftitle,Fstyle,FcreateTime,Fkeywords,Fcid,Fcontent,Fsummary,Flogo) VALUES  ('".$an."',"."'".$s."',"."'".$date."',"."'".$kw."',"."'".$cid."',"."'".$content."',"."'".$summary."',"."'".$picname."')";
 
 mysql_query($sql);
 ///echo $sql;///return;
  
  
  $sql="select FcreateTime from tfangan where FcreateTime='".$date."'";
  $result = mysql_query($sql,$link);
  $row = mysql_fetch_array($result, MYSQL_NUM);
   mysql_close($link);
   if($row[0]==$date){
           //echo "保存成功";
		   //return;
		   
		   echo api_redirectWithAlert("保存成功","show_new_fangan.php"); 
       }
	   else{
	       echo api_redirectWithAlert("系统忙","show_new_fangan.php");
      }
  
 /// }/// echo $content;
}

?>
	