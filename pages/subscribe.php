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
	";
	$de= mysqli_real_escape_string($konek, $_GET["kode"]);
	$sql = "SELECT kode_aktivasi FROM newsletter WHERE kode_aktivasi='$de' and status='N'";
	$hasil = mysqli_query($konek, $sql);
	$jumlah = mysqli_num_rows($hasil);
if ($jumlah==1){
	$data=mysqli_fetch_array($hasil);
	mysqli_query($konek, "UPDATE newsletter SET status='Y' WHERE kode_aktivasi='$de'");
	echo "<strong>Aktivasi Newsletter</strong><hr />Akun Anda sudah diaktifkan<hr />";
} else{
	echo "<strong>Aktivasi Newsletter</strong><hr />Kode aktivasi tidak ditemukan atau sudah pernah diaktifkan<hr />";
}
	echo "
			</div>
			<div class='clearfix'></div>
		</div>
	</section>
	";
?>