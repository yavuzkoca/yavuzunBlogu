<?php
$id = $_GET["id"];

session_start();
include_once("baglanti.php");
include_once("header.php");
$yazi_secme = mysqli_query($con,"SELECT * FROM `yazilar` WHERE `id` ='". mysqli_real_escape_string($con,$id)."'");
if(mysqli_num_rows($yazi_secme) == 0){
	header('Location: error.php');
}
else{
?>


				<!-- Main -->
					<div id="main">

						<!-- Post -->
						<?php
							
							while($satir = mysqli_fetch_assoc($yazi_secme)){
								//var_dump($satir);
								$GLOBALS['a'] = $satir['tarih'];
								if (!function_exists('yorum_ne_zaman')) {
								function yorum_ne_zaman(){
									
									$yorum_zamani = $GLOBALS['a'];$yil_ay = explode("-",$yorum_zamani);$new = $yil_ay[2];$gun = explode(" ",$new);
									$asd = $gun[1];$saat_dakika_saniye = explode(":",$asd);$now = date('d-m-Y');$now_gun_ay_yil = explode('-',$now);
									date_default_timezone_set('Asia/Baghdad');$saat = date("H:i:s");$now_saat_dakika_saniye = explode(':',$saat);
										$saniye_farki = $now_saat_dakika_saniye[2]-$saat_dakika_saniye[2];
										if($saniye_farki<0){
											$saniye_farki += 60;
											$now_saat_dakika_saniye[1] -= 1;
										}$dakika_farki = $now_saat_dakika_saniye[1]-$saat_dakika_saniye[1];if($dakika_farki<0){$dakika_farki += 60;$now_saat_dakika_saniye[0] -= 1;}$saat_farki = $now_saat_dakika_saniye[0]-$saat_dakika_saniye[0];
								if($saat_farki<0){$saat_farki += 12;$now_gun_ay_yil[0] -= 1;}$gun_farki = $now_gun_ay_yil[0]-$gun[0];if($gun_farki<0){$gun_farki += 30;
								$now_gun_ay_yil[1] -= 1;}$ay_farki = $now_gun_ay_yil[1]-$yil_ay[1];if($ay_farki<0){$ay_farki += 12;
								$now_gun_ay_yil[2] -= 1;}$yil_farki = $now_gun_ay_yil[2]-$yil_ay[0];if($yil_farki >= 1){echo $yil_farki." yıl önce";}
										else if($ay_farki>=1){
											echo $ay_farki." ay önce";}
										else if($gun_farki>0){
											echo $gun_farki." gün önce";}else if($saat_farki>0){echo $saat_farki." saat önce";}else if($dakika_farki>0){echo $dakika_farki." dakika önce";
								}else if($saniye_farki>0){echo $saniye_farki." saniye önce";}
										
										
								}}
								$yazar_secme = mysqli_query($con, "SELECT * FROM `kullanicilar` WHERE `id` = '".$satir["yazan"]."'");
								$yazar = mysqli_fetch_assoc($yazar_secme);
								$kategori_secme = mysqli_query($con, "SELECT * FROM `kategori` WHERE `id` = '".$satir["kategori"]."'");
								$kategori = mysqli_fetch_assoc($kategori_secme);
								$yorum_secme = mysqli_query($con,"SELECT * FROM `yorumlar` WHERE `yazi_id` ='". mysqli_real_escape_string($con,$id)."' ORDER BY `id` DESC");
								$begeni_secme = mysqli_query($con,"SELECT * FROM `like_table` WHERE `yazi_id` = '".$satir["id"]."' ");
								$begeni = mysqli_fetch_assoc($begeni_secme);
								$comments = mysqli_num_rows($yorum_secme);
								$_SESSION['comment'] = $comments;
								if(isset($_SESSION['kullanici_id'])){
								$begenmisMi = mysqli_query($con,"SELECT * FROM `check_like` WHERE `yazi_id` ='". mysqli_real_escape_string($con,$id)."' and `kullanici_id` = '".$_SESSION['kullanici_id']."' ");
								}
								
								?>
								<article class="post">
									<header>
										<div class="title">
											<h2><a href="oku.php?id=<?php echo $satir['id']; ?>"><?php echo $satir["baslik"]; ?></a></h2>
											<?php if($satir["alt_baslik"]=="0"){}else{?>
											<p><?php echo $satir["alt_baslik"]; ?></p><?php }?>
										</div>
										<div class="meta">
											<time class="published" datetime="2015-11-01"><?php echo yorum_ne_zaman(); ?></time>
											<a href="javascript:;" class="author"><span class="name"><?php echo $yazar["adi"]; ?></span><img src="images/avatar.jpg" alt="" /></a>
										</div>
									</header><?php if($satir["resim"]=="0"){ } else{?>
											<a href="javascript:;" class="image featured"><img src="images/<?php  echo $satir["resim"];?>" alt="" /></a><?php } ?>
									<footer>
									<ul class="stats">
											<li><a href="javascript:;"><?php echo $kategori["kategori_adi"]; ?></a></li>
											<li><a href="javascript:;" id="like" class="icon fa-heart" <?php if(isset($_SESSION['kullanici_id'])){if(mysqli_num_rows($begenmisMi)){ ?> style='color:#2ebaae; pointer-events: none;cursor: default;'<?php }}?>><?php echo $begeni['number'];?></a></li>
											<li><a href="#son" class="icon fa-comment"><?php echo $comments; ?></a></li>
									</ul>
									
									</footer>
									<p><?php echo $satir['icerik']; ?></p>
									<footer>
									<div style="width:100%;">
										
										<textarea name="yorum" id="yorum" placeholder="Yorumunuzu giriniz..." ></textarea><br>
										<button id="yorum_yap" class="button big" name="son"><a name="son"></a>Yorum Yap</button>
										<div id="tum_yorumlar">
										<?php 
											$yorum_secme = mysqli_query($con,"SELECT * FROM `yorumlar` WHERE `yazi_id` ='". mysqli_real_escape_string($con,$id)."' ORDER BY `id` DESC");
											$comments = mysqli_num_rows($yorum_secme);
											//var_dump($yorum_secme);
											while($yorum_satir = mysqli_fetch_assoc($yorum_secme)){
													
								
													$GLOBALS['a'] = $yorum_satir['zaman'];
													if (!function_exists('yorum_ne_zaman')) {
													function yorum_ne_zaman(){
														
														$yorum_zamani = $GLOBALS['a'];//2017 01
														$yil_ay = explode("-",$yorum_zamani);
														$new = $yil_ay[2];
														$gun = explode(" ",$new);
														//echo $new2[1];
														$asd = $gun[1];
														$saat_dakika_saniye = explode(":",$asd);
														//echo $saat_dakika_saniye[1];
														//echo $saat_dakika_saniye[2];
														$now = date('d-m-Y');
														$now_gun_ay_yil = explode('-',$now);
														date_default_timezone_set('Asia/Baghdad');
														$saat = date("H:i:s");
														$now_saat_dakika_saniye = explode(':',$saat);
															
															$saniye_farki = $now_saat_dakika_saniye[2]-$saat_dakika_saniye[2];
															if($saniye_farki<0){
																$saniye_farki += 60;
																$now_saat_dakika_saniye[1] -= 1;
															}
															$dakika_farki = $now_saat_dakika_saniye[1]-$saat_dakika_saniye[1];
															if($dakika_farki<0){
																$dakika_farki += 60;
																$now_saat_dakika_saniye[0] -= 1;
															}
															$saat_farki = $now_saat_dakika_saniye[0]-$saat_dakika_saniye[0];
															if($saat_farki<0){
																$saat_farki += 12;
																$now_gun_ay_yil[0] -= 1;
															}
															$gun_farki = $now_gun_ay_yil[0]-$gun[0];
															if($gun_farki<0){
																$gun_farki += 30;
																$now_gun_ay_yil[1] -= 1;
															}
															$ay_farki = $now_gun_ay_yil[1]-$yil_ay[1];
															if($ay_farki<0){
																$ay_farki += 12;
																$now_gun_ay_yil[2] -= 1;
															}
															$yil_farki = $now_gun_ay_yil[2]-$yil_ay[0];
															if($yil_farki >= 1){
																echo $yil_farki." yıl önce";
																
															}
															else if($ay_farki>=1){
																echo $ay_farki." ay önce";
															}
															else if($gun_farki>0){
																echo $gun_farki." gün önce";
															}
															else if($saat_farki>0){
																echo $saat_farki." saat önce";
															}
															else if($dakika_farki>0){
																echo $dakika_farki." dakika önce";
															}
															else if($saniye_farki>0){
																echo $saniye_farki." saniye önce";
															}
															
															
													}}
														
													
										?>
										<div id="sona_git" class="<?php echo $yorum_satir['id']; ?>" style="margin-top:10px;" >
											<span >
											
											<i><strong><?php echo $yorum_satir['kullanici_adi'];?>
												</strong> yazdi:</i> 
											</span><div style="float:right;"><?php yorum_ne_zaman(); ?> &nbsp;<!--<i class="fa fa-thumbs-up" id="up<?php //echo $yorum_satir['id']; ?>" style="cursor:pointer;" aria-hidden="true"><?php
											$yorum_begeni = mysqli_query($con, "SELECT * FROM `yorum_like` WHERE `yorum_id` ='".$yorum_satir['id']."'");
											while($yorum_begeni_satir = mysqli_fetch_assoc($yorum_begeni)){
													
													
											//echo $yorum_begeni_satir['like'];?></i>&nbsp;
											<i class="fa fa-thumbs-down" id="down<?php echo $yorum_satir['id']; ?>" style="cursor:pointer; " aria-hidden="true"><?php //echo $yorum_begeni_satir['dislike'];?></i>-->
											</div><?php }
														
														if(isset($_SESSION['kullanici_id'])){
														if($yorum_satir['kullanici_adi'] == $_SESSION['kullanici_adi'] || $_SESSION['user_status'] > 2){
																?>
																<div style='float:right; margin-top:50px; margin-right:-80px; padding-right:-150px;'>
																	<button id='yorum_sil<?php echo $yorum_satir['id']; ?>'> Yorumu Sil</button>
																	<script>
																		$("#yorum_sil<?php echo $yorum_satir['id']; ?>").click(function(){
																			$.post("assets/ajax/yorum_sil2.php",{id: '<?php echo $yorum_satir['id']; ?> ' })
																			.done(function(data){
																				if(data == 'Basarili'){
																					$(".<?php echo $yorum_satir['id']; ?>").remove();
																				}
																				else{
																					alert('Başarısız');
																				
																				}
																			});
																		});
																	</script>
																	<script>
																		$("#up<?php echo $yorum_satir['id']; ?>").click(function(){
																			$.post("assets/ajax/yorum_begen.php",{yorum_id:'<?php echo $yorum_satir['id']; ?>'})
																			.done(function(data){
																				if(data == 'Basarili'){
																					alert('basarili');
																				}
																				else{
																					alert('Başarısız');
																				
																				}
																			});
																		});
																	</script>
																</div>
															<?php   }
														}
													?>
											<div style="background-color:#D3D3D3; padding:10px; ">
												<p> <?php echo $yorum_satir['yorum'] ?> 
													<div style="float:right; margin-top:-110px;"></div>
												</p>
												
											</div>
											
										</div>
										<?php } ?>
										</div>
									</footer></div>
								</article>
								<script type="text/javascript" charset="iso-8859-1">
									$("#yorum_yap").click(function(){
										$.post("assets/ajax/yorum_yap.php", { kullanici_adi: $("#adi").val(), yorum: $("#yorum").val(), yazi_id: '<?php echo $satir['id']; ?>' })
										  .done(function( data ) {
											  if(data == 'Basarili'){
												$("#tum_yorumlar").prepend(function(){
														var a = encodeURI($("#yorum").val());
														return `
															<div>
															<span>
															<i><strong>`+"<?php if(isset($_SESSION['kullanici_id']))echo $_SESSION['kullanici_adi'];?>"+`
																</strong> yazdi:</i>
															</span>
															
															<div style="background-color:#D3D3D3; padding:10px; ">
																<p> `+ a +`
																</p>
															</div>
															</div>
														`;	
												});
											}
												else{
													window.location.href = 'admin';
												}
										  });
									});
									$("#like").click(function(){
										$.post("assets/ajax/begeni.php",{yazi_id: '<?php echo $satir['id']; ?>'})
										.done(function(data){
											if(data == 'Basarili'){
												var button = document.getElementById('like');
												var attnum = <?php echo $begeni['number']; ?>;
												document.getElementById('like').innerHTML = ++attnum;
												
											}
											else if(data == 'Basarisiz'){
												window.location.href = 'admin';
											}
										});
									});
									
									
									
								</script>
								<?php
								
							}
							mysqli_free_result($yazi_secme);
							
							?>


					</div>


			</div>

		<!-- Scripts -->
			

	</body>
</html>
<?php }
