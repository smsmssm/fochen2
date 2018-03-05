<?php
include_once("../../../pcomm/ini.php");
include_once("../pcomm/smtp.php");
$db_conf = get_windows_db_conf();
$link = mysql_connect($db_conf["HOST"], $db_conf["USER"], $db_conf["PASSWD"]) or print("Could not connect: " . mysql_error());
 var_dump($link);
mysql_query('SET character_set_client=latin1;');
mysql_query('SET character_set_connection=latin1;');
mysql_query('SET character_set_database=latin1;');
mysql_query('SET character_set_results=latin1;');
mysql_query('SET character_set_server=latin1;');
mysql_query('SET character_set_system=latin1;');

$api_arr_dept_options=array("?????","??y?????","?????????","?????????");
$api_arr_standard_contract=array("?????","??","??","????·Ú");
$api_arr_contract_sort=array("?????","??????","??????","????§¿??","????");
$api_arr_contract_continue=array("?????","??","??");
$api_arr_contract_state=array("?????","?????","?????","??????");
$api_arr_extrafile_prefix=array("???","???????","??????","??????","???","??????");
date_default_timezone_set('PRC');
function api_redirectWithAlert($str, $url){
	$ct = time();
	return "<script>alert('".$str."');location.href='".$url."?ct=".$ct."';</script>";
}

/*??????*/ 
function api_directory($dir){    
	return is_dir($dir) or (api_directory(dirname($dir)) and mkdir($dir, 0777));
}
function encodeBbsName($name){
	return urlencode(iconv("gb2312", "UTF-8", $name));
}
function decodeBbsName($name){
	return iconv("utf-8","gb2312",urldecode($name));
}
function api_set_session($usr){
	$md5_usr=md5($usr);
	setcookie("usrname",$usr,0,"/","byu4218000001.my3w.com");
	setcookie("nickname",$usr,0,"/","byu4218000001.my3w.com");
	setcookie("sessionid",$md5_usr,0,"/","byu4218000001.my3w.com");
	//setcookie("asas",$md5_usr,0,"/","byu4218000001.my3w.com");
	
}

function api_set_session2($usr,$id,$cid,$name){
	$md5_usr=md5($usr);
	setcookie("usrname",$usr,0,"/","byu4218000001.my3w.com");
	setcookie("nickname",$name,0,"/","1byu4218000001.my3w.com");
	setcookie("sessionid",$md5_usr,0,"/","byu4218000001.my3w.com");
	setcookie("usrid",$id,0,"/","byu4218000001.my3w.com");
	setcookie("cid",$cid,0,"/","byu4218000001.my3w.com");
	
	//setcookie("asas",$md5_usr,0,"/","byu4218000001.my3w.com");
	
}

function api_verify_session(){
    
	//return md5($_COOKIE["usrname"])==$_COOKIE["sessionid"];
	return true;
}

function api_get_vod_quality_menu_list($i){

	$action_1=array("php/showLiveCode.php","?????????");
	$action_2=array("php/showVodCode.php","?????????");
	$action_3=array("php/showArticleList.php","????????????");
	$action_4=array("php/consortiaRanking.php","???????§Ñ?");
	$action_5=array("php/showUserInfo.php","??????");
	$action_6 = array("php/all_article.php","??????????");
	$action_7 = array("php/check_user.php","???????????");
	$action_8 = array("php/show_all_user.php","????????");
	$action_9 = array("php/showConnect.php","??????????");
	//switch ($i) {
  //  case 0://??
        //$arr_action=array();
       // echo "??????";
      //  break;
   // case 1://??????
       // $arr_action=array($action_1,$action_2,$action_3,$action_5);
      //  break;
   // case 2://??????? 
	    $arr_action=array($action_1,$action_2,$action_8,$action_9);
      //  break;
  //  case 3:
    		//$arr_action=array($action_4);
       // break;    
	//}
	return 	$arr_action;
}

function api_get_project_manager_menu_list($i){
	$action_1=array("php/showLiveCode.php","§³??????????");
	$action_2=array("php/showVodCode.php","?????????????");
	$action_3=array("php/showArticleList.php","?????????????");
	//switch ($i) {
   // case 0://??
       // $arr_action=array();
      //  echo "??????";
      //  break;
   // case 1://??????
      //  $arr_action=array($action_1,$action_2,$action_3);
      //  break;
    //case 2://??????? 
	    $arr_action=array($action_1,$action_2,$action_3);
       // break;    
	//}
	return 	$arr_action;
}


function aip_get_operate_menu_list($i)
{
    $action_1=array("operate.php","????????????");
	$action_2=array("userToCheck.php","?????????");
	$action_3=array("newsToCheck.php","??????????");
	$action_4=array("operate.php","?????????");
	$action_5=array("operate.php","?????????");
	
	$action_5=array("senEmail.php","???????");
	
	switch ($i) {
    case 0://
        $arr_action=array();
        echo "??????";
        break;
    case 1://??????
       /// $arr_action=array($action_1,$action_2,$action_3,$action_5);
        break;
    case -100://?????
    	$arr_action=array($action_1,$action_2,$action_3,$action_4,$action_5);
        break;    
	}
	return 	$arr_action;
}


function api_get_edit_menu_list($i){

	//$action_1=array("editCompany.php","?????");
	
	
	switch ($i) {
    case 0://
        $arr_action=array();
        echo "??????";
        break;
    case 1://??????
        $arr_action=array($action_1,$action_2,$action_3,$action_5);
        break;
    case -100://?????
    	$arr_action=array($action_1);
        break;    
	}
	return 	$arr_action;
}


function api_get_menu_list($i){
	//$action_1=array("showLiveCode.php","??????????");
	//$action_2=array("showVodCode.php","??????????");
	
	
	//////$action_3=array("airticleSubmit.php","??????????");
	//$action_4=array("showArticleList.php","???1???");
	$action_5=array("editCompany.php","??????????");
	$action_9 = array("show_new_airticle.php","????????");
	
	$action_6 = array("show_youhui.php","????????");
	$action_7 = array("addcompany.php","??????????");
	$action_8 = array("show_user_list.php","??????§Ò?");
	
	
	$action_10 = array("addquestion.php","??????????");
	$action_11 = array("show_new_question.php","?????????");
	
	
	///$action_12 = array("addanli.php","??????");
	$action_13 = array("show_new_anli.php","???????????");
	
///	$action_14 = array("addfangan.php","??????");
	$action_15 = array("show_new_fangan.php","???????????");
	
	///$action_16 = array("addchanpin.php","?????");
	$action_17 = array("show_new_chanpin.php","??????????");
	
	
	
	//$action_16 = array("addanli.php","????????");
	//$action_17 = array("show_new_anli.php","??????");
	//$action_9 = array("php/showConnect.php","??????????");
	
	
	switch ($i) {
    case 0://
        $arr_action=array();
        echo "??????";
        break;
    case 1://?????? $action_3,
        $arr_action=array($action_5,$action_15,$action_13,$action_17,$action_9);
        break;
    case 2://?????? 
	   // $arr_action=array($action_1,$action_2,$action_3,$action_4,$action_6,$action_8,$action_9,$action_10);
        break;
    case -100://?????
    	$arr_action=array($action_8,$action_9,$action_10,$action_11,$action_13,$action_15,$action_17);
        break;    
	}
	return 	$arr_action;
}




function api_verify_point($usr){
	global $link;
	$sql="select Flimit,Femail from xdm294501578_db.tuser where Femail='".$usr."'";
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
					//???????????
					//echo "<b><font color='red'>???????</font></b>",$file,"<br><hr>"; 
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
function api_send_mail($email,$subject,$content){
	$smtpserver = "mail.xunlei.com";//SMTP??????
	$smtpserverport =25;//SMTP?????????
	$smtpusermail = "zhangronghui@xunlei.com";//SMTP???????????????
	$smtpemailto = $email;//??????
	$smtpuser = "zhangronghui";//SMTP??????????????
	$smtppass = "sanmao123";//SMTP???????????????
	$mailsubject = $subject;//???????
	$mailbody = $content;//???????
	$mailtype = "HTML";//????????HTML/TXT??,TXT???????
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//??????????true?????????????,?????????????.
	$smtp->debug = FALSE;//?????????????????
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);		
} 


function ResizeImage($im,$maxwidth,$maxheight,$name){
$width = imagesx($im);
$height = imagesy($im);
if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
if($maxwidth && $width > $maxwidth){
$widthratio = $maxwidth/$width;
$RESIZEWIDTH=true;
}
if($maxheight && $height > $maxheight){
$heightratio = $maxheight/$height;
$RESIZEHEIGHT=true;
}
if($RESIZEWIDTH && $RESIZEHEIGHT){
if($widthratio < $heightratio){
$ratio = $widthratio;
}else{
$ratio = $heightratio;
}
}elseif($RESIZEWIDTH){
$ratio = $widthratio;
}elseif($RESIZEHEIGHT){
$ratio = $heightratio;
}
$newwidth = $width * $ratio;
$newheight = $height * $ratio;
if(function_exists("imagecopyresampled")){
$newim = imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
}else{
$newim = imagecreate($newwidth, $newheight);
imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
}
ImageJpeg ($newim,$bigaddrname.$name.".jpg");
ImageDestroy ($newim);
}else{
ImageJpeg ($im,$bigaddrname.$name.".jpg");
}
}	

?>