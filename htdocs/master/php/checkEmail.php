
<?php
include_once("../pcomm/api.php");
$usr=$_COOKIE["usrname"];
$mail = $_GET["mail"];


if(!api_verify_session()){

  echo api_redirectWithAlert("预览需要登录","/index.html");
  return;
 }

mysql_select_db($dbName, $link);

 $sql = 'select count(id) from xdm294501578_db.tcompany where  Femail="'.$mail.'"';
 echo $sql;
 $result2 =  mysql_query($sql,$link); 
 $row2     = mysql_fetch_array($result2, MYSQL_NUM);
 ///mysql_query($sql,$link);
 mysql_close($link);
 
 die("<script>parent.mailRes(".$row2[0]."); </script>");
?>