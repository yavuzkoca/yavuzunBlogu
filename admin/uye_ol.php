<?php

session_start();
if(isset($_SESSION['kullanici_id'])){
	
	ob_start(); 
	?><script>
	window.location.href = "../index.php";</script>
	<?php
	ob_end_flush();
}
include('admin_header.php');
?>
</div>
<div class="foorm">
		
		<form>
		<?php if(isset($_SESSION['error'])){ ?>
		<div style='text-align:center;padding-top:10px; color:#f00; font-size:18px; margin-top:-77px; '>
		<p> <?php  echo $_SESSION['error']; session_destroy(); ?></p>
		</div> <?php } ?>
		<div style="float:left; width:80%;"><abbr title="Kullanıcı adı 5 karakterden daha az olamaz"><input type="text" id="adi" placeholder="Kullanıcı Adınız &#9888;"/> <abbr></div><div style="float:right; padding-top:5px;">Min: 5 character</div>
		<div style="float:left; width:80%;"><abbr title="Şifre 5 karakterden daha az olamaz"><input type="password" id="sifresi" placeholder="Şifreniz &#9888;"  /> </abbr></div><div style="float:right; padding-top:5px;">Min: 5 character</div>
		<div style="float:left; width:80%;"><input type="password" id="sifre_tekrar" placeholder="Şifrenizi tekrar giriniz"  /> </div>
            <br><br><br><br><br>
		<input type="button" id="uye_ol" value="Üye Ol" />
		<input type="button" id="gonder" value="Giriş Yap" />
		</form>
		<script>
			
			$("#uye_ol").click(function(){
				$.post("ajax/uye_girisi.php", { kadi: $("#adi").val(), ksifresi: $("#sifresi").val(), ksifresitekrar: $("#sifre_tekrar").val()})
				  .done(function( data ) {
					  if(data == 'Basarili'){
						  
						  alert('Başarı ile üye oldunuz. Lütfen Giriş yapınız');
						  window.location.href = "index.php";
					}
						else{
							alert('Üye Girişi Basarisiz');
							window.location.href = "uye_ol.php";
						}
				  });
				
			});
			$("#gonder").click(function(){
				window.location.href = "index.php";
				
			}); 	
		</script>
	
		
	</div>
