<?php
//header('Content-Type:text/html;Charset=utf-8;');
/////�ж����µ����ݣ����Ϊ�ջ�������̫�����ܴ�
include_once('sinaEditor.class.php');
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
///$at =mysql_escape_string($_POST["author"]);///
$an =mysql_escape_string($_POST["articleName"]);
$summary =mysql_escape_string($_POST["summary"]);
$s  =$_POST["submit_style"];///��������
///$is =$_POST["isSelf"];///�Ƿ�Ϊԭ��
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
// $pcon = preg_replace("/��/","",$pcon);
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
	      die( "<script>alert('�ļ�����,��׼����2M��');history.back();</script>");
		switch ($uperror) {
            case 1:
            die("<div align=\"center\">�ϴ����PHP���ó�������ֵ<a href=\"javascript.:history.back();\">�������</a></div>");
            break;
            case 2:
            die("<div align=\"center\">�ϴ������˱���������ֵ<a href=\"javascript.:history.back();\">�������</a></div>");
            break;
            case 3:
            die("<div align=\"center\">�ļ�ֻ�в��ֱ��ϴ���<a href=\"javascript.:history.back();\">�������</a></div>");
            break;
            case 4:
            die("<div align=\"center\">�ļ����б��ϴ�<a href=\"javascript.:history.back();\">�������</a></div>");
            break;
        }
	  
	   $exname=strtolower(strrchr($upfile,"."));//�ж�ȡ����չ���Ƿ���Ҫ�����չ����
          if(!in_array($exname,$exit_name))
          die("<script>alert('�������ϴ������͵��ļ���-808');history.back();</script>");
		  if ($uperror==6)
          die("<div align=\"center\">�Ҳ�����ʱ�ϴ��ļ����ϴ�ʧ��<a href=\"javascript.:history.back();\">�������</a></div>");
	  $goodupfile=@move_uploaded_file($upfiletmp,$forder.$picname.$exname);
	  
	   $picUrlName = $forder.$picname; 
	  
	  if (!$goodupfile){
          die("<div align=\"center\">�ϴ�ͼƬʧ��<a href=\"javascript.:history.back();\">�������</a></div>");
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
           //echo "����ɹ�";
		   //return;
		   
		   echo api_redirectWithAlert("����ɹ�","show_new_fangan.php"); 
       }
	   else{
	       echo api_redirectWithAlert("ϵͳæ","show_new_fangan.php");
      }
  
 /// }/// echo $content;
}

?>
	