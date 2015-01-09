<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<section class="content-wrapper">
	<div class="content-container container">
		<div class="breadcrum-container">
			<?php include "breadcumb.php"; ?>
		</div>
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_pencarian]'>"; ?>
		<div class="col-left">
			<?php
				$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='10'");
				while($block=mysqli_fetch_array($sidebar)){
				  include "block/block_$block[block_1].php";
				  include "block/block_$block[block_2].php";
				  include "block/block_$block[block_3].php";
				  include "block/block_$block[block_4].php";
				  include "block/block_$block[block_5].php";
				}
			?>
		</div>
		</span>
		<?php if($sp[sidebar_pencarian] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";}
				// menghilangkan spasi di kiri dan kanannya
				$kata_kunci = trim($_REQUEST['kata']);
				// mencegah XSS
				$kata = htmlentities(htmlspecialchars($kata_kunci), ENT_QUOTES);
				$kategori = htmlentities($_REQUEST['kategori']); //nilai dari combobox

if($kategori=='produk'){
				// pisahkan kata per kalimat lalu hitung jumlah kata
				$pisah_kata = explode(" ",$kata);
				$jml_katakan = (integer)count($pisah_kata);
				$jml_kata = $jml_katakan-1;

				// Tentukan berapa data yang akan ditampilkan per halaman (paging)
				$p      = new PagingPencarian;
				$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
				$batas=$iden[pencarian_produk];
				$posisi = $p->cariPosisi($batas);
				
				$cari = "SELECT * FROM produk WHERE ";
					for ($i=0; $i<=$jml_kata; $i++){
					  $cari .= "deskripsi OR nama_produk LIKE '%$pisah_kata[$i]%'";
					  if ($i < $jml_kata ){
						$cari .= " OR ";
					  }
					}
				$cari .= "ORDER BY id_produk DESC LIMIT $posisi,$batas";
				$cari2 = "SELECT * FROM produk WHERE " ;
					for ($i=0; $i<=$jml_kata; $i++){
					  $cari2 .= "deskripsi OR nama_produk LIKE '%$pisah_kata[$i]%'";
					  if ($i < $jml_kata ){
						$cari2 .= " OR ";
					  }
					}
				$hasil  = mysqli_query($konek, $cari);
				$ketemu = mysqli_num_rows(mysqli_query($konek, $cari2));
				if ($ketemu > 0){
				echo "
				<div class='col-main'>
					<div class='hasil_cari'>Ditemukan <b>$ketemu</b> produk dengan kata kunci : <strong>$kata</strong></div>
						<div class='new-product-block'>
							<ul class='product-grid'>
					";
					while($t=mysqli_fetch_array($hasil)){
								echo"		
								<li class='lainnya2'>
									<a href='produk-$t[id_produk]-$t[produk_seo]'>
										<div class='pro-img'>
												";
											if($t[gambar] == 0){echo"<img title='Foto produk tidak tersedia' alt='Feature Product' src='images/small_no_picture.jpg' />";}
											else{echo"<img title='Feature Product' alt='Feature Product' src='foto_produk/small_$t[gambar]' />";}
												echo"
										</div>
										<div class='pro-content'>
												<p>$t[nama_produk]</p>";
											$harga_nol = mysqli_fetch_array(mysqli_query($konek, "SELECT * from tampilan LIMIT 1"));
											$harga = format_rupiah($t[harga]);
											if ($t[harga]!=0){
											  echo "<div class='pro-price'>Rp $harga</div>";
											}else{
											  echo "<div class='pro-price'>Rp $harga_nol[harga]</div>";
											}
										echo"
										</div>
									</a>			  
										<div class='clearfix'></div>
								</li>
								";
					}
					echo"	</ul>
							<div class='pager-container'>
								<div class='pager'>
							";
									$jmldata     = mysqli_num_rows(mysqli_query($konek, $cari2));
									$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
									$linkHalaman = $p->navHalaman($_REQUEST[halpencarian], $jmlhalaman);
									echo "$linkHalaman
								</div>
							</div>
						</div>						
				</div>";
					
				}
				else{echo "<div class='col-main'><p align=center>Tidak ditemukan produk dengan kata kunci : <strong>$kata</strong></p></div>";}
}
else{
				// pisahkan kata per kalimat lalu hitung jumlah kata
				$pisah_kata = explode(" ",$kata);
				$jml_katakan = (integer)count($pisah_kata);
				$jml_kata = $jml_katakan-1;
				
				// Tentukan berapa data yang akan ditampilkan per halaman (paging)
				$p      = new PagingPencarian;
				$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
				$batas=$iden[pencarian_artikel];
				$posisi = $p->cariPosisi($batas);

				$cari = "SELECT * FROM artikel WHERE ";
				for ($i=0; $i<=$jml_kata; $i++){
				  $cari .= "isi_artikel OR judul LIKE '%$pisah_kata[$i]%'";
				  if ($i < $jml_kata ){
					$cari .= " OR ";
				  }
				}
				$cari .= "ORDER BY id_artikel DESC LIMIT $posisi,$batas";
				$cari2 = "SELECT * FROM artikel WHERE " ;
					for ($i=0; $i<=$jml_kata; $i++){
					  $cari2 .= "isi_artikel OR judul LIKE '%$pisah_kata[$i]%'";
					  if ($i < $jml_kata ){
						$cari2 .= " OR ";
					  }
					}
				$hasil  = mysqli_query($konek, $cari);
				$ketemu = mysqli_num_rows(mysqli_query($konek, $cari2));
				if ($ketemu > 0){
				echo "
					<div class='col-main'>
						<div class='hasil_cari'>Ditemukan <b>$ketemu</b> artikel dengan kata kunci : <strong>$kata</strong></div>
							<div class='new-product-block'>
					";
					while($t=mysqli_fetch_array($hasil)){
							$isi_artikel = strip_tags($t['isi_artikel']); // membuat paragraf pada isi artikel dan mengabaikan tag html
							$isi = substr($isi_artikel,0,200); // ambil sebanyak 200 karakter
							$isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
							  echo "<div class='pembatas_artikel_lainnya2'>
								";
								if($t[gambar] == 0){echo"<div class='gambar_artikel_lainnya'><img title='Foto tidak tersedia' alt='Gallery' src='images/small_no_image.jpg' /></div>";}
								else{
									echo"<div class='gambar_artikel_lainnya'><img src=foto_artikel/small_$t[gambar] /></div>";
								}
									echo "
											<div class='judul_artikel'>
												<a href='artikel-$t[id_artikel]-$t[judul_seo]'>$t[judul]</a>
											</div>
										$isi .....
									</div>"; 					
					}
							echo"<div class='pager-container'>";
										$jmldata     = mysqli_num_rows(mysqli_query($konek, $cari2));
										$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
										$linkHalaman = $p->navHalaman($_REQUEST[halpencarian], $jmlhalaman);
										echo "$linkHalaman
								 </div>
							</div>		
					</div>";
				}
				else{echo "<div class='col-main'><p align=center>Tidak ditemukan artikel dengan kata kunci : <strong>$kata</strong></p></div>";}
}
			?>  
		</span>
		<div class="clearfix"></div>
	</div>
</section>