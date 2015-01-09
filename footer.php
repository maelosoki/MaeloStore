<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<section class="footer-wrapper">
  <footer class="container">
	<div class="link-block">
	  <ul>
		<li class="link-title">KONTAK PERSON</li>
		<?php
		$sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from identitas LIMIT 1"));
		$no_telp = preg_replace("/[^\d]/i", "", $sql[no_telp]);
		$no_hp = preg_replace("/[^\d]/i", "", $sql[hp1]);
		echo "
		<li><a href='tel:$no_telp'>$sql[no_telp]</a></li>
		<li><a href='tel:$no_hp'>$sql[hp1]</a></li>
		<li>$sql[bbm]</li>
		";
		?>
	  </ul>
	  <ul>
		<li class="link-title">LAYANAN PELANGGAN</li>
		<li><a href="halaman-1-konfirmasi-pembayaran" title="Payment Confirmation">Konfirmasi Pembayaran</a></li>
		<li><a href="halaman-2-pengiriman--pengembalian" title="Shipping & Returns">Pengiriman & Pengembalian</a></li>
		<li><a href="halaman-3-garansi" title="Warranty">Garansi</a></li>
	  </ul>
	  <ul>
		<li class="link-title">SYARAT & KONDISI</li>
		<li><a href="halaman-4-sangkalan" title="Disclaimer">Sangkalan</a></li>
		<li><a href="halaman-5-syarat--ketentuan" title="Terms & Conditions">Syarat & Ketentuan</a></li>
		<li><a href="halaman-6-kebijakan-privasi" title="Privacy Policy">Kebijakan Privasi</a></li>
	  </ul>
	  <ul>
		<li class="link-title">ALAMAT KANTOR</li>
		<?php
		$sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from identitas LIMIT 1"));
		echo "
		<li class='aboutus-block'>$sql[nama_perusahaan]<br/>$sql[alamat]</li>";
		?>
	  </ul>
	  <ul class="stay-connected-blcok">
		<li class="link-title">STAY CONNECTED...</li>
		<li>
			 <ul class="social-links">
				<?php
				$sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from tampilan LIMIT 1"));
				echo "<li><a data-tooltip='Like us on facebook' href='http://facebook.com/$sql[facebook]' target='_blank'><img alt='facebook' src='images/facebook.png'></a></li>";
				echo "<li><a data-tooltip='Follow us on twitter' href='http://twitter.com/$sql[twitter]' target='_blank'><img alt='twitter' src='images/twitter.png'></a></li>";
				?>
				<li><a data-tooltip="Subscribe to RSS feed" href="rss.xml" target="_blank"><img alt="RSS" src="images/rss.png"></a></li>
			 </ul>
			 <div class="payment-block"><img src="images/payment.png" alt="payment"></div>
		</li>
	  </ul>
	</div>
	<div class="footer-bottom-block">
	  <ul class="bottom-links">
		<?php
			$sql=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
			echo "<li><a href='home'>$sql[menu_home]</a></li>";

			$main=mysqli_query($konek, "SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY urutan ASC");
			while($r=mysqli_fetch_array($main)){
			echo "<li><a href='$r[link]'>$r[nama_menu]</a></li>";
			}
		?>
	  </ul>
	  <p class="copyright-block">© <?php echo date("Y"); ?> <a href="<?php $sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from identitas LIMIT 1")); echo "$sql[url]"; ?>">
	  <?php $sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from identitas LIMIT 1")); echo "$sql[nama_perusahaan]"; ?></a>, All Rights Reserved.
	  <br /><br />
	  </p>
	</div>
	<div class="footer-bottom-block">
	<?php
		// Perhitungan total waktu dengan mengurangkan waktu start awal dan waktu script terakhir dieksekusi
		// Mengambil waktu selesai
		$mtime = microtime();
		$mtime = explode (" ", $mtime);
		$mtime = $mtime[1] + $mtime[0];
		// Store end time in a variable
		$tend = $mtime; 
		// Calculate Difference
		$totaltime = ($tend - $tstart); 
		// Output the result
		printf ("<strong>Waktu untuk menampilkan halaman :</strong> %f detik", $totaltime);

		// Mengambil informasi pengunjung
		$ip_addr=$_SERVER['REMOTE_ADDR']; // IP pengunjung 
		$browser=$_SERVER['HTTP_USER_AGENT']; // User agent / browser yang di gunakan pengunjung
		$refer= $_SERVER['HTTP_REFERER']; // Url referer atau halaman sebelumnya atau asal kunjungan
		echo "<br /><strong>IP address anda :</strong> $ip_addr<br />"; 
		echo "<strong>Jenis Browser :</strong> $browser<br />"; 
		echo "<strong>Sebelumnya anda berada di halaman :</strong> $refer";
	?>
	</div>
  </footer>
	<?php
		$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
		$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
		$waktu   = time(); // 
		// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
		$s = mysqli_query($konek, "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
		// Kalau belum ada, simpan data user tersebut ke database
		if(mysqli_num_rows($s) == 0){mysqli_query($konek, "INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");}
		else{mysqli_query($konek, "UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");}
	?>
</section>