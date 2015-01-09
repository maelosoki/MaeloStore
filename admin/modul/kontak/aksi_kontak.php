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

// Hapus Pesan Masuk
  mysqli_query($konek, "DELETE FROM hubungi WHERE id_hubungi='$_GET[id]'");
  header('location:../../media.php?module=kontak');
}
?>