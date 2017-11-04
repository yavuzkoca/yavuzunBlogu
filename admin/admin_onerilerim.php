<?php
session_start();

if(isset($_SESSION['kullanici_id'])  && $_SESSION['user_status'] > 2){
include_once('../baglanti.php');
include_once('admin_header.php');
$yazi_secme = "SELECT * FROM `yazilar` WHERE `kategori` = 5 ORDER BY `yazilar`.`tarih` DESC";
$sonuc = mysqli_query($con,$yazi_secme);
if(isset($_SESSION['ok'])) {
		if($_SESSION['ok'] == 1){
			?> <script> alert('basarili'); </script> <?php unset($_SESSION['ok']); }
		else if($_SESSION['ok'] == 5) {
			?> <script> alert('basarisiz'); </script> <?php unset($_SESSION['ok']); }
		else if($_SESSION['ok'] == 2) {
			?> <script> alert('Silindi'); </script> <?php unset($_SESSION['ok']); }
		else if($_SESSION['ok'] == 6){
			?> <script> alert('Silinemedi'); </script> <?php unset($_SESSION['ok']); }

	}
?><div style='width:100%;'>
<table>
	<tr>
		<th>ID</th>
		<th>Baslik</th>
		<th>Alt Başlık</th>
		<th>Yazan</th>
		<th>Tarih</th>
		<th>Kategori</th>
		<th>Resim</th>
		<th>İşlem Yap</th>
	</tr>
	<?php
while($satir=mysqli_fetch_assoc($sonuc)){
?>
	<tr>
		<td><?php echo $satir['id']; ?></td>
		<td><?php echo $satir['baslik']; ?></td>
		<td><?php echo $satir['alt_baslik']; ?></td>
		<td><?php echo $satir['yazan']; ?></td>
		<td><?php echo $satir['tarih']; ?></td>
		<td><?php echo $satir['kategori']; ?></td>
		<td><?php echo $satir['resim']; ?></td>
		<td><a href="admin_duzenle.php?id=<?php echo $satir['id']; ?>">Düzenle</a> | <a href="ajax/sil.php?id=<?php echo $satir['id']; ?>">Sil</a></td>
	</tr>
<?php } ?>
</table>
<div style="float:right; ">
	<button id='ekle'>Ekle</button>

</div> <!--end button-->
</div>
<script>
	$("#ekle").click(function(){
		$("table").append(function(){
					return `
						<tr>
<td>???</td>
							<td>Varsayılan</td>
							<td>Varsayılan</td>
							<td>Varsayılan</td>
							<td>Varsayılan</td>
							<td>Varsayılan</td>
							<td>Varsayılan</td>
							<td><a href="">Düzenle</a> | <a href="">Sil</a></td>
						</tr>
					`;	
			
			
		  });
	});

</script>
<script>
	$("#ekle").click(function(){
		window.location.href = 'admin_ekle.php';
		
	});

</script>


	

<?php } else { header('Location: error.php'); }
?>