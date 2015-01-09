<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus banner
if ($act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($konek, "SELECT gambar FROM banner WHERE id_banner='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($konek, "DELETE FROM banner WHERE id_banner='$_GET[id]'");
     unlink("../../../foto_banner/$_GET[namafile]");
  }
  else{
     mysqli_query($konek, "DELETE FROM banner WHERE id_banner='$_GET[id]'");
  }
  header('location:../../media.php?module=banner');
}

// Input banner
elseif ($act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $fileSize			= $_FILES['fupload']['size'];
  $fileError 		= $_FILES['fupload']['error'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=banner')</script>";
    }
    else{
	if($fileSize > 0 || $fileError == 0){
	$path = "../../../foto_banner/"; 
	$new=$path.$nama_file_unik;
    UploadBanner($nama_file_unik);
    mysqli_query($konek, "INSERT INTO banner(judul,
                                    url,
									posisi,
									urutan,
                                    gambar,
									tgl_posting,
									new_window,
									publish) 
                            VALUES('$_POST[judul]',
									'$_POST[url]',
									'$_POST[posisi]',
									'$_POST[urutan]',
									'$nama_file_unik',
									'$tgl_sekarang',
									'$_POST[new_window]',
									'$_POST[publish]')");
  header('location:../../media.php?module=banner');
  }
  }
  }
  else{
    mysqli_query($konek, "INSERT INTO banner(judul,
                                    url,
									posisi,
									urutan,
									tgl_posting,
									new_window,
									publish) 
                            VALUES('$_POST[judul]',
									'$_POST[url]',
									'$_POST[posisi]',
									'$_POST[urutan]',
									'$tgl_sekarang',
									'$_POST[new_window]',
									'$_POST[publish]')");
  header('location:../../media.php?module=banner');
  }
}

// Update banner
elseif ($act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $fileSize			= $_FILES['fupload']['size'];
  $fileError 		= $_FILES['fupload']['error'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($konek, "UPDATE banner SET judul	= '$_POST[judul]',
                                   url		= '$_POST[url]', 
								   posisi	= '$_POST[posisi]',
								   urutan	= '$_POST[urutan]',
								   publish	= '$_POST[publish]',
                                   tgl_posting = '$tgl_sekarang',
								   new_window = '$_POST[new_window]'
                             WHERE id_banner   = '$_POST[id]'");
  header('location:../../media.php?module=banner');
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=banner')</script>";
    }
    else{
// hapus file gambar yang telah ada di server
$data=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM banner WHERE id_banner='$_POST[id]'"));
if($data['gambar']!=''){
  unlink("../../../foto_banner/$data[gambar]");
}
// akhir - hapus file gambar yang telah ada di server
	if($fileSize > 0 || $fileError == 0){
	$path = "../../../foto_banner/"; 
	$new=$path.$nama_file_unik;
    UploadBanner($nama_file_unik);
    mysqli_query($konek, "UPDATE banner SET judul	= '$_POST[judul]',
                                   url		= '$_POST[url]', 
								   posisi	= '$_POST[posisi]',
								   urutan	= '$_POST[urutan]',
								   gambar	= '$nama_file_unik',
								   publish	= '$_POST[publish]',
                                   tgl_posting = '$tgl_sekarang',
								   new_window = '$_POST[new_window]'
                             WHERE id_banner   = '$_POST[id]'");
  header('location:../../media.php?module=banner');
    }
   }
  }
}
}
?>