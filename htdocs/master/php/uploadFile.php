<?php
set_time_limit(0);
if ($_POST['action']=="uppic"){
 $upfile=&$HTTP_POST_FILES['pic'];
 $upfileEx=substr($upfile['name'],-3);
 $pic='../templates_c/'.date("YmdGhis").'.'.$upfileEx;//�ϴ�Ŀ¼+��ʱ�䵱�ļ���+��׺
 $upTemp=move_uploaded_file($upfile['tmp_name'],$pic);
 chmod($pic, 0755);//�趨�ϴ����ļ�������
 if ($upTemp){
 echo "success";//�ϴ��ɹ�
 }else{
 echo "failure";//�ϴ�ʧ��
 }
}
?>