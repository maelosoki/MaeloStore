<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
session_start();
?>
<section class="content-wrapper">
	<div class="content-container container">
		<div class="breadcrum-container">
			<?php include "breadcumb.php"; ?>
		</div>
		<?php $sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_testimoni_aksi]'>"; ?>
		<div class="col-left">
			<?php
				$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='7'");
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
		<?php if($sp[sidebar_testimoni_aksi] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";}
		
		// Memeriksa Ketersediaan Variabel Form dengan Fungsi isset()
		// Memastikan bahwa halaman ini diakses dengan parameter POST: nama,email,kota,pesan
		if (isset($_POST['nama']) AND isset($_POST['email']) AND isset($_POST['kota']) AND isset($_POST['pesan']))
		{
			$nama=trim(strip_tags($_POST['nama']));
			$email=trim(strip_tags($_POST['email']));
			$kota=trim(strip_tags($_POST['kota']));
			$pesan=trim(strip_tags($_POST['pesan']));

			// memvalidasi email menggunakan filter_var
			$email_filter = filter_var($email, FILTER_SANITIZE_EMAIL);
			
			// filter sql injection
			function antiinjection($data){
			  $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			  return $filter_sql;
			}

			$nama_anti = antiinjection($nama);
			$email_anti = antiinjection($email_filter);
			$kota_anti = antiinjection($kota);
			$pesan_anti = antiinjection($pesan);

			// menghindari sql injection
			$nama_clean= mysqli_real_escape_string($konek, $nama_anti);
			$email_clean= mysqli_real_escape_string($konek, $email_anti);
			$kota_clean = mysqli_real_escape_string($konek, $kota_anti);
			$pesan_clean = mysqli_real_escape_string($konek, $pesan_anti);
			
			if(!empty($_POST['kode'])){
				if($_POST['kode']==$_SESSION['captcha_session']){
					mysqli_query($konek, "INSERT INTO testimoni(nama,email,kota,pesan,tanggal) 
										  VALUES('$nama_clean','$email_clean','$kota_clean','$pesan_clean','$tgl_sekarang')");	
							echo "<div  class='col-main'>
									<h1 class='page-title' align=center>Terimakasih</h1>
									<div class='contact-form-container'>
										<div  class='form-title2'>Terimakasih atas testimoni anda. Kami akan segera merespon pesan Anda.</div>
									</div>
								  </div>";
				}
				else{echo "<script> alert('Kode yang Anda masukkan tidak cocok');window.location='testimoni'</script>\n";}
			}
			else{echo "<script> alert('Anda belum memasukkan kode');window.location='testimoni'</script>\n";}
		}
		else
		{
			echo "<script> alert('Maaf, anda harus mengakses halaman ini dari testimoni');window.location='testimoni'</script>\n";
		}
echo "
		</span>
		<div class='clearfix'></div>
	</div>
</section>";
		?>