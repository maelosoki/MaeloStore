<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = 'index.php'</script>";
}
else{
echo "
<nav class='navbar-default navbar-side' role='navigation'>
	<div class='sidebar-collapse'>
		<ul class='nav' id='main-menu' style='margin:0'>
			<li style='margin:0'>
				<a href='?module=home'>&nbsp; <i class='fa fa-dashboard fa-2x'></i> Dashboard</a>
			</li>
			<li style='margin:0'>
				<a href='?module=produk'>&nbsp; <i class='fa fa-shopping-cart fa-2x'></i> Daftar Produk</a>
			</li>
			<li style='margin:0'>
				<a href='?module=komentar'>&nbsp; <i class='fa fa-comment-o fa-2x'></i> Komentar Produk</a>
			</li>
			<li style='margin:0'>
				<a href='?module=kontak'>&nbsp; <i class='fa fa-at fa-2x'></i> Kontak</a>
			</li>
			<li style='margin:0'>
				<a href='?module=testimoni'>&nbsp; <i class='fa fa-comments-o fa-2x'></i> Testimoni</a>
			</li>
			<li style='margin:0'>
				<a href='?module=newsletter'>&nbsp; <i class='fa fa-envelope-o fa-2x'></i> Newsletter</a>
			</li>
			<li style='margin:0'>
				<a href='?module=password'>&nbsp; <i class='fa fa-lock fa-2x'></i> Ganti Password</a>
			</li>
		</ul>
	</div>
</nav>
";
}
?>