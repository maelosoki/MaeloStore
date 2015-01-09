<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<?php
$t=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM produk where id_produk='$id'"));
if($t[id_produk] == ''){
	echo"<section class='content-wrapper'><div class='content-container container'><div class='newsletter'><strong>Produk Tidak Tersedia</strong></div></div></section>";
}
elseif($t[aktif] == N){
	echo"<section class='content-wrapper'><div class='content-container container'><div class='newsletter'><strong>Produk Tidak Aktif</strong></div></div></section>";
}
else{
?>
<section class="content-wrapper">
	<div class="content-container container">
		<div class="breadcrum-container">
			<?php include "breadcumb.php"; ?>
		</div>
		<div class="col-main-left">
			<div class="detail_atas">
					<?php
						$detail=mysqli_query($konek, "SELECT * from produk where id_produk='$id'");
						while ($d=mysqli_fetch_array($detail)){
						  echo "<div class='gambar_detail'>";
						if($d[gambar] == 0){
						  echo "<a href='images/no_picture.jpg' title='Foto produk tidak tersedia' data-lightbox='image'>
								<img src='images/no_picture.jpg' title='Klik Untuk Memperbesar Gambar'/></a>";}
						else{
						  echo "<a href='foto_produk/$d[gambar]' title='$d[nama_produk]' data-lightbox='image'>
								<img src='foto_produk/medium_$d[gambar]' title='Klik Untuk Memperbesar Gambar'/></a>";}
						}
						  echo "<div class='gambar_tambahan_wrap'>";
								$detail=mysqli_query($konek, "SELECT * from produk where id_produk='$id'");
								while ($d=mysqli_fetch_array($detail)){
									if($d[gambar2] == 0){
									  echo "";}
									else{
									echo "<div class='gambar_tambahan'>
									<a href='foto_produk/$d[gambar2]' title='$d[nama_produk]' data-lightbox='image'>
									<img src='foto_produk/small_$d[gambar2]' title='Klik Untuk Memperbesar Gambar'  width='46' /></a></div>";
									}
									if($d[gambar3] == 0){
									  echo "";}
									else{
									echo "<div class='gambar_tambahan'>
									<a href='foto_produk/$d[gambar3]' title='$d[nama_produk]' data-lightbox='image'>
									<img src='foto_produk/small_$d[gambar3]' title='Klik Untuk Memperbesar Gambar'  width='46' /></a></div>";
									}
									if($d[gambar4] == 0){
									  echo "";}
									else{
									echo "<div class='gambar_tambahan'>
									<a href='foto_produk/$d[gambar4]' title='$d[nama_produk]' data-lightbox='image'>
									<img src='foto_produk/small_$d[gambar4]' title='Klik Untuk Memperbesar Gambar'  width='46' /></a></div>";
									}
									if($d[gambar5] == 0){
									  echo "";}
									else{
									echo "<div class='gambar_tambahan'>
									<a href='foto_produk/$d[gambar5]' title='$d[nama_produk]' data-lightbox='image'>
									<img src='foto_produk/small_$d[gambar5]' title='Klik Untuk Memperbesar Gambar'  width='46' /></a></div>";
									}
								}
						  echo "</div></div>";
			echo"<div class='span5'>";
						$detailnama=mysqli_query($konek, "SELECT * from produk where id_produk='$id'");
						$dnama=mysqli_fetch_array($detailnama);
						$stok=$dnama['stok'];
						$url_filter = htmlspecialchars(strip_tags($_SERVER['REQUEST_URI']));
						$url="http://".$_SERVER['HTTP_HOST'].$url_filter;
					  echo"
						<div class='nama_product'>$dnama[nama_produk]</div>
						<div class='ket_product'>Bagikan ke : 
						<a style='color:#555' href='https://www.facebook.com/sharer/sharer.php?u=$url' target='_blank'>Facebook</a> | 
						<a style='color:#555' href='https://twitter.com/home?status=$url' target='_blank'>Twitter</a> | 
						<a style='color:#555' href='https://plus.google.com/share?url=$url' target='_blank'>Google+</a>
						</div>
						<div class='ket_product'>Kode Produk : <span style='color:red'>$dnama[kode_produk]</span></div>
						<div class='ket_product'>Berat : $dnama[berat] kg</div>
						<div class='ket_product'>Stok : $stok</div>
						";
						// tombol stok jd habis kalau stoknya 0
						$sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from tampilan LIMIT 1"));
						$tombolbeli  = "<a class='prod_cart' href='$sql[url_tombol_beli]'>$sql[tombol_beli]</a>";
						$tombolhabis = "<span class='prod_cart_habis'>$sql[tombol_habis]</span>";
						if ($stok!=0){
						  $tombol=$tombolbeli;
						}else{
						  $tombol=$tombolhabis;
						}
						$harga = format_rupiah($dnama[harga]);
						$harga_tetap="<span class='harga_product'>Rp $harga</span>";
						if ($dnama[harga]!=0){
						  echo "$harga_tetap $tombol";
						}else{
						  echo "<span class='harga_product'>Rp $sql[harga]</span> $tombol";
						}
					?>
				 </div>
			</div>
			<div class="block-01">
				<div class="cara_beli">
					<div class='ulasan'>ULASAN PRODUK :</div><hr/>
						<?php echo "$dnama[deskripsi]"; ?>
				</div>
				<?php 
				if ($dnama[komentar]==N){
					echo "";
				}else{
					echo "
						<div id='komentar' style='display: inline-block;'>&nbsp;</div>
						<div class='komentar'>		
						";
						// Hitung jumlah komentar
						$komentar = mysqli_query($konek, "SELECT count(komentar.id_komentar) as jml from komentar WHERE id_produk='$id' AND aktif='Y'");
						$k = mysqli_fetch_array($komentar); 
						$sql = mysqli_query($konek, "SELECT * FROM komentar WHERE id_produk='$id' AND aktif='Y'");
						$jml = mysqli_num_rows($sql);
						if ($jml > 0){
						echo "<div  class='jml_komentar'><b>$k[jml]</b> KOMENTAR :</div>";  
						}
						else{
						echo "";  
						}
						// Paging komentar
						$p      = new PagingKomentarProduk;
						$batas  = 5;
						$posisi = $p->cariPosisi($batas);
						// Komentar produk
						$sql = mysqli_query($konek, "SELECT * FROM komentar WHERE id_produk='$id' AND aktif='Y' ORDER BY id_komentar DESC LIMIT $posisi,$batas");
						$jml = mysqli_num_rows($sql);
						// Apabila sudah ada komentar, tampilkan 
						if ($jml > 0){
						while ($s = mysqli_fetch_array($sql)){
						  $tanggal = tgl_indo($s[tgl]);
						  echo "<div class='isi_komentar'><strong>&nbsp; $s[nama_komentar] &nbsp; </strong>|&nbsp; $tanggal - $s[jam_komentar] WIB<br />";  
						  $sensor_isi=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
						  $isi_komentar_sensor=sensor($sensor_isi); 
						  echo "<div class='paragraf_komentar'>$isi_komentar_sensor</div><hr /></div>";	 		  
						}
						$jmldata     = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM komentar WHERE id_produk='$id' AND aktif='Y'"));
						$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $p->navHalaman($_GET['halkomentar'], $jmlhalaman);
						echo "$linkHalaman";
						}
					echo "
						</div>				
						<div class='komentar_form'>	
							<div class='contact-form-container'>
								<div  class='form-title'>Jika ada pertanyaan seputar produk yang bersangkutan silakan isi form di bawah ini. <br />Email anda tidak akan kami tampilkan, email hanya untuk kepentingan kontak pelanggan kami.</div>
								<form action=komentar method=POST>
											<input type=hidden name=id value='$id'>
									<ul class='form-fields'>
										<li class='left'>
											<label>Nama<em>*</em></label>
											<input type='text' name=nama_komentar required />
										</li>
										<li class='left'>
											<label>Email<em>*</em></label>
											<input type='email' name=email required />
										</li>
										<li class='full-row'>
											<label>Komentar<em>*</em></label>
											<textarea name=isi_komentar required ></textarea>
										</li>
										<li class='left'>
											<img src='captcha/captcha.php' id='captcha'>
											<label>( masukkan kode keamanan di atas )</label>
											<label><a href='JavaScript: captcha();'>Kode tidak terbaca? Klik di sini.</a></label>
											<input type='text' name=kode size=6 maxlength=6 required >
										</li>
									</ul>
									<div class='button-set'>
										<p class='required'>* Wajib isi</p>
										<button type='submit' class='form-button'><span>Kirim</span></button>
									</div>
								</form>
							</div>
						</div>
					";
				}
				?>
			</div>
		</div>
		<aside class="right-sidebar">
            <div class="produk_lainnya">Produk Lainnya</div>
            <ul>
				<?php
					$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
					$batas=$iden[produk_lainnya];
					$q=mysqli_query($konek, "SELECT * from produk where id_produk<>'$id' and aktif='Y' LIMIT $batas");
					while ($r=mysqli_fetch_array($q))
					{
					$harga_nol = mysqli_fetch_array(mysqli_query($konek, "SELECT * from tampilan LIMIT 1"));
					$harga = format_rupiah($r[harga]);
					 echo"<li class='lainnya'>
							<a href='produk-$r[id_produk]-$r[produk_seo]'>
						";	
						if($r[gambar] == 0){echo"<img src='images/small_no_picture.jpg' />";}
						else{echo"<img src='foto_produk/small_$r[gambar]' />";}
						echo"</a><p>$r[nama_produk]<br/><strong>";
						if ($r[harga]!=0){
						  echo "Rp $harga";
						}else{
						  echo "Rp $harga_nol[harga]";
						}
						echo"</strong></p></li>";
					}
				?>   
            </ul>
		</aside>
		<div class="clearfix"></div>
	</div>
</section>
<?php } ?>