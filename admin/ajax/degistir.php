<?php
session_start();
include_once("../../baglanti.php");
	//$like = $_POST['like'];
	$baslik = $_POST['baslik'];
	$alt_baslik = $_POST['alt_baslik'];
	$yazi_id = $_POST['id'];
	$icerik = $_POST['icerik'];
	$yazi_varmi = mysqli_query($con,"SELECT * FROM `yazilar` WHERE `id`='".mysqli_real_escape_string($con,$yazi_id)."'");
	$kategori = $_POST['kategori'];
	$_SESSION['idd'] = $yazi_id;
	if(isset($_POST['sil'])){
		header('Location: sil2.php');
		}
	else{
		$kategori_secme = mysqli_query($con, "SELECT * FROM `kategori` WHERE `kategori_adi` = '". $kategori ."'");
		$satir = mysqli_fetch_assoc($kategori_secme);
		$kategori_id = $satir['id'];
		
		if(isset($_SESSION['kullanici_id']) && $_SESSION['user_status'] >= 2 && mysqli_num_rows($yazi_varmi)>0){
			//	echo "Basarili";
				
				$yazi = "UPDATE `yazilar`   SET  
												`baslik`     = '".mysqli_real_escape_string($con,$baslik)."', 
												`alt_baslik` = '".mysqli_real_escape_string($con,$alt_baslik)."', 
												`icerik`     = '".mysqli_real_escape_string($con,$icerik)."', 
												`tarih`      =  CURRENT_TIMESTAMP, 
												`kategori`   = '".mysqli_real_escape_string($con,$kategori_id)."' 
											WHERE 
												`id`         = '".mysqli_real_escape_string($con,$yazi_id)."'";
				
				var_dump($yazi);
				$yazi_ekle = mysqli_query($con, $yazi);
				//var_dump($yorum_ekle);
					if($yazi_ekle){
						$_SESSION['ok']  =  1;
					}
					else{
						$_SESSION['ok']  =  0;
					}
				
			
		}
		else{
			$_SESSION['ok']  =  0;
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>