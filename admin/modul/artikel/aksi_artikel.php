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
include "../../../config/fungsi_watermark.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus artikel
if ($act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($konek, "SELECT gambar FROM artikel WHERE id_artikel='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($konek, "DELETE FROM artikel WHERE id_artikel='$_GET[id]'");
     unlink("../../../foto_artikel/$_GET[namafile]");
     unlink("../../../foto_artikel/medium_$_GET[namafile]");
     unlink("../../../foto_artikel/small_$_GET[namafile]"); 
  }
  else{
     mysqli_query($konek, "DELETE FROM artikel WHERE id_artikel='$_GET[id]'");
  }
  header('location:../../media.php?module=artikel');
}

// Input artikel
elseif ($act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $fileSize			= $_FILES['fupload']['size'];
  $fileError 		= $_FILES['fupload']['error'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $judul_seo      = seo_title($_POST[judul]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=artikel')</script>";
    }
    else{
	if($fileSize > 0 || $fileError == 0){
	$path = "../../../foto_artikel/"; 
	$new=$path.$nama_file_unik;
	watermark_artikel($new);
    UploadArtikel($nama_file_unik);
    mysqli_query($konek, "INSERT INTO artikel(judul,
                                    judul_seo,
                                    isi_artikel,
									hari,
									tanggal,
									jam,
                                    gambar_tampil,
                                    aktif,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_POST[isi_artikel]',
								   '$hari_ini',
								   '$tgl_sekarang',
								   '$jam_sekarang',
                                   '$_POST[gambar_tampil]',
                                   '$_POST[aktif]',
                                   '$nama_file_unik')");
  header('location:../../media.php?module=artikel');
  }
  }
  }
  else{
    mysqli_query($konek, "INSERT INTO artikel(judul,
                                    judul_seo,
                                    isi_artikel,
									hari,
									tanggal,
									jam,
                                    gambar_tampil,
                                    aktif)
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_POST[isi_artikel]',
								   '$hari_ini',
								   '$tgl_sekarang',
								   '$jam_sekarang',
                                   '$_POST[gambar_tampil]',
                                   '$_POST[aktif]')");
  header('location:../../media.php?module=artikel');
  }
}

// Update artikel
elseif ($act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $fileSize			= $_FILES['fupload']['size'];
  $fileError 		= $_FILES['fupload']['error'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $judul_seo      = seo_title($_POST[judul]);
  
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($konek, "UPDATE artikel SET judul = '$_POST[judul]',
                                   judul_seo  = '$judul_seo', 
                                   isi_artikel = '$_POST[isi_artikel]',
                                   gambar_tampil = '$_POST[gambar_tampil]',
                                   aktif = '$_POST[aktif]'
                             WHERE id_artikel   = '$_POST[id]'");
  header('location:../../media.php?module=artikel');
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=artikel')</script>";
    }
    else{
// hapus file gambar yang telah ada di server
$data=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM artikel WHERE id_artikel='$_POST[id]'"));
if($data['gambar']!=''){
  unlink("../../../foto_artikel/$data[gambar]");
  unlink("../../../foto_artikel/small_$data[gambar]");
  unlink("../../../foto_artikel/medium_$data[gambar]");
}
// akhir - hapus file gambar yang telah ada di server
	if($fileSize > 0 || $fileError == 0){
	$path = "../../../foto_artikel/"; 
	$new=$path.$nama_file_unik;
	watermark_artikel($new);
    UploadArtikel($nama_file_unik);
    mysqli_query($konek, "UPDATE artikel SET judul = '$_POST[judul]',
                                   judul_seo  = '$judul_seo', 
                                   isi_artikel = '$_POST[isi_artikel]',
                                   gambar_tampil = '$_POST[gambar_tampil]',
                                   aktif = '$_POST[aktif]',
								   gambar      = '$nama_file_unik'  
                             WHERE id_artikel   = '$_POST[id]'");
    header('location:../../media.php?module=artikel');
    }
   }
  }
}
}
?>