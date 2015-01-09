<?php
error_reporting(0);
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$r=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM users where username='$_SESSION[namauser]'"));

$pass_lama=md5($_POST[pass_lama]);
$pass_baru=md5($_POST[pass_baru]);

if (empty($_POST[pass_baru]) OR empty($_POST[pass_lama]) OR empty($_POST[pass_ulangi])){
  echo "<script>alert('Anda harus mengisikan semua data pada form Ganti Password'); window.location = '../../media.php?module=password'</script>";
}
else{ 
// Apabila password lama cocok dengan password di database
if ($pass_lama==$r[password]){
  // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
  if ($_POST[pass_baru]==$_POST[pass_ulangi]){
    mysqli_query($konek, "UPDATE users SET password='$pass_baru' WHERE username='$_SESSION[namauser]'");
	  echo "<script>alert('Update Password Berhasil'); window.location = '../../logout.php'</script>";
  }
  else{
	echo "<script>alert('Password baru yang anda masukkan tidak sama'); window.location = '../../media.php?module=password'</script>";
  }
}
else{
echo "<script>alert('Password Lama anda salah'); window.location = '../../media.php?module=password'</script>";
}
}
}
?>