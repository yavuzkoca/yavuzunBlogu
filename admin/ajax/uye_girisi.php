<?php 
session_start();
include_once("../../baglanti.php");
$kullanici_adi = htmlspecialchars($_POST['kadi']);
$kullanici_sifresi = htmlspecialchars($_POST['ksifresi']); 
$kullanici_sifresi_tekrari = htmlspecialchars($_POST['ksifresitekrar']);
$k2 = mysqli_real_escape_string($con,$kullanici_sifresi); 
$k3 = mysqli_real_escape_string($con,$kullanici_sifresi_tekrari); 

$kadi = mysqli_real_escape_string($con,$kullanici_adi);
$var_mi = "SELECT * FROM `kullanicilar` WHERE `adi` = '".$kadi."'";

$sonuc = mysqli_query($con,$var_mi);
//	var_dump($sonuc);
if(mysqli_num_rows($sonuc)>0){
	echo "Basarisiz";
	$_SESSION['error'] = "Bu kullanıcı adı zaten kullanımda!";
	
}
else if($k2!=$k3){
	echo "Basarisiz";
	$_SESSION['error'] = "Şifreler uyuşmuyor!";
}
else if (empty($k2)  || empty($k3) || empty($kadi)){
	echo "Basarisiz";
	$_SESSION['error'] = "Bölmeler boş bırakılamaz!";
}
else if(strlen($kadi)<5){
	echo "Basarisiz";
	$_SESSION['error'] = "Kullanıcı adı çok kısa! En az 5 karakter giriniz";
}
else if(strlen($k2)<5)  {
	echo "Basarisiz";
	$_SESSION['error'] = "Şifre çok kısa! En az 5 karakter giriniz";
} else{
	echo "Basarili";
	$sifre = md5($k2);
	$insert = "INSERT INTO `kullanicilar` (`adi`, `sifresi`, `profil_resmi`, `kayit_tarihi`, `yetki_id`) VALUES ('".$kadi."', '".$sifre."', '0', CURRENT_TIMESTAMP, '1')";
	mysqli_query($con,$insert);
	
	
	}

?>