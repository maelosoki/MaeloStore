<?php error_reporting(0); ?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="language" content="Indonesia" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Administrator</title>
	<link href="assets/css/style.css" rel="stylesheet" />
	<script src="assets/js/modernizr-2.8.3.min.js"></script>
	<script src="assets/js/css3-mediaqueries.min.js"></script>
	<script src="assets/js/prefixfree.min.js"></script>
	<!--[if IE]><script src="assets/js/html5shiv.min.js"></script><![endif]-->
	<!--[if IE]><script src="assets/js/respond.min.js"></script><![endif]-->
	<!--[if IE]><script src="assets/js/IE9.min.js"></script><![endif]-->
	<!--[if IE 7 ]><script src="assets/js/ie7-squish.js"></script><![endif]-->
</head>
<body>
<div align="center"><noscript><div style="position:fixed; top:0px; left:0px; z-index:10000; height:100%; width:100%; background-color:#FFFFFF"><div style="padding:10px; font-family: Tahoma; font-weight: bold; font-size: 16px; background-color:#FFF000">JavaScript harus diaktifkan pada browser Anda untuk dapat menggunakan fitur Administrator</div></div></noscript></div>
<div id="login">
<?php
include "../config/koneksi.php";

$tangkap=trim($_POST[email]);

// menghindari sql injection
function antiinjection($data){
  $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

$ambil = antiinjection($tangkap);
$email = mysqli_real_escape_string($konek, $ambil);
$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
$cek_akun=mysqli_num_rows(mysqli_query($konek, "SELECT * FROM users WHERE email='$email'"));
$nama=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM users WHERE email='$email'"));
$pola_email = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";

if (empty($email)){
	echo "<script>alert('Anda belum mengisikan EMAIL'); window.location = 'forgot.php'</script>";
}
elseif (!eregi($pola_email,$email)){
	echo "<script>alert('Email tidak valid'); window.location = 'forgot.php'</script>";
}
else{
	if($cek_akun==1){
	function generate_random_string($name_length = 8) {
		$alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		return substr(str_shuffle($alpha_numeric), 0, $name_length);
	}
		$reset_pass = generate_random_string();		
		$kepada 	= "$email";
		$judul		= "Reset Password Administrator";
		$dari 		= "From: $iden[email]\r\n";
		$dari 	.= "MIME-Version: 1.0\r\n";
		$dari 	.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$pesan 		= "Anda menggunakan fasilitas reset password pada website $iden[url]. Berikut akun yang Anda minta :<br>";
		$pesan 	.= "Username : $nama[username] <br>";
		$pesan 	.= "Password : $reset_pass <br>";
		$reset_encrypt = sha1($reset_pass);

mail($kepada,$judul,$pesan,$dari);	

mysqli_query($konek, "UPDATE users SET password = '$reset_encrypt' WHERE email = '$email'");	
		echo "<form>Silahkan cek email untuk memeriksa username dan password Anda !</form><div style='padding-top:10px'><a href='index.php'>Kembali ke beranda</a></div>";
	} else { 
		echo "<script>alert('Email anda tidak terdaftar sebagai member kami'); window.location = 'forgot.php'</script>";
	}
}
?>
</div>
</body>
</html>