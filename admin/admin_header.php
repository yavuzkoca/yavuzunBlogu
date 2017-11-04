<!DOCTYPE HTML>
<html>
	<head>
		<title>Yavuz'un Blogu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/css.css" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		
		
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
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
			tr a:hover{
				color:#00b100;
			}
			form label{
				float:right;
			}
			
			</style>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" style="background-color:#af0;">
						<h1><a href="index.php">YAVUZ KOCA</a></h1>
						<nav class="links" >
							<ul><?php 
								
								if(isset($_SESSION['kullanici_id']) && $_SESSION['user_status'] > 2){ ?>
								<li><a href="admin_yazilar.php">Yazılar</a></li>
								<li><a href="admin_uyeler.php">Üyeler</a></li>
								<li><a href="admin_yorumlar.php">Yorumlar</a></li>
								<li style='float:right; margin-top:9px; margin-right:5px;' >
								<?php
									echo "Hoşgeldin    " . strtoupper("  admin") . "! &nbsp;&nbsp;&nbsp;";
									echo "<button onclick='logout()'><a href='ajax/logout.php'>Çıkış Yap</a></button>";
								}
								else if(1){
									
								}
								else{}
								?></li>
								
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Arama</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Arama" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Arama" />
								</form>
							</section>

						<!-- Links -->
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

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<?php
										if(isset($_SESSION['kullanici_id'])){
											echo '<li onclick="logout()"><a href="ajax/logout.php" class="button big fit">Çıkış Yap</a></li>';
										}
										else{
											echo '<li><a href="index.php" class="button big fit">Giriş Yap</a></li>';
											echo '<li><a href="uye_ol.php" class="button big fit">Üye Ol</a></li>';
										}
									?>
								</ul>
							</section>

					</section>
					<script>
						function logout() {
								alert("Başarıyla Çıkış Yaptınız! Giriş sayfasına yönlendiriliyorsunuz..");
								window.location.href = 'ajax/logout.php';
							}
					</script>

		</div>
		<div style="margin-top:-90px;padding:0px 0px 10px 0px;   width:100%; font-size:30px;">
	<button class="button big fit" id='go' style='letter-spacing:30px; word-spacing:50px;'>BLOG'a geri dön..</button>
	</div>
	<script>
		$("#go").click(function(){
				window.location.href = "../index.php";
				
			}); 
	</script>