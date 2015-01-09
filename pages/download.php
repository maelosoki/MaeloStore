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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_download]'>"; ?>
			<div class="col-left">
				<?php
					$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='13'");
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
		<?php if($sp[sidebar_download] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";}
			echo "<div class='col-main'>
					<div class='block-01'>
					<h1 class='page-title' align=center>Download</h1><hr/>	
					</div>
					";

				// Tampilkan daftar katalog download
				$sql = mysqli_query($konek, "SELECT * FROM download ORDER BY id_download DESC");	

				echo "
				<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a></p>
				<table class='footable' data-filter='#filter' data-page-size='10'>
				<thead>
					<tr>
						<th>Judul</th>
						<th data-hide='phone'>Tgl Posting</th>
						<th data-hide='phone'>Nama File</th>
						<th style='text-align:center' data-hide='phone'>Didownload</th>
						<th style='text-align:center' data-hide='phone'>Aksi</th>
					</tr>
				</thead>
				<tbody>
				";
				while($d=mysqli_fetch_array($sql)){
					echo"
				<tr>
					<td>$d[judul]</td>
					<td>$d[tgl_posting]</td>
					<td>$d[nama_file]</td>
					<td style='text-align:center'>$d[hits] X</td>
					<td style='text-align:center'><a href='download.php?file=$d[nama_file]'>DOWNLOAD</a></td>
				</tr>
				";
				}
				echo"
				</tbody>
				<tfoot class='hide-if-no-paging'>
					<tr>
						<td colspan='5'>
							<div class='pagination pagination-centered'></div>
						</td>
					</tr>
				</tfoot>
				</table>
				";
			?>
				  </div>
		</span>
				  <div class="clearfix"></div>
		</div>
</section>