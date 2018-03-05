<?php
function get_windows_db_conf(){
 $db_conf = array();
 $db_conf["HOST"] = "xdm294501578.my3w.com:3306";
 $db_conf["USER"] = "xdm294501578";
 $db_conf["PASSWD"] = "alimao123";
 return $db_conf;
}
$dbName = "xdm294501578_db";
function getProvince($i)
{
   switch($i)
  {
	case 1:$p =  iconv("GB2312","UTF-8","北京");break;
	case 2:$p =  iconv("GB2312","UTF-8","上海");break;
	case 3:$p =  iconv("GB2312","UTF-8","天津");break;
	case 4:$p =  iconv("GB2312","UTF-8","重庆");break;
	case 5:$p =  iconv("GB2312","UTF-8","河北");break;
	case 6:$p =  iconv("GB2312","UTF-8","山西");break;
	case 7:$p =  iconv("GB2312","UTF-8","内蒙古");break;
	case 8:$p =  iconv("GB2312","UTF-8","辽宁");break;
	case 9:$p =  iconv("GB2312","UTF-8","吉林");break;
	case 10:$p =  iconv("GB2312","UTF-8","黑龙江");break;
	case 11:$p =  iconv("GB2312","UTF-8","江苏");break;
	case 12:$p =  iconv("GB2312","UTF-8","浙江");break;
	case 13:$p =  iconv("GB2312","UTF-8","安徽");break;
	case 14:$p =  iconv("GB2312","UTF-8","福建");break;
	case 15:$p =  iconv("GB2312","UTF-8","江西");break;
	case 16:$p =  iconv("GB2312","UTF-8","山东");break;
	case 17:$p =  iconv("GB2312","UTF-8","河南");break;
	case 18:$p =  iconv("GB2312","UTF-8","湖北");break;
	case 19:$p =  iconv("GB2312","UTF-8","湖南");break;
	case 20:$p =  iconv("GB2312","UTF-8","广东");break;
	case 21:$p =  iconv("GB2312","UTF-8","广西");break;
	case 22:$p =  iconv("GB2312","UTF-8","海南");break;
	case 23:$p =  iconv("GB2312","UTF-8","四川");break;
	case 24:$p =  iconv("GB2312","UTF-8","贵州");break;
	case 25:$p =  iconv("GB2312","UTF-8","云南");break;
	case 26:$p =  iconv("GB2312","UTF-8","西藏");break;
	case 27:$p =  iconv("GB2312","UTF-8","陕西");break;
	case 28:$p =  iconv("GB2312","UTF-8","甘肃");break;
        case 29:$p =  iconv("GB2312","UTF-8","宁夏");break;
	case 30:$p =  iconv("GB2312","UTF-8","青海");break;
	case 31:$p =  iconv("GB2312","UTF-8","新疆");break;
	case 32:$p =  iconv("GB2312","UTF-8","香港");break;
	case 33:$p =  iconv("GB2312","UTF-8","澳门");break;
	case 34:$p =  iconv("GB2312","UTF-8","台湾");break;
	case 35:$p =  iconv("GB2312","UTF-8","国外");break;
           
       }
  return $p;
}
/*
   <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5"></option>
                <option value="6"></option>
                <option value="7"></option>
                <option value="8"></option>
                <option value="9"></option>
                <option value="10"></option>
                <option value="11"></option>
                <option value="12"></option>
                <option value="13"></option>

*/

function getFangan($i)
{
     $p = "";
     switch($i)
	 {
	    case 1:$p = "智能家居";break;
		case 2:$p = "工业物联网";break;
		case 3:$p = "智慧城市";break;
		case 4:$p = "智慧农业";break;
		case 5:$p = "智慧交通";break;
		case 6:$p = "智慧社区";break;
		case 7:$p = "智慧医疗";break;
		case 8:$p = "智慧建筑";break;
		case 9:$p = "智慧教育";break;
		case 10:$p = "智慧能源";break;
		case 11:$p = "智慧旅游";break;
		case 12:$p = "智慧金融";break;
		case 13:$p = "车联网";break;
		case 14:$p = "智慧环境";break;
		case 15:$p = "云服务平台";break;
		case 16:$p = "嵌入式";break;
		case 17:$p = "大数据";break;
		case 18:$p = "物联网安全";break;
		case 19:$p = "智能穿戴";break;
		case 20:$p = "物联网";break;
		case 21:$p = "智慧养老";break;
		
	 } 
   
    return $p;
   
}
/*
<option value="15"></option>
                <option value="16"></option>
                <option value="17"></option>
                <option value="18"></option>
                <option value="19"></option>
                <option value="20"></option>

*/



function getAnli($i)
{
     $p = "";
     switch($i)
	 {
	    case 1:$p = "智能家居";break;
		case 2:$p = "工业物联网";break;
		case 3:$p = "智慧城市";break;
		case 4:$p = "智慧农业";break;
		case 5:$p = "智慧交通";break;
		case 6:$p = "智慧社区";break;
		case 7:$p = "智慧医疗";break;
		case 8:$p = "智慧建筑";break;
		case 9:$p = "智慧教育";break;
		case 10:$p = "智慧能源";break;
		case 11:$p = "智慧旅游";break;
		case 12:$p = "智慧金融";break;
		case 13:$p = "车联网";break;
		case 14:$p = "智慧环境";break;
		
		case 15:$p = "云服务平台";break;
		case 16:$p = "嵌入式";break;
		case 17:$p = "大数据";break;
		case 18:$p = "物联网安全";break;
		case 19:$p = "智能穿戴";break;
		case 20:$p = "物联网";break;
		case 21:$p = "智慧养老";break;
		
	 } 
   
    return $p;
   
}



function getChanpin($i)
{
     $p = "";
     switch($i)
	 {
	    case 1:$p = "智能家居";break;
		case 2:$p = "工业物联网";break;
		case 3:$p = "智慧城市";break;
		case 4:$p = "智慧农业";break;
		case 5:$p = "智慧交通";break;
		case 6:$p = "智慧社区";break;
		case 7:$p = "智慧医疗";break;
		case 8:$p = "智慧建筑";break;
		case 9:$p = "智慧教育";break;
		case 10:$p = "智慧能源";break;
		case 11:$p = "智慧旅游";break;
		case 12:$p = "智慧金融";break;
		case 13:$p = "车联网";break;
		case 14:$p = "智慧环境";break;
		
		case 15:$p = "云服务平台";break;
		case 16:$p = "嵌入式";break;
		case 17:$p = "大数据";break;
		case 18:$p = "物联网安全";break;
		case 19:$p = "智能穿戴";break;
		case 20:$p = "物联网";break;
		case 21:$p = "智慧养老";break;
		
	 } 
   
    return $p;
   
}




function getEnglinshNameByStyle($n)
{
    $p = "";
     switch($n)
	 {
	    case 1:$p = "jiaju";break;
		case 2:$p = "gongye";break;
		case 3:$p = "chengshi";break;
		case 4:$p = "nongye";break;
		case 5:$p = "jiaotong";break;
		case 6:$p = "shequ";break;
		case 7:$p = "yiliao";break;
		case 8:$p = "jianzhu";break;
		case 9:$p = "jiaoyu";break;
		case 10:$p = "nengyuan";break;
		case 11:$p = "lvyou";break;
		case 12:$p = "jinrong";break;
		case 13:$p = "che";break;
		case 14:$p = "huanjing";break;
		
		case 15:$p = "yun";break;
		case 16:$p = "qianru";break;
		case 17:$p = "dashuju";break;
		case 18:$p = "anquan";break;
		case 19:$p = "chuandai";break;
		case 20:$p = "all";break;
		case 21:$p = "yanglao";break;
		
	 } 
   
    return $p;
	
}



?>