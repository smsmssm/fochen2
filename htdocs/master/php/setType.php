
<?php
include_once("../pcomm/api.php");
$usr=$_COOKIE["usrname"];
$cid = $_GET["id"];
$t   = $_GET["t"];
$v   = $_GET["v"];

if(!api_verify_session()){

  echo api_redirectWithAlert("预览需要登录","/index.html");
  return;
 }

mysql_select_db($dbName, $link);

 $type ="";
 
 switch(intval($t))
 {
    case 1:$type="FisCloud";break;
	case 2:$type="FisBigData";break;
	case 3:$type="FisFangan";break;
	case 4:$type="FisGongye";break;
	case 5:$type="FisNongye";break;
	case 6:$type="FisJiaju";break;
	case 7:$type="FisYiliao";break;
	case 8:$type="FisChengshi";break;
	case 9:$type="FisChe";break;
 }
 
 $sql = 'update tcompany set '.$type.'='.$v.' where id='.$cid;
 mysql_query($sql,$link);
 mysql_close($link);
 
 die("<script>top.success(); </script>");
?>