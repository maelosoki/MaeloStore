<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<?php
$produk=mysqli_query($konek, "SELECT * FROM produk WHERE aktif='Y' ORDER BY id_produk DESC");
while($new=mysqli_fetch_array($produk)){
	if($new[nama_produk] == ''){echo"";}
	else
	{echo"
		<div class='breaking-wrapper'>  	
			<div class='horizontal-scroller'>
				<div id='scrollingtext'>
	";
				while ($new=mysqli_fetch_array($produk)){
					echo " 
						<img src='images/bullet.png' width='20' height='20'/>
						<a href='produk-$new[id_produk]-$new[produk_seo]'>$new[nama_produk]</a>
					";
				}
	echo"
				</div>
			</div> 	
		</div>
	";}
}
?>
<section class="banner-wrapper">
  <div class="banner-block container">
	<div class="flexslider">
	  <ul class="slides">
		<?php
			$banner1=mysqli_query($konek, "SELECT * FROM banner where publish='Y' and posisi='Banner_Utama' ORDER BY urutan LIMIT 5");
			while($b1=mysqli_fetch_array($banner1)){
				if($b1[new_window] == Y){echo"<li><a href='$b1[url]' target='_blank' title='$b1[judul]'><img src='foto_banner/$b1[gambar]' width='692' alt='Banner' /></a></li>";}
				else {echo"<li><a href='$b1[url]' title='$b1[judul]'><img src='foto_banner/$b1[gambar]' width='692' alt='Banner' /></a></li>";}
			}
		?>
	  </ul>
	</div>
	<ul class="banner-add">
		<?php
			$banner2=mysqli_query($konek, "SELECT * FROM banner where publish='Y' and posisi='Banner_Kanan_Atas' ORDER BY urutan DESC LIMIT 1");
			while($b2=mysqli_fetch_array($banner2)){
				if($b2[new_window] == Y){echo"<li class='add1'><a href='$b2[url]' target='_blank' title='$b2[judul]'><img src='foto_banner/$b2[gambar]' width='300' alt='add1' /></a></li>";}
				else {echo"<li class='add1'><a href='$b2[url]' title='$b2[judul]'><img src='foto_banner/$b2[gambar]' width='300' alt='add1' /></a></li>";}
			}
		?>
		<?php
			$banner3=mysqli_query($konek, "SELECT * FROM banner where publish='Y' and posisi='Banner_Kanan_Bawah' ORDER BY urutan DESC LIMIT 1");
			while($b3=mysqli_fetch_array($banner3)){
				if($b3[new_window] == Y){echo"<li class='add2'><a href='$b3[url]' target='_blank' title='$b3[judul]'><img src='foto_banner/$b3[gambar]' width='300' alt='add2' /></a></li>";}
				else {echo"<li class='add2'><a href='$b3[url]' title='$b3[judul]'><img src='foto_banner/$b3[gambar]' width='300' alt='add2' /></a></li>";}
			}
		?>
	</ul>
  </div>
</section>
<section class="content-wrapper">
  <div class="content-container container">
	<div class="new-product-block">
	  <ul class="product-grid">
		<?php
			$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
			$batas=$iden[produk_home];
			$f=mysqli_query($konek, "SELECT * FROM produk WHERE aktif='Y' ORDER BY id_produk DESC LIMIT $batas");
			while($f1=mysqli_fetch_array($f))
			{	  
				echo"<li class='lainnya2'>
				<a href='produk-$f1[id_produk]-$f1[produk_seo]'>
				<div class='pro-img'>
					";	
					if($f1[gambar] == 0){echo"<img title='Foto produk tidak tersedia' alt='Feature Product' src='images/small_no_picture.jpg' />";}
					else{echo"<img title='Feature Product' alt='Feature Product' src='foto_produk/small_$f1[gambar]' />";}
					echo"		
						</div>
						<div class='pro-content'>
							<p>$f1[nama_produk]</p>
							<div class='pro-price'>";
					$harga_nol = mysqli_fetch_array(mysqli_query($konek, "SELECT * from tampilan LIMIT 1"));
					$harga = format_rupiah($f1[harga]);
					if ($f1[harga]!=0){
					  echo "Rp $harga";
					}else{
					  echo "Rp $harga_nol[harga]";
					}
					echo"
							</div>
						</div>
						</a>			  
						<div class='clearfix'></div>
					</li>";
			}
		?>  
	  </ul>
	</div>
	<div class="artikel_fb">
			<div class="artikel">
					  <?php
						$tmp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
						$jml=$tmp[artikel_home];
						$terkini=mysqli_query($konek, "SELECT * FROM artikel 
											  WHERE aktif='Y' ORDER BY id_artikel DESC LIMIT $jml");
						while($t=mysqli_fetch_array($terkini)){
						$isi_artikel = strip_tags($t['isi_artikel']); // membuat paragraf pada isi artikel dan mengabaikan tag html
						$isi = substr($isi_artikel,0,150); // ambil sebanyak 150 karakter
						$isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
						$tgl = tgl_indo($t[tanggal]);
						  echo "<div class='pembatas_artikel'>
							";
							if($t[gambar] == 0){echo"<div class='gambar_artikel'><img title='Foto tidak tersedia' alt='Gallery' src='images/small_no_image.jpg' width='110' /></div>";}
							else{
								echo"<div class='gambar_artikel'><img src=foto_artikel/small_$t[gambar] /></div>";
							}
								echo "
									<div class='judul_artikel'><a href='artikel-$t[id_artikel]-$t[judul_seo]'>$t[judul]</a></div>
									<div class='ket_artikel'>$t[hari], $tgl - $t[jam] WIB | dibaca $t[dibaca] x</div>
									$isi .....
								</div>
								";           
						} 
					  ?>
				<div class="artikel_semua">
					<a href='artikel'>Artikel lainnya >></a>
				</div>
			</div>
			<div class="banner_bawah">
				<?php
					$banner4=mysqli_query($konek, "SELECT * FROM banner where publish='Y' and posisi='Banner_Kaki' ORDER BY urutan DESC LIMIT 1");
					while($b4=mysqli_fetch_array($banner4)){
						if($b4[new_window] == Y){echo"<a href='$b4[url]' target='_blank' title='$b4[judul]'><img src='foto_banner/$b4[gambar]' width='400' alt='add2' /></a>";}
						else {echo"<a href='$b4[url]' title='$b4[judul]'><img src='foto_banner/$b4[gambar]' width='400' alt='add2' /></a>";}
					}
				?>
			</div>
	<?php
	$social=mysqli_query($konek, "SELECT * FROM tampilan");
	while($s=mysqli_fetch_array($social)){
		if($s[social] == facebook){
			$sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from tampilan"));
			echo"
				<div id='fb-root'></div>
				<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = \"//connect.facebook.net/id_ID/sdk.js#xfbml=1&appId=$sql[facebook_app_id]&version=v2.0\"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
				<div class='facebook'>
					<div class='fb-like-box'
					data-href='https://www.facebook.com/$sql[facebook]'
					data-width='400'
					data-height='350'
					data-colorscheme='light'
					data-show-faces='true'
					data-header='false'
					data-stream='false'
					data-show-border='false'>
					</div>
				</div>
				";
		}
		elseif($s[social] == twitter){
			$sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from tampilan"));
			echo"
				<div class='facebook'>
				<a class='twitter-timeline'  href=\"https://twitter.com/$sql[twitter]\" data-widget-id=\"$sql[twitter_widget_id]\">Tweet oleh @$sql[twitter]</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\":js/twitter.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
				</div>";
		}
	}
	?>
	</div>
	<div class="news-letter-container">
	  <div class="news-letter-block">
		<form method="POST" action="newsletter">
			<h2>UPDATE INFORMASI PRODUK TERBARU</h2>
			<input type="email" name="email" placeholder="Daftarkan E-mail anda..." required />
			<input type="submit" value="Submit" title="Submit" />
		</form>
	  </div>
	</div>
  </div>
</section>