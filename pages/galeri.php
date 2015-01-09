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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_galeri]'>"; ?>
		<div class="col-left">
			<?php
				$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='11'");
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
		<?php if($sp[sidebar_galeri] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";} ?>
		<div class='col-main'>		  
			<?php
			$t = mysqli_fetch_assoc(mysqli_query($konek, "SELECT jdl_album FROM album WHERE id_album='$id'"));
			echo "<div class='contact-form-container'>
					<div  class='form-title2'>Album : $t[jdl_album]</div><br />
				  </div>
				  ";

			$p = new PagingGaleri;
			$batas = 20;
			$posisi = $p->cariPosisi($batas);

			$g = mysqli_query($konek, "SELECT * FROM gallery WHERE id_album='$id' ORDER BY id_gallery DESC LIMIT ".$posisi.",".$batas."");
			$ada = mysqli_num_rows($g); 
			
			if($ada > 0) {
				$cnt = 0;
				while($w = mysqli_fetch_array($g)) {
					echo "
					<div class='album'>
						
						";
						if($w[gbr_gallery] == 0){echo"<a href='images/no_picture.jpg' title='Foto tidak tersedia' data-lightbox='image'>
													<img title='Foto tidak tersedia' alt='$w[jdl_gallery]' src='images/small_no_image.jpg' /></a>";}
						else{
							echo"<a href='img_galeri/$w[gbr_gallery]' title='$w[keterangan]' data-lightbox='image' >
								<img src='img_galeri/kecil_$w[gbr_gallery]' alt='$w[jdl_gallery]' /></a>";
						}
					echo "
						<br/>
						<strong>$w[jdl_gallery]</strong><br/>
					";
					if ($w[keterangan]==''){
					  echo "";
					}else{
					  echo "( $w[keterangan] )";
					}
					echo "
					</div>
					";
				}

			echo "
			<div class='pager-container'>
				<div class='pager'>
			";
			$jmldata     = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM gallery WHERE id_album='$id'"));	
			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[halgaleri], $jmlhalaman);
			echo "$linkHalaman
				</div>
			</div>
             ";

	} else {
		echo "<p align=center>Belum ada foto pada kategori ini.</p>";
	}
	echo '';


			?>

		</div>
		</span>
		<div class="clearfix"></div>
	</div>
</section>