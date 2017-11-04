<?php
session_start();
include_once("../baglanti.php");
	
if(isset($_SESSION['kullanici_id'])  && $_SESSION['user_status'] >= 2){
	include_once("admin_header.php");
	$kategori_secme = mysqli_query($con, "SELECT * FROM `kategori`");

	?>
		<div style="width:100%;">
			<form method='post' enctype="multipart/form-data">
				<h4>BAŞLIK</h4>
				<input type="text" name="baslik" id="baslik"  placeholder ="BAŞLIK"/><br>
				<h4>ALT BAŞLIK</h4>
				<input type="text" name="alt_baslik" id="alt_baslik" placeholder ="ALT BAŞLIK" /> <br>
				<h4>RESİM</h4>
				<input type="text" name="resim" id="resim" placeholder ="RESİM" /> <br>
				<h4>İÇERİK</h4>
				<textarea name="icerik" id="icerik" placeholder="İÇERİK"> </textarea><br>
				<h4>KATEGORİ  &#x21d3;</h4> 
				<select name= 'kategori' id="kategori">
					<?php 
						while($kategori = mysqli_fetch_assoc($kategori_secme)){ 
						?>
							<option><?php echo $kategori['kategori_adi']; ?>  </option>
						<?php } ?>
				</select>
				<div style='float:right;margin-top:10px;'>
					<button id="ekle" name='ekle' >Ekle</button>
				</div>
			</form>
		</div>
		<script>
			$("#ekle").click(function(){
				$.post("ajax/ekle.php",{ baslik: $("#baslik").val(), alt_baslik: $("#alt_baslik").val(), resim: $("#resim").val(), icerik: $("#icerik").val(), kategori: $("#kategori").val()  })
				.done(function( data ) {
					if(data == 'Basarili'){
						alert('Yazı başarılı bir şekilde eklendi');
					}
					else{
						alert('Yazı eklemede bir sorun var :( Boşlukları doldurduğunuzdan emin olunuz..');
					}
					//alert("LOL");
				});
				//alert("LOL");
			});
		</script>
		<?php
		
		
		
}
else{
	header('../error.php'); }
?>

