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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_produk]'>"; ?>
		<div class="col-left">
				<?php
					$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='8'");
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
		<?php if($sp[sidebar_produk] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";} ?>
		<div class="col-main">
			<div class="category-banner">
				<?php
					$banner=mysqli_query($konek, "SELECT * FROM banner where publish='Y' and posisi='Banner_Produk' ORDER BY urutan DESC LIMIT 1");
					while($b=mysqli_fetch_array($banner)){
						if($b[new_window] == Y){echo"<a href='$b[url]' target='_blank' title='$b[judul]'><img src='foto_banner/$b[gambar]' width='756' alt='Banner' /></a>";}
						else {echo"<a href='$b[url]' title='$b[judul]'><img src='foto_banner/$b[gambar]' width='756' alt='Banner' /></a>";}
					}
				?>
			</div>
			<div class="new-product-block">
				<ul class="product-grid">
					<?php
					$p      = new PagingProduk;
					$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
					$batas=$iden[produk_all];
					$posisi = $p->cariPosisi($batas);
					$sql=mysqli_query($konek, "SELECT * FROM produk WHERE aktif='Y' ORDER BY id_produk DESC LIMIT $posisi,$batas");
					while ($r=mysqli_fetch_array($sql)){
							echo"
							<li class='lainnya2'><a href='produk-$r[id_produk]-$r[produk_seo]'>
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
						$jmldata     = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM produk"));
						$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $p->navHalaman($_GET[halproduk], $jmlhalaman);
						echo "$linkHalaman";
					?>
				</div>
			</div>
		</div>
		</span>
		<div class="clearfix"></div>
	</div>
</section>