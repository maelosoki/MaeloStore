<?php
error_reporting(0);
if(file_exists("install.txt"))
{header("Location: install"); die();}
else{
/*
include "config/register_globals.php";
register_globals(); //Enable Register Globals in PHP 5
*/

/*
	Semua komentar yang berada dalam tag html dijadikan komentar php kecuali Conditional Comment "<!--[if"
	agar tidak terlihat ketika View Page Source. Komentar hanya sebagai panduan development.
*/

include "config/fungsi_kompresi.php";
ob_start("kompresi_output"); //Menghindari error cannot modify header information & kompresi html
session_start();
include "config/koneksi.php";
include "config/fungsi_filter.php";
include "config/class_paging.php";
include "config/fungsi_badword.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";
include "config/library.php";
$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
$tmp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
$filter = abs((int)$_GET['id']); //Mencegah SQL Injection dengan cara menjadikan variabel GET menjadi absolute integer
$id = $val->validasi($filter,'sqli'); //Menangkal injeksi yang dilakukan melalui $_GET[id]

//Jika di database pengaturan cache Y maka panggil class_cache.php dan aktifkan
if($tmp['cache']=='Y'){
	include "config/class_cache.php";
	AutoCache::Hash($_SERVER['REQUEST_URI']); //Buat cache baru
	AutoCache::PullOrPush(3600); //Cache dalam satuan detik, artinya 3600 detik = 1 jam
}
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="id"><!--<![endif]-->
<head>
<meta name="google-site-verification" content="<?php echo"$iden[google_verification]"; ?>" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><?php //Force latest IE rendering engine (even in intranet) & Chrome Frame ?>
<meta http-equiv="x-rim-auto-match" content="none"><?php //disable automatically detect phone numbers and convert them to links for BlackBerry ?>
<meta name="format-detection" content="telephone=no"><?php //disable automatically detect phone numbers and convert them to links for Safari ?>
<meta name="description" content="<?php include "meta_description.php"; ?>" />
<meta name="author" content="<?php echo"$iden[url]"; ?>" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<meta name="keywords" content="<?php include "meta_keywords.php"; ?>" />
<?php //Facebook Open Graph ?>
<meta property="og:title" content="<?php include "title.php" ?>" />
<meta property="og:image" content="<?php echo "$iden[url]" ?>/<?php include "meta_image.php" ?>" />
<meta property="og:description" content="<?php include "meta_description.php" ?>" />
<?php //Twitter Card ?>
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo "@$tmp[twitter]" ?>">
<meta name="twitter:title" content="<?php include "title.php" ?>">
<meta name="twitter:description" content="<?php include "meta_description.php" ?>">
<meta name="twitter:creator" content="<?php echo "@$tmp[twitter]" ?>">
<meta name="twitter:image" content="<?php echo "$iden[url]" ?>/<?php include "meta_image.php" ?>">
<meta name="twitter:domain" content="<?php echo "$iden[url]" ?>">
<meta name="twitter:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />
<?php //Google Plus Meta Tag ?>
<meta itemprop="name" content="<?php include "title.php" ?>" />
<meta itemprop="description" content="<?php include "meta_description.php" ?>" />
<meta itemprop="image" content="<?php echo "$iden[url]" ?>/<?php include "meta_image.php" ?>" />
<?php //end Google Plus Meta Tag ?>
<meta http-equiv="Copyright" content="<?php echo"$iden[nama_perusahaan]"; ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="language" content="Indonesia" />
<meta name="revisit-after" content="7" />
<meta name="webcrawlers" content="all" />
<meta name="rating" content="general" />
<meta name="spiders" content="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><?php //tell mobile browsers to scale ?>
<title><?php include "title.php"; ?></title>
<link rel="bookmark" href="favicon.ico" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
<link rel="stylesheet" href="css/<?php echo"$tmp[warna]"; ?>.css"/>
<script src="js/prefixfree.min.js"></script><?php //Adding CSS Vendor Prefix Automatically, It is recommended to put it right after the stylesheets, to minimize FOUC ?>
<link rel="stylesheet" href="css/footable.core.css"/>
<link rel="stylesheet" href="css/footable.standalone.css"/>
<script src="js/modernizr-2.8.3.min.js"></script><?php //CSS3 & HMTL5 Fix for Older Browser ?>
<script src="js/css3-mediaqueries.min.js"></script><?php //make CSS3 Media Queries work in all browsers ?>
<!--[if IE]><script src="js/html5shiv.min.js"></script><![endif]--><?php //HTML5 Shim(html5shiv.js) IE8 support of HTML5 elements and media queries ?>
<!--[if IE]><script src="js/respond.min.js"></script><![endif]--><?php //A fast & lightweight polyfill for min/max-width CSS3 Media Queries (for IE 6-8, and more). WARNING: Respond.js doesn't work if you view the page via file:// ?>
<!--[if IE]><script src="js/IE9.min.js"></script><![endif]-->
<!--[if IE 7 ]><script src="js/ie7-squish.js"></script><![endif]-->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script><?php //Alternatif jika bekerja pada localhost tanpa koneksi internet ?>
<script>function captcha(){var c_currentTime = new Date();var c_miliseconds = c_currentTime.getTime();document.getElementById('captcha').src = 'captcha/captcha.php?x='+ c_miliseconds;}</script><?php //Refresh Captcha ?>
</head>
<?php if($tmp[kunci]==N){echo "<body>";} else{echo "<body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'>";} ?>
<div align="center"><noscript><div style="position:fixed; top:0px; left:0px; z-index:10001; height:100%; width:100%; background-color:#FFFFFF"><div style="padding:10px; font-family: Tahoma; font-weight: bold; font-size: 16px; background-color:#FFF000">JavaScript harus diaktifkan pada browser Anda untuk dapat menggunakan fitur Website</div></div></noscript></div>
<?php if(file_exists("install.php")){echo '<div style="position:fixed; top:0px; left:0px; z-index:10000; width:100%; padding:5px; background-color: rgba(0, 0, 0, 0.5); text-align:center;"><a style="color:#FFFFFF; cursor:pointer;" onClick="href=\'hapus\'">Silakan hapus file install.php dan dbackup.sql untuk keamanan, atau klik disini untuk menghapus secara otomatis</a></div>';} ?>
<div class="mainContainer sixteen container"><?php include "rss.php"; include "header.php"; include "content.php"; ?></div><?php include "footer.php"; ?>
<?php //javascript include it just before body for better page speed ?>
<script src="js/ddsmoothmenu.min.js"></script><?php //Menu Website ?>
<script src="js/jquery.accordion.min.js"></script><?php //Menu Mobile ?>
<script src="js/jquery.flexslider.min.js"></script><?php //Slider Main Banner ?>
<script src="js/common.js"></script><?php //Setting Main Menu & Slider Main Banner ?>
<script src="js/jquery-ui-1.11.2.min.js"></script><?php //Only core.js, widget.js, position.js, accordion.js Untuk FAQ ?>
<script src="js/lightbox.min.js"></script><?php //Product Image PopUp ?>
<script src="js/jquery-scrollToTop.min.js"></script><?php //Scroll To Top ?>
<script>$(document).ready(function($) {$('body').scrollToTop({skin: 'cycle'});});</script><?php //Scroll To Top ?>
<script src="js/footable.min.js"></script><?php //Responsive Table ?>
<script src="js/footable.custom.min.js"></script>
<script src="js/text-scroller.min.js"></script><?php //jQuery-Marquee with CSS3 Support ?>
<script src="js/fixed.js"></script><?php //jQuery Sticky navigation for menu or item ?>
</body>
<!-- by Ari JM [ 0822 8311 2610 | BBM 7E818DE6 | web.maelosoki.com ] -->
</html>
<?php unlink('error_log'); //Mengatasi Space Hosting Membengkak Akibat "error_log" dengan menghapus secara otomatis ?>
<?php ob_end_flush(); //penutup fungsi ob_start (lihat baris paling atas) ?>
<?php } ?>