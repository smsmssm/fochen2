<?php
/*set_time_limit(0);
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
}*/

if(api_verify_session()){
    $point = api_verify_point($usr);
	if($point==1||$point==-100){
	  
	  $forder="../pictemp/fangan/";
	  $picname = time();
	  
	   $exit_name=array(".jpg",".gif",".png","jpeg");
		  $upfile=$_FILES['File']['name'];
          $uperror=$_FILES['File']['error'];
		  $upfiletmp=$_FILES['File']['tmp_name'];
		  if($upfile=="")
		  {
		      
		      return;
		  }
	  
	   $maxSize = 500;
          if($_FILES['userfile']['size']> $maxSize*1024)
	      die( "<script>alert('�ļ�����,��׼����2M��');history.back();</script>");
		switch ($uperror) {
            case 1:
            die("<div align=\"center\">�ϴ����PHP���ó�������ֵ<a href=\"javascript.:history.back();\">�������</a></div>");
            break;
            case 2:
            die("<div align=\"center\">�ϴ������˱���������ֵ<a href=\"javascript.:history.back();\">�������</a></div>");
            break;
            case 3:
            die("<div align=\"center\">�ļ�ֻ�в��ֱ��ϴ���<a href=\"javascript.:history.back();\">�������</a></div>");
            break;
            case 4:
            die("<div align=\"center\">�ļ����б��ϴ�<a href=\"javascript.:history.back();\">�������</a></div>");
            break;
        }
	  
	   $exname=strtolower(strrchr($upfile,"."));//�ж�ȡ����չ���Ƿ���Ҫ�����չ����
          if(!in_array($exname,$exit_name))
          die("<script>alert('�������ϴ������͵��ļ���-808');history.back();</script>");
		  if ($uperror==6)
          die("<div align=\"center\">�Ҳ�����ʱ�ϴ��ļ����ϴ�ʧ��<a href=\"javascript.:history.back();\">�������</a></div>");
	  $goodupfile=@move_uploaded_file($upfiletmp,$forder.$picname.$exname);
	  
	  
	  
	  if (!$goodupfile){
          die("<div align=\"center\">�ϴ�ͼƬʧ��<a href=\"javascript.:history.back();\">�������</a></div>");
        }else{
		       if($_FILES['poster']['size']){//
                if($_FILES['poster']['type'] == "image/pjpeg"||$_FILES['poster']['type'] == "image/jpeg"){
                  $im = imagecreatefromjpeg($picUrlName.$exname);///$bigaddrname
                 }elseif($_FILES['poster']['type'] == "image/x-png"){
                   $im = imagecreatefrompng($picUrlName.$exname);
                  }elseif($_FILES['poster']['type'] == "image/gif"){
                   $im = imagecreatefromgif($picUrlName.$exname);
                  }
			   ResizeImage($im,1000,1000,$icon_url.$picname);
			   imagejpeg($img,$icon_url.$picname, 90); 
			   ImageDestroy ($im);
			}
			//$sql = "update ttuwenlianjie set Fhaibao='".$icon_url."' where FcreateTime='".$date."'";
		//	mysql_query($sql);
			//echo " aaaaaaaaaaaaa  ";//
		
		}
	  
	  
	  
	  
	}
}	
	


          //$forder=$row[1]%2000;
		   //$picname  = $row[1];
		  // $icon_url = "../../res/tuwen/icon/".$forder."/";
		//  if(!file_exists($icon_url))
        // {
           //  api_directory($icon_url);//����Ŀ¼
	       //  chmod($url, 0755);//�趨�ϴ����ļ�������
       //  }
		  
		 
		  
		  
		 
		  
		
		  
	   
       
		
		
		
	function ResizeImage($im,$maxwidth,$maxheight,$name){
$width = imagesx($im);
$height = imagesy($im);
if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
if($maxwidth && $width > $maxwidth){
$widthratio = $maxwidth/$width;
$RESIZEWIDTH=true;
}
if($maxheight && $height > $maxheight){
$heightratio = $maxheight/$height;
$RESIZEHEIGHT=true;
}
if($RESIZEWIDTH && $RESIZEHEIGHT){
if($widthratio < $heightratio){
$ratio = $widthratio;
}else{
$ratio = $heightratio;
}
}elseif($RESIZEWIDTH){
$ratio = $widthratio;
}elseif($RESIZEHEIGHT){
$ratio = $heightratio;
}
$newwidth = $width * $ratio;
$newheight = $height * $ratio;
if(function_exists("imagecopyresampled")){
$newim = imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
}else{
$newim = imagecreate($newwidth, $newheight);
imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
}
ImageJpeg ($newim,$bigaddrname.$name.".jpg");
ImageDestroy ($newim);
}else{
ImageJpeg ($im,$bigaddrname.$name.".jpg");
}
}	
		
		
		

?>