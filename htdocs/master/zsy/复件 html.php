<?php
$str_status=$_POST['data'];
file_put_contents('test.html',stripcslashes($str_status));
echo 1;
?>
