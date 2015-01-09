<?php
error_reporting(0);
include "../config/koneksi.php";
// Memeriksa Ketersediaan Variabel Form dengan Fungsi isset()
// Memastikan bahwa halaman ini diakses dengan parameter POST
if (isset($_POST['username']) AND isset($_POST['password']))
{
	function antiinjection($data){
	  $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	  return $filter;
	}

	$user = antiinjection($_POST['username']);
	$pass = antiinjection(md5($_POST['password']));

	// menghindari sql injection
	$username_filter = mysqli_real_escape_string($konek, $user);
	$password_filter = mysqli_real_escape_string($konek, $pass);

	// Memvalidasi username, hanya boleh berisi alpha-numeric (a-z, A-Z, 0-9), underscore,
	// dan minimal berisi 5 karakter dan maksimum 20 karakter
	// Anda bisa mengganti jumlah minimun dan maksimum karakter sesuai kebutuhan
	if (!preg_match('/^[a-z\d_]{5,20}$/i', $username_filter)){
		echo "<script>window.location = 'index.php'</script>";
	}
	else{
		$login=mysqli_query($konek, "SELECT * FROM users WHERE username='$username_filter' AND password='$password_filter' AND blokir='N'");
		$ketemu=mysqli_num_rows($login);
		$r=mysqli_fetch_array($login);

		// Apabila username dan password ditemukan
		if ($ketemu > 0){
		  session_start();
		  include "timeout.php";

		  $_SESSION['namauser']     = $r['username'];
		  $_SESSION['namalengkap']  = $r['nama_lengkap'];
		  $_SESSION['passuser']     = $r['password'];
		  $_SESSION['leveluser']    = $r['level'];
		  
		  // session timeout
		  $_SESSION[login] = 1;
		  timer();

		  header('location:media.php?module=home');
		}
		else{
			echo "<script>alert('Username atau Password Anda Salah'); window.location = 'index.php'</script>";
		}
	}
}
else
{
	echo "<script>window.history.back()</script>\n";
}
?>