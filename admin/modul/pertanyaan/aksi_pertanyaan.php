<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus FAQ
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM pertanyaan WHERE id_pertanyaan='$_GET[id]'");
  header('location:../../media.php?module=pertanyaan');
}

// Input FAQ
elseif ($act=='input'){
  mysqli_query($konek, "INSERT INTO pertanyaan(pertanyaan,jawaban,aktif) VALUES('$_POST[pertanyaan]','$_POST[jawaban]','$_POST[aktif]')");
  header('location:../../media.php?module=pertanyaan');
}

// Update FAQ
elseif ($act=='update'){
  mysqli_query($konek, "UPDATE pertanyaan SET	pertanyaan			= '$_POST[pertanyaan]',
									jawaban			= '$_POST[jawaban]', 
									aktif			= '$_POST[aktif]'
								WHERE id_pertanyaan	= '$_POST[id]'");
  header('location:../../media.php?module=pertanyaan');
}
}
?>