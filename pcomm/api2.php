<?php
include_once("../../pcomm/ini.php");
include_once("../../pcomm/smtp.php");
header("Content-type: text/html; charset=gbk");
$db_conf = get_windows_db_conf();
$link = mysql_connect($db_conf["HOST"], $db_conf["USER"], $db_conf["PASSWD"]) or print("Could not connect: " . mysql_error());


mysql_query('SET character_set_client=latin1;');
mysql_query('SET character_set_connection=latin1;');
mysql_query('SET character_set_database=latin1;');
mysql_query('SET character_set_results=latin1;');
mysql_query('SET character_set_server=latin1;');
mysql_query('SET character_set_system=latin1;');

$api_arr_dept_options=array("��ѡ��","��ý��ҵ��","������ҵ��","������ҵ��");
$api_arr_standard_contract=array("��ѡ��","��","��","�Է��汾");
$api_arr_contract_sort=array("��ѡ��","��ͬ�޸�","��ͬ���","����Э��","����");
$api_arr_contract_continue=array("��ѡ��","��","��");
$api_arr_contract_state=array("�����","�����","��ʾ��","������");
$api_arr_extrafile_prefix=array("ԭ��","�����޸�","�ٴ����","�ٴ��޸�","��ʾ","��ʾ���");



function getIP() { //��ȡIP    
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

/*����Ŀ¼*/ 
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
	$action_1=array("php/select_belong.php","��������");//php/airticleSubmit.php//php/select_belong.php
	$action_2=array("php/consortiaEdit.php","�༭������Ϣ");
	$action_3=array("php/showArticleList.php","�鿴�ѷ��������");
	$action_4=array("php/consortiaRanking.php","�������а�");
	$action_5=array("php/showUserInfo.php","�û���Ϣ");
	$action_6 = array("php/all_article.php","�鿴��������");
	$action_7 = array("php/check_user.php","�����ע���û�");
	$action_8 = array("php/show_all_user.php","�鿴�����û�");
	switch ($i) {
    case 0://�쳣
        $arr_action=array();
        echo "û��Ȩ��";
        break;
    case 1://��ͨ�û�
        $arr_action=array($action_1,$action_2,$action_3,$action_5);
        break;
    case 2://�����û� 
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
					//����Ŀ¼�����
					//echo "<b><font color='red'>�ļ�����</font></b>",$file,"<br><hr>"; 
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
	$smtpserver = "smtp.ym.163.com";//SMTP������
	$smtpserverport =25;//SMTP�������˿�
	$smtpusermail = "admin@byu4218000001.my3w.com";//SMTP���������û�����
	$smtpemailto = $email;//���͸�˭
	$smtpuser = "admin@byu4218000001.my3w.com";//SMTP���������û��ʺ�
	$smtppass = "sanmao123";//SMTP���������û�����
	$mailsubject = $subject;//�ʼ�����
	$mailbody = $content;//�ʼ�����
	$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
	$smtp->debug = FALSE;//�Ƿ���ʾ���͵ĵ�����Ϣ
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);		
} 

function api_send_a_mail($sender,$email,$subject,$content){
	$smtpserver = "smtp.ym.163.com";//SMTP������
	$smtpserverport =25;//SMTP�������˿�
	$smtpusermail = $sender;//"admin@byu4218000001.my3w.com";//SMTP���������û�����
	$smtpemailto = $email;//���͸�˭
	$smtpuser = $sender;//"admin@byu4218000001.my3w.com";//SMTP���������û��ʺ�
	$smtppass = "smsmssm123";//SMTP���������û�����
	$mailsubject = $subject;//�ʼ�����
	$mailbody = $content;//�ʼ�����
	$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
	$smtp->debug = FALSE;//�Ƿ���ʾ���͵ĵ�����Ϣ
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);		
} 


 function setMenu()
 {
    ///array_push($menu,"ѧ������");
	$obj  = array();
    $row  = array("��ʶ��ѧ","�����Ӧ","��ɱ����","��̹���","ѧ�𳣼��ʴ�");
	$row2 = array("rsfx","yggy","jsfs","fjgs","cjwd");
	
	array_push($obj,array("name" => "ѧ������","path" =>"xfrm", "subMenu" => $row,"subPath" =>$row2));
	
	
	$row  = array("����ܽ�","������","���","����","�����","��������","��ʩʩʳ","���","�޳ַ���");
	$row2 = array("gysj","zkwk","nf","cc","njsz","fshs","bsss","ch","xcff");
	array_push($obj,array("name" => "�ڼ�����","path" =>"zjxx", "subMenu" => $row,"subPath" =>$row2));
	
	return $obj;
	
 }
 
function getMenuName($index,$subMenuIndex,$type)
{
    
	$menuObj = setMenu();
	
	
	
	if($type=="main")return $menuObj[$index]["name"]; //����һ���˵���
	else  if($type=="sub")return $menuObj[$index]["subMenu"][$subMenuIndex];      //���ض����˵���
    else  if($type=="path")return $menuObj[$index]["path"];
	else  if($type=="subpath")return $menuObj[$index]["subPath"][$subMenuIndex];
	 
}


function getArea($index)
{
   $res = "";
    switch($index)
  {
     case 1:$res="����";break;case 2:$res="�Ϻ�";break;case 3:$res="���";break;
     case 4:$res="����";break;case 5:$res="�ӱ�";break;case 6:$res="ɽ��";break;
     case 7:$res="���ɹ�";break;case 8:$res="����";break;case 9:$res="����";break;
     case 10:$res="������";break;case 11:$res="����";break;case 12:$res="�㽭";break;
     case 13:$res="����";break;case 14:$res="����";break;case 15:$res="����";break;
     case 16:$res="ɽ��";break;case 17:$res="����";break;case 18:$res="����";break;
    case 19:$res="����";break;case 20:$res="�㶫";break;case 21:$res="����";break;
     case 22:$res="����";break;case 23:$res="�Ĵ�";break;case 24:$res="����";break;
   
     case 25:$res="����";break;case 26:$res="����";break;case 27:$res="����";break;
    case 28:$res="����";break;case 29:$res="����";break;case 30:$res="�ຣ";break;
     case 31:$res="�½�";break;case 32:$res="�۰�̨";break;case 33:$res="����";break;
  }
  return $res;
  
}





?>