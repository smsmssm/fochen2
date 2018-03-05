<?php
/**
 * 新浪博客编辑器PHP版封装类调用方法
 * 
 */
header('Content-Type:text/html;Charset=utf-8;');
include_once('sinaEditor.class.php');
extract($_POST);
extract($_GET);
unset($_POST,$_GET);
$usr=$_POST["author"];///用户名
$cn =$_POST["sortiaName"];///公会名称
$an =$_POST["articleName"];///公会网站
if(isset($act)){
  $act=='subok' && die("提交的内容是：<br>".htmlspecialchars($gently_editor)).$usr.$cn.$an;
}
each htmlspecialchars($gently_editor));
?>
	