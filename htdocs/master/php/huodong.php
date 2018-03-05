<?php


require_once('SendMail.php');

$ac        = $_GET["ac"];
if($ac==="postMail")
{
    /*echo "22222<br>";	  
    $content = $_POST["content"];
    echo "$content";
	  //sendApplyEmail($name, $phone, $email, $company, $introduction, $region)
	  $status =  SendMail::sendTestEmail("章荣辉","135813668221113","smsmssm@126.com","北京智云奇点科技有限公司",$content,"北京");//
    var_dump($status);
    echo "33333<br>";*/
    
    $data = array('offset' => 0,'limit' => 1000);
    $result = Tools::callConsoleAPI(Conf::$Service_Account, 'listDeveloperAccounts', $data, 'POST');
    ///var_dump($result);
    $mails = array();
    $ids = array();
    
    if($result["status"])
    {
      // var_dump($result["resp"]["accounts"]);	
    	 for($i=0;$i< count($result["resp"]["accounts"]);$i++)
    	 {
    	 	  array_push($mails,$result["resp"]["accounts"][$i]['email']);
    	 	  array_push($ids,$result["resp"]["accounts"][$i]['userId']);
    	 } 
    	 var_dump($ids); 
    }else
    {
    	echo "获取邮件失败";
    }
    
    $content =  $_POST["content"]; ///xyxyxyxyxy 换成 id
    $title   =  $_POST["title"];
    
    ////var_dump($content);
    
    for($i=0;$i< count($mails);$i++)
    {
    	
    	   /*  getSubscriptions
    	    
    	  
    	   */
    	 $data = array('developerId' => $ids[$i],'topic' => "abcdtopicnews");
         $result = Tools::callConsoleAPI(Conf::$Service_Platform, 'getSubscriptions', $data, 'POST');
         echo "<br>";
         var_dump($result);
		 $hasTopic = false;
         if($result["status"])
		 {
		     	
		    $resArr = $result["resp"]["subscriptions"];
			for($j=0;$j<count($resArr);$j++)
			{
			   if($resArr[$j]['Topic']=="abcdtopicnews")
			   {
			   	  $hasTopic = true;
			   }
		    }
		 }
		 if($hasTopic)
		 {
    
    	    $mailContent = str_replace("xyxyxyxyxy",$ids[$i],$content);
    	    $status  =  SendMail::sendTestEmail($title,$mailContent,"zhangronghui@ablecloud.cn");//$mails[$i]);//
    	    echo "<br>发送状态:".$status." --->id: ".$ids[$i];
    
		 
		 }
	}
    
    
    
    
    
    
}else if($ac==="postTestMail")
{
	   
    $content =  $_POST["content"];
    $title   =  $_POST["title"];
    $mail    =  $_POST["mailAddress"];
    echo $mail;
    
	  $status  =  SendMail::sendTestEmail($title,$content,$mail);//
	  
	   
}








?>

