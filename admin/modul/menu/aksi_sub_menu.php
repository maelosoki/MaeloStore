<?php
session_start();
error_reporting(0);
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if($_POST[menu_utama]==0){
	$submenu = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM submenu WHERE id_sub=$_POST[sub_menu]"));
	$menu_utama = $submenu[id_main];
} else {
	$menu_utama = $_POST[menu_utama];
}

// Hapus sub menu
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM submenu WHERE id_sub='$_GET[id]'");
  header('location:../../media.php?module=submenu');
}

// Input sub menu
elseif ($act=='input'){
   mysqli_query($konek, "INSERT INTO submenu(nama_sub,id_main,link_sub,id_submain,aktif)
                 VALUES('$_POST[nama_sub]','$menu_utama','$_POST[link_sub]','$_POST[sub_menu]','$_POST[aktif]')");
  header('location:../../media.php?module=submenu');
}

// Update sub menu
elseif ($act=='update'){
    mysqli_query($konek, "UPDATE submenu SET nama_sub    = '$_POST[nama_sub]',
                                    id_main     = '$menu_utama',
                                    link_sub    = '$_POST[link_sub]',
  								                  id_submain  = '$_POST[sub_menu]',  
  								                  aktif       = '$_POST[aktif]'
                              WHERE id_sub      = '$_POST[id]'");
  header('location:../../media.php?module=submenu');
}
}
?>