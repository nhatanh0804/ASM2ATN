<?php
$server = "13.212.100.240";
$user = "nhatanh";
$pass = "123";
$database = "asm2"; 
$connect = mysqli_connect($server,$user,$pass,$database); 
if (!$connect) {
	die("Connect Failed:".mysqli_connect_error());
	# code...
}
mysqli_set_charset($connect, 'UTF8');
?>