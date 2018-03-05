<?php
@header("content-Type: text/html; charset=utf-8");error_reporting(E_ALL);
define("YES","<b><font color=green>Yes</font></b>");define("NO","<b><font color=red>No</font></b>");
$act=isset($_GET['act'])?$_GET['act']:"";if($act=="phpinfo"){phpinfo();exit();}
$isvhs=substr($_SERVER["DOCUMENT_ROOT"],-6,6)=="htdocs"?0:1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPnow</title>
<style type="text/css">
<!--
BODY{FONT-SIZE:75%;MARGIN-TOP:10px;}
BODY,TD,TH{FONT-FAMILY:Tahoma,Verdana;}
FORM{MARGIN:0px;}
TABLE{BORDER-COLLAPSE:collapse;}
TD,TH {BORDER:1px solid #000000;VERTICAL-ALIGN:baseline;PADDING-LEFT:10px;PADDING-RIGHT:10px;}
TH{BACKGROUND-COLOR:yellowgreen;FONT-WEIGHT:bold;}
INPUT{BORDER:1px solid #000000;}
A{TEXT-DECORATION:none;COLOR:#000000;}
A:HOVER{TEXT-DECORATION:underline;}
A.ARROW{FONT-FAMILY:Webdings,sans-serif;FONT-SIZE:10px;}
A.ARROW:HOVER{COLOR:#ff0000;TEXT-DECORATION:none;}
-->
</style>
<script language="javascript">
  function init()
  {
     window.location.href = "127.0.0.1:81/zsy/templet.html";
  }
</script>
</head>
<body onload="init()"> 

</body>
</html>
<?php
function get_gd_info($name){$gd_info=gd_info();return $gd_info[$name];}
?>