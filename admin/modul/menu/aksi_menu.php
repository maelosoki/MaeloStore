<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus menu
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM mainmenu WHERE id_main='$_GET[id]'");
  header('location:../../media.php?module=mainmenu');
}

// Input menu
elseif ($act=='input'){
    mysqli_query($konek, "INSERT INTO mainmenu (nama_menu,link,aktif,urutan) 
                            VALUES('$_POST[nama_menu]',
								   '$_POST[link]',
								   '$_POST[aktif]',
                                   '$_POST[urutan]')");
	header('location:../../media.php?module=mainmenu');
}

// Update menu
elseif ($act=='update'){
	mysqli_query($konek, "UPDATE mainmenu SET nama_menu   = '$_POST[nama_menu]',
								link  = '$_POST[link]',
								aktif	= '$_POST[aktif]',
								urutan	= '$_POST[urutan]'
						WHERE id_main  = '$_POST[id]'");
	header('location:../../media.php?module=mainmenu');
}
}
?>