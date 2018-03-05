<?php
include_once("../../pcomm/api.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty -> template_dir = "../templates";
$smarty -> compile_dir = "../templates_c";
$smarty->left_delimiter = "{{"; 
$smarty->right_delimiter = "}}";
$usr=$_COOKIE["usrname"];
$sids="";
$snames="";
$tags="";
$result3="";
$gid=$_GET["gid"];
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
	if($point==1){
	  $sql="select sid,sname,tags from consortia.t_game_tags where gid=".$gid;
      $result = mysql_query($sql,$link);
	  
	  $sql="select id,Fname from consortia.t_article_sort";// where gid=3198";//.$gid;
      $result2 = mysql_query($sql,$link);
	 
	  
	  
	 /// $data = array();
      /// $row = mysql_fetch_array($result, MYSQL_NUM);
	   while($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
	      $sort = $sort.$row2[0]."||".$row2[1]."@";
	  }
	   while($row1 = mysql_fetch_array($result, MYSQL_NUM)){
	    $sids=$sids.$row1[0]."@";
        $snames=$snames.$row1[1]."@";//iconv("UTF-8","GB2312", $snames.$row[1])."@";///iconv("GB2312", "UTF-8",$snames.$row[1])."@";
        $tags=$tags.$row1[2]."@";//iconv("UTF-8","GB2312", $tags.$row[2])."@";//iconv("GB2312", "UTF-8",$tags.$row[2])."@";
	  } 
	  $row1[0] =$sort;
	  $row1[1] =$sids."{#}".$snames."{#}".$tags;
	  $row1[2] = $gid;
	  
		$smarty->assign("arr_Info_list",$row1);
		//-------------extra file start-----------------//
		$file_url="../extra_file/".($id%100)."/".$id."/";
		$arr_extraFile=api_get_array_extrafile(api_list_dir($file_url));
		$smarty->assign("file_url",$file_url); 
		$smarty->assign("arr_extraFile",$arr_extraFile);
	   //------------------------------ÆÕÍ¨ÓÃ»§
	   mysql_close($link);
	   //echo $row[0]." && ".$row[1];
	    $smarty->display("airticleSubmit.html"); 
	}
}

$smarty->display("airticleSubmit.html"); 
?>