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
		<div class="main">
			<div class="error-container">
				<h1>404</h1>
				<p>Maaf, halaman yang anda cari tidak ditemukan.</p>
				<div class="f-fix">
					<a href="javascript:history.go(-1)">Kembali</a>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>