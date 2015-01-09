<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Update Sidebar
if ($act=='update'){
	mysqli_query($konek, "UPDATE sidebar SET block_1   = '$_POST[block_1]',
								block_2  = '$_POST[block_2]',
								block_3	= '$_POST[block_3]',
								block_4	= '$_POST[block_4]',
								block_5	= '$_POST[block_5]'
						WHERE id_sidebar  = '$_POST[id]'");
	header('location:../../media.php?module=sidebar');
}
}
?>