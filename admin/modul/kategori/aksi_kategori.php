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

// Hapus Kategori
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
  header('location:../../media.php?module=kategori');
}

// Input kategori
elseif ($act=='input'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysqli_query($konek, "INSERT INTO kategori(nama_kategori,kategori_seo) VALUES('$_POST[nama_kategori]','$kategori_seo')");
  header('location:../../media.php?module=kategori');
}

// Update kategori
elseif ($act=='update'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysqli_query($konek, "UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]', kategori_seo='$kategori_seo' WHERE id_kategori = '$_POST[id]'");
  header('location:../../media.php?module=kategori');
}
}
?>