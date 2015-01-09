<?php error_reporting(0); ob_start(); ?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>CMS MaeloStore | CMS Lokal Indonesia</title>
<style>
* {-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
body{margin:0;padding:0;font-family:sans-serif}
a{text-decoration:none}
p{padding:0 10%}
table{width:100%;border:1px solid black;border-collapse:collapse}
td{padding:5px}
.container{width:55%;margin:10px 30% 10px 25%;border:1px solid #E20C0C}
.judul_atas{font-size:30px;margin:15px 10% -10px 10%}
.pembatas{width:90%;margin:5% 5%}
header{color:#FFF;background-color:#E20C0C;text-align:center;padding:10px 0} 
.judul{font-size:15px;text-align:center}
form{width:90%;margin:5% 5%}
textarea{width:100%;height:250px;padding:10px;border:1px solid #c1c1c1;resize:none} 
input[type=text]{margin-bottom:20px;margin-top:10px;width:100%;padding:15px;border:1px solid #E20C0C;}
input[type=password]{margin-bottom:20px;margin-top:10px;width:100%;padding:15px;border:1px solid #E20C0C;}
input[type=submit]{margin-bottom:20px;width:100%;padding:15px;border:none;background-color:#E20C0C;color:#FFF;font-size:20px;cursor:pointer;}
#submit:hover{background-color:#3A3A3A}

@media only screen and (min-width: 601px) and (max-width: 1200px) {
.container{width:80%;margin:10px 30% 10px 11%}
}
@media only screen and (min-width: 351px) and (max-width: 600px) {
.container{width:80%;margin:10px 30% 10px 11%}
input[type=submit]{padding:8px;}
input[type=text]{padding:8px;}
input[type=password]{padding:8px}
}
@media only screen and (max-width: 350px) {
.container{width:80%;margin:10px 30% 10px 11%}
input[type=submit]{padding:8px}
input[type=text]{padding:8px}
input[type=password]{padding:8px}
}
</style>
</head>
<body>
<div align="center"><noscript><div style="position:fixed; top:0px; left:0px; z-index:10000; height:100%; width:100%; background-color:#FFFFFF"><div style="padding:10px; font-family: Tahoma; font-weight: bold; font-size: 16px; background-color:#FFF000">JavaScript harus diaktifkan pada browser Anda untuk dapat melanjutkan Installasi CMS MaeloStore</div></div></noscript></div>
<div class="container">
<header>
    <div class="judul_atas">CMS MaeloStore v1.5.0</div>
    <p>CMS for Web publishing and product catalog. Base on CMS Lokomedia</p>
    <p>[ Made in Indonesia ]</p>
</header>
<?php
if ($_GET['module']=='install'){
	echo "<div class='pembatas'>";

	// software license
	$lokasi = 'license.txt';
	$ukuran = filesize($lokasi);
	$buka = fopen($lokasi,'r');
	$isi = fread($buka,$ukuran);
	echo "<h3>EULA (End User License Agreement)</h3>
	<textarea>$isi</textarea>";
	fclose($buka);

	echo "</div>
	<form method='post' action='setuju'>
	<input type='hidden' name='setuju' value='setuju'/>
	<input type='submit' id='submit' value='Setuju'>
	</form>";
}
elseif ($_GET['module']=='setuju'){
	// Memeriksa Ketersediaan Variabel Form dengan Fungsi isset()
	// Memastikan bahwa halaman ini diakses dengan parameter POST
	if (isset($_POST['setuju']))
	{
		if($_POST['setuju']=='setuju'){
			session_start(); $_SESSION['check']='diizinkan'; //session_destroy();
			header('location:check');
		}
		else{echo "<script> alert('Anda harus menyetujui perjanjian !');window.location='install'</script>";}
	}
	else
	{
		echo "<script> alert('Anda harus menyetujui perjanjian !');window.location='install'</script>";
	}
}
elseif ($_GET['module']=='check'){
	session_start();
	// Memastikan bahwa halaman ini diakses dengan Session check
	if ($_SESSION['check']=='diizinkan')
	{
		echo "<div class='pembatas'>";
		echo "<div class='judul'>Selamat datang di halaman Installasi</div>";
		echo "
			<h3>Uji Kelayakan Sistem</h3>
			<label>Versi PHP :</label>
		";
		if(PHP_VERSION > 5.0){
			echo PHP_VERSION;
		}
		else{
			echo "Versi PHP anda tidak mendukung";
			echo PHP_VERSION;
		}
		echo "<br /><label>Ekstensi MySQLi : </label>";
			echo (extension_loaded('mysqli')?'ON':'OFF');
		echo "<br /><label>Ekstensi PDO MySQL : </label>";
			echo (extension_loaded('pdo_mysql')?'ON':'OFF');
		if (ini_get('register_globals')){
			echo "<br /><font color=red>Registor Global : ON<br /><em>(Celah keamanan terbuka, silakan ganti pengaturan file php.ini anda)</em></font>";
		}
		else{echo "<br />Register Global : OFF";}
		/*echo "<br /><label>mod_rewrite : </label>";
			$isEnabled = in_array('mod_rewrite', apache_get_modules());
			echo ($isEnabled) ? 'YES' : 'NO';*/
		if((PHP_VERSION > 5.0)&&(extension_loaded('mysqli'))&&(extension_loaded('pdo_mysql'))){
			session_start(); $_SESSION['install']='diizinkan';
			echo "<br /><br /><br /><a href='step1'><input type='submit' id='submit' value='Lanjut'></a></div>";
		}
		else{echo "<br /><br /><font color=red>Proses installasi tidak dapat dilanjutkan, silakan upgrade Versi PHP anda!</font>";}
	}
	else
	{
		echo "<script> alert('Anda harus menyetujui perjanjian !');window.location='install'</script>";
	}
}
elseif ($_GET['module']=='step1'){
	session_start();
	// Memastikan bahwa halaman ini diakses dengan Session install
	if ($_SESSION['install']=='diizinkan')
	{
		$url = str_replace('step1', '', $_SERVER['REQUEST_URI']); //hapus step1 dengan fungsi str_replace
		echo "	<div class='pembatas'>
			<div class='judul'>Selamat datang di halaman Installasi. Silakan lengkapi form di bawah :</div>
				</div>
			<form method='post' action='step2'>
				<label>URL Website</label>
				<input type='text' name='url_baru' placeholder='http://' required /><br />
			<h3>Database</h3>
				<label>Server Database</label>
				<input type='text' name='server' value='localhost' placeholder='localhost' required /><br />
				<label>Username Database</label>
				<input type='text' name='username' required /><br />
				<label>Password Database</label>
				<input type='password' name='password' required /><br />
				<label>Nama Database</label>
				<input type='text' name='database' required /><br />

			<h3>Administrator</h3>
				<label>Link Login Administrator > http://$_SERVER[HTTP_HOST]$url</label>
				<input type='text' name='folder' required /><br />
				<label>Username</label>
				<input type='text' name='admin' required /><br />
				<label>Password</label>
				<input type='password' name='adminpass' required /><br />
				<label>Ulangi Password</label>
				<input type='password' name='adminpass2' required /><br />
				<input type='submit' id='submit' value='Install'>
			</form>
		";
	}
	else
	{
		echo "<script> alert('Lengkapi dulu persyaratan sistem');window.location='check'</script>";
	}
}
elseif ($_GET['module']=='step2'){
	// Memeriksa Ketersediaan Variabel Form dengan Fungsi isset()
	// Memastikan bahwa halaman ini diakses dengan parameter POST
	if (isset($_POST['url_baru']) AND isset($_POST['server']) AND isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['database']) 
		AND isset($_POST['folder']) AND isset($_POST['admin']) AND isset($_POST['adminpass']) AND isset($_POST['adminpass2']))
	{
		$url_trim=trim(strip_tags($_POST['url_baru']));
		$server=trim(strip_tags($_POST['server']));
		$username=trim(strip_tags($_POST['username']));
		$dbPassword=trim(strip_tags($_POST['password']));
		$database=trim(strip_tags($_POST['database']));
		$folder=trim(strip_tags($_POST['folder']));
		$admin_filter=trim(strip_tags($_POST['admin']));

		// menghindari sql injection
		function antiinjection($data){
		  $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		  return $filter;
		}

		$url_baru = antiinjection($url_trim);
		$dbHost = antiinjection($server);
		$dbUser = antiinjection($username);
		$dbPass = antiinjection($dbPassword);
		$dbName = antiinjection($database);
		$folder_baru = antiinjection($folder);
		$admin = antiinjection($admin_filter);
		$adminpass = antiinjection(md5($_POST['adminpass']));
		$adminpass2 = antiinjection(md5($_POST['adminpass2']));

		$koneksi = mysqli_connect($dbHost, $dbUser, $dbPass);
		
		if (empty($url_baru)){
			echo "<script>alert('Anda belum mengisikan URL Website');window.history.back()</script>";
		}
		elseif (empty($dbHost)){
			echo "<script>alert('Anda belum mengisikan Server Database');window.history.back()</script>";
		}
		elseif (empty($dbUser)){
			echo "<script>alert('Anda belum mengisikan Username Database');window.history.back()</script>";
		}
		elseif (empty($dbPass)){
			echo "<script>alert('Anda belum mengisikan Password Database');window.history.back()</script>";
		}
		elseif (empty($dbName)){
			echo "<script>alert('Anda belum mengisikan Nama Database');window.history.back()</script>";
		}
		elseif (empty($folder_baru)){
			echo "<script>alert('Anda belum mengisikan Nama Folder Admin');window.history.back()</script>";
		}
		elseif (empty($admin)){
			echo "<script>alert('Anda belum mengisikan Username Administrator');window.history.back()</script>";
		}
		// Memvalidasi username admin, hanya boleh berisi alpha-numeric (a-z, A-Z, 0-9), underscore, dan minimal berisi 5 karakter dan maksimum 20 karakter
		elseif (!preg_match('/^[a-z\d_]{5,20}$/i', $admin)){ // Anda bisa mengganti jumlah minimun dan maksimum karakter sesuai kebutuhan
			echo "<script>alert('Username admin hanya boleh kombinasi huruf, angka dan underscore, serta minimal berisi 5 karakter dan maksimum 20 karakter');window.history.back()</script>";
		}
		elseif (empty($_POST['adminpass'])){
			echo "<script>alert('Anda belum mengisikan Password Administrator');window.history.back()</script>";
		}
		elseif(strlen($_POST['adminpass']) < 5){ //menghitung jumlah karakter dengan strlen()
			echo "<script>alert('Password Administrator minimum 5 digit');window.history.back()</script>";
		}
		elseif ($adminpass!=$adminpass2){ // Pastikan bahwa password yang dimasukkan sebanyak dua kali sudah cocok
			echo "<script>alert('Password yang diulangi tidak sama');window.history.back()</script>";
		}
		elseif (!$koneksi){
			echo "<script>alert('Koneksi ke Database Gagal');window.history.back()</script>";
		}
		else{
			echo "<div class='pembatas'>";
			// Membuat Database MySQL dengan mysqli extension
			$sql = "CREATE DATABASE IF NOT EXISTS $dbName"; // Membuat database
			if ($koneksi->query($sql) === TRUE) {
			  echo "<br />Database berhasil dibuat dengan MySQLi Extension<br />";
				// Restore Tabel
				$koneksi = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
				$filename = "dbackup.sql";
				$templine = '';
				$lines = file($filename);
				foreach ($lines as $line)
				{
					if (substr($line, 0, 2) == '--' || $line == '')
						continue;
					$templine .= $line;
					if (substr(trim($line), -1, 1) == ';')
					{
						mysqli_query($koneksi, $templine);
						$templine = '';
					}
				}
						if(!$templine){
							echo "<br /><font color=red>Tabel gagal direstore, data tidak tersedia</font><br />";
						}
						else {
							echo "<br /><Tabel berhasil direstore<br />";
						}
			}
			else {
				echo "<br /><font color=red>Database gagal dibuat</font><br />";
			}

// Generate koneksi.php pada folder config
$konek = '$konek';
$val = '$val';
chmod("config/koneksi.php",0775);
$f = fopen("config/koneksi.php", "w");
fwrite($f, 
"<?php
// panggil class validasi xss dan injection
require_once('class_validasi.php');

// Koneksi dan memilih database di server
$konek = mysqli_connect(\"$dbHost\",\"$dbUser\",\"$dbPass\",\"$dbName\") or die(\"Koneksi gagal\");

// buat variabel untuk validasi dari file class_validasi.php
$val = new Lokovalidasi;
?>");
fclose($f);
chmod("config/koneksi.php",0444);

			// Mengganti nama folder Administrator
			$nama=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas"));
			rename($nama[folder_admin], $folder_baru);

			// Update Informasi Nama Folder Administrator yang baru
			mysqli_query($koneksi, "UPDATE identitas SET folder_admin='$folder_baru'");
			
			// Update URL Website
			mysqli_query($koneksi, "UPDATE identitas SET url='$url_baru'");

			// Update Username dan Passsword Administrator
			mysqli_query($koneksi, "UPDATE users SET username='$admin', password='$adminpass' WHERE level='admin'");

			//Periksa File Permissions dan CHMOD ke Writable (775)
			if(fileperms("$folder_baru/jejak.txt") != 0775){chmod("jejak.txt",0775);}
			if(fileperms("robots.txt") != 0775){chmod("../robots.txt",0775);}
			if(fileperms("rss.xml") != 0775){chmod("../rss.xml",0775);}
			if(fileperms("sitemap.xml") != 0775){chmod("../sitemap.xml",0775);}
			if(fileperms("$folder_baru/modul/database/backup") != 0775){chmod("/modul/database/backup",0775);}
			if(fileperms("cache") != 0775){chmod("../cache",0775);}
			if(fileperms("files") != 0775){chmod("../files",0775);}
			if(fileperms("foto_artikel") != 0775){chmod("../foto_artikel",0775);}
			if(fileperms("foto_banner") != 0775){chmod("../foto_banner",0775);}
			if(fileperms("foto_produk") != 0775){chmod("../foto_produk",0775);}
			if(fileperms("images") != 0775){chmod("../images",0775);}
			if(fileperms("img_album") != 0775){chmod("../img_album",0775);}
			if(fileperms("img_galeri") != 0775){chmod("../img_galeri",0775);}
			if(fileperms("upload") != 0775){chmod("../upload",0775);}
			if(fileperms("config/koneksi.php") != 0444){chmod("../config/koneksi.php",0444);} //Read Only			
			
// Generate ulang .htaccess
$sql = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from identitas LIMIT 1"));
$domain = str_replace('http://', '', $sql[url]);

//Generate .htaccess pada folder admin
chmod("$folder_baru/.htaccess",0775);
$f = fopen(".htaccess", "w");
fwrite($f, 
"# Mencegah bot mengakses file *.php
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_METHOD} POST
RewriteCond %{REQUEST_URI} .login\.php*
RewriteCond %{REQUEST_URI} .forgot_send\.php*
RewriteCond %{HTTP_REFERER} !.*$domain.* [OR]
RewriteCond %{HTTP_USER_AGENT} ^$
RewriteRule (.*) ^http://%{REMOTE_ADDR}/$ [R=301,L]
</IfModule>

# protect jejak.txt
<files jejak.txt>
order allow,deny
deny from all
</files>");
fclose($f);
chmod("$folder_baru/.htaccess",0444);

//Generate .htaccess pada folder page
chmod("pages/.htaccess",0775);
$f2 = fopen("pages/.htaccess", "w");
fwrite($f2, 
"# Mencegah bot mengakses file *.php
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_METHOD} POST
RewriteCond %{REQUEST_URI} .newsletter\.php*
RewriteCond %{REQUEST_URI} .komentar\.php*
RewriteCond %{REQUEST_URI} .hubungi_aksi\.php*
RewriteCond %{REQUEST_URI} .testimoni_aksi\.php*
RewriteCond %{HTTP_REFERER} !.*$domain.* [OR]
RewriteCond %{HTTP_USER_AGENT} ^$
RewriteRule (.*) ^http://%{REMOTE_ADDR}/$ [R=301,L]
</IfModule>");
fclose($f2);
chmod("pages/.htaccess",0444);

//Generate .htaccess pada folder utama(root)
chmod(".htaccess",0775);
$f3 = fopen(".htaccess", "w");
fwrite($f3, 
"# STRONG HTACCESS PROTECTION - Mencegah Akses ke .htaccess
<Files ~ “^.*\.([Hh][Tt][Aa])”>
order allow,deny
deny from all
satisfy all
</Files>

<IfModule mod_rewrite.c>
RewriteEngine on

# Hilangkan tanda # dibawah ini untuk Installasi CMS Lokomedia di Spanel (kontrol panel hosting masterweb.net / masterweb.com)
# RewriteBase /

RewriteRule ^home$ page.php?module=home [L]
RewriteRule ^produk$ page.php?module=produk [L]
RewriteRule ^halproduk-(.*)$ page.php?module=produk&halproduk=$1 [L]
RewriteRule ^produk-(.*)$ page.php?module=detail&id=$1 [L]
RewriteRule ^halkomentar-(.*)-([0-9]+)$ page.php?module=detail&id=$1&halkomentar=$2 [L]
RewriteRule ^komentar$ page.php?module=komentar [L]
RewriteRule ^hasil-pencarian$ page.php?module=hasilcari&id=$1 [L]
RewriteRule ^kategori-([0-9]+)-(.*)$ page.php?module=kategori&id=$1 [L]
RewriteRule ^halkategori-([0-9]+)-(.*)$ page.php?module=kategori&id=$1&halkategori=$2 [L]
RewriteRule ^testimoni$ page.php?module=testimoni [L]
RewriteRule ^testimoni_respon$ page.php?module=testimoniaksi&id=$1 [L]
RewriteRule ^kontak$ page.php?module=kontak [L]
RewriteRule ^kontak_respon$ page.php?module=kontakrespon [L]
RewriteRule ^artikel-(.*)$ page.php?module=artikel&id=$1 [L]
RewriteRule ^artikel$ page.php?module=allartikel [L]
RewriteRule ^halartikel-(.*)$ page.php?module=allartikel&halartikel=$1 [L]
RewriteRule ^newsletter$ page.php?module=newsletter&id=$1 [L]
RewriteRule ^aktivasi-newsletter-(.*)$ page.php?module=subscribe&kode=$1 [L]
RewriteRule ^berhenti-langganan-(.*)$ page.php?module=unsubscribe&code=$1 [L]
RewriteRule ^halaman-(.*)$ page.php?module=halaman&id=$1 [L]
RewriteRule ^download$ page.php?module=download&id=$1[L]
RewriteRule ^album-([0-9]+)-(.*)$ page.php?module=detailalbum&id=$1 [L]
RewriteRule ^galeri$ page.php?module=semuaalbum&id=$1 [L]
RewriteRule ^halgaleri-([0-9]+)-(.*)$ page.php?module=detailalbum&id=$1&halgaleri=$2 [L]
RewriteRule ^pertanyaan$ page.php?module=faq [L]
RewriteRule ^halpencarian-(.*)-(.*)-([0-9]+)$ page.php?module=hasilcari&kata=$1&kategori=$2&halpencarian=$3 [L]
RewriteRule ^error$ page.php?module=error [L]
RewriteRule (.*)upload/(.*\.(jpe?g|gif|png))$ $1watermark.php?p=br&q=90&src=upload/$2

RewriteRule ^install$ install.php?module=install [L]
RewriteRule ^check$ install.php?module=check [L]
RewriteRule ^setuju$ install.php?module=setuju [L]
RewriteRule ^step1$ install.php?module=step1 [L]
RewriteRule ^step2$ install.php?module=step2 [L]
RewriteRule ^step3$ install.php?module=step3 [L]
RewriteRule ^step4$ install.php?module=step4 [L]
RewriteRule ^finish$ install.php?module=finish [L]
RewriteRule ^hapus$ install.php?module=hapus [L]
RewriteRule ^lihatweb$ install.php?module=lihatweb [L]

# HotLinking Protection - Prevent Hot Linking and Bandwidth Leeching
# Trik Hemat Bandwidth Hosting dengan melindungi gambar dari Crawling & Indexing web/bot
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?$domain [NC] #Ganti dengan domain anda jika sudah online

# Daftar situs yang bisa mengakses Gambar Anda
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?google.co.id [NC]
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?facebook.com [NC]
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?twitter.com [NC]
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?google.com [NC]
RewriteRule \.(jpg|jpeg|png|gif)$ - [NC,F,L]

</IfModule>

# ##############################################################################
# # WEB PERFORMANCE                                                            #
# ##############################################################################

# ------------------------------------------------------------------------------
# | Compression                                                                |
# ------------------------------------------------------------------------------

<IfModule mod_deflate.c>

    # Force compression for mangled headers.
    # http://developer.yahoo.com/blogs/ydn/posts/2010/12/pushing-beyond-gzipping
    <IfModule mod_setenvif.c>
        <IfModule mod_headers.c>
            SetEnvIfNoCase ^(Accept-EncodXng|X-cept-Encoding|X{15}|~{15}|-{15})$ ^((gzip|deflate)\s*,?\s*)+|[X~-]{4,13}$ HAVE_Accept-Encoding
            RequestHeader append Accept-Encoding \"gzip,deflate\" env=HAVE_Accept-Encoding
        </IfModule>
    </IfModule>

    # Compress all output labeled with one of the following MIME-types
    # (for Apache versions below 2.3.7, you don't need to enable `mod_filter`
    #  and can remove the `<IfModule mod_filter.c>` and `</IfModule>` lines
    #  as `AddOutputFilterByType` is still in the core directives).
    <IfModule mod_filter.c>
        AddOutputFilterByType DEFLATE application/atom+xml \
                                      application/javascript \
                                      application/json \
                                      application/rss+xml \
                                      application/vnd.ms-fontobject \
                                      application/x-font-ttf \
                                      application/x-web-app-manifest+json \
                                      application/xhtml+xml \
                                      application/xml \
                                      font/opentype \
                                      image/svg+xml \
                                      image/x-icon \
                                      text/css \
                                      text/html \
                                      text/plain \
                                      text/x-component \
                                      text/xml
    </IfModule>

</IfModule>

# Caching & Simple Ways to Secure Your Website
<IfModule mod_headers.c>
    <FilesMatch \"\.(js|css|xml|gz)$\">
        Header append Vary Accept-Encoding
    </FilesMatch>
    <FilesMatch \"\.(ico|jpe?g|png|gif|swf)$\">
        Header set Cache-Control \"public\"
    </FilesMatch>
    <FilesMatch \"\.(css)$\">
        Header set Cache-Control \"public\"
    </FilesMatch>
    <FilesMatch \"\.(js)$\">
        Header set Cache-Control \"private\"
    </FilesMatch>
    <FilesMatch \"\.(x?html?|php)$\">
        Header set Cache-Control \"private, must-revalidate\"
    </FilesMatch>
	
	Header set X-Permitted-Cross-Domain-Policies \"none\"
	Header set X-Content-Type-Options \"nosniff\"
	Header unset X-Powered-By
	Header set X-XSS-Protection \"1; mode=block\"
	Header set X-Frame-Options \"DENY\"
	Header set X-Content-Security-Policy \"default-src 'self'; img-src 'self'; style-src 'self' 'unsafe-inline'; font-src 'self'; script-src 'self' 'unsafe-inline'; connect-src 'self';\"
	Header set Strict-Transport-Security \"max-age=31536000; includeSubDomains\"
</IfModule>

# Security - Block access to backup and source files.
<FilesMatch \"(^#.*#|\.(bak|config|dist|fla|inc|ini|log|psd|sh|sql|sw[op])|~)$\">
    Order allow,deny
    Deny from all
    Satisfy All
</FilesMatch>

# protect maelostore.zip
<files maelostore.zip>
order allow,deny
deny from all
</files>

# protect install.txt
<files install.txt>
order allow,deny
deny from all
</files>

# protect readme.txt
<files readme.txt>
order allow,deny
deny from all
</files>

# protect robots.txt
<files robots.txt>
order allow,deny
deny from all
</files>

# Mengamankan direktori pengaksesan script atau file
AddHandler cgi-script .pl .py .jsp .asp .htm .shtml .sh .cgi
Options -ExecCGI

# Mencegah server dari serangan DoS ( Denial Of Service ) - Disini kita membatasi ukuran upload sebesar 10240000 byte yang setara dengan 10 mb
LimitRequestBody 10240000

# Mencegah user melakukan browsing tanpa pesan Error 403
IndexIgnore *

# Mencegah error 501 Method Not Implement ketika installasi CMS MaeloStore di hosting
<IfModule mod_security.c>
  SecFilterEngine Off
  SecFilterScanPOST Off
</IfModule>

# Mencegah user melakukan browsing pada setiap direktori server
# Hilangkan tanda # dibawah ini jika hosting anda mendukung, beberapa hosting melarang penggunaan Options All -Indexes / Options All +Indexes
# Options All -Indexes

# 404 (Page Not Found)
ErrorDocument 404 /404.html");
fclose($f3);
chmod(".htaccess",0444);

			echo"
				<h3>Pengaturan Database & Administrator</h3>
				<table border='1'>
					<tr><td>URL Website :</td><td>$url_baru</td></tr>
					<tr><td>Server Database :</td><td>$dbHost</td></tr>
					<tr><td>Username Database :</td><td>$dbUser</td></tr>
					<tr><td>Password Database :</td><td>*****</td></tr>
					<tr><td>Nama Database :</td><td>$dbName</td></tr>
					<tr><td>Link Login Administrator :</td><td>$url_baru/$folder_baru</td></tr>
					<tr><td>Username Administrator :</td><td>$admin</td></tr>
					<tr><td>Password Administrator :</td><td>*****</td></tr>
				</table>
				";

			echo "</div>";

			// Lanjutkan tugas bro
			if($koneksi AND $templine){
				session_start(); $_SESSION['step3']='diizinkan';
						// Kirim info ke step3 untuk disampaikan ke Finish biar doi kenal $folder_baru
				echo "	<form method='post' action='step3'>
						<input type='hidden' name='folderbaru' value='$folder_baru'/>
						<a href='step3'><input type='submit' id='submit' value='Lanjutkan'></a>
						</form>";
			}
			else{
				echo "<div class='pembatas'><a onClick='self.history.back()'><input type='submit' id='submit' value='Kembali'></a></div>";
			}

			$koneksi->close(); //menutup koneksi

		}
	}
	else
	{
		echo "<script> alert('Anda belum mengisi semua form');window.location='step1'</script>";
	}	
}
elseif ($_GET['module']=='step3'){
	session_start();
	// Memastikan bahwa halaman ini diakses dengan Session step3
	if ($_SESSION['step3']=='diizinkan')
	{
		include "config/koneksi.php";
		$sql=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
		echo "	<div class='pembatas'>
			<div class='judul'>Lanjutkan proses installasi dengan mengisi pengaturan website anda.<br />
								Untuk mengganti pengaturan website atau yang lebih detail
								bisa anda akses pada halaman Administrator dengan Level Admin</div>
				</div>
			<form method='post' action='step4'>
			<h3>Pengaturan Website</h3>
				<label>Nama Website</label>
				<input type='text' name='nama_web' value='$sql[nama_website]' required /><br />
				<label>Email</label>
				<input type='text' name='email' value='$sql[email]' required /><br />
				<label>Deskripsi Website</label>
				<input type='text' name='deskripsi' value='$sql[meta_deskripsi]' required /><br />
				<label>Kata Kunci Website</label>
				<input type='text' name='kata_kunci' value='$sql[meta_keyword]' required /><br />
				<label>Nama Perusahaan</label>
				<input type='text' name='perusahaan' value='$sql[nama_perusahaan]' required /><br />
				<label>Alamat</label>
				<input type='text' name='alamat' value='$sql[alamat]' required /><br />
				<label>Telephone</label>
				<input type='text' name='telephone' value='$sql[no_telp]'/><br />
				<label>Handphone</label>
				<input type='text' name='handphone' value='$sql[hp1]' required /><br />
				<input type='submit' id='submit' value='Simpan'>
			</form>
		";
	}
	else
	{
		echo "<script> alert('Anda belum mengisi semua form');window.location='step1'</script>";
	}
}
elseif ($_GET['module']=='step4'){
	session_start();
	// Memeriksa Ketersediaan Variabel Form dengan Fungsi isset()
	// Memastikan bahwa halaman ini diakses dengan parameter POST
	if (isset($_POST['nama_web']) AND isset($_POST['email']) AND isset($_POST['deskripsi']) AND isset($_POST['kata_kunci']) AND isset($_POST['perusahaan']) 
		AND isset($_POST['alamat']) AND isset($_POST['telephone']) AND isset($_POST['handphone']))
	{
		$nw=trim(strip_tags($_POST['nama_web']));
		$em=trim(strip_tags($_POST['email']));
		$ds=trim(strip_tags($_POST['deskripsi']));
		$kk=trim(strip_tags($_POST['kata_kunci']));
		$pr=trim(strip_tags($_POST['perusahaan']));
		$al=trim(strip_tags($_POST['alamat']));
		$tl=trim(strip_tags($_POST['telephone']));
		$hp=trim(strip_tags($_POST['handphone']));

		// menghindari sql injection
		function antiinjection($data){
		  $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		  return $filter;
		}

		$nama_web = antiinjection($nw);
		$email = antiinjection($em);
		$deskripsi = antiinjection($ds);
		$kata_kunci = antiinjection($kk);
		$perusahaan = antiinjection($pr);
		$alamat = antiinjection($al);
		$telephone = antiinjection($tl);
		$handphone = antiinjection($hp);
		
		$valid_email = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";

		if (empty($nama_web)){
			echo "<script>alert('Anda belum mengisikan Nama Website');window.history.back()</script>";
		}
		elseif (empty($email)){
			echo "<script>alert('Anda belum mengisikan Email');window.history.back()</script>";
		}
		elseif (!eregi($valid_email, $email)){ 
			echo "<script>alert('Penulisan alamat E-mail salah ! | masukan alamat email yang benar');window.history.back()</script>";
		}
		elseif (empty($deskripsi)){
			echo "<script>alert('Anda belum mengisikan Deskripsi Website');window.history.back()</script>";
		}
		elseif (empty($kata_kunci)){
			echo "<script>alert('Anda belum mengisikan Kata Kunci Website');window.history.back()</script>";
		}
		elseif (empty($perusahaan)){
			echo "<script>alert('Anda belum mengisikan Nama Perusahaan');window.history.back()</script>";
		}
		elseif (empty($alamat)){
			echo "<script>alert('Anda belum mengisikan Alamat');window.history.back()</script>";
		}
		elseif (empty($handphone)){
			echo "<script>alert('Anda belum mengisikan Handphone');window.history.back()</script>";
		}
		else{
			// Update URL Website
			include "config/koneksi.php";
			mysqli_query($konek, "UPDATE identitas SET	nama_website='$nama_web',
														email='$email',
														meta_deskripsi	='$deskripsi',
														meta_keyword='$kata_kunci',
														nama_perusahaan='$perusahaan',
														alamat='$alamat',
														no_telp='$telephone',
														hp1='$handphone'");
			echo"
			<div class='pembatas'>
			<h3>Pengaturan Website Anda</h3>
			<table border='1'>
				<tr><td>Nama Website :</td><td>$nama_web</td></tr>
				<tr><td>Email :</td><td>$email</td></tr>
				<tr><td>Deskripsi Website :</td><td>$deskripsi</td></tr>
				<tr><td>Kata Kunci Website :</td><td>$kata_kunci</td></tr>
				<tr><td>Nama Perusahaan :</td><td>$perusahaan</td></tr>
				<tr><td>Alamat :</td><td>$alamat</td></tr>
				<tr><td>Telephone :</td><td>$telephone</td></tr>
				<tr><td>Handphone :</td><td>$handphone</td></tr>
			</table>
			</div>

			<form method='post' action='finish'>
				<input type='hidden' name='finish' value='finish'/>
				<input type='submit' id='submit' value='Finish'>
			</form>
			";
		}
	}
	else
	{
		echo "<script> alert('Anda belum mengisi semua form');window.location='step3'</script>";
	}
}
elseif ($_GET['module']=='finish'){
	// Memeriksa Ketersediaan Variabel Form dengan Fungsi isset()
	// Memastikan bahwa halaman ini diakses dengan parameter POST
	if (isset($_POST['finish']))
	{
		session_start(); session_destroy();
		include "config/koneksi.php";
		$sql=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));

		echo "<div class='pembatas'>
				<div class='judul'>Installasi CMS MaeloStore berhasil</div><br />";
		echo "<h3>Silakan hapus file instalasi untuk keamanan</h3><br />
				<a href='$sql[folder_admin]' target='_blank'><input type='submit' id='submit' value='Login Administrator'></a>
				<a onClick=\"href='lihatweb'\" target='_blank'><input type='submit' id='submit' value='Lihat Website'></a>
				<a href='hapus'><input type='submit' id='submit' value='Hapus File Installasi'></a>
			  </div>";
	}
	else
	{
		echo "<script> alert('Anda belum mengisi semua form');window.location='step1'</script>";
	}
}
elseif ($_GET['module']=='hapus'){
	if(file_exists("install.txt")){unlink("install.txt");}
	if(file_exists("dbackup.sql")){unlink("dbackup.sql");}
	if(file_exists("install.php")){unlink("install.php");}
	header('location:home');
}
elseif ($_GET['module']=='lihatweb'){
	if(file_exists("install.txt")){unlink("install.txt");}
	header('location:home');
}
?>
</div>
</body>
</html>
<?php ob_end_flush(); ?>