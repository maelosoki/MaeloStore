<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus album
if ($act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($konek, "SELECT gbr_album FROM album WHERE id_album='$_GET[id]'"));
  if ($data['gbr_album']!=''){
     mysqli_query($konek, "DELETE FROM album WHERE id_album='$_GET[id]'");
     unlink("../../../img_album/$_GET[namafile]");
  }
  else{
     mysqli_query($konek, "DELETE FROM album WHERE id_album='$_GET[id]'");
  }
  header('location:../../media.php?module=album');
}

// Input album
elseif ($act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $fileSize			= $_FILES['fupload']['size'];
  $fileError 		= $_FILES['fupload']['error'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $album_seo = seo_title($_POST['jdl_album']);
  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=album')</script>";
    }
    else{
	if($fileSize > 0 || $fileError == 0){
	$path = "../../../img_album/"; 
	$new=$path.$nama_file_unik;
    UploadAlbum($nama_file_unik);
    mysqli_query($konek, "INSERT INTO album(jdl_album,
                                    album_seo,
                                    gbr_album,
									aktif) 
                            VALUES('$_POST[jdl_album]',
									'$album_seo',
									'$nama_file_unik',
									'$_POST[aktif]')");
  header('location:../../media.php?module=album');
  }
  }
  }
  else{
    mysqli_query($konek, "INSERT INTO album(jdl_album,
                                    album_seo,
									aktif) 
                            VALUES('$_POST[jdl_album]',
									'$album_seo',
									'$_POST[aktif]')");
  header('location:../../media.php?module=album');
  }
}

// Update album
elseif ($act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $fileSize			= $_FILES['fupload']['size'];
  $fileError 		= $_FILES['fupload']['error'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $album_seo = seo_title($_POST['jdl_album']);
  
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($konek, "UPDATE album SET jdl_album		= '$_POST[jdl_album]',
                                   album_seo	= '$album_seo', 
								   aktif		= '$_POST[aktif]'
                             WHERE id_album  	= '$_POST[id]'");
  header('location:../../media.php?module=album');
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=album')</script>";
    }
    else{
// hapus file gambar yang telah ada di server
$data=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM album WHERE id_album='$_POST[id]'"));
if($data['gbr_album']!=''){
  unlink("../../../img_album/$data[gbr_album]");
}
// akhir - hapus file gambar yang telah ada di server
	if($fileSize > 0 || $fileError == 0){
	$path = "../../../img_album/"; 
	$new=$path.$nama_file_unik;
    UploadAlbum($nama_file_unik);
    mysqli_query($konek, "UPDATE album SET jdl_album		= '$_POST[jdl_album]',
                                   album_seo	= '$album_seo', 
								   gbr_album	= '$nama_file_unik',
								   aktif		= '$_POST[aktif]'
                             WHERE id_album  	= '$_POST[id]'");
  header('location:../../media.php?module=album');
    }
   }
  }
}
}
?>