<?php
include_once("../pcomm/api.php");
include_once('sinaEditor.class.php');
//$age_month = mysql_escape_string($_POST["userAge_month"]);///
//$age_day = mysql_escape_string($_POST["userAge_day"]);///
//echo  mysql_escape_string($_POST["city"]);
//return;
$sessimg = mysql_escape_string($_POST["sessimg"]);///
$mail = mysql_escape_string($_POST["mail"]);///会长mail
$pwd  = "111222333";//mysql_escape_string($_POST["password1"]);///用户密码
$cname  = mysql_escape_string($_POST["company_name"]);///公司名称

$sname  = mysql_escape_string($_POST["sortname"]);///
$site_url  = mysql_escape_string($_POST["site_url"]);///
$intro  = mysql_escape_string($_POST["intro"]);///
$province  = mysql_escape_string($_POST["province"]);///
$city  = mysql_escape_string($_POST["city"]);///
$address  = mysql_escape_string($_POST["address"]);///
$zipcode  = mysql_escape_string($_POST["zipcode"]);///
$contact  = mysql_escape_string($_POST["contact"]); //联系人
$telephone  = mysql_escape_string($_POST["telephone"]); //
$fax  = mysql_escape_string($_POST["fax"]); //
$business_scope  = mysql_escape_string($_POST["business_scope"]);//业务范围
$erp_type  = mysql_escape_string($_POST["erp_type"]);//erp类型 1用友 2金蝶 3速达 4管家婆 5浪潮 6金算盘 7其他
$qq  = mysql_escape_string($_POST["qq"]);//
$establish  = mysql_escape_string($_POST["establish"]);//成立时间
$customer  = mysql_escape_string($_POST["customer"]);//代表客户
$guimo  = mysql_escape_string($_POST["guimo"]);
$products = mysql_escape_string($_POST["pro_types"]);
$date = date("Y-m-d H:i:s");

extract($_POST);
extract($_GET);
unset($_POST,$_GET);

session_start();
$rt = $_COOKIE['randcode'];

if($sessimg!=$_SESSION[$rt])
{
   echo api_redirectWithAlert("验证码不正确.","../regist.htm");
   return;
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

$content = $gently_editor;
$content = str_replace("'", "{*}", $content);
$content = loseSpace($content);
$content = mysql_escape_string(str_replace("\\","",$content));




$sql="INSERT INTO  tcompany (Fmail,FpassWord,FcompanyName,FwebSite,Fintroduce,Fprovince,Fcity,Faddr,FzipCode,FcontactPerson,Ftel,Ffax,Farea,Ftype,Fqq,Fsetup,Fcustomer,FstaffNumber,Fproduct,FcreateTime,Fsname) VALUES  ('".$mail."',"."'".$pwd."',"."'".$cname."',"."'".$site_url."',"."'".$content."',"."'".$province."',"."'".$city."',"."'".$address."',"."'".$zipcode."',"."'".$contact."',"."'".$telephone."',"."'".$fax."',"."'".$business_scope."',"."'".$erp_type."',"."'".$qq."',"."'".$establish."',"."'".$customer."',"."'".$guimo."',"."'".$products."',"."'".$date."',"."'".$sname."')";

mysql_select_db("erpdq", $link);
$check_sql="select Fmail from tcompany where Fmail='".$mail."'";//是否已经有用户注册
$result = mysql_query($check_sql);
$row = mysql_fetch_array($result, MYSQL_NUM);

if($row[0]==$mail)
{
   mysql_close($link);
  echo api_redirectWithAlert("邮件地址已经存在，请重新注册.","../regist.htm");
}else
{
    mysql_query($sql);
	$check_sql="select FcompanyName,id,Fmail from tcompany where Fmail='".$mail."'";//是否
    $result = mysql_query($check_sql);
    $row = mysql_fetch_array($result,MYSQL_NUM);
   // mysql_close($link);
   
   $sql="INSERT INTO  tmaster (FCompanyId) VALUES  ('".$row[1]."')";
   mysql_query($sql);
   
   
	if($row[2]==$mail)
    {
	     //$sql2 = "INSERT INTO  tspace (Fowner_id) VALUES  ('".$row[1]."')";
		// mysql_query($sql2);
		 //api_send_mail($mail,"欢迎成为搞客吧成员!","尊敬的用户,搞客吧相当荣幸的能邀请到您加盟光临，欢迎您以后常来搞客吧，请记住两样事：1我们的域名是gaoke8.com;2:您的帐号和密码。");
		 api_set_session2($mail,$row[0],$row[1]);///////////////////////////////////////////////发邮件是不是应该放在 提示登录之后，跳到首页之后？
         echo api_redirectWithAlert("注册成功","addcompany.php");///应该跳到登录页
     }else
	 {
        echo api_redirectWithAlert("服务器忙，请稍后注册.","addcompany.php");
	 }
}
  mysql_close($link);
?>