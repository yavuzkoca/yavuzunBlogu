<?php
ob_start();
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
//$con = mysqli_connect("192.168.2.2","yavuzkoca","*E^;gsr#dIM3","yavuzkoca_blog");
$con = mysqli_connect("localhost","root","","blog");
if (!$con) {
   	header('Location: error.php');
}
mysqli_query($con,"SET NAMES 'utf8' ");
mysqli_query($con,"SET CHARACTER SET utf8");
mysqli_query($con,"SET COLLATION_CONNECTION = 'utf8_turkish_ci'");
//mysql_query("SET NAMES UTF8");
ob_end_flush();
?>