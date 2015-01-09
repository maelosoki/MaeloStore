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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_produk_kategori]'>"; ?>
		<div class="col-left">
			<?php
				$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='9'");
				while($block=mysqli_fetch_array($sidebar)){
				  include "block/block_$block[block_1].php";
				  include "block/block_$block[block_2].php";
				  include "block/block_$block[block_3].php";
				  include "block/block_$block[block_4].php";
				  include "block/block_$block[block_5].php";
				}
			?>
		</div>
		<div class="col-left2">
			<div class="block man-block">
				<div class="block-title">Kategori Produk</div>
				  <ul class="left_menu">
						<?php
						$kategori=mysqli_query($konek, "SELECT nama_kategori, kategori.id_kategori, kategori_seo,  
											  count(produk.id_produk) as jml 
											  from kategori left join produk 
											  on produk.id_kategori=kategori.id_kategori 
											  group by nama_kategori DESC");
						while($k=mysqli_fetch_array($kategori)){
							echo "<li class='kategori'><a href='kategori-$k[id_kategori]-$k[kategori_seo]'> $k[nama_kategori] </a></li>";
						}
						?>
				  </ul> 
			</div>
		</div>
		</span>
		<?php if($sp[sidebar_produk_kategori] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";} ?>
		<div class="col-main">
			<?php		
				$sq = mysqli_query($konek, "SELECT nama_kategori from kategori where id_kategori='$id'");
				$n = mysqli_fetch_array($sq);
					echo "<div class='contact-form-container'>
							<div  class='form-title2'>Kategori : $n[nama_kategori]</div>
						  </div>";
					echo "<div class='new-product-block'>";
					echo "<ul class='product-grid'>";

					$p      = new PagingKategori;
					$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
					$batas=$iden[produk_kategori];
					$posisi = $p->cariPosisi($batas);
					$sql = mysqli_query($konek, "SELECT * FROM produk WHERE id_kategori='$id' and aktif='Y' ORDER BY id_produk DESC LIMIT $posisi,$batas");		 
					$jumlah = mysqli_num_rows($sql);

					if ($jumlah > 0){
					while ($r=mysqli_fetch_array($sql)){

						  echo"<li class='lainnya2'>
								<a href='produk-$r[id_produk]-$r[produk_seo]'>
									<div class='pro-img'>
							";	
							if($r[gambar] == 0){echo"<img title='Foto produk tidak tersedia' alt='Feature Product' src='images/small_no_picture.jpg' />";}
							else{echo"<img title='Feature Product' alt='Feature Product' src='foto_produk/small_$r[gambar]' />";}
							echo"		
								</div>
								<div class='pro-content'>
									<p>$r[nama_produk]</p>
									<div class='pro-price'>";
							$harga_nol = mysqli_fetch_array(mysqli_query($konek, "SELECT * from tampilan LIMIT 1"));
							$harga = format_rupiah($r[harga]);
							if ($r[harga]!=0){
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
			<div class="pager-container">
				<div class="pager">
					<?php
						$jmldata     = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM produk WHERE id_kategori='$id'"));
						$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);
						echo "$linkHalaman";
						}
						else{
						echo "<p align=center>Belum ada produk pada kategori ini.</p>";
						}
					?>
				</div>
			</div>
		</div>
		</span>
		<div class="clearfix"></div>
	</div>
</section>