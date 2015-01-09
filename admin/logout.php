<?php
error_reporting(0);
	session_start();
	session_unset(); //solusi session_destroy() tidak bekerja pada PHP Versi 5.3.14
	$_SESSION = array(); //Clears the $_SESSION variable, solusi session_destroy() tidak bekerja pada PHP Versi 5.3.14
	unset($_SESSION); //destroy all variables, solusi session_destroy() tidak bekerja pada PHP Versi 5.3.14
	session_destroy();

	//Jika di database pengaturan cache Y maka cache diaktifkan juga
	include "../config/koneksi.php";
	$tmp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
	if($tmp[cache_setting]==Y){
		mysqli_query($konek, "UPDATE tampilan SET cache = 'Y'");
	}

	echo "<meta http-equiv='refresh' content='0; url=index.php'>"; //Kembali ke halaman login
?>