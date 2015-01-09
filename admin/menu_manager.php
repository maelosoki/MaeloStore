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
				<a href='?module=artikel'>&nbsp; <i class='fa fa-edit fa-2x'></i> Artikel</a>
			</li>
			<li style='margin:0'>
				<a href='?module=halaman'>&nbsp; <i class='fa fa-file-text-o fa-2x'></i> Halaman</a>
			</li>
			<li style='margin:0'>
				<a href='?module=pertanyaan'>&nbsp; <i class='fa fa-question-circle fa-2x'></i> FAQ</a>
			</li>
			<li style='margin:0'>
				<a href='#'>&nbsp; <i class='fa fa-comments-o fa-2x'></i> Pesan<span class='fa arrow'></span></a>
				<ul class='nav nav-second-level' style='margin:0'>
					<li style='margin:0'>
						<a href='?module=kontak'>Kontak</a>
					</li>
					<li style='margin:0'>
						<a href='?module=testimoni'>Testimoni</a>
					</li>
					<li style='margin:0'>
						<a href='?module=newsletter'>Newsletter</a>
					</li>
				</ul>
			</li>
			<li style='margin:0'>
				<a href='#'>&nbsp; <i class='fa fa-tasks fa-2x'></i> Produk<span class='fa arrow'></span></a>
				<ul class='nav nav-second-level' style='margin:0'>
					<li style='margin:0'>
						<a href='?module=produk'>Daftar Produk</a>
					</li>
					<li style='margin:0'>
						<a href='?module=kategori'>Kategori Produk</a>
					</li>
					<li style='margin:0'>
						<a href='?module=komentar'>Komentar Produk</a>
					</li>
				</ul>
			</li>
			<li style='margin:0'>
				<a href='#'>&nbsp; <i class='fa fa-file-image-o fa-2x'></i> Media<span class='fa arrow'></span></a>
				<ul class='nav nav-second-level' style='margin:0'>
					<li style='margin:0'>
						<a href='?module=banner'>Banner</a>
					</li>
					<li style='margin:0'>
						<a href='?module=album'>Album</a>
					</li>
					<li style='margin:0'>
						<a href='?module=galeri'>Galeri</a>
					</li>
					<li style='margin:0'>
						<a href='?module=download'>Download</a>
					</li>
				</ul>
			</li>
			<li style='margin:0'>
				<a href='#'>&nbsp; <i class='fa fa-wrench fa-2x'></i> Pengaturan<span class='fa arrow'></span></a>
				<ul class='nav nav-second-level' style='margin:0'>
					<li style='margin:0'>
						<a href='?module=password'>Password</a>
					</li>
					<li style='margin:0'>
						<a href='#'>Menu<span class='fa arrow'></span></a>
						<ul class='nav nav-third-level' style='margin:0'>
							<li style='margin:0'>
								<a href='?module=mainmenu'>Menu Utama</a>
							</li>
							<li style='margin:0'>
								<a href='?module=submenu'>Sub Menu</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
";
}
?>