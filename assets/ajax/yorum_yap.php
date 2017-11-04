<?php
session_start(); 
include_once("../../baglanti.php");
	//$like = $_POST['like'];
	$kullanici_adi = $_SESSION['kullanici_adi'];
	$temp = htmlspecialchars($_POST['yorum']);
	$yorum = wordwrap($temp, 30, "\n",true);
	$yazi_id = $_POST['yazi_id'];
	$yazi_varmi = mysqli_query($con,"SELECT * FROM `yazilar` WHERE `id`='".mysqli_real_escape_string($con,$yazi_id)."' ");
	if(isset($_SESSION['kullanici_id'])){
		if(mysqli_num_rows($yazi_varmi)>0){
		//	echo "Basarili";
			if($yorum == ""){
				echo "Basarisiz";
			}
			else{
			$yorum = "INSERT INTO `yorumlar` (`kullanici_adi`, `yorum`, `yazi_id`) VALUES ('".mysqli_real_escape_string($con,$kullanici_adi)."', '".mysqli_real_escape_string($con,$yorum)."', '".mysqli_real_escape_string($con,$yazi_id)."')";
			
			$yorum_ekle = mysqli_query($con, $yorum);
			$new = "INSERT INTO `yorum_like` (`yorum_id`, `like`,`dislike`) VALUES 
					( LAST_INSERT_ID(),'0','0')" ;
			$new_ekle = mysqli_query($con, $new);
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