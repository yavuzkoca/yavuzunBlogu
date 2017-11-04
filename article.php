													
													


<article class="post">
	<header>
		<div class="title">
			<h2><a href="oku.php?id=<?php echo $satir['id']; ?>"><?php echo $satir["baslik"]; ?></a></h2>
			<?php if($satir["alt_baslik"]=="0"){}else{?>
			<p><?php echo $satir["alt_baslik"]; ?></p><?php }?>
		
		</div>
		<div class="meta">
			<time class="published" datetime="2015-11-01"><?php if(function_exists('yorum_ne_zaman')){yorum_ne_zaman();} ?></time>
			<a href="#" class="author"><span class="name"><?php echo $yazar["adi"]; ?></span><img src="images/avatar.jpg" alt="" /></a>
		</div>
	</header><?php if($satir["resim"]!="0"){ ?>
	<a href="oku.php?id=<?php echo $satir['id']; ?>" class="image featured"><img src="images/<?php  echo $satir["resim"];?>" alt="" /></a><?php } ?>
	<p><?php if(strlen($satir['icerik'])>260){echo substr($satir['icerik'],0,strpos($satir['icerik'], ' ', 260));}else{echo $satir['icerik'];} ?>...</p>
	<footer>
		<ul class="actions">
			<li><a href="oku.php?id=<?php echo $satir['id']; ?>" class="button big">Okumaya devam et</a></li>
		</ul>
		<ul class="stats">
			<li><a href="<?php echo $kategori["kategori_adi"]; ?>.php"><?php echo strtoupper($kategori["kategori_adi"]); ?></a></li>
			<li><a href="javascript:;" id="like<?php echo $satir['id']; ?>" class="icon fa-heart" <?php if(isset($_SESSION['kullanici_id'])){if(mysqli_num_rows($begenmisMi)){ ?> style='color:#2ebaae; pointer-events: none; cursor: default;'<?php }}?>><?php echo $begeni['number']; ?></a></li>
			<li><a href="oku.php?id=<?php echo $satir['id']; ?>#son" id="sona_git" class="icon fa-comment"><?php echo $comments; ?></a></li>
		</ul>
	</footer>
</article>
<script>
	
</script>
<script>
	$("#like<?php echo $satir['id']; ?>").click(function(){
	$.post("assets/ajax/begeni.php",{yazi_id: '<?php echo $satir['id']; ?>'})
	.done(function(data){
		if(data == 'Basarili'){
			var button = document.getElementById('like<?php echo $satir['id']; ?>');
			var attnum = <?php echo $begeni['number']; ?>;
			document.getElementById('like<?php echo $satir['id']; ?>').innerHTML = ++attnum;
			
		}
		else if(data=='Basarisiz'){
			window.location.href = 'admin';
		}
	});
	});
</script>