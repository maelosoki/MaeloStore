<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus User
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM newsletter WHERE id_newsletter='$_GET[id]'");
  header('location:../../media.php?module=newsletter');
}
// Nonaktifkan User
elseif ($act=='letter'){
  $query1=mysqli_query($konek, "UPDATE newsletter SET status='N' WHERE id_newsletter='$_GET[id]'");
  header('location:../../media.php?module=newsletter');
}
// Aktifkan User
elseif ($act=='unletter'){
  $query1=mysqli_query($konek, "UPDATE newsletter SET status='Y' WHERE id_newsletter='$_GET[id]'");
  header('location:../../media.php?module=newsletter');
}
}
?>