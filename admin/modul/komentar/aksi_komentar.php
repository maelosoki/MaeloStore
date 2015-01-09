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

// Hapus Komentar
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM komentar WHERE id_komentar='$_GET[id]'");
  header('location:../../media.php?module=komentar');
}

// Update komentar
elseif ($act=='update'){
  mysqli_query($konek, "UPDATE komentar SET isi_komentar	= '$_POST[isi_komentar]', 
										aktif			='$_POST[aktif]' 
								WHERE id_komentar='$_POST[id]'");
  header('location:../../media.php?module=komentar');
}
}
?>