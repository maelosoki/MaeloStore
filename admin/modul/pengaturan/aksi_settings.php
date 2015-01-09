<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Update Pengaturan
if ($act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $nama_file      = $_FILES['fupload']['name'];

  // Apabila logo tidak diganti
  if (empty($lokasi_file)){
  mysqli_query($konek, "UPDATE identitas SET	url					= '$_POST[url]',
									nama_website		= '$_POST[nama_website]', 
									meta_deskripsi		= '$_POST[meta_deskripsi]', 
									meta_keyword		= '$_POST[meta_keyword]', 
									google_verification	= '$_POST[google_verification]', 
									email				= '$_POST[email]', 
									nama_perusahaan		= '$_POST[nama_perusahaan]', 
									alamat				= '$_POST[alamat]', 
									no_telp				= '$_POST[no_telp]', 
									fax					= '$_POST[fax]', 
									hp1					= '$_POST[hp1]', 
									hp2					= '$_POST[hp2]', 
									bbm					= '$_POST[bbm]', 
									hari_kerja1			= '$_POST[hari_kerja1]', 
									jam_kerja1			= '$_POST[jam_kerja1]', 
									hari_kerja2			= '$_POST[hari_kerja2]', 
									jam_kerja2			= '$_POST[jam_kerja2]', 
									info_jam_kerja		= '$_POST[info_jam_kerja]'");
  echo "<script>alert('Update Berhasil'); window.location = '../../media.php?module=settings'</script>";
  }
  else{
// hapus file logo yang telah ada di server
$data=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
if($data['logo']!=''){
  unlink("../../../images/$data[logo]");
}
  
	// folder untuk logo
	$folder = "../../../images/";
	$file_upload = $folder . $nama_file;
	// upload logo
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $file_upload);

  mysqli_query($konek, "UPDATE identitas SET	url					= '$_POST[url]',
									nama_website		= '$_POST[nama_website]', 
									meta_deskripsi		= '$_POST[meta_deskripsi]', 
									meta_keyword		= '$_POST[meta_keyword]', 
									google_verification	= '$_POST[google_verification]', 
									email				= '$_POST[email]', 
									nama_perusahaan		= '$_POST[nama_perusahaan]', 
									alamat				= '$_POST[alamat]', 
									no_telp				= '$_POST[no_telp]', 
									fax					= '$_POST[fax]', 
									hp1					= '$_POST[hp1]', 
									hp2					= '$_POST[hp2]', 
									bbm					= '$_POST[bbm]', 
									hari_kerja1			= '$_POST[hari_kerja1]', 
									jam_kerja1			= '$_POST[jam_kerja1]', 
									hari_kerja2			= '$_POST[hari_kerja2]', 
									jam_kerja2			= '$_POST[jam_kerja2]', 
									logo  			    = '$nama_file',
									info_jam_kerja		= '$_POST[info_jam_kerja]'");
  echo "<script>alert('Update Berhasil'); window.location = '../../media.php?module=settings'</script>";
  }
}
}
?>