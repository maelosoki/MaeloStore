<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/library.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus download
if ($act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($konek, "SELECT nama_file FROM download WHERE id_download='$_GET[id]'"));
  if ($data['nama_file']!=''){
     mysqli_query($konek, "DELETE FROM download WHERE id_download='$_GET[id]'");
     unlink("../../../files/$_GET[namafile]");
  }
  else{
     mysqli_query($konek, "DELETE FROM download WHERE id_download='$_GET[id]'");
  }
  header('location:../../media.php?module=download');
}

// Input download
elseif ($act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada file yang diupload
  if (!empty($lokasi_file)){
  
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../media.php?module=download')</script>";
  }
  else{
    UploadFile($nama_file);
    mysqli_query($konek, "INSERT INTO download(judul,
                                    nama_file,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
                                   '$nama_file',
                                   '$tgl_sekarang')");
  header('location:../../media.php?module=download');
  }
  }
  else{
    mysqli_query($konek, "INSERT INTO download(judul,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang')");
  header('location:../../media.php?module=download');
  }
}

// Update donwload
elseif ($act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila file tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($konek, "UPDATE download SET judul     = '$_POST[judul]', tgl_posting = '$tgl_sekarang'
                             WHERE id_download = '$_POST[id]'");
  header('location:../../media.php?module=download');
  }
  else{
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../media.php?module=download')</script>";
  }
  else{
  
// hapus file yang telah ada di server
$data=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM download WHERE id_download='$_POST[id]'"));
if($data['nama_file']!=''){
  unlink("../../../files/$data[nama_file]");
}
  
    UploadFile($nama_file);
    mysqli_query($konek, "UPDATE download SET	judul		= '$_POST[judul]',
										nama_file	= '$nama_file',
										tgl_posting	= '$tgl_sekarang'
                             WHERE id_download = '$_POST[id]'");
  header('location:../../media.php?module=download');
  }
  }
}
}
?>