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

// Hapus testimoni
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM testimoni WHERE id_testimoni='$_GET[id]'");
  header('location:../../media.php?module=testimoni');
}

// Update testimoni
elseif ($act=='update'){
  mysqli_query($konek, "UPDATE testimoni SET	nama			= '$_POST[nama]',
									kota			= '$_POST[kota]', 
									pesan			= '$_POST[pesan]', 
									aktif			= '$_POST[aktif]'
								WHERE id_testimoni	= '$_POST[id]'");
  header('location:../../media.php?module=testimoni');
}
}
?>