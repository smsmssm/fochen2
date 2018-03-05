<?php
include_once("des.php");
include_once("../pcomm/api.php");
$id=$_GET["id"];
$usr=$_COOKIE["usrname"];

function  isNumber($var ) {
       return ereg ("^[-]?[0-9]+([\.][0-9]+)?$", $var);
    } 
	
if(!isNumber($id))
{
   echo "0";
   return;
 }

if(api_verify_session()){
	if(api_verify_point($usr)==2){
	
	$ss = new helper_des("k5tylvt4r471814t566a6rct","30860152");
	/////$id = $ss->decrypt(UnsetFromHexString($id));
	
	$sql = "update erpdq.t_content set Fis_submit=1 where id=".$id ;
	 mysql_query($sql,$link); 
	$sql = "update erpdq.t_content set Fis_adopt=2 where id=".$id ;
	mysql_query($sql,$link);
	echo "$sql";
	mysql_close($link);
	return;
	}
	echo "0";
}

?>