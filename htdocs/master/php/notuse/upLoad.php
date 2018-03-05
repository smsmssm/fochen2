<?php
//设置存放的目录
$upladdir = "../templates_c/";//"../";//"D:\www\upload2\file";$_SERVER['DOCUMENT_ROOT'].
//获得文件的名称
$name = $_FILES['file']['name'];
//获得文件的类型
$type = $_FILES['file']['type'];
//获得上传文件的大小
$size = $_FILES['file']['size'];
//获取临时上传的目录
$tmp = $_FILES['file']['tmp_name'];
//获得文件的错误代码
$error = $_FILES['file']['error'];
///$up = $upladdir.$name;
///////应该加个修改文件名的操作
$up = $upladdir.date("YmdGhis").$name; 
//设置超时时间 ，0表示不限制时间
$time = 60 ;
set_time_limit($time);
//判断错误信息
if ($error == 4)
  {
                         echo "<script>alert('请输入上传的文件!');location.href='upload.htm';</script>";
  }
else
{      //判断文件是否存在
           if(!file_exists($up))
                { 
                           //将临时文件转移到指定目录
                          if(move_uploaded_file($tmp,$up))
                          
                           {
                                 echo "<script>alert('文件上传成功!');</script>";
								 echo "<script>top.loadedPic('".$name."');</script>";// echo "<script>top.loadedPic("+$name+");</script>";
                                 echo  $name.'<br />'.$type.'<br />'.$size.'<br />'.$tmp.'<br />'.$error;
                           }
                           else
                           {
                                  echo  "<script>alert('文件上传失败!');location.href='upload.htm';</script>";
                           }
                }
            else
                {
                   echo "<script>alert('文件存在!');location.href='upload.htm';</script>";
                }
}

?>
