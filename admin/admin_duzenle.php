<?php
$id = $_GET["id"];
session_start();
include_once("../baglanti.php");
if(isset($_SESSION['kullanici_id'])  && $_SESSION['user_status'] >= 2){
	if(isset($_SESSION['ok'])) {
		if($_SESSION['ok'] == 1){
			?> <script> alert('basarili'); </script> <?php unset($_SESSION['ok']); }
		else if($_SESSION['ok'] == 3) {
			?> <script> alert('basarisiz'); </script> <?php unset($_SESSION['ok']); }
		else if($_SESSION['ok'] == 2) {
			?> <script> alert('Silindi'); </script> <?php unset($_SESSION['ok']); }
		else if($_SESSION['ok'] == 6){
			?> <script> alert('Silinemedi'); </script> <?php unset($_SESSION['ok']); }

	}
	include_once("admin_header.php");
	$yazi_secme = mysqli_query($con,"SELECT * FROM `yazilar` WHERE `id` ='". mysqli_real_escape_string($con,$id)."'");
	$kategori_secme = mysqli_query($con, "SELECT * FROM `kategori`");

	if(mysqli_num_rows($yazi_secme) == 0 && isset($id)){
		header('Location: ../error.php');
	}
	else{
		while($satir = mysqli_fetch_assoc($yazi_secme)){
			
		?>
		<div style="width:100%;">
		<form method='post' action='ajax/degistir.php'>
			<h4>ID</h4>
			<input type="text" name="id" readonly  value ="<?php echo $id; ?>"/><br>
			<h4>BAŞLIK</h4>
			<input type="text" name="baslik"  value ="<?php echo $satir['baslik']; ?>"/><br>
			<h4>ALT BAŞLIK</h4>
			<input type="text" name="alt_baslik" value ="<?php echo $satir['alt_baslik']; ?>" /> <br>
			<h4>İÇERİK</h4>
			<textarea name="icerik"><?php echo $satir['icerik']; ?> </textarea><br>
			<h4>KATEGORİ  &#x21d3;</h4> 
			<select name= 'kategori'>
				<?php 
					while($kategori = mysqli_fetch_assoc($kategori_secme)){ 
					?>
						<option <?php if($satir['kategori']==$kategori['id']){ ?> selected="selected" <?php } ?> ><?php echo $kategori['kategori_adi']; ?>  </option>
					<?php } ?>
			</select>
			<div style='float:right;margin-top:10px;'>
				<button id="degistir" name='degistir' >Değiştir</button>
				<button type='submit' id="sil" name='sil' onclick="window.location.href='ajax/sil2.php?id=<?php echo $satir['id']; ?>'" >Sil</button>
			</div>
		</form>
		</div>
		
		<?php
		}
	}
}
else{
	?>
	<script>
		window.location.href = '../error.php';
			
	</script>
<?php 
	}
	?>
