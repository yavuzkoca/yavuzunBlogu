<?php
include_once("../../baglanti.php");
$kullanici_adi = htmlspecialchars($_POST['kadi']);
$kullanici_sifresi = htmlspecialchars($_POST['ksifresi']); 
$sifre = md5($kullanici_sifresi);
$kadi = mysqli_real_escape_string($con,$kullanici_adi);
$var_mi = "SELECT * FROM `kullanicilar` WHERE `adi` = '".$kadi."' and `sifresi` = '".mysqli_real_escape_string($con,$sifre)."'";

$sonuc = mysqli_query($con,$var_mi);
//	var_dump($sonuc);
if(mysqli_num_rows($sonuc)>0){
	echo "Basarili";
	session_start();
	while($satir = mysqli_fetch_assoc($sonuc)){
	$_SESSION['kullanici_id']  =  $satir['id'];
	$_SESSION['kullanici_adi'] =  $satir['adi'];
	$_SESSION['user_status'] =    $satir['yetki_id'];
	
	}
}
else {
	echo "Basarisiz";
}


?>