<?php
$u=$_GET['u'];
$file=readfile ($u);
header("Content-type: application/octet-stream");
echo $file; 
?>
