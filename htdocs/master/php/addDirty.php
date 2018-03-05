<?php
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$w = mysql_escape_string($_GET["w"]);
$usr=$_COOKIE["usrname"];
if(api_verify_session()&&api_verify_point($usr)&&$w!=""){
   
   
   
   
}else
{
   echo api_redirectWithAlert("请重新登录.","../index.php");
}

?>