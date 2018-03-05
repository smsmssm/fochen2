<?php
include_once("../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];
$content_id = $_GET["content_id"];
function api_get_array_extrafile($arr){
	$arr_temp=array();
	for($i=0;$i<count($arr);$i++){
		$arr_t=array($i,$arr[$i],urlencode($arr[$i]));
		array_push($arr_temp,$arr_t);	
	}
	return	$arr_temp;
}
//-----------start------------------//
///$name=$_GET["name"];
if(api_verify_session()){
    $point = api_verify_point($usr);

//echo "*********************>>>>>>>> ------ ".$point;
//return;
	
	if($point==-100||$point==1){
	     
	     mysql_select_db($dbName, $link);
	     $sql="select id,Fstyle,Ftitle,Fcid,Fcontent,Fcid,Fkeywords,Fstyle,Fsummary from tchanpin where id=".$content_id; 
		 $result3 =  mysql_query($sql,$link);
		 $row3 = mysql_fetch_array($result3,MYSQL_NUM);
		 $gid =$row3[6];
	      $row3[8] = str_replace("\r\n",";",$row3[8]);
	  /*if($result3!="")
	  {
	      $row1[3] = $row3[1];
		  $row1[4] = $row3[2];
		  $row1[5] = $row3[3];
		  $row1[7] = $row3[5];
		  $row1[8] = $row3[0];
	  }*/
	  
		$smarty->assign("arr_Info_list",$row3);
		//-------------extra file start-----------------//
		$file_url="../extra_file/".($id%100)."/".$id."/";
		$arr_extraFile=api_get_array_extrafile(api_list_dir($file_url));
		$smarty->assign("file_url",$file_url); 
		$smarty->assign("arr_extraFile",$arr_extraFile);
	   //------------------------------ÆÕÍ¨ÓÃ»§
	   mysql_close($link);
	   //echo $row[0]." && ".$row[1];
	    $smarty->display("updataChanpin.html"); 
	}
}


?>