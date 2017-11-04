<?php
session_start(); 
include_once("../../baglanti.php");
	$yorum_id = $_POST['yorum_id'];
	$yorum_varmi = mysqli_query($con,"SELECT * FROM `yazilar` WHERE `id`='".mysqli_real_escape_string($con,$yazi_id)."' ");
	
	if(isset($_SESSION['kullanici_id'])){
		if(mysqli_num_rows($yazi_varmi)>0){
		//	echo "Basarili";
			if($yorum == ""){
				echo "Basarisiz";
			}
			else{
			$yorum = "INSERT INTO `yorumlar` (`kullanici_adi`, `yorum`, `yazi_id`) VALUES ('".mysqli_real_escape_string($con,$kullanici_adi)."', '".mysqli_real_escape_string($con,$yorum)."', '".mysqli_real_escape_string($con,$yazi_id)."')";
			
			$yorum_ekle = mysqli_query($con, $yorum);
			//var_dump($yorum_ekle);
				if($yorum_ekle){
					echo "Basarili";
				}
				else{
					echo "Basarisiz";
				}
			}
		}
	}
	else{
		echo "Basarisiz";
	}
	
	

?>