<?php

include_once("des.hlp.php");
//$ss = new helper_des("k5tylvt4r471814t566a6rct","30860152");
echo "aaaa";
echo $ss->encrypt('{"uid":"18865591","vid":"30ee450478893ddd01913a2e0a4e5c44","pageurl":"","playtime":1368081641,"ip":"127.0.0.1"}');

//$ss = new helper_des("12345678","12345678");

//echo SetToHexString($ss->encrypt('12345678'));

function SetToHexString($str)
{
if(!$str)return false;
$tmp="";
for($i=0;$i<strlen($str);$i++)
{
$ord=ord($str[$i]);
$tmp.=SingleDecToHex(($ord-$ord%16)/16);
$tmp.=SingleDecToHex($ord%16);
}
return $tmp;
}
function SingleDecToHex($dec)
{
$tmp="";
$dec=$dec%16;
if($dec<10)
return $tmp.$dec;
$arr=array("a","b","c","d","e","f");
return $tmp.$arr[$dec-10];
}

?>

