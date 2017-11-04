<?php
session_start(); 
include_once("../../baglanti.php");
	$yazi_id = $_POST['yazi_id'];
	$like_secme = mysqli_query($con, "SELECT * FROM `like_table` WHERE `yazi_id` = '" . $yazi_id  . "'");
	$begenmisMi = mysqli_query($con, "SELECT * FROM `check_like` WHERE `yazi_id` = '".$yazi_id."' and `kullanici_id` = '".$_SESSION['kullanici_id']."' ");
	
	
	if(isset($_SESSION['kullanici_id'])){
		//var_dump($like)
		// && !mysqli_num_rows($begenmisMi)
		if(mysqli_num_rows($like_secme)>0 && !mysqli_num_rows($begenmisMi)){
			while($satir = mysqli_fetch_assoc($like_secme)){
				$like_number = $satir['number'];
				$new = $like_number + 1;
				$begeni_new = "UPDATE `like_table` SET `number`='".$new."'  WHERE `yazi_id` = '".$yazi_id."' ";
				$begeni_ekle = mysqli_query($con, $begeni_new);
				$lol = "INSERT INTO `check_like` (`kullanici_id`,`yazi_id`) VALUES ('".$_SESSION['kullanici_id']."','".$yazi_id."')";
				$begendi = mysqli_query($con,$lol);
				if($begeni_ekle && $begendi){
					echo "Basarili";
					
				}
				else{
					echo "Basarisiz";
				}
					
			}
			mysqli_free_result($like_secme);	
	
		}
		else 
			echo "Basarisiz2";
	}else{
		echo "Basarisiz";
	}

?>