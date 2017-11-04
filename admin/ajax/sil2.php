<?php
	session_start();
	include_once("../../baglanti.php");
	$yazi_id = $_SESSION['idd'];
	
	$yazi_varmi = mysqli_query($con,"SELECT * FROM `yazilar` WHERE `id`='".mysqli_real_escape_string($con,$yazi_id)."'");
	
	if(isset($_SESSION['kullanici_id']) && $_SESSION['user_status'] >= 2 && mysqli_num_rows($yazi_varmi)>0){
			$yazi = "DELETE FROM `yazilar` WHERE `id`='".$yazi_id."'";
			
			$yazi_sil = mysqli_query($con, $yazi);
			//var_dump($yorum_ekle);
				if($yazi_sil){
					$_SESSION['ok']  =  2;
				}
				else{
					$_SESSION['ok']  =  3;
				}
			
		
	}
	else{
		$_SESSION['ok']  =  3;
	}
	
	?>
	<script>
		 window.history.go(-2);
	</script>
	<?php
	unset($_SESSION['idd']);
?>