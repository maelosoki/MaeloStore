<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Update users
if ($act=='update'){
	$pass_baru=md5($_POST[pass_baru]);
	if (empty($_POST[pass_baru])){
			mysqli_query($konek, "UPDATE users SET 	  nama_lengkap   = '$_POST[nama_lengkap]',
												  email		 = '$_POST[email]',
												  no_telp	 = '$_POST[no_telp]',
												  username 	 = '$_POST[username]',
												  blokir 	 = '$_POST[blokir]'
											WHERE level 	 = '$_POST[id]'");
		  header('location:../../media.php?module=users');
	}
	else{ 
		// Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
		if ($_POST[pass_baru]==$_POST[pass_ulangi]){
			mysqli_query($konek, "UPDATE users SET 	  nama_lengkap   = '$_POST[nama_lengkap]',
												  email		 = '$_POST[email]',
												  no_telp	 = '$_POST[no_telp]',
												  username 	 = '$_POST[username]',
												  password	 = '$pass_baru',
												  blokir 	 = '$_POST[blokir]'
											WHERE level 	 = '$_POST[id]'");
		  header('location:../../media.php?module=users');
		}
		else{echo "<script>alert('Password baru yang anda masukkan tidak sama'); window.location = '../../media.php?module=users'</script>";}
	}
}

}
?>