<?php
include_once("../pcomm/api.php");
//$age_month = mysql_escape_string($_POST["userAge_month"]);///
//$age_day = mysql_escape_string($_POST["userAge_day"]);///
//echo  mysql_escape_string($_POST["city"]);
//return;




$cid = mysql_escape_string($_POST["cid"]);///
$sessimg = mysql_escape_string($_POST["sessimg"]);///
$mail = mysql_escape_string($_POST["mail"]);///�᳤mail
$pwd  = "111222333";//mysql_escape_string($_POST["password1"]);///�û�����
$cname  = mysql_escape_string($_POST["company_name"]);///��˾����

$sname  = mysql_escape_string($_POST["sortname"]);///
$site_url  = mysql_escape_string($_POST["site_url"]);///
$intro  = mysql_escape_string($_POST["intro"]);///
$province  = mysql_escape_string($_POST["province"]);///
$city  = mysql_escape_string($_POST["city"]);///
$address  = mysql_escape_string($_POST["address"]);///
$zipcode  = mysql_escape_string($_POST["zipcode"]);///
$contact  = mysql_escape_string($_POST["linkman"]); //��ϵ��
$telephone  = mysql_escape_string($_POST["telephone"]); //
$fax  = mysql_escape_string($_POST["fax"]); //
$business_scope  = mysql_escape_string($_POST["business_scope"]);//ҵ��Χ
$erp_type  = mysql_escape_string($_POST["erp_type"]);//erp���� 1���� 2��� 3�ٴ� 4�ܼ��� 5�˳� 6������ 7����
$qq  = mysql_escape_string($_POST["qq"]);//
$establish  = mysql_escape_string($_POST["establish"]);//����ʱ��
$customer  = mysql_escape_string($_POST["customer"]);//����ͻ�
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
  // echo api_redirectWithAlert("��֤�벻��ȷ.","../regist.htm");
  // return;
//} 
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
echo api_redirectWithAlert("����ɹ�","basic.php");


?>