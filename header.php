<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}

// Script penghitung waktu loading halaman dengan php
	// Menghitung dan menampilkan lama waktu tampilnya halaman
	// Fungsi ini bisa digunakan sebagai acuan menghitung performa sistem yang sudah kita rancang
	// Mengambil waktu awal proses
	$mtime = microtime();
	$mtime = explode (" ", $mtime);
	$mtime = $mtime[1] + $mtime[0];
	$tstart = $mtime; 
// Hasil akhir lihat pada file footer.php
?>
<div class="header-wrapper">
  <header class="container">
	<div class="logo">
	  <?php
		  $sql=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
		  echo "<a href='home'><img title='$sql[nama_website]' alt='Logo' src='images/$sql[logo]'/></a>";
	  ?>
	</div>
	<div class="head-right">
	  <section class="header-bottom">
		<div class="search-block">
		  <form method="POST" action="hasil-pencarian">
		  <input type="text" name="kata" placeholder="Pencarian..." required />
		  <input type="submit" value="Cari" title="Search" />
			<div class="select">
				<select name="kategori">
					<option value="produk">Produk</option>
					<option value="artikel">Artikel</option>
				</select>
			</div>
		  </form>
		</div>
	  </section>
	</div>
	<nav id="smoothmenu1" class="ddsmoothmenu mainMenu">
	<?php include "menu.php"; ?>
	</nav>
	<div class="mobMenu">
	<?php include "menu_responsive.php"; ?>
	</div>
  </header>
</div>