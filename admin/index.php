<?php 
session_start();
	include_once('admin_header.php');
	include_once('../baglanti.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Yavuz'un Blogu</title>
	<script src="../assets/js/jquery.min.js"></script>
	
	<link rel="stylesheet" href="../assets/css/main.css" />
	<link rel="stylesheet" href="../assets/css/css.css" />
	<style>
	form{
		padding:20px;
		width:50%;
		margin:auto;
		padding-top:50px;
		
	}
	input[type=text]{
		background-color:#fff;
	}
	
	input[type=password]{
		background-color:#fff;
	}
	input[type=button]{
		margin-top:10px;
	}
	.solmenu a:hover{
		color:#00b100;
	}
	</style>
</head>
<body>
	
				</div>
	<?php 
		if(isset($_SESSION['kullanici_adi']) && $_SESSION['user_status'] > 2){ 
		?>
		<section class="solmenu">
			<h6>Hızlı İşlemler</h6>
			<ul>
				<li><a href='admin_ekle.php'>Yazı Ekle</a></li>
				<li><a href='admin_yazilar.php'>Yazıları Düzenle</a></li>
				<li></li>
			</ul>
			<h6><a href='admin_yorumlar.php'>Son Yorumlar</a></h6>
			<ul>
			<?php
			$yorum = mysqli_query($con,"SELECT * FROM `yorumlar` ORDER BY `yorumlar`.`zaman` DESC LIMIT 3 ");
			while($satir = mysqli_fetch_assoc($yorum)){
				?>
					<li><a href='../oku.php?id=<?php echo $satir['yazi_id']; ?>'><?php echo substr($satir['yorum'],0,strpos($satir['yorum'], ' ', 1))."..."; ?></a></li>
				<?php 
			}?>
			</ul>
			
			<h6><a href='admin_uyeler.php'>Üyeler</a></h6>
			<ul>
		<?php
		$uye = mysqli_query($con,"SELECT * FROM `kullanicilar` ORDER BY `kullanicilar`.`kayit_tarihi` DESC LIMIT 3 ");
		while($satir = mysqli_fetch_assoc($uye)){
			?>
				<li><b><?php echo $satir['adi']; ?></b></li>
			<?php 
		}
		include_once('admin_left_bar.php');
		include_once('admin_orta_bar.php');
		?>
			</ul>
	</section>
	<!-- Sidebar -->
	<section class="ortamenu" style='width:80%;'>
		<?php 
			$yazi_secme = mysqli_query($con,"SELECT * FROM `yazilar` ORDER BY `id` DESC LIMIT 1 ");
			if($satir = mysqli_fetch_assoc($yazi_secme)){
				echo "<h1 style='color:red;'>Son Gönderi</h1>";
				echo "<div style='float:left; padding:50px;'>";
				echo "<h1>".$satir['baslik']."</h1>";
				echo "<h3>".$satir['alt_baslik']."</h3>";
				echo "<p>".$satir['icerik']."</p></div>";
				echo "</div>";
			}
		?>
	</section> <?php 
	} else if (isset($_SESSION['kullanici_adi']) && $_SESSION['user_status'] <= 2){
			?>
			<script>
				window.location.href = '../error.php';
					
			</script>
			<?php
	} else { ?>
	<div class="foorm">
		
		<form >
		
		<input type="text" id="adi" placeholder="Kullanıcı Adı"/>
		<input type="password" id="sifresi" placeholder="Şifre"  />
		<input type="button" id="gonder" value="Giriş Yap" />
		<input type="button" id="uye_ol" value="Üye Ol" />
		</form>
		<?php } ?>
		<script>
			$("#gonder").click(function(){
				$.post("ajax/giris_yap.php", { kadi: $("#adi").val(), ksifresi: $("#sifresi").val() })
				  .done(function( data ) {
					  if(data == 'Basarili'){
						  
						  alert('Giriş Başarılı!');
						  history.go(-1); return false;
					}
						else{
							alert('Giris Basarisiz');
						}
				  });
				
			});
			$("#uye_ol").click(function(){
				window.location.href = "uye_ol.php";
				
			}); 
		</script>
	
		
	</div>
	
</body>
</html>

