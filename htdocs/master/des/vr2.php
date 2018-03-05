<?php
require_once('../class/utils/tools.cls.php');
require_once('../helper/des.hlp.php');
require_once('../config/vr.cfg.php');


$api = 'http://history.apps.cntv.cn/interface/service.php';
$client = $_GET['client'];
$uid = $_GET['uid'];//19625233;//18865591;//14739724;//

$arr_des = config_vr::$deskey[$client];
if ( is_array($arr_des) ){
	$key = $arr_des["key"];
	$iv  = $arr_des["iv"];		
}else{
	$response['code'] = -2;
	$response['error'] = "您的客户端暂时不支持，如果需要帮助请咨询接口提供方！";
	$this->output($response);
	exit();		
}

//$key = 'k5tylvt4r471814t566a6rct';//长度24
//$iv  = '30860152';//长度8

$des = new helper_des($key,$iv);

$method = $_GET['method'];
switch($method)
{
	case 'getVideoRecord':{
		$params = array(
			'uid' => $uid,
			'vid' => 'a50c02a884b74b11b704bcadd2605f11',
		);
		$encryption = urlencode($des->encrypt(json_encode($params)));
		break;
	}
	case 'setVideoRecord':{
		$params = array(
			'uid' => $uid,
			'vid' => 'a50c02a884b74b11b704bcadd2605f11',//.rand(1,999),
			'pageurl' => '',
			'playtime' => time(),
			'ip' => '127.0.0.1'

		);
		$encryption = urlencode($des->encrypt(json_encode($params)));
		break;
	}
	case 'setVideoPosition':{
		$params = array(
			'uid' => $uid,
			'vid' => 'a50c02a884b74b11b704bcadd2605f11',
			'position' => rand(0,7200)
		);
		$encryption = urlencode($des->encrypt(json_encode($params)));
		break;
	}
	case 'getUserVideoRecordList':{
		$params = array(
			'uid' => $uid
		);
		$encryption = urlencode($des->encrypt(json_encode($params)));
		break;
	}
	default:{
		
	}
}
echo $encryption."\r\n\r\n\r\n\r\n\r\n";
//var_dump(json_decode($des->decrypt(urldecode($encryption)),true));
$postData = array(
				'client' => $client,
				'method' => 'video.'.$method,
				'data' => $encryption
			);
//print_r($postData);
$res = utils_tools::httpPostByCurl($api,$postData);
print_r($res);
?>