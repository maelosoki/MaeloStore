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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_kontak]'>"; ?>
		<div class="col-left">
			<?php
				$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='4'");
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
		<?php if($sp[sidebar_kontak] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";} ?>
		<div  class="col-main">
			<h1 class="page-title" align=center>Hubungi Kami</h1>
			<div class="contact-form-container">
				<div  class="form-title">Jika ada pertanyaan seputar produk silakan isi form di bawah ini</div>
					<form action=kontak_respon method=POST>
							<ul class="form-fields">
								<li class="left">
									<label>Nama<em>*</em></label>
									<input type="text" name=nama required />
								</li>
								<li class="left">
									<label>Email<em>*</em></label>
									<input type="email" name=email required />
								</li>
								<li class="left">
									<label>Judul<em>*</em></label>
									<input type="text" name=subjek required />
								</li>
								<li class="full-row">
									<label>Pesan<em>*</em></label>
									<textarea name=pesan required ></textarea>
								</li>
								<li class="left">
									<img src='captcha/captcha.php' id='captcha'>
									<label>( masukkan kode keamanan di atas )</label>
									<label><a href='JavaScript: captcha();'>Kode tidak terbaca? Klik di sini.</a></label>
									<input type="text" name=kode size=6 maxlength=6 required >
								</li>
							</ul>
							<div class="button-set">
								<p class="required">* Wajib isi</p>
								<button type="submit" class="form-button"><span>Kirim</span></button>
							</div>
					</form>
			</div>
		</div>
		</span>
		<div class="clearfix"></div>
	</div>
</section>