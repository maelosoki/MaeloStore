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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_artikel]'>"; ?>
		<div class="col-left">
				<?php
					$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='1'");
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
		<?php if($sp[sidebar_artikel] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";} ?>
		<div class="col-main">
			<div class="new-product-block">
				<?php
				$p      = new PagingArtikel;
				$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
				$batas=$iden[artikel_all];
				$posisi = $p->cariPosisi($batas);
				$sql=mysqli_query($konek, "SELECT * FROM artikel WHERE aktif='Y' ORDER BY id_artikel DESC LIMIT $posisi,$batas");
				while ($t=mysqli_fetch_array($sql)){

							$isi_artikel = strip_tags($t['isi_artikel']); // membuat paragraf pada isi artikel dan mengabaikan tag html
							$isi = substr($isi_artikel,0,200); // ambil sebanyak 200 karakter
							$isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
							$tgl = tgl_indo($t[tanggal]);
							  echo "<div class='pembatas_artikel_lainnya2'>
								";
								if($t[gambar] == 0){echo"<div class='gambar_artikel_lainnya'><img title='Foto tidak tersedia' alt='Gallery' src='images/small_no_image.jpg' /></div>";}
								else{
									echo"<div class='gambar_artikel_lainnya'><a href='artikel-$t[id_artikel]-$t[judul_seo]'><img src=foto_artikel/small_$t[gambar] /></a></div>";
								}
									echo "
											<div class='judul_artikel'>
												<a href='artikel-$t[id_artikel]-$t[judul_seo]'>$t[judul]</a>
											</div>
											<div class='ket_artikel'>$t[hari], $tgl - $t[jam] WIB | dibaca $t[dibaca] x</div>
										$isi .....
									</div>";    
				}
				?>  
			</div>
			<div class="pager-container">
                <?php
					$jmldata     = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM artikel"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halartikel], $jmlhalaman);
					echo "$linkHalaman";
				?>
			</div>
		</div>
		</span>
		<div class="clearfix"></div>
	</div>
</section>