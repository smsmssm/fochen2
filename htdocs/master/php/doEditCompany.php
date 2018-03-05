<?php
include_once("../pcomm/api.php");
//$age_month = mysql_escape_string($_POST["userAge_month"]);///
//$age_day = mysql_escape_string($_POST["userAge_day"]);///
//echo  mysql_escape_string($_POST["city"]);
//return;




$cid = mysql_escape_string($_POST["cid"]);///
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
$contact  = mysql_escape_string($_POST["linkman"]); //联系人
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
$summary =  mysql_escape_string($_POST["summary"]);
$linkman =  mysql_escape_string($_POST["linkman"]);
//extract($_POST);
//extract($_GET);
//unset($_POST,$_GET);

/////////////////////////session_start();
////////////$rt = $_COOKIE['randcode'];

//if($sessimg!=$_SESSION[$rt])
//{
  // echo api_redirectWithAlert("验证码不正确.","../regist.htm");
  // return;
//} 
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
$content  =mysql_real_escape_string($_POST["content"]);
//$content = $gently_editor;
$content = str_replace("'", "{*}", $content);
$content = loseSpace($content);
$content = mysql_escape_string(str_replace("\\","",$content));



mysql_select_db($dbName, $link);
$sql = "update tcompany set Femail="."'".$mail."'".",Fname="."'".$cname."'".",Fwebsite="."'".$site_url."'".",Fintroduce="."'".$content."'".",Fprovince="."'".$province."'".",Fcity="."'".$city."'".",Faddress="."'".$address."'".",Ftel="."'".$telephone."'".",Flinkman="."'".$contact."'".",FfoundTime="."'".$establish."'".",Fcustomers="."'".$customer."'".",Fproducts="."'".$products."'".",FshortName="."'".$sname."'".",Fsummary="."'".$summary."'".",Fstatus=0"." where id=".$cid;


///echo $sql;
/*$sql="INSERT INTO  tcompany (Femail,Fname,Fwebsite,Fintroduce,Fprovince,Fcity,Faddress,Flinkman,Ftel,FfoundTime,Fcustomers,Fproducts,FcreateTime,FshortName,Fsummary) VALUES  ('".$mail."',"."'".$cname."',"."'".$site_url."',"."'".$content."',"."'".$province."',"."'".$city."',"."'".$address."',"."'".$contact."',"."'".$telephone."',"."'".$establish."',"."'".$customer."',"."'".$products."',"."'".$date."',"."'".$sname."',"."'".$summary."')";
*/

mysql_query($sql);
//$sql = "update consortia.t_content set Fis_adopt=".$adopt." where Fcheck_id='".$id."'";//"select id,Fcon_name from consortia.t_user where Fname='".$usr."'";
// mysql_query($sql );
	
mysql_close($link);
echo api_redirectWithAlert("保存成功","basic.php");


?>