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
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_testimoni]'>"; ?>
		<div class="col-left">
			<?php
				$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='6'");
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
		<?php if($sp[sidebar_testimoni] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";} ?>
		<div  class="col-main">	
			<h1 class="page-title" align=center>Testimonial</h1><hr/>	
			<div class="testimoni"> 
				<marquee scrollamount="2" direction="up" width="100%" height="100" align="center">
					<?php
						$testi=mysqli_query($konek, "SELECT *  FROM testimoni WHERE aktif='Y' ORDER BY id_testimoni DESC LIMIT 8");
						while($t=mysqli_fetch_array($testi)){
							echo " $t[pesan]<br /><strong>&mdash; $t[nama] / $t[kota]</strong><hr />";
						}
					?>				   
				</marquee>
			</div>
			<div class="contact-form-container">
				<div  class="form-title">Silakan isi Testimonial anda pada form di bawah ini. Setiap testimoni yang masuk akan kami moderasi terlebih dahulu demi kerahasiaan pelanggan (seperti nama yang kami samarkan). Email anda juga tidak akan kami tampilkan, email hanya untuk kepentingan kontak pelanggan kami.</div>
				<form action=testimoni_respon method=POST>
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
							<label>Kota</label>
							<input type="text" name=kota />
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