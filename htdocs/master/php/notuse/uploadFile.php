<?php
set_time_limit(0);
if ($_POST['action']=="uppic"){
 $upfile=&$HTTP_POST_FILES['pic'];
 $upfileEx=substr($upfile['name'],-3);
 $pic='../templates_c/'.date("YmdGhis").'.'.$upfileEx;//上传目录+用时间当文件名+后缀
 $upTemp=move_uploaded_file($upfile['tmp_name'],$pic);
 chmod($pic, 0755);//设定上传的文件的属性
 if ($upTemp){
 echo "success";//上传成功
 }else{
 echo "failure";//上传失败
 }
}
?>