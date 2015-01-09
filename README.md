#CMS MaeloStore V.1.5.0
------------------------------------------------------------------

CMS for Web publishing and product catalog. Base on CMS Lokomedia

* Minimal Persyaratan Sistem :
  + Apache 1.3.33
  + PHP 5.0.0 (Rekomendasi PHP 5.3.0)
  + MySQL 4.1.3
  + phpMyAdmin 2.6.0-pl2
  + mod_rewrite On (Apache)
  + Register globals Off
  + php_mysql.dll Off
  + php_mysqli.dll On
  + php_pdo_mysql.dll On

* CMS MaeloStore ini didevelopment pada :
  + Apache 2.4.10
  + PHP 5.5.15
  + MySQL 5.6.20
  + phpMyAdmin 4.2.7.1
  + mod_rewrite On (Apache)
  + Register globals Off
  + php_mysql.dll Off (Untuk memastikan MySQLi bekerja dengan baik)
  + php_pdo_mysql.dll On

* Cara Installasi :
  + Ekstrak file maelostore.zip ke hosting/server anda
  + Ikuti petunjuk installasi hingga selesai
  + Jangan lupa ganti nama folder admin dengan nama unik untuk keamanan

* Cara Pengaturan CMS MaeloStore :
  + Ganti watermark pada foto, rubah file yang berada pada folder "images" berikut :
     - watermark_1000px.png
     - watermark_800px.png
     - watermark_600px.png
     - watermark_400px.png
     - watermark_200px.png
     - watermark.png
  + Untuk mengganti widget Facebook
     - Masuk ke https://developers.facebook.com/
     - Klik > Docs > Sharing > Social Plugins > Like Box
     - Isi Facebook Page URL : Isi Link Halaman Anda
  	+ Contoh: https://www.facebook.com/pages/Lokomedia/121981531278268?fref=ts
     - Kemudian klik "Get Code"
     - Copy Id pada baris #xfbml=1&appId=394664137368829&version=v2.0";
  	+ Contoh : 394664137368829
     - Paste kan pada kolom Facebook App Id pada "Pengaturan Tampilan" di Halaman Admin
     - Copy Link Halaman Anda
  	+ Contoh : pages/Lokomedia/121981531278268?fref=ts
     - Paste kan pada kolom Facebook pada "Pengaturan Tampilan" di Halaman Admin
     - Kemudian pilih Social Widget : Facebook Like Box
  + Untuk mengganti widget Twitter
     - Masuk ke https://twitter.com
     - Klik > Pengaturan > Widget > Buat baru
     - Atur Tinggi : 440
     - Kemudian klik "Buat widget"
     - Copy Id pada baris data-widget-id="524759011518722050">
  	+ Contoh : 524759011518722050
     - Paste kan pada kolom Twitter Widget Id pada "Pengaturan Tampilan" di Halaman Admin
     - Isi "Nama pengguna" Twitter anda pada kolom Twitter pada "Pengaturan Tampilan" di Halaman Admin
     - Kemudian pilih Social Widget : Twitter Widget

* Login Administrator :
  + Untuk masuk ke halaman Administrator, ketik alamat berikut:
     - http://localhost/maelostore/namafolderadminbaru/
     - atau kalau sudah di online-kan:
     - http://namadomain.com/namafolderadminbaru/
  + Isikan Username dan Password

* Password :
  + Level Administrator (Admin)
     - Username: yang anda isi ketika installasi
     - Password: yang anda isi ketika installasi
  + Level Pengelola (Manager)
     - Username: pengelola
     - Password: pengelola
  + Level Karyawan (User)
     - Username: karyawan
     - Password: karyawan

* Fitur Umum :
  + Katalog Online ini dibuat dengan Framework "CMS Lokomedia"
  + Dukungan HTML5 & CSS3 untuk browser lama & IE7-IE9
  + Dukungan Responsive Design (min/max-width media query polyfill) untuk IE 6-8
  + Desain web mengadopsi "Adaptive Web Design (AWD)” bukan “Responsive Web Design (RWD)“ untuk keterangan lebih lanjut silakan baca di www.stoepy.com/adaptive-dan-responsive-web-design/
  + Support screen size minimal hingga 240x320 (bisa untuk hp jadul, hehe..., tp browsingnya jgn pakai opera mini, pakai browser bawaan hp saja)
  + Menggunakan <noscript>
  + Sebahagian gambar telah mendukung retina display
  + Untuk meringankan beban hosting, beberapa file jQuery telah SVN, tetapi menggunakan "conditional condition" yang mana anda tetap bisa bekerja men-development pada localhost tanpa koneksi internet.
  + Struktur file/folder yang tidak baku mengikuti lokomedia utk menghindari hacking terhadap website (jika anda mendevelopment ulang)
  + Fasilitas Newsletter dengan fitur aktivasi & unsubscribe via email {Thanks to Munajat}
  + Gambar tambahan produk max hingga 4 gambar
  + Apabila gambar produk tidak diisi maka secara default akan muncul gambar "No Picture"
  + Tombol beli produk yang flexibel, dapat diganti nama & link tujuannya 
  + Sidebar yang dapat diatur letak dan posisi nya
  + Komentar produk yang bisa dinonaktifkan
  + Fitur Widget, anda dapat menambahkan widget milik Blogspot {Thanks to Google}
  + Tema yang dapat di atur warna & posisi
  + Daftar produk & artikel dapat di atur jumlah yang tampil

* Fitur Halaman Depan (Frontend) :
  + CSS penggabungan Framework Skeleton V1.2 & Gumby Framework & Eric Meyer's CSS Reset v2.0
  + Paging halaman yg telah responsive
  + Paging hanya muncul jika telah melebihi 5 komentar
  + Kode Captcha ditambah dengan fitur "Refresh"
  + Penambahan "hashtag" (#komentar) pada halaman detail produk, sehingga setelah memberikan komentar halaman yang refresh tetap pada posisi komentar (tidak pindah ke atas halaman) dan yang tampil pada urutan pertama komentar adalah yang terakhir memberikan komentar (ORDER BY id_komentar DESC)
  + Penambahan "hashtag" (#komentar) pada tombol paging, sehingga halaman paging komentar jika diklik perpindahan halaman tetap pada posisi komentar (tidak pindah ke atas halaman)
  + Output HTML menggunakan metode HTML Minify (untuk mengkompres output agar proses request halaman lebih cepat, tanpa menghilangkan Conditional Comments <!--[if IE 7 ]> <!--<![endif]-->
  + Setiap foto/gambar yang telah masuk ke detail-produk/detail-artikel/halaman diberi watermark secara otomatis, tetapi tanpa merubah file asli, jadi watermark hanya muncul pada website saja.
  + Jika website dibuka melalui PC, tampilan daftar produk menjadi GRID dan jika dibuka di HP menjadi tampilan LIST
  + Hasil pencarian berdasarkan pilihan produk atau artikel

* Fitur Halaman Administrator (Backend) :
  + CSS penggabungan Bootstrap v3.1.1 & normalize.css v3.0.2
  + Icon pada website menggunakan Font Awesome 4.2.0
  + Wysiwyg Editor yang telah responsive
  + Wysiwyg Editor for Bootstrap (Summernote Bootstrap v0.5.10)
  + Wysiwyg Editor juga mendukung Fullscreen & Drag Image, memberikan ruang kerja yang luas, sehingga memudahkan anda dalam mengelola konten website
  + Tabel yang juga telah responsive
  + Tabel mengggunakan FooTable Version : 2.0.1.5
  + Paging halaman pada tabel hanya muncul jika telah melebihi 10 data
  + Sebaiknya untuk foto utama produk, yang di upload dengan ukuran persegi agar telihat rapi
  + Adanya fitur backup database

* Thanx to : 
  + Lukmanul Hakim (www.bukulokomedia.com) gak bisa bilang apa2 lagi kecuali thank's banyak2 deh pokoknya untuk leader yg satu ini... :)
  + Munajat (www.rangkasku.web.id) sahabat yang banyak membantu saya & thank's atas bantuan yg terdahulu yg membuat saya utk terus semangat belajar.
  + Dian Kurniawan (blogiant.web.id) yang selalu dengan senang hati menjawab setiap pertanyaan saya... salut utk master yg satu ni...
  + Al Mazari (dokumenary.wordpress.com) atas ilmunya.
  + Willy (cauza.web.id) yang telah menjadi inspirasi.

* Materi :
  + Semua gambar dan isi konten pada CMS MaeloStore bersumber dari google.co.id digunakan hanya sebagai contoh/sampel.
  + Jika anda menggunakan CMS MaeloStore untuk kepentingan komersial dan lainnya, silakan ganti gambar dan konten yang tersedia untuk menghindari kemungkinan tuntutan hak cipta yang akan terjadi.

* Catatan :
  + Kritik dan saran membangun sangat saya harapkan dari para pembaca/pengguna CMS Lokomedia agar CMS MaeloStore ini sebagai turunan CMS Lokomedia terus dapat berjalan dengan baik dan stabil.

* Kenapa engine CMS MaeloStore diambil dari CMS Lokomedia ?
  + Alasan utama karena CMS Lokomedia mudah dimodifikasi (dikembangkan) dan mudah pula untuk ditemukan bagian yang salah ketika program sedang diuji
  + CMS Lokomedia menggunakan metode pemrograman prosedural (terstruktur)
  + Terstruktur dapat berarti terpola, bentuk yang mengikuti aturan tertentu, juga berarti sesuatu yang sistematis
  + Beberapa alasan lainnya :
     - Struktur programnya; jelas dan tegas 
     - Fasilitas penulisan kode program; jelas dan tegas 
     - Statemen untuk kebutuhan Selection dan Looping; lengkap
     - Fasilitas menyatakan berbagai type data (struktur data); lengkap dan tegas
     - Fasilitas pemberian komentar; lengkap 
     - Fasilitas instruksi yang tersedia (operasi arithmatik/matematik, string, …); lengkap
     - Fasilitas modular (baik internal maupun eksternal); lengkap
     - Fasilitas debugging, mudah dan jelas

* Konsultasi / Pemesanan Website :
  + 0822 8311 2610
  + Pin BBM 7E818DE6
  + web.maelosoki.com

* Donasi
  + CMS versi ini tidak diperjual belikan, dan akan dikembangkan terus hingga maksimal.
  + Untuk saat ini kemungkinan ada beberapa fitur yang belum berfungsi atau adanya BUG pada program.
  + Kami mengharapkan donasi sukarela dari donatur untuk biaya pengembangan CMS ini
  + Fasilitas buat donatur akan mendapatkan update CMS lebih cepat yang akan dikirim via email

* Log update terakhir :
  + 09/01/2015 [CMS MaeloStore V.1.5.0]
     - Penambahan Fitur Layanan Installer, untuk mempermudah user memasang CMS MaeloStore
     - Penambahan Fitur Full Backup website dalam format .zip untuk mempermudah migrasi hosting, lihat pada bagian database
     - Perubahan pada file readme.txt dan cara installasi CMS MaeloStore
     - Fix some bug & Security
  + 06/01/2015 [CMS MaeloStore V.1.4.3] Minor Update
     - Penambahan auto deteksi file jejak.txt, Jika file jejak.txt telah melebihi 10MB akan dihapus supaya tidak menghabiskan space hosting
     - User tidak perlu Set Permission CHMOD ke Writable (775) secara manual
     - Penambahan fitur loading <progress></progress> ketika upload gambar pada Wysiwyg Editor Summernote
     - Penambahan fitur Auto Generate .htaccess dan isi .htaccess secara otomatis mengikuti nama domain anda
  + 05/01/2015 [CMS MaeloStore V.1.4.2] Minor Update
     - Penambahan Class AutoCache, Cache File PHP berguna untuk mengurangi beban server, selain menghemat bandwidth hosting juga untuk menghindari website anda disuspensi karena dianggap mengganggu pada server lain, atau mengganggu user lain yang satu server dengan anda bilamana anda menggunakan shared hosting. Juga berguna sebagai MySQL Query Cache untuk menghindari Warning: mysqli_connect(): Too many connections karena permintaan query yang sama terjadi berulang-ulang ketika trafik pengunjung web anda sedang tinggi. AutoCache akan dinonaktifkan ketika anda login ke halaman Administrator dan akan diaktifkan kembali setelah anda logout, tujuannya agar setiap perubahan yang anda lakukan pada halaman Administrator juga ikut berubah pada halaman pengunjung
     - Perbaikan Auto Height pada Accordion FAQ
  + 04/01/2015 [CMS MaeloStore V.1.4.1] Minor Update
     - Penambahan Modul Check & Repair Database, error database/table yang rusak menyebabkan input data akan gagal
     - Fix some bug & Security
  + 02/01/2015 [CMS MaeloStore V.1.4]
     - Penambahan Modul Sitemap, dengan fitur ping otomatis untuk mendaftarkan website anda ke beberapa Search Engine sekaligus (Optimasi SEO)
     - Untuk file sitemap.xml & robots.txt tidak perlu lagi diganti dengan nama domain anda, karena sudah otomatis digenerate oleh sistem
     - Penambahan fitur log yang terdapat pada file jejak.txt dimana anda dapat memantau aktifitas user yang mengakses halaman Administrator anda
     - Penambahan $_SESSION['leveluser']!='admin' or 'manager' pada beberapa modul untuk mengatasi kecurangan user bilamana user mencoba mengetikkan secara langsung URL menu pada browser
     - Update Wysiwyg Editor Summernote dari versi 0.5.10 ke versi 0.6.0
     - Penambahan Update security pada HTACCESS File (.htaccess)
     - Fix some bug, Security & Interface
  + 24/12/2014 [CMS MaeloStore V.1.3.2] Minor Update
     - Penambahan fitur Sticky, Menu "Kategori Produk" melayang tetap diatas
     - Fix some bug, Security & Interface
  + 20/12/2014 [CMS MaeloStore V.1.3.1] Minor Update
     - Penambahan fitur Breadcumb, fasilitas agar user mengetahui sedang berada di halaman mana
     - Penambahan fitur Responsive Marquee, info update produk terbaru
     - Perbaikan submenu untuk tampilan mobile
     - Fix some bug & Interface
  + 18/12/2014 [CMS MaeloStore V.1.3]
     - Migrasi dari ekstensi MySQL ke MySQLi
     - Penambahan link "tel:" ke nomor telp, kegunaannya apabila website diakses via handphone dan jika link telpon diklik akan langsung menuju ke panggilan keluar
     - Penambahan link "Share to Social Media" pada detail produk
     - Perbaikan celah keamanan, dimana file PHP hanya bisa diinclude, tidak bisa langsung dibuka (direct open) via browser, contoh : http://domainanda.com/footer.php
     - Fix some bug
  + 07/12/2014 [CMS MaeloStore V.1.2]
     - Penambahan fitur pilihan pada hasil pencarian
     - Fix bug & performance
  + 26/11/2014 [CMS MaeloStore V.1.1]
     - Perubahan struktur file & folder



----------------------------------------------------------------

		Have a lot of fun! | Thank's All | Maelosoki.com
