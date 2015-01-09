<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<section class="content-wrapper">
		<?php
		$h=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM halaman WHERE id_halaman='$id' AND aktif='Y'")); 
			if($h[sidebar] == full AND $h[tampil_judul] == Y){
			  echo "<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>
						<div class='block-01'>
						<h1 class='page-title' align=center>$h[judul]</h1><hr/>	
						</div>
						<div class='cara_beli'>$h[isi_halaman]</div>
					</div>";
			}
			elseif($h[sidebar] == full AND $h[tampil_judul] == N){
			  echo "<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>
						<div class='cara_beli'>$h[isi_halaman]</div>
					</div>";
			}
			elseif($h[sidebar] == left AND $h[tampil_judul] == Y){
			  echo "<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>
							 <div class='col-left'>";
								$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='3'");
								while($block=mysqli_fetch_array($sidebar)){
								  include "block/block_$block[block_1].php";
								  include "block/block_$block[block_2].php";
								  include "block/block_$block[block_3].php";
								  include "block/block_$block[block_4].php";
								  include "block/block_$block[block_5].php";
								}
						echo"</div>
							  <div class='col-main'>
								<div class='block-01'><h1 class='page-title' align=center>$h[judul]</h1><hr/></div>
								<div class='cara_beli'>$h[isi_halaman]</div>
							  </div>
							  <div class='clearfix'></div>
							 ";
			   echo"</div>";
			}
			elseif($h[sidebar] == left AND $h[tampil_judul] == N){
			  echo "<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>
							 <div class='col-left'>";
								$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='3'");
								while($block=mysqli_fetch_array($sidebar)){
								  include "block/block_$block[block_1].php";
								  include "block/block_$block[block_2].php";
								  include "block/block_$block[block_3].php";
								  include "block/block_$block[block_4].php";
								  include "block/block_$block[block_5].php";
								}
						echo"</div>
							  <div class='col-main'>
								<div class='cara_beli'>$h[isi_halaman]</div>
							  </div>
							  <div class='clearfix'></div>
							 ";
			   echo"</div>";
			}
			elseif($h[sidebar] == right AND $h[tampil_judul] == Y){
			  echo "<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>
							<span style='float:right'>
							 <div class='col-left'>";
								$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='3'");
								while($block=mysqli_fetch_array($sidebar)){
								  include "block/block_$block[block_1].php";
								  include "block/block_$block[block_2].php";
								  include "block/block_$block[block_3].php";
								  include "block/block_$block[block_4].php";
								  include "block/block_$block[block_5].php";
								}
						echo"</div>
							</span>
							<span style='float:left'>
							  <div class='col-main'>
								<div class='block-01'><h1 class='page-title' align=center>$h[judul]</h1><hr/></div>
								<div class='cara_beli'>$h[isi_halaman]</div>
							  </div>
							</span>
							  <div class='clearfix'></div>
							 ";
			   echo"</div>";
			}
			elseif($h[sidebar] == right AND $h[tampil_judul] == N){
			  echo "<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>
							<span style='float:right'>
							 <div class='col-left'>";
								$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='3'");
								while($block=mysqli_fetch_array($sidebar)){
								  include "block/block_$block[block_1].php";
								  include "block/block_$block[block_2].php";
								  include "block/block_$block[block_3].php";
								  include "block/block_$block[block_4].php";
								  include "block/block_$block[block_5].php";
								}
						echo"</div>
							</span>
							<span style='float:left'>
							  <div class='col-main'>
								<div class='cara_beli'>$h[isi_halaman]</div>
							  </div>
							</span>
							  <div class='clearfix'></div>
							 ";
			   echo"</div>";
			}
		?>
</section>