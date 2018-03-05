<?php

require_once('class.smtp.php');
require_once('class.phpmailer.php');

class SendMail {
    public static function sendTestEmail($subject,$introduction,$email) {
        $apply_time = date("Y-m-d H:i:s");
        $mail = new PHPMailer;
        $mail->CharSet = 'utf-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.ym.163.com';//'smtp.exmail.qq.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alimao@jeedon.com';
        $mail->Password = 'smsmssm123';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 994;//465;
        $mail->From = 'alimao@jeedon.com';
        $mail->FromName = 'test';
        $mail->addAddress($email);//'zhangronghui@ablecloud.cn');
        $mail->isHTML(false);
        
        $mail->Subject = $subject;//'申请AbleCloud开发者体验帐号';
        
        //if (!empty($subject))
          ///  $mail->Subject .= ' - ' . $subject;
       $mail->Body    =  $introduction;
       $mail->AltBody = "\r\n";

        if($mail->send()) {
            return TRUE;
        } else {
            return $mail->ErrorInfo;
        }
    }
    
    
   /* public static function sendToDeveloperEmail($subject,$introduction) {
        $apply_time = date("Y-m-d H:i:s");
        $mail = new PHPMailer;
        $mail->CharSet = 'utf-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.exmail.qq.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'notice@ablecloud.cn';
        $mail->Password = 'Abc134';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->From = 'notice@ablecloud.cn';
        $mail->FromName = 'Ablecloud';
        $mail->addAddress($email);//'zhangronghui@ablecloud.cn');
        $mail->isHTML(false);
        
        $mail->Subject = $subject;//'申请AbleCloud开发者体验帐号';
        
        //if (!empty($subject))
          ///  $mail->Subject .= ' - ' . $subject;
       $mail->Body    =  $introduction;
       $mail->AltBody = "\r\n";

        if($mail->send()) {
            return TRUE;
        } else {
            return $mail->ErrorInfo;
        }
    }
   */ 
    
    
    
}