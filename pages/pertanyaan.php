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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_pertanyaan]'>"; ?>
		<div class="col-left">
			<?php
				$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='14'");
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
		<?php if($sp[sidebar_pertanyaan] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";} ?>
		<div class="col-main">
			<div class="block-01">
				<h1 class="page-title" align=center>Info Wajib Baca</h1><hr/>		
			</div>
			<div class="block-01">
				<p align=center>Pertanyaan yang sering ditanyakan konsumen / calon pembeli kepada kami :</p>
                <script>
					$(function() {
						$( "#accordion" ).accordion({
							heightStyle: "content"
						});
					});
				</script>
				<ul id="accordion" class="q-a-block">
					
					<?php
					$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
					$tp=mysqli_query($konek, 'SELECT * FROM pertanyaan ORDER BY id_pertanyaan');
					while($r=mysqli_fetch_array($tp)){
					echo "<li>
						<a href='#'>- <em>$r[pertanyaan]</em></a>
						<div>Jawab: $r[jawaban]</div>
						</li>
					";
					}
				echo "
				</ul>
				<br/><br/><hr/><p><strong>CATATAN :</strong></p>
				<p>Saat memesan produk $iden[url] kami anggap anda telah membaca dan mengerti bagian INFO WAJIB BACA ini.</p>
				";
					?>
			</div>
		</div>
		</span>
		<div class="clearfix"></div>
	</div>
</section>