<?php
$str_status=$_POST['data'];
$mid='<head></head><style>.idxTop{PADDING-RIGHT: 0px;	PADDING-LEFT: 0px;	PADDING-BOTTOM: 5px;	PADDING-TOP: 5px}';
$mid=$mid.'.idxTop LI {	PADDING-RIGHT: 16px;	PADDING-LEFT: 6px;	PADDING-BOTTOM: 0px;	OVERFLOW: hidden;	PADDING-TOP: 0px;	ZOOM: 1}'; 
$mid=$mid.'A {COLOR: #2b93d2;	TEXT-DECORATION: none;	outline: none}';
$mid=$mid.'.idxTop LI .tit {	FLOAT: left;	OVERFLOW: hidden}</style><body style="text-align:center;min-width:800px;color:#FFFFFF;margin:0px;padding:0px; border:#006633 1px solid">';
$str_status=$mid.$str_status.'</body>';
file_put_contents('test.html',stripcslashes($str_status));
?>
