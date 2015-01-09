<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<?php
// Dapatkan link menu utama (beranda)
$sql=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));

if($_GET['module']=='produk'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='produk'>Produk</a></li>
			</ul>";
}
elseif($_GET['module']=='kategori'){
	$detail	=mysqli_query($konek, "SELECT * from kategori where id_kategori='$id'");
	$d		= mysqli_fetch_array($detail);
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='produk'>Produk</a></li>
				<li><a href='kategori-$d[id_kategori]-$d[kategori_seo]'>$d[nama_kategori]</a></li>
			</ul>";
}
elseif($_GET['module']=='detail'){
	$detail	=mysqli_query($konek, "SELECT * FROM produk,kategori    
            	          WHERE kategori.id_kategori=produk.id_kategori 
                     	  AND id_produk='$id'");
	$d		= mysqli_fetch_array($detail);
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='produk'>Produk</a></li>
				<li><a href='kategori-$d[id_kategori]-$d[kategori_seo]'>$d[nama_kategori]</a></li>
				<li><a href='produk-$d[id_produk]-$d[produk_seo]'>$d[nama_produk]</a></li>
			</ul>";
}
elseif($_GET['module']=='hasilcari'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='#'>Hasil Pencarian</a></li>
			</ul>";
}
elseif($_GET['module']=='faq'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='pertanyaan'>Pertanyaan</a></li>
			</ul>";
}
elseif($_GET['module']=='download'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='download'>Download</a></li>
			</ul>";
}
elseif($_GET['module']=='allartikel'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='artikel'>Artikel</a></li>
			</ul>";
}
elseif($_GET['module']=='artikel'){
	$detail	=mysqli_query($konek, "SELECT * FROM artikel WHERE id_artikel='$id'");
	$d		= mysqli_fetch_array($detail);
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='artikel'>Artikel</a></li>
				<li><a href='artikel-$d[id_artikel]-$d[judul_seo]'>$d[judul]</a></li>
			</ul>";
}
elseif($_GET['module']=='semuaalbum'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='galeri'>Galeri</a></li>
			</ul>";
}
elseif($_GET['module']=='detailalbum'){
	$detail	=mysqli_query($konek, "SELECT * FROM album WHERE id_album='$id'");
	$d		= mysqli_fetch_array($detail);
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='galeri'>Galeri</a></li>
				<li><a href='album-$d[id_album]-$d[album_seo]'>$d[jdl_album]</a></li>
			</ul>";
}
elseif($_GET['module']=='halaman'){
	$detail	=mysqli_query($konek, "SELECT * FROM halaman WHERE id_halaman='$id'");
	$d		= mysqli_fetch_array($detail);
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='galeri'>Galeri</a></li>
				<li><a href='halaman-$d[id_halaman]-$d[judul_seo]'>$d[judul]</a></li>
			</ul>";
}
elseif($_GET['module']=='kontak'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='kontak'>Kontak</a></li>
			</ul>";
}
elseif($_GET['module']=='kontakrespon'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='kontak_respon'>Kontak Respon</a></li>
			</ul>";
}
elseif($_GET['module']=='testimoni'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='testimoni'>Testimoni</a></li>
			</ul>";
}
elseif($_GET['module']=='testimoniaksi'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='testimoni_respon'>Testimoni Respon</a></li>
			</ul>";
}
elseif($_GET['module']=='newsletter'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='newsletter'>Newsletter</a></li>
			</ul>";
}
elseif($_GET['module']=='subscribe'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='newsletter'>Newsletter</a></li>
				<li><a href=''>Aktivasi</a></li>
			</ul>";
}
elseif($_GET['module']=='unsubscribe'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='newsletter'>Newsletter</a></li>
				<li><a href=''>Berhenti Langganan</a></li>
			</ul>";
}
elseif($_GET['module']=='error'){
	  echo "<ul>
				<li><a href='home'>$sql[menu_home]</a></li>
				<li><a href='error'>Error</a></li>
			</ul>";
}
?>