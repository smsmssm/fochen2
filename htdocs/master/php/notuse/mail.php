<?

require ("smtp.php");

$smtpserver = "mail.xunlei.com";//SMTP������


$smtpserverport =25;//SMTP�������˿�


$smtpusermail = "martin@xunlei.com";//SMTP���������û�����


$smtpemailto = "linhao@xunlei.com,mading@xunlei.com";//���͸�˭


$smtpuser = "martin";//SMTP���������û��ʺ�


$smtppass = "ternetcn";//SMTP���������û�����


$mailsubject = "Test Subject";//�ʼ�����


$mailbody = "
����һ������ʼ� ������ ��ͬ���ϵͳ��
";//�ʼ�����


$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�


$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.


$smtp->debug = TRUE;//�Ƿ���ʾ���͵ĵ�����Ϣ


$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);


?> 