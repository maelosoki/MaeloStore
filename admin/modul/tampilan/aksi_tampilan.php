<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Update tampilan
if ($act=='update'){
  mysqli_query($konek, "UPDATE tampilan SET	warna			= '$_POST[warna]', 
									menu_home				= '$_POST[menu_home]', 
									kunci					= '$_POST[kunci]', 
									cache_setting			= '$_POST[cache_setting]', 
									tombol_beli				= '$_POST[tombol_beli]', 
									url_tombol_beli			= '$_POST[url_tombol_beli]',
									tombol_habis 			= '$_POST[tombol_habis]',
									harga					= '$_POST[harga]', 
									produk_home				= '$_POST[produk_home]', 
									produk_all				= '$_POST[produk_all]', 
									produk_kategori			= '$_POST[produk_kategori]', 
									produk_lainnya			= '$_POST[produk_lainnya]',
									artikel_home 			= '$_POST[artikel_home]',
									artikel_all 			= '$_POST[artikel_all]',
									artikel_lainnya 		= '$_POST[artikel_lainnya]',
									pencarian_produk 		= '$_POST[pencarian_produk]',
									pencarian_artikel 		= '$_POST[pencarian_artikel]',
									sidebar_artikel 		= '$_POST[sidebar_artikel]',
									sidebar_artikel_detail 	= '$_POST[sidebar_artikel_detail]',
									sidebar_kontak 			= '$_POST[sidebar_kontak]',
									sidebar_kontak_aksi 	= '$_POST[sidebar_kontak_aksi]',
									sidebar_testimoni 		= '$_POST[sidebar_testimoni]',
									sidebar_testimoni_aksi	= '$_POST[sidebar_testimoni_aksi]',
									sidebar_produk 			= '$_POST[sidebar_produk]',
									sidebar_produk_kategori	= '$_POST[sidebar_produk_kategori]',
									sidebar_pencarian 		= '$_POST[sidebar_pencarian]',
									sidebar_galeri 			= '$_POST[sidebar_galeri]',
									sidebar_album 			= '$_POST[sidebar_album]',
									sidebar_download		= '$_POST[sidebar_download]',
									sidebar_pertanyaan 		= '$_POST[sidebar_pertanyaan]',
									social 					= '$_POST[social]',
									facebook 				= '$_POST[facebook]',
									facebook_app_id 		= '$_POST[facebook_app_id]',
									twitter					= '$_POST[twitter]', 
									twitter_widget_id		= '$_POST[twitter_widget_id]'");
  echo "<script>alert('Update Berhasil'); window.location = '../../media.php?module=tampilan'</script>";
}
}
?>