<?

require ("smtp.php");

$smtpserver = "mail.xunlei.com";//SMTP服务器


$smtpserverport =25;//SMTP服务器端口


$smtpusermail = "martin@xunlei.com";//SMTP服务器的用户邮箱


$smtpemailto = "linhao@xunlei.com,mading@xunlei.com";//发送给谁


$smtpuser = "martin";//SMTP服务器的用户帐号


$smtppass = "ternetcn";//SMTP服务器的用户密码


$mailsubject = "Test Subject";//邮件主题


$mailbody = "
这是一封测试邮件 ，来自 合同审核系统！
";//邮件内容


$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件


$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.


$smtp->debug = TRUE;//是否显示发送的调试信息


$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);


?> 