<?php
include_once("../pcomm/ini.php");
include_once("../pcomm/smtp.php");


header("Content-type: text/html; charset=gbk");
//$con=mysql_connect('shili.com','shili','1234');
//mysql_select_db('shili_db',$con);
///加上下面的代码



$db_conf = get_windows_db_conf();
$link = mysql_connect($db_conf["HOST"], $db_conf["USER"], $db_conf["PASSWD"]) or print("Could not connect: " . mysql_error());

//mysql_query('SET character_set_client = gbk;');
mysql_query('SET character_set_client=latin1;');
mysql_query('SET character_set_connection=latin1;');
mysql_query('SET character_set_database=latin1;');
mysql_query('SET character_set_results=latin1;');
mysql_query('SET character_set_server=latin1;');
mysql_query('SET character_set_system=latin1;');



$api_arr_dept_options=array("请选择","传媒事业部","网游事业部","发行事业部");
$api_arr_standard_contract=array("请选择","是","否","对方版本");
$api_arr_contract_sort=array("请选择","合同修改","合同起草","补充协议","其他");
$api_arr_contract_continue=array("请选择","是","否");
$api_arr_contract_state=array("待审核","审核中","请示中","审核完毕");
$api_arr_extrafile_prefix=array("原档","法务修改","再次审核","再次修改","请示","请示结果");

///$dbName = "xdm294501578_db";


function getIP() { //获取IP    
if ($_SERVER["HTTP_X_FORWARDED_FOR"])   
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];   
else if ($_SERVER["HTTP_CLIENT_IP"])    
$ip = $_SERVER["HTTP_CLIENT_IP"];   
else if ($_SERVER["REMOTE_ADDR"])   
$ip = $_SERVER["REMOTE_ADDR"];   
else if (getenv("HTTP_X_FORWARDED_FOR"))    
$ip = getenv("HTTP_X_FORWARDED_FOR");   
else if (getenv("HTTP_CLIENT_IP"))   
$ip = getenv("HTTP_CLIENT_IP");   
else if (getenv("REMOTE_ADDR"))    
$ip = getenv("REMOTE_ADDR");   
else   
$ip = "Unknown";   
return $ip;} 





function api_redirectWithAlert($str, $url){
	$ct = time();
	return "<script>alert('".$str."');location.href='".$url."?ct=".$ct."';</script>";
}

/*生成目录*/ 
function api_directory($dir){    
	return is_dir($dir) or (api_directory(dirname($dir)) and mkdir($dir, 0777));
}
function encodeBbsName($name){
	return urlencode(iconv("gb2312", "UTF-8", $name));
}
function decodeBbsName($name){
	return iconv("utf-8","gb2312",urldecode($name));
}
/*function api_set_session($usr){
	$md5_usr=md5($usr);
	setcookie("usrname",$usr,0,"/","byu4218000001.my3w.com");
	setcookie("nickname",$usr,0,"/","byu4218000001.my3w.com");
	setcookie("sessionid",$md5_usr,0,"/","byu4218000001.my3w.com");
	//setcookie("asas",$md5_usr,0,"/","byu4218000001.my3w.com");
	
}*/

function api_set_session2($usr,$id,$logo){
	$md5_usr=md5($usr);
	//setcookie("usrname",$usr,0,"/","byu4218000001.my3w.com");
	setcookie("nickname",$usr,0,"/","byu4218000001.my3w.com");
	setcookie("sessionid",$md5_usr,0,"/","byu4218000001.my3w.com");
	setcookie("usrid",$id,0,"/","byu4218000001.my3w.com");
	setcookie("usrlogo",$logo,0,"/","byu4218000001.my3w.com");
	//setcookie("asas",$md5_usr,0,"/","byu4218000001.my3w.com");
	
}

function api_verify_session(){
    
	return md5($_COOKIE["usrname"])==$_COOKIE["sessionid"];
}
function api_get_menu_list($i){
	$action_1=array("php/select_belong.php","发表文章");//php/airticleSubmit.php//php/select_belong.php
	$action_2=array("php/consortiaEdit.php","编辑公会信息");
	$action_3=array("php/showArticleList.php","查看已发表的文章");
	$action_4=array("php/consortiaRanking.php","公会排行榜");
	$action_5=array("php/showUserInfo.php","用户信息");
	$action_6 = array("php/all_article.php","查看所有文章");
	$action_7 = array("php/check_user.php","审核新注册用户");
	$action_8 = array("php/show_all_user.php","查看所有用户");
	switch ($i) {
    case 0://异常
        $arr_action=array();
        echo "没有权限";
        break;
    case 1://普通用户
        $arr_action=array($action_1,$action_2,$action_3,$action_5);
        break;
    case 2://超级用户 
	    $arr_action=array($action_6,$action_4,$action_7,$action_8,$action_5);
        break;
    case 3:
    		$arr_action=array($action_4);
        break;    
	}
	return 	$arr_action;
}
function api_verify_point($usr){
	global $link;
	$sql="select Flimit from consortia.t_user where Fname='".$usr."'";
	$result = mysql_query($sql,$link);
	$row = mysql_fetch_array($result, MYSQL_NUM);
	return	$row[0];
}
function api_get_array_dept($arr){
	$arr_temp=array();
	for($i=0;$i<count($arr);$i++){
		$arr_t=array($i,$arr[$i]);
		array_push($arr_temp,$arr_t);	
	}
	return	$arr_temp;
}
function api_upload_file($name,$url,$prefix){
	$upfile=$_FILES[$name];
 	$fileUrl=$url.$prefix."_".$upfile['name'];
 	$upTemp=move_uploaded_file($upfile['tmp_name'],$fileUrl);
 	chmod($fileUrl, 0755);
 	if ($upTemp){
 	return "ok";
 	}else{
 	return $upfile['name'];
 	}	
}
function api_list_dir($dir){
	$arr_file=array();
	if(is_dir($dir)){ 
		if ($dh = opendir($dir)) { 
			while (($file= readdir($dh)) !== false){ 
				if((is_dir($dir."/".$file)) && $file!="." && $file!=".."){ 
					//有子目录的情况
					//echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>"; 
					api_list_dir($dir."/".$file."/"); 
				}else{ 
					if($file!="." && $file!=".."){ 
						array_push($arr_file,$file) ; 
					} 
				} 
			} 
			closedir($dh); 
		} 
	}
	
	return $arr_file;
}

function getAddressByIndex($n)
{
   $s = "";
   switch($n)
   {
      case 1:$s = "北京";break;
	  case 2:$s="";break;
   }
   return $s;
}


function api_send_mail($email,$subject,$content){
	$smtpserver = "smtp.ym.163.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "admin@byu4218000001.my3w.com";//SMTP服务器的用户邮箱
	$smtpemailto = $email;//发送给谁
	$smtpuser = "admin@byu4218000001.my3w.com";//SMTP服务器的用户帐号
	$smtppass = "zmwyadmin";//SMTP服务器的用户密码
	$mailsubject = $subject;//邮件主题
	$mailbody = $content;//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = FALSE;//是否显示发送的调试信息
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);		
} 

function getArea($index)
{
   $res = "";
    switch($index)
  {
     case 1:$res="北京";break;case 2:$res="上海";break;case 3:$res="天津";break;
     case 4:$res="重庆";break;case 5:$res="河北";break;case 6:$res="山西";break;
     case 7:$res="内蒙古";break;case 8:$res="辽宁";break;case 9:$res="吉林";break;
     case 10:$res="黑龙江";break;case 11:$res="江苏";break;case 12:$res="浙江";break;
     case 13:$res="安徽";break;case 14:$res="福建";break;case 15:$res="江西";break;
     case 16:$res="山东";break;case 17:$res="河南";break;case 18:$res="湖北";break;
    case 19:$res="湖南";break;case 20:$res="广东";break;case 21:$res="广西";break;
     case 22:$res="海南";break;case 23:$res="四川";break;case 24:$res="贵州";break;
   
     case 25:$res="云南";break;case 26:$res="西藏";break;case 27:$res="陕西";break;
    case 28:$res="甘肃";break;case 29:$res="宁夏";break;case 30:$res="青海";break;
     case 31:$res="新疆";break;case 32:$res="港澳台";break;case 33:$res="国外";break;
  }
  return $res;
  
}


?>