<?php
include_once("../../pcomm/api.php");
$usr=$_COOKIE["usrname"];
function getReplyDate(){
	return 	date("Y-m-d");
}
//---------start---------//
if(api_verify_session()){
	if(api_verify_point($usr)==1){
		$sql="insert into contract.t_contract (Fsubmiter,Fsubmit_dept,Ftitle,Fpartner,Ftimes,Fmoney,Flength,Fproduct,Fmode,Fstandard,Fsort,Fcontinue,Fsubmit_date,Freply_date) values ('".mysql_escape_string($_POST["submiter"])."',".mysql_escape_string($_POST["submit_dept"]).",'".mysql_escape_string($_POST["title"])."','".mysql_escape_string($_POST["partner"])."','".mysql_escape_string($_POST["times"])."','".mysql_escape_string($_POST["money"])."','".mysql_escape_string($_POST["length"])."','".mysql_escape_string($_POST["product"])."','".mysql_escape_string($_POST["mode"])."',".mysql_escape_string($_POST["standard"]).",".mysql_escape_string($_POST["sort"]).",".mysql_escape_string($_POST["continue"]).",'".date("Y-m-d h:m:s")."','".getReplyDate()."');";
		mysql_query($sql,$link);	
		if($_POST["extraFileNum"]>0){
			$sql="select id from contract.t_contract where Ftitle='".mysql_escape_string($_POST["title"])."'";
			$result = mysql_query($sql,$link);
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$file_id=$row[0];
			$url="../extra_file/".($file_id%100)."/".$file_id."/";
			api_directory($url);//生成目录
			for($i=1;$i<= $_POST["extraFileNum"];$i++){
				$nameIdx="extraFile_".$i;
				$resule=api_upload_file($nameIdx,$url,$api_arr_extrafile_prefix[0]);
				if($resule!="ok"){
					echo $nameIdx."上传失败！";
				}	
			}
		}
		echo "谢谢 已提交！预计回复时间为,5秒后返回列表页";
		echo "<script>setTimeout('document.location.href=\'http://contract.sandai.net/php/showList.php\'',5000)</script>";
	}
}
mysql_close($link);
?>