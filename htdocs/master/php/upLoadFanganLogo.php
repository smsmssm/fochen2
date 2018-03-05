<?php
/*set_time_limit(0);
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
	      die( "<script>alert('文件过大,不准超过2M！');history.back();</script>");
		switch ($uperror) {
            case 1:
            die("<div align=\"center\">上传真过PHP设置充许的最大值<a href=\"javascript.:history.back();\">点击返回</a></div>");
            break;
            case 2:
            die("<div align=\"center\">上传超过了表单充许的最大值<a href=\"javascript.:history.back();\">点击返回</a></div>");
            break;
            case 3:
            die("<div align=\"center\">文件只有部分被上传了<a href=\"javascript.:history.back();\">点击返回</a></div>");
            break;
            case 4:
            die("<div align=\"center\">文件不有被上传<a href=\"javascript.:history.back();\">点击返回</a></div>");
            break;
        }
	  
	   $exname=strtolower(strrchr($upfile,"."));//判断取得扩展名是否在要求的扩展名内
          if(!in_array($exname,$exit_name))
          die("<script>alert('不允许上传该类型的文件！-808');history.back();</script>");
		  if ($uperror==6)
          die("<div align=\"center\">找不到临时上传文件，上传失败<a href=\"javascript.:history.back();\">点击返回</a></div>");
	  $goodupfile=@move_uploaded_file($upfiletmp,$forder.$picname.$exname);
	  
	  
	  
	  if (!$goodupfile){
          die("<div align=\"center\">上传图片失败<a href=\"javascript.:history.back();\">点击返回</a></div>");
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
           //  api_directory($icon_url);//生成目录
	       //  chmod($url, 0755);//设定上传的文件的属性
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