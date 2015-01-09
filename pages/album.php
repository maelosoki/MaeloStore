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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_album]'>"; ?>
		<div class="col-left">
			<?php
				$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='12'");
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
		<?php if($sp[sidebar_album] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";}
  echo "<div class='col-main'>";		  
			$a = mysqli_query($konek, "SELECT jdl_album, album.id_album, gbr_album, album_seo,  
							  COUNT(gallery.id_gallery) as jumlah 
							  FROM album LEFT JOIN gallery 
							  ON album.id_album = gallery.id_album 
							  WHERE album.aktif = 'Y'  
							  GROUP BY jdl_album");

			while($w = mysqli_fetch_array($a)) {
				echo "
					<div class='album'>
					<a href='album-$w[id_album]-$w[album_seo]'>
					";
					if($w[gbr_album] == 0){echo"<img title='Foto tidak tersedia' alt='Gallery' src='images/small_no_image.jpg' />";}
					else{
						echo"
							<img src='img_album/kecil_$w[gbr_album]'>
						";
					}
				echo "
					</a><br/><a href='album-$w[id_album]-$w[album_seo]'>$w[jdl_album]</a><br />( $w[jumlah] Foto )
					</div>
					";
			}
			?>
		</div>
		</span>
		<div class="clearfix"></div>
	</div>
</section>