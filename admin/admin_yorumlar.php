<?php 
include_once('../baglanti.php');
session_start();
if(isset($_SESSION['kullanici_id'])  && $_SESSION['user_status'] >= 2){
	include_once('admin_header.php');
	$yorum = mysqli_query($con,"SELECT * FROM `yorumlar` ORDER BY `yorumlar`.`zaman` DESC  ");
	?>
	<div style='width:100%;'>
		<table style='margin-left:auto;'>	
			<tr>
				<th>ID</th>
				<th>Yorum Sahibi</th>
				<th>Yorum</th>
				<th>Yazı ID</th>
				<th>Tarih</th>
				<th>İşlem Yap</th>
			</tr>
		<?php
		while($satir = mysqli_fetch_assoc($yorum)){ 
			?><tr <?php if($_SESSION['kullanici_adi'] == $satir['kullanici_adi']){  ?> style='background-color:#00F; color:#fff;'<?php  } ?>>
				<td><?php echo $satir['id']; ?></td>
				<td><?php echo $satir['kullanici_adi']; ?></td>
				<td><a href='../oku.php?id=<?php echo $satir['yazi_id']; ?>'><?php echo $satir['yorum']; ?></a></td>
				<td><?php echo $satir['yazi_id']; ?></td>
				<td><?php echo $satir['zaman']; ?></td>
				<td><a href="../assets/ajax/yorum_sil.php?id=<?php echo $satir['id']; ?>">Sil</a></td>
	
			</tr>
			<?php
		}
		?>
		</table>
	</div>
	<?php
	}else{
		?>
			<script>
				window.location.href = '../error.php';
					
			</script>
			<?php
	}

?>