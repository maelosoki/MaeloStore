<?php
error_reporting(0);
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
function UploadDatabase($fupload_name){
  //direktori file
  $vdir_upload = "../database/backup/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan file
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

$module=$_GET['module'];
$act=$_GET['act'];

// Upload Database
if ($act=='upload'){
  $nama_file   = $_FILES['fupload']['name'];
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));
  switch($file_extension){
    case "sql": $ctype="application/sql"; break;
    default: $ctype="application/proses";
  }
  if ($file_extension!='sql'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.sql');
        window.location=('../../media.php?module=database')</script>";
  }
  else{
    UploadDatabase($nama_file);
	header('location:../../media.php?module=database');
  }
}
}
?>