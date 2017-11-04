<?php 
include_once('../baglanti.php');
session_start();
if(isset($_SESSION['kullanici_id'])  && $_SESSION['user_status'] >= 2){
	include_once('admin_header.php');
	$uye = mysqli_query($con,"SELECT * FROM `kullanicilar` ORDER BY `kullanicilar`.`yetki_id` DESC  ");
	if(isset($_SESSION['ok'])) {
		if($_SESSION['ok'] == 2){
			?> <script> alert('Silindi'); </script> <?php unset($_SESSION['ok']); }
		else if($_SESSION['ok'] == 3) {
			?> <script> alert('basarisiz'); </script> <?php unset($_SESSION['ok']); } 

	}
	
	
	?>
	<div style='width:100%;'>
		<table style='margin-left:auto;'>	
			<tr>
				<th>ID</th>
				<th>Kullanıcı Adı</th>
				<th>Şifresi</th>
				<th>Kayıt Tarihi</th>
				<th>Yetki Durumu</th>
				<th>İşlem Yap</th>

			</tr>
		<?php
		while($satir = mysqli_fetch_assoc($uye)){ 
			?><tr <?php if($_SESSION['kullanici_id'] == $satir['id']){  ?> style='background-color:#00F; color:#fff;'<?php  } ?>>
				<td><?php echo $satir['id']; ?></td>
				<td><?php echo $satir['adi']; ?></td>
				<td><?php echo $satir['sifresi']; ?></a></td>
				<td><?php echo $satir['kayit_tarihi']; ?></td>
				<td><?php if($satir['yetki_id'] == 3) echo "ADMIN"; else if ($satir['yetki_id'] == 2) echo"Yetkili"; else if($satir['yetki_id'] == 1) echo "Üye"?></td>
				<td><a href="ajax/uye_sil.php?id=<?php echo $satir['id']; ?>">Sil</a></td>
	
			</tr>
			<?php
		}
		?>
		</table>
	</div>
	<?php
	}
	else{
		?>
			<script>
				window.location.href = '../error.php';
					
			</script>
			<?php
	}

?>