<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<?php
echo "
	<section class='content-wrapper'>
		<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>
			<div class='newsletter'>
				<strong>Newsletter</strong><hr />
";

// Memeriksa Ketersediaan Variabel Form dengan Fungsi isset()
// Memastikan bahwa halaman ini diakses dengan parameter POST: email
if (isset($_POST['email']))
{

$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
$iden2=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
$email=trim(strip_tags($_POST['email']));
$cek_akun=mysqli_num_rows(mysqli_query($konek, "SELECT * FROM newsletter WHERE email='$email'"));
$kode_aktivasi = md5(uniqid(rand()));
$valid_mail = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";

if(!eregi($valid_mail, $email)){
	echo "
	Penulisan alamat E-mail salah ! | masukan alamat email yang benar<hr />
	<div class='news-letter-block'>
		<form method='POST' action='newsletter'>
			<input type='email' name='email' placeholder='Daftarkan E-mail anda...' required />
			<input type='submit' value='Submit' title='Submit' />
		</form>
	</div><br />
	";
}else{
if ($cek_akun==1){
	echo "
	Email <strong>$email</strong> sudah terdaftar | masukan email yang lain<hr />
	<div class='news-letter-block'>
		<form method='POST' action='newsletter'>
			<input type='email' name='email' placeholder='Daftarkan E-mail anda...' required />
			<input type='submit' value='Submit' title='Submit' />
		</form>
	</div><br />
	";
} else {
	$acak		= rand(11111,99999);
	$encode		= base_convert($acak,20,36);

		// filter sql injection
		function antiinjection($data){
		  $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		  return $filter_sql;
		}
		$email_anti = antiinjection($email);
		// menghindari sql injection
		$email_clean= mysqli_real_escape_string($konek, $email_anti);
	mysqli_query($konek, "INSERT INTO newsletter(email,tanggal,kode_aktivasi,encode) VALUES('$email_clean','$date_time','$kode_aktivasi','$encode')");

	echo "Pendaftaran Email <strong>$email</strong> berhasil | Silakan Cek email Anda untuk aktivasi<hr />";

	$from = "From: $iden[email] \n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=iso-8859-1";
	$to = $email; 
	$judul = "Aktivasi Newsletter";
	$isi = "
		<table width='100%' cellpadding='15' cellspacing='15'>
			<tr>
				<td bgcolor='#666666'>
					<table width='70%' align='center' cellpadding='1' cellspacing='1'>
						<tr>
							<td bgcolor='#e5e5e5'>
								<table width='100%'>
									<tr>
										<td bgcolor='#E20C0C'>
											<table width='100%' cellpadding='5' cellspacing='5'>
												<tr>
													<td>
														<div align='center'>
															<font face='Arial, Helvetica, sans-serif' size='5' color='#fff'>Aktivasi Newsletter</font>
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td bgcolor='#fff'>
											<table width='100%' cellspacing='5' cellpadding='5'>
												<tr>
													<td bgcolor='#FFFFFF'>
													<br /><br />Email anda <strong>$email</strong> Mendaftar newsletter di $iden[url]
													</td>
												</tr>
												<tr>
													<td bgcolor='#FFFFFF'>
														<p>Klik <a href='$iden[url]/aktivasi-newsletter-$kode_aktivasi'>Subscribe</a> Untuk mengaktifkan langganan newsletter</p>
														<p>Klik <a href='$iden[url]/berhenti-langganan-$encode'>Unsubcribe</a> untuk membatalkannya</p><br /><br />
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td bgcolor='#3A3A3A'>
											<table width='100%' cellspacing='5' cellpadding='5'>
												<tr>
													<td>
														<font face='Arial, Helvetica, sans-serif' size='2' color='#fff'><strong>Informasi</strong><br /></font>
														<font face='Arial, Helvetica, sans-serif' size='1' color='#fff'>
														<strong>Telp</strong> : $iden[no_telp] | <strong>Mobile</strong> : $iden[hp1]<br />
														<strong>Twitter</strong> : @$iden2[twitter]
														</font>
													</td>
												</tr>
												<tr>
													<td bgcolor='#333333'>
														<font face='Arial, Helvetica, sans-serif' size='2' color='#E20C0C'><strong>$iden[nama_perusahaan]</strong><br /></font>
														<font face='Arial, Helvetica, sans-serif' size='1' color='#fff'><strong>Alamat</strong> : $iden[alamat]</font>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	";

	mail($to,$judul,$isi,$from);

		}
	}
}
else
{
	echo "
	Silakan daftarkan E-mail anda<hr />
	<div class='news-letter-block'>
		<form method='POST' action='newsletter'>
			<input type='email' name='email' placeholder='Daftarkan E-mail anda...' required />
			<input type='submit' value='Submit' title='Submit' />
		</form>
	</div><br />";
}
echo "
			</div>
			<div class='clearfix'></div>
		</div>
	</section>
";
?>