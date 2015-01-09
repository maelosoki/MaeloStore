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
  <form id="login" action="login.php" method="post">
    <input type="text" name="username" id="username" maxlength="20" placeholder="Username" required />
    <input type="password" name="password" id="password" maxlength="25" placeholder="Password" required />
    <input type="submit" value="Log in" />
  </form>
<a href='forgot.php'>Lupa password</a>
</div>
</body>
</html>