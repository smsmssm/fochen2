<?php
include_once("../pcomm/api.php");
//$age_month = mysql_escape_string($_POST["userAge_month"]);///
//$age_day = mysql_escape_string($_POST["userAge_day"]);///
//echo  mysql_escape_string($_POST["city"]);
//return;
$cname  = mysql_escape_string($_POST["company_name"]);///��˾����
$sname  = mysql_escape_string($_POST["sortname"]);///
$site_url  = mysql_escape_string($_POST["site_url"]);///
$intro  = mysql_escape_string($_POST["intro"]);///
$province  = mysql_escape_string($_POST["province"]);///
$city  = mysql_escape_string($_POST["city"]);///
$address  = mysql_escape_string($_POST["address"]);///
$zipcode  = mysql_escape_string($_POST["zipcode"]);///
$telephone  = mysql_escape_string($_POST["telephone"]); //
$fax  = mysql_escape_string($_POST["fax"]); //
$business_scope  = mysql_escape_string($_POST["business_scope"]);//ҵ��Χ
$erp_type  = mysql_escape_string($_POST["erp_type"]);//erp���� 1���� 2��� 3�ٴ� 4�ܼ��� 5�˳� 6������ 7����
$qq  = mysql_escape_string($_POST["qq"]);//
$establish  = mysql_escape_string($_POST["establish"]);//����ʱ��
$customer  = mysql_escape_string($_POST["customer"]);//����ͻ�
$guimo  = mysql_escape_string($_POST["guimo"]);
$products = mysql_escape_string($_POST["pro_types"]);
  
  
   $usr=$_COOKIE["usrname"];
  if(api_verify_session()){
	if(api_verify_point($usr)==2){
	$db_conf = get_windows_db_conf();
   mysql_select_db("erpdq", $link);
   
	$sql = "update tcompany set FcompanyName="."'".$cname."'".",Fsname="."'".$sname."'".",Fintroduce="."'".$intro."'".",FwebSite="."'".$site_url."'".",Fprovince="."'".$province."'".",Fcity="."'".$city."'".",FzipCode="."'".$zipcode."'".",Ftel="."'".$telephone."'".",Ffax="."'".$fax."'".",Ftype="."'".$erp_type."'".",Farea="."'".$business_scope."'".",Fqq="."'".$qq."'".",Fsetup="."'".$establish."'".",Fcustomer="."'".$customer."'".",FstaffNumber="."'".$guimo."'".",Fproduct="."'".$products."'".",Faddr="."'".$address."'"." where Fmail='".$usr."'";//" where Fname='".$usr."'";
	
    mysql_query($sql );
	//$sql = "update consortia.t_content set Fis_adopt=".$adopt." where Fcheck_id='".$id."'";//"select id,Fcon_name from consortia.t_user where Fname='".$usr."'";
   // mysql_query($sql );
	
    mysql_close($link);
	echo api_redirectWithAlert("����ɹ�","showUserInfo.php");
   }
 }
    //
?>