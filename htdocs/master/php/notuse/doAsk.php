<?php
include_once("../../pcomm/api.php");
$usr=$_COOKIE["usrname"];

if(api_verify_session()){
	if(api_verify_point($usr)==2){
		$sql="update contract.t_contract set Fcontract_modify='".$_POST["Fmodify"]."' where id='".$_POST["Fid"];
		mysql_query($sql,$link);	
		echo "п╩п╩ рялА╫╩ё║";
	}
}

mysql_close($link);
?>