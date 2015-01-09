<?php
error_reporting(0);
session_start();
include "timeout.php";
if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
	header('location:logout.php');
}
else{
	if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
		echo "<script>window.location = 'index.php'</script>";
	}
	else{
		include "log.php"; //Membuat PHP System LOG dengan Flat File
		include "../config/koneksi.php";
		include "../config/fungsi_indotgl.php";
		?>
		<!doctype html>
		<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
		<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
		<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
		<!--[if gt IE 8]><!--><html class="no-js" lang="id"><!--<![endif]-->
		<head>
			<meta charset="utf-8"/>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="robots" content="noindex, nofollow">
			<meta name="language" content="Indonesia" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>Administrator</title>
			<link href="assets/css/bootstrap.css" rel="stylesheet" />
			<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
			<link href="assets/css/custom.css" rel="stylesheet" />
			<link href="assets/css/summernote.css" rel="stylesheet" />
			<link href="assets/css/footable.core.css" rel="stylesheet" />
			<link href="assets/css/footable.standalone.css" rel="stylesheet" />
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
		<div id="loading"></div>
			<div id="wrapper">
				<?php include "header.php"; ?>
				<?php 
					$p=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM users"));
					if ($_SESSION['leveluser']=='admin'){
					   include "menu.php";
					}
					elseif ($_SESSION['leveluser']=='manager'){
					   include "menu_manager.php";
					}
					elseif ($_SESSION['leveluser']=='user'){
					   include "menu_user.php";
					}
				include "content.php"; ?>
			</div>
			<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
			<script src="assets/js/jquery-1.11.1.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
			<script src="assets/js/jquery.metisMenu.js"></script>
			<script src="assets/js/summernote.min.js"></script>
			<script src="assets/js/footable.js"></script>
			<script src="assets/js/custom.js"></script>
			<script>$(window).load(function() { $("#loading").fadeOut("slow"); })</script>
		</body>
		</html>
		<?php
		unlink('error_log'); //Mengatasi Space Hosting Membengkak Akibat "error_log" dengan menghapus secara otomatis
	}
}

?>