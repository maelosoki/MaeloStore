<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";
include "../../../config/fungsi_watermark.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus galeri
if ($act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($konek, "SELECT gbr_gallery FROM gallery WHERE id_gallery='$_GET[id]'"));
  if ($data['gbr_gallery']!=''){
     mysqli_query($konek, "DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
     unlink("../../../img_galeri/$_GET[namafile]");
     unlink("../../../img_galeri/kecil_$_GET[namafile]"); 
  }
  else{
     mysqli_query($konek, "DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
  }
  header('location:../../media.php?module=galeri');
}

// Input galeri
elseif ($act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $fileSize			= $_FILES['fupload']['size'];
  $fileError 		= $_FILES['fupload']['error'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $gallery_seo      = seo_title($_POST['jdl_gallery']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=galeri')</script>";
    }
    else{
	if($fileSize > 0 || $fileError == 0){
	$path = "../../../img_galeri/"; 
	$new=$path.$nama_file_unik;
	watermark_galeri($new);
    UploadGallery($nama_file_unik);
    mysqli_query($konek, "INSERT INTO gallery(jdl_gallery,
                                    gallery_seo,
									id_album,
									keterangan,
                                    gbr_gallery)  
                            VALUES('$_POST[jdl_gallery]',
									'$gallery_seo',
									'$_POST[album]',
									'$_POST[keterangan]',
									'$nama_file_unik')");
  header('location:../../media.php?module=galeri');
  }
  }
  }
  else{
    mysqli_query($konek, "INSERT INTO gallery(jdl_gallery,
                                    gallery_seo,
									id_album,
									keterangan) 
                            VALUES('$_POST[jdl_gallery]',
									'$gallery_seo',
									'$_POST[album]',
									'$_POST[keterangan]')");
  header('location:../../media.php?module=galeri');
  }
}

// Update galeri
elseif ($act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $fileSize			= $_FILES['fupload']['size'];
  $fileError 		= $_FILES['fupload']['error'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $gallery_seo      = seo_title($_POST['jdl_gallery']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($konek, "UPDATE gallery SET jdl_gallery	= '$_POST[jdl_gallery]',
                                   gallery_seo   = '$gallery_seo', 
								   id_album = '$_POST[album]',
								   keterangan  = '$_POST[keterangan]'  
                             WHERE id_gallery   = '$_POST[id]'");
  header('location:../../media.php?module=galeri');
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=galeri')</script>";
    }
    else{
// hapus file gambar yang telah ada di server
$data=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM gallery WHERE id_gallery='$_POST[id]'"));
if($data['gbr_gallery']!=''){
  unlink("../../../img_galeri/$data[gbr_gallery]");
  unlink("../../../img_galeri/kecil_$data[gbr_gallery]"); 
}
// akhir - hapus file gambar yang telah ada di server
	if($fileSize > 0 || $fileError == 0){
	$path = "../../../img_galeri/"; 
	$new=$path.$nama_file_unik;
	watermark_galeri($new);
    UploadGallery($nama_file_unik);
    mysqli_query($konek, "UPDATE gallery SET jdl_gallery	= '$_POST[jdl_gallery]',
                                   gallery_seo   = '$gallery_seo', 
								   id_album = '$_POST[album]',
								   keterangan  = '$_POST[keterangan]',  
								   gbr_gallery      = '$nama_file_unik'   
                             WHERE id_gallery   = '$_POST[id]'");
  header('location:../../media.php?module=galeri');
    }
   }
  }
}
}
?>