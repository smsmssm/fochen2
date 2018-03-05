
<?php
include_once("../pcomm/api.php");
$usr=$_COOKIE["usrname"];
$cid = $_GET["id"];
$t   = $_GET["t"];

if(!api_verify_session()){

  echo api_redirectWithAlert("预览需要登录","/index.html");
  return;
 }


function get_password( $length = 6 ) {
	$str = substr(md5(time()), 0, $length);
	return $str;
}



mysql_select_db($dbName, $link);


 
 $sql = 'update tcompany set Fstatus='.$t.' where id='.$cid;
 mysql_query($sql,$link);

 
 
 //创建公司
$check_sql="select Fcid from tuser where Fcid=".$cid;//是否已经有用户注册
$result = mysql_query($check_sql);
$row = mysql_fetch_array($result, MYSQL_NUM);



if($row[0]==null||$row[0]=="")
{
   /// echo "还没创建";
    //mysql_close($link);
    //echo api_redirectWithAlert("邮件地址已经存在，请重新注册.","../regist.htm");
    $password = get_password();
    
	$check_sql="select Femail,Fname from tcompany where id=".$cid;//是否已经有用户注册
    $result = mysql_query($check_sql);
    $row = mysql_fetch_array($result, MYSQL_NUM);	
	
	
	$sql="INSERT INTO  tuser (Femail,Fname,Flimit,Fcid,Fpassword) VALUES  ('".$row[0]."',"."'".$row[1]."',1,"."'".$cid."',"."'".$password."')";
	
	 mysql_query($sql);
	
	
}
 
 mysql_close($link);
 
 
 die("<script>top.success(); </script>");
?>