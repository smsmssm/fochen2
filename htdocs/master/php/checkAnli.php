
<?php
include_once("../pcomm/api.php");
$usr=$_COOKIE["usrname"];
$aid = $_GET["id"];
$t   = $_GET["t"];

if(!api_verify_session()){

  echo api_redirectWithAlert("预览需要登录","/index.html");
  return;
 }

mysql_select_db($dbName, $link);


 
 $sql = 'update tanli set Fstatus='.$t.' where id='.$aid;
 mysql_query($sql,$link);
 
 
 echo $sql;
 /*die("<script>top.success(); </script>");*/
?>