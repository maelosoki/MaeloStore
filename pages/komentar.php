<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<?php
session_start();
include "config/koneksi.php";
include "config/library.php";

// Memeriksa Ketersediaan Variabel Form dengan Fungsi isset()
// Memastikan bahwa halaman ini diakses dengan parameter POST: nama_komentar,email,isi_komentar
if (isset($_POST['nama_komentar']) AND isset($_POST['email']) AND isset($_POST['isi_komentar']))
{
	$nama=trim(strip_tags($_POST['nama_komentar']));
	$email=trim(strip_tags($_POST['email']));
	$komentar=trim(strip_tags($_POST['isi_komentar']));

	// memvalidasi email menggunakan filter_var
	$email_filter = filter_var($email, FILTER_SANITIZE_EMAIL);

	$arrayName = explode(' ', $nama);
	// silakan tambahkan daftar nama-nama yang dilarang (spam) di bawah ini :
	$invalidName = array('harga','ace','maxs','obat','kuat','jual','kaki','gajah','flu','tulang','pilek','mag','herbal','kelenjar','usus','buntu');
	$countName = 0;
	foreach($arrayName as $val){
	  if(in_array(strtolower($val), $invalidName))
		$countName+=1;
	}

	if (empty($nama)){
	  echo "<script> alert('Anda belum mengisikan NAMA');window.location='produk-$_POST[id]#komentar'</script>\n";
	}
	elseif($countName>0){
	  echo "<script> alert('NAMA yang anda masukan tidak diijinkan');window.location='produk-$_POST[id]#komentar'</script>\n";
	}
	elseif (empty($email)){
	  echo "<script> alert('Anda belum mengisikan EMAIL');window.location='produk-$_POST[id]#komentar'</script>\n";
	}
	elseif (!filter_var($email_filter, FILTER_VALIDATE_EMAIL)){
	  echo "<script> alert('Email $email_filter tidak valid');window.location='produk-$_POST[id]#komentar'</script>\n";
	}
	elseif (empty($komentar)){
	  echo "<script> alert('Anda belum mengisikan KOMENTAR');window.location='produk-$_POST[id]#komentar'</script>\n";
	}
	elseif (strlen($_POST['isi_komentar']) > 1000) {
	  echo "<script> alert('KOMENTAR Anda kepanjangan, dikurangin atau dibagi jadi beberapa bagian');window.location='produk-$_POST[id]#komentar'</script>\n";
	}
	else{

		// filter sql injection
		function antiinjection($data){
		  $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		  return $filter_sql;
		}

		$nama_anti = antiinjection($nama);
		$email_anti = antiinjection($email_filter);
		$komentar_anti = antiinjection($komentar);

		// menghindari sql injection
		$nama_clean= mysqli_real_escape_string($konek, $nama_anti);
		$email_clean= mysqli_real_escape_string($konek, $email_anti);
		$komentar_clean = mysqli_real_escape_string($konek, $komentar_anti);

		if(!empty($_POST['kode'])){
			if($_POST['kode']==$_SESSION['captcha_session']){

				// Mengatasi input komentar tanpa spasi
				$split_text = explode(" ",$komentar_clean);
				$split_count = count($split_text);
				$max = 57;

				for($i = 0; $i <= $split_count; $i++){
					if(strlen($split_text[$i]) >= $max){
						for($j = 0; $j <= strlen($split_text[$i]); $j++){
							$char[$j] = substr($split_text[$i],$j,1);
							if(($j % $max == 0) && ($j != 0)){
								$v_text .= $char[$j] . ' ';
							}else{
								$v_text .= $char[$j];
							}
						}
					}else{
					  $v_text .= " " . $split_text[$i] . " ";
					}
				}

				$sql = mysqli_query($konek, "INSERT INTO komentar(nama_komentar,email,isi_komentar,id_produk,tgl,jam_komentar) 
									VALUES('$nama_clean','$email_clean','$v_text','$_POST[id]','$tgl_sekarang','$jam_sekarang')");
										echo "
										<section class='content-wrapper'>
											<div class='content-container container'>
												<div class='main'>
													<p align=center>Komentar Terkirim...</p>
												</div>
											</div>
										</div>
										<meta http-equiv='refresh' content='0; url=produk-$_POST[id]#komentar'>";
			}else{echo "<script> alert('Kode yang Anda masukkan tidak cocok');window.location='produk-$_POST[id]#komentar'</script>\n";}  
		}
		else{echo "<script> alert('Anda belum memasukkan kode');window.location='produk-$_POST[id]#komentar'</script>\n";}
	}
}
else
{
	echo "<script> alert('Maaf, anda harus mengakses halaman ini dari form komentar');window.history.back()</script>\n";
}
?>