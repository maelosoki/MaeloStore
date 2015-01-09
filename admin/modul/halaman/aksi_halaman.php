<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";
include "../../../config/library.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus halaman
if ($act=='hapus'){
  mysqli_query($konek, "DELETE FROM halaman WHERE id_halaman='$_GET[id]'");
  header('location:../../media.php?module=halaman');
}

// Input halaman
elseif ($act=='input'){
  $judul_seo      = seo_title($_POST[judul]);
  mysqli_query($konek, "INSERT INTO halaman(
									judul,
                                    judul_seo,
									isi_halaman,
									tampil_judul,
									sidebar,
									aktif,
									tgl_posting)
						VALUES(
								'$_POST[judul]',
                                '$judul_seo',
								'$_POST[isi_halaman]',
								'$_POST[tampil_judul]',
								'$_POST[sidebar]',
								'$_POST[aktif]',
								'$tgl_sekarang')");
  header('location:../../media.php?module=halaman');
}

// Update halaman
elseif ($act=='update'){
  $judul_seo      = seo_title($_POST[judul]);
    mysqli_query($konek, "UPDATE halaman SET 	  judul      	 = '$_POST[judul]',
										  judul_seo 	 = '$judul_seo', 
                                          isi_halaman	 = '$_POST[isi_halaman]',
                                          tampil_judul	 = '$_POST[tampil_judul]',
                                          sidebar 		 = '$_POST[sidebar]',
                                          aktif 		 = '$_POST[aktif]',
										  tgl_posting	 = '$tgl_sekarang'
                                    WHERE id_halaman 	 = '$_POST[id]'");
  header('location:../../media.php?module=halaman');

}
}
?>