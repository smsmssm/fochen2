<?php
//���ô�ŵ�Ŀ¼
$upladdir = "../templates_c/";//"../";//"D:\www\upload2\file";$_SERVER['DOCUMENT_ROOT'].
//����ļ�������
$name = $_FILES['file']['name'];
//����ļ�������
$type = $_FILES['file']['type'];
//����ϴ��ļ��Ĵ�С
$size = $_FILES['file']['size'];
//��ȡ��ʱ�ϴ���Ŀ¼
$tmp = $_FILES['file']['tmp_name'];
//����ļ��Ĵ������
$error = $_FILES['file']['error'];
///$up = $upladdir.$name;
///////Ӧ�üӸ��޸��ļ����Ĳ���
$up = $upladdir.date("YmdGhis").$name; 
//���ó�ʱʱ�� ��0��ʾ������ʱ��
$time = 60 ;
set_time_limit($time);
//�жϴ�����Ϣ
if ($error == 4)
  {
                         echo "<script>alert('�������ϴ����ļ�!');location.href='upload.htm';</script>";
  }
else
{      //�ж��ļ��Ƿ����
           if(!file_exists($up))
                { 
                           //����ʱ�ļ�ת�Ƶ�ָ��Ŀ¼
                          if(move_uploaded_file($tmp,$up))
                          
                           {
                                 echo "<script>alert('�ļ��ϴ��ɹ�!');</script>";
								 echo "<script>top.loadedPic('".$name."');</script>";// echo "<script>top.loadedPic("+$name+");</script>";
                                 echo  $name.'<br />'.$type.'<br />'.$size.'<br />'.$tmp.'<br />'.$error;
                           }
                           else
                           {
                                  echo  "<script>alert('�ļ��ϴ�ʧ��!');location.href='upload.htm';</script>";
                           }
                }
            else
                {
                   echo "<script>alert('�ļ�����!');location.href='upload.htm';</script>";
                }
}

?>
