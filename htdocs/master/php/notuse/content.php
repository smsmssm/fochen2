<?php
//header('Content-Type:text/html;Charset=utf-8;');
include_once("../../pcomm/api.php");
include_once("../smarty/Smarty.class.php");

extract($_POST);
extract($_GET);
unset($_POST,$_GET);

$usr=$_COOKIE["usrname"];


if(api_verify_session()){
	if(api_verify_point($usr)==1){
$content =$gently_editor;// htmlspecialchars($gently_editor,ENT_QUOTES);//$gently_editor;//htmlspecialchars($gently_editor,ENT_QUOTES); 
$content = str_replace("\\","",$content);
   echo "<script>window.parent.setContent('".$content."');</script>";// echo //
  }/// echo $content;
}

?>