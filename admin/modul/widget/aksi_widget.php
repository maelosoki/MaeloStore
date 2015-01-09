<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus widget
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM widget WHERE id_widget='$_GET[id]'");
  header('location:../../media.php?module=widget');
}

// Update widget
elseif ($act=='update'){
    mysqli_query($konek, "UPDATE widget SET nama_widget       = '$_POST[nama_widget]',
                                          isi_widget = '$_POST[isi_widget]'
                                    WHERE id_widget  = '$_POST[id]'");
  header('location:../../media.php?module=widget');

}
}
?>