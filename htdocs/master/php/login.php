<?php
include_once("../pcomm/api.php");
$usr=$_POST["u"];
$pwd=$_POST["p"];
//$db_conf = get_windows_db_conf();
//$link = mysql_connect($db_conf["HOST"], $db_conf["USER"], $db_conf["PASSWD"], TRUE) or print("Could not connect: " . mysql_error());
mysql_select_db($dbName, $link);
//var_dump($dbName);
//var_dump($link);
$sql="select Fpassword,id,Fcid,Fname from tuser where Femail='".$usr."'";
$result = mysql_query($sql,$link);
$row = mysql_fetch_array($result, MYSQL_NUM);


/*登录后跳转*/
if($row[0]==$pwd){
	api_set_session2($usr,$row[1],$row[2],$row[3]);//;    iconv("UTF-8","GB2312",$row[1]));
	$target="../Frame.html";
	header(sprintf("Location: %s", $target));	
}else{
	echo api_redirectWithAlert("帐户不存在或密码错误,请重新登录.".$dbName.$sql.$link.$result,"../index.html");
}
?>