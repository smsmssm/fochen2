<?php
include_once("../../pcomm/api.php");
$usr=$_COOKIE["usrname"];
//---------start---------//
if(api_verify_session()){
	if(api_verify_point($usr)==2){
		$sql="update contract.t_contract set Fstate=3,Fnumber='".mysql_escape_string($_POST["number"])."',Fmodify='".mysql_escape_string($_POST["modify"])."',Freply_date='".date("Y-m-d h:m:s")."' where id=".$_POST["id"];
		mysql_query($sql,$link);	
		if($_POST["extraFileNum"]>0){
			$file_id=$_POST["id"];
			$url="../extra_file/".($file_id%100)."/".$file_id."/";
			api_directory($url);//����Ŀ¼
			for($i=1;$i<= $_POST["extraFileNum"];$i++){
				$nameIdx="extraFile_".$i;
				$resule=api_upload_file($nameIdx,$url,$api_arr_extrafile_prefix[1]);
				if($resule!="ok"){
					echo $nameIdx."�ϴ�ʧ�ܣ�";
				}	
			}
		}
		echo "лл ���ύ��5��󷵻��б�ҳ";
		echo "<script>setTimeout('document.location.href=\'http://contract.sandai.net/php/showListFW.php\'',5000)</script>";
	}
}
mysql_close($link);
?>