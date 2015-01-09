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
	$xde= mysqli_real_escape_string($konek, $_GET["code"]);
	$sql = "SELECT * FROM newsletter WHERE encode='$xde' and status='Y'";
	$hasil = mysqli_query($konek, $sql);
	$jumlah = mysqli_num_rows($hasil);
if ($jumlah==1){
	$data=mysqli_fetch_array($hasil);
	mysqli_query($konek, "DELETE FROM newsletter WHERE encode='$xde'"); 
	echo "<strong>Berhenti Berlangganan Newsletter</strong><hr />Anda telah berhenti berlangganan Newsletter di Website kami<hr />";
} else{
	echo "<strong>Berhenti Berlangganan Newsletter</strong><hr />Kode Deaktivasi tidak ditemukan<hr />";
}
	echo "
			</div>
			<div class='clearfix'></div>
		</div>
	</section>
	";
?>