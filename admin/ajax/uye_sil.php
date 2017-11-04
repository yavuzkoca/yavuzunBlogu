<?php
	session_start();
	include_once("../../baglanti.php");
	$uye_id = $_GET['id'];
	//var_dump($uye_id);
	$uye_varmi = mysqli_query($con,"SELECT * FROM `kullanicilar` WHERE `id`='".mysqli_real_escape_string($con,$uye_id)."'");
	//var_dump($uye_varmi);
	if(isset($_SESSION['kullanici_id']) && $_SESSION['user_status'] > 2 && mysqli_num_rows($uye_varmi)>0){
			$uye = "DELETE FROM `kullanicilar` WHERE `id`='".$uye_id."'";
			
			$uye_sil = mysqli_query($con, $uye);
			//var_dump($yorum_ekle);
				if($uye_sil){
					$_SESSION['ok']  =  2;
				}
				else{
					$_SESSION['ok']  =  3;
				}
			
		
	}
	else{
		$_SESSION['ok']  =  3;
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
?>