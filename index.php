<?php 
session_start();
include_once('header.php');
?>
				<!-- Main -->
					<div id="main">

						<!-- Post -->
						<?php
							include_once("baglanti.php");
							$yazilari_secme2 = mysqli_query($con, "SELECT * FROM `yazilar` ORDER BY `yazilar`.`tarih` DESC ");
							$yazilarin_sayisi = mysqli_num_rows($yazilari_secme2);
							
							$how_many = 3;
							$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
							if($page <= 0) $page = 1;
							else if($page > $yazilarin_sayisi/$how_many + 1 ) $page = $yazilarin_sayisi/$how_many + 1;
							$page = floor($page);
							$from_where = $how_many * ($page - 1);
							$yazilari_secme = mysqli_query($con, "SELECT * FROM `yazilar` ORDER BY `yazilar`.`tarih` DESC LIMIT ".$how_many." OFFSET ".$from_where." ");
							
							
							//echo $yazilarin_sayisi;
							while($satir = mysqli_fetch_assoc($yazilari_secme)){
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
								$id = $satir['id'];
								$yorum_secme = mysqli_query($con,"SELECT * FROM `yorumlar` WHERE `yazi_id` ='". mysqli_real_escape_string($con,$id)."' ORDER BY `id` DESC");
								$comments = mysqli_num_rows($yorum_secme);
								$begeni_secme = mysqli_query($con,"SELECT * FROM `like_table` WHERE `yazi_id` = '".$satir["id"]."' ");
								$begeni = mysqli_fetch_assoc($begeni_secme);
								if(isset($_SESSION['kullanici_id'])){
								$begenmisMi = mysqli_query($con,"SELECT * FROM `check_like` WHERE `yazi_id` ='". mysqli_real_escape_string($con,$id)."' and `kullanici_id` = '".$_SESSION['kullanici_id']."' ");
								}
								include('article.php');
							}
							mysqli_free_result($yazilari_secme);
							?>
						<!-- Pagination -->
							<ul class="actions pagination">
								<li><a href="index.php?page=<?php echo $page - 1 ?>" class="<?php if($page == 1){echo "disabled ";}else {echo " ";} ?>button big previous">Önceki Sayfa</a></li>
								<li><a href="index.php?page=<?php echo $page + 1 ?>" class="<?php if($page*$how_many > $yazilarin_sayisi){echo "disabled ";}else {echo "";} ?>button big next">Sonraki Sayfa</a></li>
							</ul>
							
					</div><!--main-->

			<?php 
							include_once('left_bar.php'); ?>	

			</div><!-- Wrapper -->

		

	</body>
</html>