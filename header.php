<!DOCTYPE HTML>
<html>
	<head>
		<title>Yavuz'un Blogu</title>
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9"> 
		<meta name="keywords" content="yavuz, koca, yavuzkoca,blog, fotoğraf, 1997, itü, itu" />
		<meta name="language" content="Turkish" />
		<meta name="reply-to" content="deathghost6608@gmail.com" />
		<meta http-equiv="Content-Language" content="TR"/>	
		<meta name="refresh" content="180" />
		<link rel="stylesheet" href="css.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">YAVUZ KOCA</a></h1>
						<nav class="links">
							<ul class='lol'>
								<li><a href="yazilar.php">Yazılar</a></li>
								<li><a href="fotograflar.php">Fotoğraflar</a></li>
								<!--
								<li><a href="dersler.php">Dersler</a></li>
								<li><a href="projelerim.php">Projeler</a></li>
								-->
                                <li><a href="egitimler.php">Eğitimler</a></li>
                                <li><a href="hakkimda.php">Hakkımda</a></li>
                                <li style='float:right; margin-top:23px; margin-right:9px;' >
								<?php 
								
								if(isset($_SESSION['kullanici_id'])){ 
								//	echo $_SESSION['user_status'];
									if($_SESSION['user_status'] > 2){
										echo "<a href='admin/index.php'>Admin Paneli</a></li>";
									}
									echo "<li style='float:right; margin-top:16px; margin-right:5px;'><button style='margin-top:-10px;' onclick='logout()'><a href='admin/ajax/logout.php'>Çıkış Yap</a></button></li>";
									echo "<li style='float:right; margin-top:24px; margin-right:5px;' >Hoşgeldin  " . strtoupper($_SESSION['kullanici_adi']) . "! &nbsp;&nbsp;&nbsp;";
								}else {
									?>
									<ul class="actions vertical">
									<?php
										if(isset($_SESSION['kullanici_id'])){
											echo '<li onclick="logout()"><a href="admin/ajax/logout.php" class="button big fit">Çıkış Yap</a></li>';
										}
										else{
											echo '<li style="margin-top:-10px;"><a href="admin/index.php" class="buttona">Giriş Yap</a></li>';
										}
									?>
								</ul>
								<?php 
								}?>
								
								</li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<!--
								<li class="search">
									<a class="fa-search" href="#search">Arama</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Arama" />
									</form>
								</li>
								-->
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
						
							
						
						<!-- Links -->
							<!--
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Lorem ipsum</h3>
											<p>Feugiat tempus veroeros dolor</p>
										</a>
									</li>
									
								</ul>
							</section>
							-->
						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<?php
										if(isset($_SESSION['kullanici_id'])){
											echo '<li onclick="logout()"><a href="admin/ajax/logout.php" class="button big fit">Çıkış Yap</a></li>';
										}
										else{
											echo '<li><a href="admin/index.php" class="button big fit">Giriş Yap</a></li>';
											echo '<li><a href="admin/uye_ol.php" class="button big fit">Üye Ol</a></li>';
										}
									?>
								</ul>
							</section>

					</section>
					<script>
						function logout() {
								alert("Başarıyla Çıkış Yaptınız!");
								window.location.href = 'admin/ajax/logout.php';
							}
					</script>
			
		