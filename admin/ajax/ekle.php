<?php 
session_start(); 
include_once("../../baglanti.php");
$icerik = $_POST['icerik'];
$baslik = $_POST['baslik'];
$alt_baslik = $_POST['alt_baslik'];
$resim = $_POST['resim'];
$yazan = $_SESSION['kullanici_id'];
$kategori = $_POST['kategori'];
$hangi_kategori = mysqli_query($con,"SELECT * FROM `kategori` WHERE `kategori_adi`='".mysqli_real_escape_string($con,$kategori)."' ");
$kat = mysqli_fetch_assoc($hangi_kategori);
$kategori = $kat['id'];

if($icerik == '' || $baslik == '' || $alt_baslik == ''){
	echo 'Basarisiz';
}
else{
	$yazi = "INSERT INTO `yazilar` (`baslik`, `alt_baslik`, `icerik`, `yazan`, `kategori`,`resim`) VALUES 
			('".mysqli_real_escape_string($con,$baslik)."', 
			 '".mysqli_real_escape_string($con,$alt_baslik)."', 
			 '".mysqli_real_escape_string($con,$icerik)."',
			 '".mysqli_real_escape_string($con,$yazan)."', 
			 '".mysqli_real_escape_string($con,$kategori)."', 
			 '".mysqli_real_escape_string($con,$resim)."') ";

	$ekle = mysqli_query($con, $yazi);
	$new = "INSERT INTO `like_table` (`yazi_id`, `number`) VALUES 
			( LAST_INSERT_ID(), 
			 '".mysqli_real_escape_string($con,0)."') ";
	$new_ekle = mysqli_query($con,$new);
	
	
	/*
	$yazi = "INSERT INTO `like_table` (`yazi_id`,`number`) VALUES
			('".mysqli_real_escape_string($con,$baslik)."', 
			 '".mysqli_real_escape_string($con,$alt_baslik)."') ";
*/
	if($ekle){
		echo 'Basarili';
	}
	else 
		echo 'Basarisiz';
}

?>