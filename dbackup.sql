DROP TABLE IF EXISTS album;

CREATE TABLE `album` (
  `id_album` int(5) NOT NULL AUTO_INCREMENT,
  `jdl_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `album_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO album VALUES("1","Pernikahan","pernikahan","77kecil_146667nikah.jpg","Y");
INSERT INTO album VALUES("2","Kartun","kartun","62kecil_476928sonic.jpg","Y");
INSERT INTO album VALUES("3","Ilustrator","ilustrator","95kecil_987701family.jpg","Y");
INSERT INTO album VALUES("4","Binatang","binatang","23kecil_391479burung.jpg","Y");
INSERT INTO album VALUES("5","Bayi","bayi","12kecil_246551silvestree.jpg","Y");

DROP TABLE IF EXISTS artikel;

CREATE TABLE `artikel` (
  `id_artikel` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_artikel` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar_tampil` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `dibaca` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO artikel VALUES("163","Proyek Membangun Website Berbasis PHP dengan Codeigniter","proyek-membangun-website-berbasis-php-dengan-codeigniter","Y","<p>Codeigniter adalah Framework PHP pertama di Indonesia, banyak 
digunakan perusahaan software dan situs-situs dalam membangun aplikasi 
web. Meski saat ini ada Framework PHP baru dan Codeigniter agak terhenti
 updatenya. Namun, <strong>karena terlanjur sudah banyak digunakan menjadikan Codeigniter tetap terdepan sebagai Framework PHP</strong>. Selain itu, kehandalan Codeigniter dibungkus dengan kesederhanaan, kerampingan dan kelengkapan dokumentasi, sehingga <strong>mudah dipelajari dan tercepat aksesnya dibanding Framework lainnya</strong>.</p><br>
<p>Sebagian besar materi diambil dari buku BEST SELLER <a href=\"http://bukulokomedia.com/artikel-98-membangun-web-berbasis-php-dgn-framework-codeigniter.html\" target=\"_blank\"><strong>Membangun Web Berbasis PHP dgn Framework Codeigniter</strong></a> yang menyajikan <strong>Contoh Nyata Bagaimana Membangun Sebuah Proyek Aplikasi Web</strong>. Mulai dari Perancangan Database sampai menjadi Proyek Siap Pakai.</p><br>
<p>Dalam buku ini telah di <strong>update ke Codeigniter versi terbaru 2.1.4</strong>
 (sebelumnya 1.7). Source code telah ditulis ulang, sehingga lebih rapi 
dan mudah ditelusuri. Disamping itu, dibahas Dasar-Dasar&nbsp; Codeigniter 
yang telah disesuaikan dengan versi terbaru, tentunya materi lebih 
terstruktur dan fitur-fitur terbaru, seperti Security yang lebih handal,
 SEO URL Friendly, Kalender Pop-up, Unique Validation, Paging, Laporan 
dalam Format&nbsp; Excel dan PDF.</p><br>
<p>Spesifikasi buku:<br>Judul : Proyek Membangun Website Berbasis PHP dengan Codeigniter<br>Penulis : Awan Pribadi Basuki<br>Harga : <strong>Rp. 58.000</strong><br>Bonus : CD (disertai Video Tutorial)<br>Tebal Buku : 244 Halaman<br>Dimensi (L x P) : 14 x 21 Cm (Standar)<br>Tanggal Terbit : 19 Juni 2014</p><br>
<p>Klik <a href=\"http://bukulokomedia.com/foto_banner/cover-codeigniter2.jpg\" target=\"_blank\"><strong>disini</strong></a> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-codeigniter2.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-proyek-codeigniter.jpg\" alt=\"proyek-membangun-website-codeigniter\" height=\"435\" width=\"600\"></a></p><br>
<p>.<strong><br></strong></p><br>
<p><strong>DAFTAR ISI</strong></p><br>
<p>Bab 1. Pembuka<br>1.1. Tentang Buku ini<br>1.2. Versi Server<br>1.3. Versi CodeIgniter</p><br>
<p>Bab 2. Instalasi CodeIgniter<br>2.1. Mendapatkan CodeIgniter<br>2.2. Proses Instalasi CodeIgniter</p><br>
<p>Bab 3. Mengenal CodeIgniter<br>3.1. Apa itu Framework?<br>3.2. Mengapa Memilih CodeIgniter?<br>3.3. Fitur-Fitur CodeIgniter<br>3.4. Kebutuhan Sistem<br>3.5. Aliran Data CodeIgniter<br>3.6. Struktur Folder CodeIgniter<br>3.7. Macam-Macam File CodeIgniter<br>3.8. Konfigurasi Dasar CodeIgniter<br>3.8.1. config.php<br>3.8.2. database.php<br>3.9. Model-View-Controller (MVC)<br>3.10. URL CodeIgniter<br>3.10.1. URI Segment<br>3.10.2. Menghilangkan index.php<br>3.11. Controllers<br>3.11.1. Apa itu Controller?<br>3.11.2. Membuat Controller<br>3.11.3. Method/Fungsi<br>3.11.4. Memberi Method untuk Controller<br>3.11.5. Default Controller<br>3.11.6. Menyimpan Controller ke dalam Sub-Folder<br>3.11.7. Constructor Controller<br>3.12. View<br>3.12.1. Membuat View<br>3.12.2. Memanggil View<br>3.12.3. Memanggil Beberapa View Sekaligus<br>3.12.4. Menyimpan View ke dalam Sub-Folder<br>3.12.5. Menambahkan Data pada View<br>3.12.6. Melakukan Perulangan (Looping)<br>3.13. Model<br>3.13.1. Membuat Model<br>3.13.2. Memanggil dan Menggunakan Model<br>3.13.3. Auto-Loading Model<br>3.13.4. Menghubungkan Model dengan Database<br>3.13.5. Constructor Model<br>3.14. Library<br>3.14.1. Membuat Library<br>3.14.2. Constructor Library<br>3.14.3. Memanggil dan Menggunakan Custom Library<br>3.14.4. Menggunakan Resource CodeIgniter Custom Library<br>3.14.5. Me-Replace Native Library<br>3.14.6. Meng-Extend Native Library<br>3.14.7. Core Class<br>3.15. Helper<br>3.15.1. Memanggil dan Menggunakan Helper<br>3.15.2. Membuat Helper<br>3.15.3. Meng-Extend Helper<br>3.16. Auto-Loading<br>3.17. URI Routing<br>3.18. Error Handling<br>3.19. File Bahasa<br>3.19.1. Cara ke-1 (Menerjemahkan Langsung)<br>3.19.2. Cara ke-2 (Membuat File Bahasa Sendiri)</p><br>
<p>Bab 4. Proyek Program Absensi Siswa<br>4.1. Tentang Program Absensi Siswa 2014<br>4.2. Spesifikasi Program Absensi Siswa<br>4.3. Mengedit Primary Key Tabel</p><br>
<p>Bab 5. Membuat Database Absensi Siswa<br>5.1. Merancang Database<br>5.2. Membuat Database di MySQL <br>5.3. Foreign Key dan Referential Integrity</p><br>
<p>Bab 6. Persiapan Awal Proyek<br>6.1. Mengatur Konfigurasi (config.php)<br>6.2. Membuat File .htaccess<br>6.3. Mengatur Database (database.php)<br>6.4. Mengatur Auto-Loading (autoload.php)<br>6.5. Mengatur Rute (routes.php)<br>6.6. Membuat File Bahasa Indonesia<br>6.7. Membuat Cek Status Login (MY_Controller.php)<br>6.8. Membuat Controller Error (error404.php)<br>6.9. Membuat View Error (view404.php)<br>6.10. Merancang Layout Halaman<br>6.10.1. Membuat Template (template.php)<br>6.10.2. Membuat Header (masthead.php)<br>6.10.3. Membuat Menu Navigasi (navigation.php)<br>6.10.4. Membuat Footer (footer.php)<br>6.11. Asset (CSS, Javascript, images)</p><br>
<p>Bab 7. Modul Login dan Logout<br>7.1. Controller Login<br>7.2. Model Login<br>7.3. View Login<br>7.4. Ujicoba Modul Login dan Logout</p><br>
<p>Bab 8. Modul Kelas<br>8.1. Controller Kelas<br>8.2. Model Kelas<br>8.3. Menampilkan Data Kelas<br>8.4. Menambahkan Kelas<br>8.5. Mengedit Kelas<br>8.6. Menghapus Kelas</p><br>
<p>Bab 9. Modul Semester<br>9.1. Controller Semester<br>9.2. Model Semester<br>9.3. Menampilkan Form untuk Mengatur Semester<br>9.4. Mengatur Semester yang Aktif</p><br>
<p>Bab 10. Modul Siswa<br>10.1. Controller Siswa<br>10.2. Model Siswa<br>10.3. Menampilkan Data Siswa<br>10.4. Menambahkan Siswa<br>10.5. Mengedit Siswa<br>10.6. Menghapus Siswa</p><br>
<p>Bab 11. Modul Absen<br>11.1. Controller Absen<br>11.2. Model Absen<br>11.3. Menampilkan Data Absen<br>11.4. Menambahkan Absen<br>11.5. Mengedit Absen<br>11.6. Menghapus Absen</p><br>
<p>Bab 12. Modul Rekap (Laporan)<br>12.1. Controller Rekap<br>12.2. Model Rekap<br>12.3. Menampilkan Data Rekap Absensi<br>12.4. Membuat Laporan Excel<br>12.5. Membuat Laporan PDF</p>","Minggu","2014-12-21","14:31:58","631codeigniter2-miring.jpg","Y","14");
INSERT INTO artikel VALUES("161","Proyek Membuat Radio Streaming dan TV Online dengan PHP","proyek-membuat-radio-streaming-dan-tv-online-dengan-php","Y","<p>Saat ini mulai banyak Radio FM mengonlinekan siarannya agar mengudara
 di Internet atau lebih dikenal dengan Radio Streaming. Di dalam buku 
ini akan dibahas cara pembuatannya, baik menggunakan server gratisan 
maupun server yang dirancang sendiri.</p><br>
<p>Selain itu juga dibahas pembuatan Televisi Online yang juga sedang 
marak terlihat di website televisi indonesia seperti Metro TV, SCTV, TV 
One, detikTV, dll. Di dalam buku ini dibahas baik persiapan secara 
hardware maupun instalasi software pendukung serta konfigurasinya agar 
televisi bisa tampil di website.</p><br>
<p>Sebagai bonus, ada pembahasan mengenai Proyek Web Multimedia, 
terutama tentang pembuatan Video Online, dimana kita bisa membuat Link 
di Video, Fitur Sharing, Playlist serta Menempelkan Content Iklan di 
Video seperti yang sering kita saksikan di Youtube.</p><br>
<p>Spesifikasi buku:<br>Judul : Proyek Membuat Radio Streaming dan TV Online dengan PHP<br>Penulis : Sofyan Pariyasto<br>Harga : Rp. <strong>50.000</strong><br>Bonus : DVD Video Tutorial<br>Tanggal Terbit : <strong>10 Februari 2014<br></strong></p><br>
<p>Klik <span style=\"text-decoration: underline;\"><a href=\"http://bukulokomedia.com/foto_banner/cover-tv.jpg\" target=\"_blank\"><strong>disini</strong></a></span> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-tv.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-tv.jpg\" alt=\"proyek-membuat-radio-streaming-dan-tv-online-dengan-php\" height=\"448\" width=\"600\"></a></p><br>
<p>.</p>","Minggu","2014-12-21","14:31:58","117tv-miring.jpg","Y","13");
INSERT INTO artikel VALUES("162","Rahasia Inti Master PHP dan MySQLi (improved)","rahasia-inti-master-php-dan-mysqli-improved","Y","<p>Meskipun sebagian materi dalam buku ini diambil dari buku <a href=\"http://bukulokomedia.com/artikel-85-membongkar-trik-rahasia-para-master-php.html\" target=\"_blank\"><strong>Membongkar Trik Rahasia Para Master PHP</strong></a>,
 namun banyak sekali perubahan yang dilakukan oleh penulis dalam buku 
ini, seperti Akses Database Menggunakan MySQLi (improved) yang&nbsp; 
merupakan ekstension PHP terkini dalam mengakses database MySQL. Begitu 
juga dengan tambahan ilmu <strong>SEO</strong> (<em>Search Engine Optimization</em>)&nbsp; yang saat ini sedang banyak diperbincangkan, ada juga <strong>Integrasi dengan Social Media</strong> seperti Facebook, Twitter dan Google Plus, dan sebagainya.</p><br>
<p>Disamping itu, penulis juga menyisipkan beberapa bab baru sebagai fondasi dalam belajar PHP, seperti Pengenalan PHP, <strong>Fondasi Dasar Pemrograman&nbsp; PHP</strong>, dan Mengolah Database dengan MySQLi.</p><br>
<p>Selain didukung dengan <strong>Trik-Trik terpilih khas Master PHP</strong>. Pada bagian akhir disertakan pula <strong>Proyek Hebat Membuat CMS dari Nol</strong>,
 dimulai dari Alur, Konsep, Perancangan dan Pembuatannya, dari Halaman 
Administrator sampai Halaman Pengunjung yang didesain secara Elegan, 
Cantik, dan <strong>Responsive</strong>.</p><br>
<p>Spesifikasi buku:<br>Judul : Rahasia Inti Master PHP dan MySQLi (<em>improved</em>)<br>Penulis : Lukmanul Hakim<br>Harga : <strong>Rp. 65.000</strong><br>Bonus : CD (disertai Video Tutorial)<br>Tebal Buku : 208 Hal + 8 Halaman Berwarna<br>Dimensi (L x P) : 14 x 21 Cm (Standar)<br>Tanggal Terbit : 21 Mei 2014</p><br>
<p>Klik <a href=\"http://bukulokomedia.com/foto_banner/cover-rahasia-inti-php.jpg\" target=\"_blank\"><strong>disini</strong></a> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-rahasia-inti-php.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-rahasia-inti-php.jpg\" alt=\"rahasia-inti-master-php-mysqli\" height=\"436\" width=\"600\"></a></p><br>
<p><strong>DAFTAR ISI</strong><br><br>BAB 1. Lebih Dekat dengan PHP<br>1.1. Apa itu PHP?<br>1.2. Mengapa Menggunakan PHP?<br>1.3. Apa Saja Software yang Dibutuhkan?<br>1.4. Program PHP Pertamaku<br>1.4.1. Cara Membuat dan Menjalankan Skrip PHP<br>1.4.2. Aturan Penulisan Skrip PHP<br>1.4.3. Memberikan Komentar pada Skrip PHP<br><br>BAB 2. Fondasi Dasar Pemrograman PHP<br>2.1. Memahami Variabel<br>2.1.1. Menulis Nama Variabel yang Benar<br>2.1.2. Memberi Nilai pada Variabel<br>2.1.3. Variabel Form (GET dan POST)<br>2.2. Logika Percabangan (Kalimat Bersyarat)<br>2.3. Logika Perulangan (Looping)<br>2.3.1. Looping Menggunakan FOR<br>2.3.2. Looping Menggunakan WHILE<br>2.4. Array (Kasus: Memilih Hobby Lebih dari Satu)<br>2.5. Fungsi (Function)<br>2.5.1. Fungsi Bikinan Sendiri (Kasus: ComboBox Hari)<br>2.5.2. Fungsi Siap Pakai (Kasus: Konversi Tanggal dan Fungsi Terbilang)<br><br>BAB 3. Mengolah Database dengan MySQLi<br>3.1. Memahami Database Relasional<br>3.2. Database MySQL dan Mengenai MySQLi (improved)<br>3.3. Cara Cepat Membuat Database dan Tabel<br>3.4. Teknik Input Data<br>3.5. Cara Menampilkan Data<br>3.6. Merapikan Tampilkan Data dengan Tabel<br>3.7. Menampilkan Data untuk Admin<br>3.8. Melakukan Pengalihan Halaman Web (Redirect)<br>3.9. Edit dan Update Data<br>3.10. Menghapus Data<br>3.11. Memperbaiki Nomor Urut Data<br><br>BAB 4. Aneka Trik PHP Pendukung Proyek<br>4.1. Cara Mengimpor Database<br>4.2. Paging Data<br>4.2.1. Menampilkan Data Tanpa Paging<br>4.2.2. Memahami Logika Teknik Paging<br>4.2.3. Tiga Langkah Mudah Menerapkan Paging<br>4.2.4. Mempercantik Paging dengan Style<br>4.2.5. Bikin Paging Ala Google (Class Paging)<br>4.2.6. Mudahnya Bikin Paging dengan jQuery dataTables<br>4.3. Menampilkan Data Multi Kolom Horizontal<br>4.4. Menangani Upload dan Download File<br>4.4.1. Teknik Upload File<br>4.4.2. Download File<br>4.4.3. Fitur Penting Upload File dan Teknik Thumbnail<br>4.5. Editor TextArea WYSIWYG Ala Word (TinyMCE)<br>4.6. Aplikasi Contact Form<br>4.7. Menghilangkan Double Data Saat Edit ComboBox<br>4.8. Input dan Edit Data Tanggal dengan DatePicker<br>4.9. Statistik Pengunjung (Counter)<br>4.10. Statistik Pengunjung Berbentuk Grafik<br><br>BAB 5. Proyek Hebat Membuat CMS dari Nol<br>5.1. Mempersiapkan Folder Proyek<br>5.2. Membuat Database dan Relasi Antar Tabel<br>5.3. Pentingnya Memisahkan File Koneksi ke Database<br>5.4. Manajemen User<br>5.4.1. Input User<br>5.4.2. Menampilkan Daftar User<br>5.4.3. Edit dan Update User<br>5.4.4. Menghapus User<br>5.5. Login dengan Teknik Session<br>5.6. Modul Berita<br>5.6.1. Input Berita Disertai Foto Berita<br>5.6.2. Menampilkan Daftar Berita<br>5.6.3. Edit dan Update Berita<br>5.6.4. Menghapus Berita Sekaligus Foto Beritanya<br>5.7. Teknik Pembuatan Proyek CMS Lokomet<br>5.7.1. Impor Database<br>5.7.2. Buat Folder Proyek<br>5.7.3. Aturan Penamaan Modul dan Penjelasannya<br>5.7.4. Memahami Logika Skrip Modul Admin<br>5.7.5. Fungsi-Fungsi Pendukung<br>5.8. Menelusuri Alur Proyek CMS Lokomet<br>5.8.1. Halaman Login Administrator<br>5.8.2. Halaman Utama Administrator dan Desain Layoutnya<br>5.8.3. Manajemen Modul<br>5.8.4. Menjelajahi Modul Administrator<br>5.8.4.1. Modul Identitas Web<br>5.8.4.2. Menu Website<br>5.8.4.3. Modul Kategori, Berita, dan Tag Berita<br>5.8.4.4. Modul Album dan Galeri Foto<br>5.8.4.5. Modul Agenda<br>5.8.4.6. Modul-Modul Lainnya<br>5.9. Halaman Pengunjung yang Cantik dan Responsive<br>5.9.1. Anatomi Layout Halaman Pengunjung<br>5.9.2. Memahami Skrip Layout Halaman Pengunjung<br>5.10. Penerapan Dasar SEO pada Proyek CMS Lokomet<br>5.10.1. Title Tag, Meta Description dan Keyword<br>5.10.2. Membuat URL yang Search Engine Friendly (SEF)<br>5.10.3. Social Media Meta Tag<br>5.10.3.1. Facebook Open Graph<br>5.10.3.2. Twitter Card<br>5.10.3.3. Google Plus Meta Tag<br>5.11. Tujuh Langkah Membuat Modul Sendiri<br><br>Daftar Pustaka<br>Lampiran (Halaman Berwarna)</p>","Minggu","2014-12-21","14:31:58","127rahasiaintiphp-miring.jpg","Y","15");
INSERT INTO artikel VALUES("158","Trik Menguasai PHP + jQuery Berbasis Linux dan Windows","trik-menguasai-php--jquery-berbasis-linux-dan-windows","Y","<p>Buku ini ditulis berdasarkan pengalaman penulisnya sebagai Programmer
 di sebuah Perusahaan Swasta. Oleh karena itu, selain membahas 
Dasar-Dasar Membangun Website dengan PHP dan MySQL, disertai pula Studi 
Kasus dan pengembangannya menggunakan Plugin jQuery, sehingga website 
berjalan dinamis dan makin cantik.</p><br>
<p>Disamping itu, karena minimnya referensi belajar PHP di Linux. Maka 
selain dibahas PHP di Windows, juga dibahas PHP di Linux, terutama 
tentang Instalasi Lampp, Setting dan Penempatan File Web, Hak Akses File
 serta TroubleShooting yang sering dijumpai, terutama oleh Programmer 
pemula.</p><br>
<p>Berikut beberapa pembahasan utama didalam buku:</p><br>
<ul><br><li>Instalasi Xampp di Windows dan Lampp di Linux.</li><br><li>Dasar-Dasar Membangun Website di Linux.</li><br><li>Aneka TroubleShooting di Windows dan Linux.</li><br><li>Pembuatan Layout Website dengan HTML dan CSS.</li><br><li>Kolaborasi PHP dan REGEX dalam Memanipulasi File (Scrapping).</li><br><li>Teknik Form Insert dan Update (Ajax).</li><br><li>Perancangan dan Pembuatan Database MySQL, Tabel, serta Aneka 
Perintah Query, Relationship (Join) sampai dengan Sub Query (Query 
didalam Query).</li><br><li>Aneka jQuery Pilihan (Menu, Dashboard, Dialog Box, Gallery Photo, 
SlideShow, Grafik/Chart, AutoComplete, ToolTip, Sticky Footer) 
terkoneksi dengan Database, sehingga menghasilkan Website yang 
Informatif.</li><br></ul><br>
<p>Spesifikasi buku:<br>Judul : Trik Menguasai PHP + jQuery Berbasis Linux dan Windows<br>Penulis : Meilan Anastasia M<br>Harga : Rp. <strong>46.500</strong><br>Bonus : CD <br>Tanggal Terbit : 24 Juli 2013</p><br>
<p>Klik <span style=\"text-decoration: underline;\"><a href=\"http://bukulokomedia.com/foto_banner/cover-phplinux.jpg\" target=\"_blank\"><strong>disini</strong></a></span> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-phplinux.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-phplinux.jpg\" alt=\"trik-menguasai-php-jquery-berbasis-linux-dan-windows\" height=\"445\" width=\"600\"></a></p>","Minggu","2014-12-21","14:31:58","642phplinux-miring.jpg","Y","39");
INSERT INTO artikel VALUES("159","Kolaborasi Dahsyat ANDROID dengan PHP dan MySQL","kolaborasi-dahsyat-android-dengan-php-dan-mysql","Y","<p>Siapapun mungkin tidak menyangkal bahwa saat ini Android menjadi 
Sistem Operasi yang sangat populer di ranah mobile, mengingat sifat 
Android yang Open Source membuat semua orang dapat dengan bebas 
mengembangkan maupun menciptakan berbagai aplikasi yang berjalan dalam 
platform Android.</p><br>
<p>Untuk itu, buku ini dirancang untuk orang yang berminat menjadi 
pengembang aplikasi berbasis Sistem Operasi Android. Dalam buku ini akan
 dibahas mengenai Instalasi dan Dasar-Dasar Pemrograman Android seperti 
Pengenalan Konsep Pemrograman Android, UI (User Interface), Layout, 
Widget, Activity, Intent dan Asyncronous Task.</p><br>
<p>Disamping itu, buku ini juga secara khusus membahas mengenai 
Kolaborasi Android dengan PHP dan MySQL yang mengupas bagaimana Aplikasi
 Android memanfaatkan Web Service yang dihasilkan oleh PHP dan database 
MySQL dalam format pertukaran data berupa XML dan JSON. Dan terakhir, 
sebagai bonus akan dibahas pembuatan Proyek Aplikasi Android dengan 
Studi Kasus Aplikasi Portal Berita CMS Lokomedia Versi Android.</p><br>
<p>Spesifikasi buku:<br>Judul : Kolaborasi Dahsyat ANDROID dengan PHP dan MySQL<br>Penulis : Akhmad Dharma Kasman<br>Harga : Rp. <strong>67.000</strong><br>Bonus : CD <br>Tanggal Terbit : 08 Oktober 2013</p><br>
<p>Klik <span style=\"text-decoration: underline;\"><a href=\"http://bukulokomedia.com/foto_banner/cover-android.jpg\" target=\"_blank\"><strong>disini</strong></a></span> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-android.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-android.jpg\" alt=\"kolaborasi-dahsyat-android-dengan-php-dan-mysql\" height=\"447\" width=\"600\"></a></p><br>
<p><strong>DAFTAR ISI</strong>:</p><br>
<p>BAB 1. Pengenalan Android<br>1.1. Sejarah Android<br>1.2. Perkembangan Versi OS Android<br>1.3. Arsitektur Aplikasi Berbasis Android <br>1.4. WebService<br><br>BAB 2. Software Pendukung <br>2.1. Instalasi Java<br>2.2. Instalasi Android SDK<br>2.3. Instalasi Eclipse<br>2.4. Instalasi ADT<br>2.5. Membuat AVD<br>2.6. Instalasi XAMPP<br><br>BAB 3. Membuat Project Android Di Eclipse<br><br>BAB 4. Pengenalan User Interface (UI) <br>4.1. Mengenal Layout &nbsp;<br>4.2. Mengenal View<br><br>BAB 5. Intent<br><br>Bab 6. AsyncTask<br><br>BAB 7. XML <br>7.1. Apa itu XML ?<br>7.2. Struktur Penulisan Dokumen XML<br>7.3. XML Dengan PHP Dan MySQL<br>7.4. Parsing Data XML Ke Android<br><br>BAB 8. JSON<br>8.1. Apa itu JSON?<br>8.2. Struktur Penulisan JSON<br>8.3. JSON Dengan PHP Dan MySQL<br>8.4. Parsing Data JSON Ke Android<br><br>Bab 9. Pengolahan Data MySQL Ke Android<br>9.1. Operasi CRUD Dengan XML <br>9.1.1. Dari Sisi Server (PHP)<br>9.1.2. Dari Sisi Client (Android)<br>9.2. Operasi CRUD Dengan JSON<br>9.2.1. Dari Sisi Server (PHP)<br>9.2.2. Dari Sisi Client (Android)&nbsp;&nbsp; &nbsp;<br><br>BAB 10. Aplikasi Portal Berita CMS Lokomedia<br>BAB 11. Cara menjalankan Project&nbsp; Android Pada Buku <br><br>DAFTAR PUSTAKA</p>","Minggu","2014-12-21","14:31:58","5430android-miring.jpg","Y","10");
INSERT INTO artikel VALUES("160","Responsive Web Design dengan PHP dan Bootstrap","responsive-web-design-dengan-php-dan-bootstrap","Y","<p>Saat ini, pengaksesan Internet melalui Smartphone dan Tablet 
meningkat tajam, bahkan di beberapa negara seperti China dan Korea 
mengalahkan akses Internet melalui PC dan Laptop. Ini tantangan bagi 
pengembang website agar dapat membuat web tampil dengan baik dan cantik 
pada berbagai ukuran layar, baik PC maupun Mobile Phone. \"Solusi terbaik
 untuk mengatasi hal tersebut adalah Responsive Web\" kata Google.</p><br>
<p>Buku ini membahas Framework paling populer untuk membuat Responsive 
Web, yaitu Bootstrap (Twitter Bootstrap). Dengan Bootstrap, Anda bisa 
membuat Responsive dalam waktu singkat, tanpa perlu pusing kepala dengan
 segala macam teknik CSS3, HTML5 ataupun JavaScript untuk merespon 
ukuran layar dari mobile device.</p><br>
<p>Didalam buku ini dibahas Dasar-Dasar Bootstrap serta Fitur-Fitur yang
 terdapat didalamnya, seperti Layout, Grid, Tipografi, Tabel, Form, 
Tombol, Image, Ikon, Menu, Navigasi, JavaScript Plugin, dan 
Komponen-Komponen Lainnya disertai Contoh-Contoh Penggunaannya. Dan di 
bagian akhir akan dibahas Proyek Pembuatan Web Template yang Responsive,
 baik yang berdiri sendiri maupun penerapan Template tersebut pada suatu
 CMS, dalam kasus ini CMS Lokomedia.</p><br>
<p>Spesifikasi buku:<br>Judul : Responsive Web Design dengan PHP dan Bootstrap<br>Penulis : Husein Alatas<br>Harga : Rp. <strong>70.000</strong><br>Bonus : CD <br>Tanggal Terbit : <strong>11 November 2013</strong></p><br>
<p>Klik <span style=\"text-decoration: underline;\"><a href=\"http://bukulokomedia.com/foto_banner/cover-bootstrap.jpg\" target=\"_blank\"><strong>disini</strong></a></span> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-bootstrap.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-bootstrap.jpg\" alt=\"responsive-web-design-dengan-php-dan-bootstrap\" height=\"448\" width=\"600\"></a></p><br>
<p><strong>DAFTAR ISI</strong>:</p><br>
<p>BAB 1. Pengenalan Bootstrap<br>1.1. Apa itu Bootstrap?<br>1.2. Sejarah Bootstrap<br>1.3. Website yang Menggunakan Bootstrap<br>1.4. Download Bootstrap dan Susunan Struktur Filenya<br>1.5. Template Dasar HTML dengan Bootstrap<br>1.6. Cara Mengaktifkan Fitur Responsive Bootstrap<br><br>BAB 2. Grid dan Layout <br>2.1. Apa itu Grid System?<br>2.2. Fixed Grid System<br>2.3. Fluid Grid System<br>2.4. Fixed Layout dan Fluid Layout<br>2.5. Make it Responsive Man!<br>2.6. Cara Kerja Fitur Responsive Bootstrap<br>2.7. Class Pendukung (Helper Class)<br><br>BAB 3. Tipografi, Tabel dan Form<br>3.1. Tipografi (Seni Huruf)<br>3.1.1. Heading (Judul)<br>3.1.2. Body Copy<br>3.1.3. Lead Body Copy<br>3.1.4. Emphasis<br>3.1.5. Text Alignment (Perataan Teks)<br>3.1.6. Abbreviation (Singkatan)<br>3.1.7. Addresses<br>3.1.8. Blockquote (Kutipan Teks)<br>3.1.9. List (Daftar)<br>3.1.10. Code <br>3.2. Tabel<br>3.2.1. Markup Tabel yang Didukung Bootstrap<br>3.2.2. Style Dasar Markup Tabel<br>3.2.3. Class Tambahan Markup Tabel<br>3.3. Form<br>3.3.1. Style Dasar Form<br>3.3.2. Pilihan Layout untuk Form<br>3.3.2.1. Search Form<br>3.3.2.2. Inline Form<br>3.3.2.3. Horizontal Form<br>3.3.3. Elemen Form Control yang Didukung Bootstrap<br>3.3.3.1. Input dan TextArea<br>3.3.3.2. CheckBox dan Radio<br>3.3.3.3. Inline CheckBox<br>3.3.3.4. Select<br>3.3.4. Prepended dan Appended Input<br>3.3.5. Mengatur Ukuran Elemen Form<br>3.3.6. Uneditable Input<br>3.3.7. Form Actions<br>3.3.8. Help Text<br>3.3.9. Form Control States<br>3.3.9.1. Input Focus<br>3.3.9.2. Invalid Input<br>3.3.9.3. Disabled Input<br>3.3.9.4. Validation States<br><br>BAB 4. Button, Image dan Icon<br>4.1. Button (Tombol)<br>4.2. Image (Gambar)<br>4.3. Icon (Ikon)<br>4.3.1. Koleksi Ikon Glyphicons<br>4.3.2. Penggunaan Ikon pada Button<br>4.3.3. Penggunaan Ikon pada Navigasi<br>4.3.4. Penggunaan Ikon pada Form Field<br><br>BAB 5. Menu dan Navigasi<br>5.1. DropDown Menu<br>5.2. Button Group<br>5.3. Button DropDown Menu<br>5.4. Navigation (Navigasi)<br>5.4.1. Basic Navigation Tab<br>5.4.2. Basic Navigation Pill<br>5.4.3. Basic Navigation List<br>5.4.4. Variasi Tampilan Komponen Navigation<br>5.4.5. Tabbable Navigation<br>5.5. Navigation Bar<br>5.5.1. Brand<br>5.5.2. Navigation Link<br>5.5.3. Elemen Form<br>5.5.4. Search Form<br>5.5.5. Meletakkan Komponen Navigation Bar<br>5.5.6. Menggunakan DropDown pada Navigation Bar<br>5.5.7. Mengatur Posisi Navigation Bar<br>5.5.8. Responsive Navigation Bar<br>5.5.9. Inverted Navigation Bar<br><br>Bab 6. Komponen Pelengkap Layout<br>6.1. BreadCrumb<br>6.2. Pagination dan Pager<br>6.3. Labels dan Badges<br>6.4. Komponen Tipografi<br>6.5. Thumbnail<br>6.6. Alert<br>6.7. Progress Bar<br>6.7.1. Progress Bar Dasar<br>6.7.2. Progress Bar Bergaris (Striped)<br>6.7.3. Progress Bar Bergerak (Animated)<br>6.7.4. Progress Bar Bertumpuk (Stacked)<br>6.7.5. Variasi Penggunaan Warna pada Progress Bar<br>6.8. Media Object<br>6.9. Komponen Lain-Lain<br>6.9.1. Well<br>6.9.2. Close Icon<br>6.9.3. Class Pendukung (Helper Class)<br><br>BAB 7. JavaScript Plugin<br>7.1. Bootstrap Data API<br>7.2. Plugin Individual dan Kompilasi<br>7.3. Transition<br>7.4. Modals<br>7.5. Javascript DropDown<br>7.6. ScrollSpy<br>7.7. JavaScript Tabbable Tab<br>7.8. ToolTip<br>7.9. PopOver<br>7.10. JavaScript Alert<br>7.11. Button<br>7.12. Collapse<br>7.13. Carousel<br>7.14. TypeAhead<br>7.15. Affix<br><br>BAB 8. Teknik Merancang Template Bootstrap<br>8.1. Template Dasar Bootstrap<br>8.2. Kustomisasi Paket Bootstrap<br>8.2.1. Kustomisasi Melalui Website Bootstrap<br>8.2.2. Kustomisasi File-File Bootstrap<br>8.3. Membuat Layout Halaman Web<br>8.3.1. Unsur-Unsur Pembentuk Halaman Web<br>8.3.2. Elemen-Elemen Baru HTML5 untuk Layout Web<br>8.3.3. Variasi Layout Web dengan Elemen HTML5 <br>8.3.4. Solusi Problem HTML5 pada Browser Lama<br>8.4. Menerapkan Grid System Bootstrap<br>8.4.1. Fixed Layout<br>8.4.2. Fluid Layout<br>8.5. Membuat Web Template Bootstrap<br><br>BAB 9. Proyek Membuat Web Template (Studi Kasus: CMS Lokomedia)<br>9.1. Mapping Layout dan Elemen CMS Lokomedia<br>9.2. Markup HTML5 untuk Layout Web<br>9.2.1. Header<br>9.2.2. Content<br>9.2.3. Footer<br>9.3. Make it Dynamic!<br>9.3.1. DropDown Menu<br>9.3.2. Konten Utama<br>9.3.3. Konten pada Sidebar<br>9.3.4. Halaman Kedua (Detail Berita)<br>9.4. Fitur Tambahan<br>9.5. Testing! Testing! Testing!</p>","Minggu","2014-12-21","14:31:58","3112bootstrap-miring.jpg","Y","10");
INSERT INTO artikel VALUES("164","Sistem Aplikasi Travel dengan AngularJS dan CodeIgniter","sistem-aplikasi-travel-dengan-angularjs-dan-codeigniter","Y","<p>AngularJS adalah Framework Javascript yang dikembangkan oleh Google 
dan banyak digunakan pada produk-produk yang dibuat oleh Google. 
AngularJS telah menjadi standarisasi untuk keperluan pembuatan Aplikasi 
Web Dinamis dari Sisi Client, karena kemudahan dan kecepatannya dalam 
melakukan komunikasi Server ke Client.</p><br>
<p>Studi kasus yang dibahas adalah pembuatan Sistem Aplikasi Travel yang
 menangani Transaksi Pemesanan dan Penjualan Tiket Travel sampai Proses 
Cetak Tiket. Aplikasi dibuat dengan AngularJS di Sisi Client dan PHP 
Codeigniter di Sisi Server menyediakan Service dalam format JSON yang 
diolah dari database MySQL.</p><br>
<p>Menariknya, tampilan akan dibuat bergaya Metro ala Windows 8 
(BootMetro). Disamping itu, aplikasi bersifat portable, artinya tidak 
perlu instalasi, karena aplikasi didistribusikan dalam format EXE. Perlu
 diketahui bahwa Aplikasi bisa dijalankan di Website, Desktop, maupun 
Mobile berbasis ANDROID, kok bisa??&nbsp; Daripada penasaran, buruan 
pelajarin ilmunya.</p><br>
<p>Spesifikasi buku:<br>Judul : Sistem Aplikasi Travel dengan AngularJS dan Codeigniter<br>Penulis :Agung Julisman<br>Harga : <strong>Rp. 50.000</strong><br>Bonus : CD <br>Tebal Buku : 164 Halaman<br>Dimensi (L x P) : 14 x 21 Cm (Standar)<br>Tanggal Terbit : 1 Agustus 2014</p><br>
<p>Klik <a href=\"http://bukulokomedia.com/foto_banner/cover-angularjs.jpg\" target=\"_blank\"><strong>disini</strong></a> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-angularjs.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-cover-angularjs.jpg\" alt=\"sistem-aplikasi-travel-dengan-angularjs-dan-codeigniter\" height=\"435\" width=\"600\"></a></p><br>
<p>.</p><br>
<p><strong>DAFTAR ISI</strong></p><br>
<p>BAB 1. Pemrograman Javascript&nbsp;&nbsp; &nbsp;<br>1.1. Apa itu Javascript&nbsp;&nbsp; &nbsp;<br>1.2. Komentar dalam Kode Javascript&nbsp;&nbsp; &nbsp;<br>1.3. Tipe Data Primitif, Variabel dan Operator&nbsp;&nbsp; &nbsp;<br>1.4. Kondisi dan Perulangan&nbsp;&nbsp; &nbsp;<br>1.5. Array&nbsp;&nbsp; &nbsp;<br>1.6. Fungsi&nbsp;&nbsp; &nbsp;<br>1.7. Parameter&nbsp;&nbsp; &nbsp;<br>1.8. Object&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br>BAB 2. Pengenalan AngularJS&nbsp;&nbsp; &nbsp;<br>2.1. Apa itu AngularJS?&nbsp;&nbsp; &nbsp;<br>2.2. Konsep dalam AngularJS&nbsp;&nbsp; &nbsp;<br>2.3. Kenapa Harus Memilih AngularJS?&nbsp;&nbsp; &nbsp;<br><br>BAB 3. Directive dan Data Binding&nbsp;&nbsp; &nbsp;<br><br>BAB 4. Scope, View, dan Controller&nbsp;&nbsp; &nbsp;<br><br>BAB 5. Route&nbsp;&nbsp; &nbsp;<br><br>BAB 6. AJAX di AngularJS&nbsp;&nbsp; &nbsp;<br>6.1. Menampilkan Data dengan Teknik AJAX&nbsp;&nbsp; &nbsp;<br>6.2. Insert, Edit, Update, dan Delete Data dengan AJAX&nbsp;&nbsp; &nbsp;<br><br>BAB 7. Notifikasi dengan Angular Growl&nbsp;&nbsp; &nbsp;<br><br>BAB 8. RequireJS&nbsp;&nbsp; &nbsp;<br><br>BAB 9. Framework CSS BootMetro&nbsp;&nbsp; &nbsp;<br>9.1. Persiapan BootMetro&nbsp;&nbsp; &nbsp;<br>9.2. Struktur File BootMetro&nbsp;&nbsp; &nbsp;<br>9.3. Demo BootMetro&nbsp;&nbsp; &nbsp;<br><br>BAB 10. Pengenalan Codeigniter&nbsp;&nbsp; &nbsp;<br><br>BAB 11. Pengenalan NodeWebkit&nbsp;&nbsp; &nbsp;<br>11.1. Apa itu NodeWebkit&nbsp;&nbsp; &nbsp;<br>11.2. Kemampuan NodeWebkit&nbsp;&nbsp; &nbsp;<br><br>BAB 12. Proyek Sistem Aplikasi Travel&nbsp;&nbsp; &nbsp;<br>12.1. Wawancara&nbsp;&nbsp; &nbsp;<br>12.2. Arsitektur&nbsp;&nbsp; &nbsp;<br>12.3. Desain Database&nbsp;&nbsp; &nbsp;<br>12.4. Persiapan Server dan Database&nbsp;&nbsp; &nbsp;<br>12.5. Aplikasi di Sisi Server&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.5.1. Konfigurasi Awal&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.5.2. Membuat Service untuk Login&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.5.3. Membuat Service untuk Shuttle&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.5.4. Membuat Service untuk Jam Keberangkatan&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.5.5. Membuat Service untuk User&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.5.6. Membuat Service untuk Harga&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.5.7. Membuat Service untuk Transaksi Tiket&nbsp;&nbsp; &nbsp;<br>12.6. Aplikasi di Sisi Client&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.6.1. File Utama dan Pendukungnya&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.6.2. Halaman Login&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.6.3. Halaman Utama (Dashboard)&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.6.4. Halaman Pemesanan&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.6.5. Halaman Jadual (Jam Keberangkatan)&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.6.6. Halaman Shuttle&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 12.6.7. Halaman User&nbsp;&nbsp; &nbsp;<br><br>BAB 13. Build Aplikasi Desktop dengan NodeWebkit&nbsp;&nbsp; &nbsp;<br><br>BAB 14. Cara Menjalankan Aplikasi Travel</p>","Minggu","2014-12-21","14:31:58","566angularjs-miring.jpg","Y","35");
INSERT INTO artikel VALUES("166","Proyek Membangun Website dengan Yii Framework","proyek-membangun-website-dengan-yii-framework","Y","<p>Yii Framework sebagai salah satu Framework PHP Terbaik tentu memiliki
 kemampuan dalam menangani fitur-fitur canggih website. Selain sedikit 
membahas Dasar-Dasar Yii Framework, buku ini juga membahas Teknik Yii 
Framework Tingkat Lanjut seperti Widget, Render Partial, Components, 
Tab/Accordion, DAO (Data Access Object), SQL Injection, AJAX (CRUD, 
Paging dan Searching), jQuery, AutoComplete, FullText Searching, Web 
Service (XML dan JSON), Theme Website (Template), Pembuatan Report 
(Laporan) dalam Format Excel dan Word.</p><br>
<p>Pada bagian akhir dibahas Studi Kasus yang cukup kompleks, yaitu 
Proyek Membuat Website Toko Online. Dimulai dari Perancangan Database, 
Layout (Theme), CRUD Category Product Order, Login dan Halaman 
Administrator, Halaman Pengunjung, Halaman Pelanggan (Member), Shopping 
Cart (Keranjang Belanja), Selesai Belanja, Daftar dan Detail Pemesanan 
sampai Konfirmasi Pembayaran.</p><br>
<p>Spesifikasi buku:<br>Judul : Proyek Membangun Website dengan Yii Framework<br>Penulis : Sharive<br>Harga : <strong>Rp. 65.000</strong><br>Bonus : CD <br>Tebal Buku : 264 Halaman<br>Dimensi (L x P) : 14 x 21 Cm (Standar)<br>Tanggal Terbit : 28 Agustus 2014</p><br>
<p>Klik <a href=\"http://bukulokomedia.com/foto_banner/cover-yii2.jpg\" target=\"_blank\"><strong>disini</strong></a> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-yii2.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-yii2.jpg\" alt=\"proyek-membangun-website-yii-framework\" height=\"434\" width=\"600\"></a></p><br>
<p>.</p><br>
<p><strong>DAFTAR ISI</strong></p><br>
<p>BAB 1. Ketemu Lagi dengan Yii Framework&nbsp;&nbsp; &nbsp;</p><br>
1.1. Sejarah Yii Framework&nbsp;&nbsp; &nbsp;<br>1.2. Prospek Yii Framework di Indonesia&nbsp;&nbsp; &nbsp;<br>1.3. Berbicara Tentang GII (Code Generator)&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br>BAB 2. Memahami Asset di Yii Framework (Kasus: Theme Website)&nbsp;&nbsp; &nbsp;<br>2.1. Membuat Theme Website&nbsp;&nbsp; &nbsp;<br>2.2. Content Website dan Integrasi Antar Halaman&nbsp;&nbsp; &nbsp;<br>2.3. Menyembunyikan index.php di Yii Framework&nbsp;&nbsp; &nbsp;<br>2.4. URL SEO Friendly&nbsp;&nbsp; &nbsp;<br><br>BAB 3. Aneka Trik Jitu Yii Framework&nbsp;&nbsp; &nbsp;<br>3.1. Widget dan Render Partial&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1.1. Membuat Widget Tab&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1.2. Membuat Tab dengan Render Partial&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1.3. Accordion&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1.4. Accordion dengan Render Partial&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1.5. Autocomplate Statis&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1.6. Autocomplate Dinamis (Select Semua Data)&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1.7. Autocomplate Dinamis (Ajax Request)&nbsp;&nbsp; &nbsp;<br>3.2. Yii Components&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.2.1. Default Component&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.2.2. Cara Membuat Component&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.2.3. Cara Menggunakan Component&nbsp;&nbsp; &nbsp;<br>3.3. DAO (Data Access Object)&nbsp;&nbsp; &nbsp;<br>3.4. SQL Injection&nbsp;&nbsp; &nbsp;<br>3.5. Solusi SQL Injection (Binding Parameter)&nbsp;&nbsp; &nbsp;<br>3.6. Membuat Laporan Data ke Format Excel&nbsp;&nbsp; &nbsp;<br>3.7. Membuat Laporan Data ke Format Word&nbsp;&nbsp; &nbsp;<br><br>BAB 4. CRUD dengan Teknik Ajax di Yii&nbsp;&nbsp; &nbsp;<br>4.1. Persiapan Tabel dan Model&nbsp;&nbsp; &nbsp;<br>4.2. Create Data Ajax&nbsp;&nbsp; &nbsp;<br>4.3. Read Data Ajax&nbsp;&nbsp; &nbsp;<br>4.4. Update Data Ajax&nbsp;&nbsp; &nbsp;<br>4.5. Delete Data Ajax&nbsp;&nbsp; &nbsp;<br>4.6. Paging Data Ajax&nbsp;&nbsp; &nbsp;<br>4.7. Search Data Ajax&nbsp;&nbsp; &nbsp;<br><br>BAB 5. FullText Searching&nbsp;&nbsp; &nbsp;<br>5.1. Membuat Tabel FullText&nbsp;&nbsp; &nbsp;<br>5.2. Mempelajari Query FullText Searching&nbsp;&nbsp; &nbsp;<br>5.3. FullText Search dengan Yii Framework&nbsp;&nbsp; &nbsp;<br>5.4. Mewarnai Teks Hasil Pencarian&nbsp;&nbsp; &nbsp;<br>5.5. Berbicara Tentang FullText Searching&nbsp;&nbsp; &nbsp;<br><br>BAB 6. Membuat Web Service&nbsp;&nbsp; &nbsp;<br>6.1. Standar Protokol Web Service&nbsp;&nbsp; &nbsp;<br>6.2. Instalasi Tools untuk Testing Web Service&nbsp;&nbsp; &nbsp;<br>6.3. Membuat Component Write XML&nbsp;&nbsp; &nbsp;<br>6.4. Menampilkan Data XML&nbsp;&nbsp; &nbsp;<br>6.5. Menjalankan Web Service dengan POSTMAN&nbsp;&nbsp; &nbsp;<br>6.6. Force XML&nbsp;&nbsp; &nbsp;<br>6.7. Kirim Data XML dengan Method POST&nbsp;&nbsp; &nbsp;<br>6.8. Kirim Data XML dengan Method GET&nbsp;&nbsp; &nbsp;<br><br>BAB 7. Proyek Website Toko Online&nbsp;&nbsp; &nbsp;<br>7.1. Relasi Antar Tabel&nbsp;&nbsp; &nbsp;<br>7.2. Persiapan Database dan Tabel&nbsp;&nbsp; &nbsp;<br>7.3. Membuat Layout Testing&nbsp;&nbsp; &nbsp;<br>7.4. CRUD (Create, Read, Update, Delete)&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.4.1. CRUD Category&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.4.2. CRUD Product&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.4.3. CRUD Data Admin&nbsp;&nbsp; &nbsp;<br>7.5. Login Admin&nbsp;&nbsp; &nbsp;<br>7.6. Membuat Halaman Admin&nbsp;&nbsp; &nbsp;<br>7.7. Membuat Halaman Depan&nbsp;&nbsp; &nbsp;<br>7.8. Membuat Halaman Pelanggan&nbsp;&nbsp; &nbsp;<br>7.9. Shopping Cart (Keranjang Belanja)&nbsp;&nbsp; &nbsp;<br>7.10. Selesai Belanja&nbsp;&nbsp;&nbsp; <br>","Minggu","2014-12-21","14:31:58","8418yii2-miring.jpg","Y","11");
INSERT INTO artikel VALUES("167","Membuat Helpdesk System Berbasis OOP dan PDO dengan PHP","membuat-helpdesk-system-berbasis-oop-dan-pdo-dengan-php","Y","<p>Aplikasi Helpdesk System adalah aplikasi untuk memberikan informasi 
kepada pelanggan atau pengguna terkait dengan produk atau jasa yang 
diberikan. Tujuannya untuk membantu memecahkan masalah pelanggan dengan 
memberikan petunjuk atas masalah atau informasi produk atau jasa yang 
disediakan oleh perusahaan. Biasanya pelanggan akan menyampaikan 
pertanyaannya lewat helpdesk melalui telepon, email, website ataupun 
chatting.</p><br>
<p>Aplikasi Helpdesk System berbasis web dibuat dengan PHP dan MySQL. 
Adapun metode pemrograman PHP yang digunakan adalah OOP (Object Oriented
 Programming) serta&nbsp; PDO (PHP Data Object) untuk class manipulasi 
database MySQL.</p><br>
<p>Pembahasan mencakup Perancangan Database Helpdesk, Halaman Login 
Multiuser, View dengan jQuery DataTables, Form Data Master dan Ticket 
dengan AJAX, Pembuatan Online Pivot Table, Grafik Statistik Helpdesk 
dengan Fusion Chart, Setting Send Email dengan PHP, Setting Scheduled 
Send Email Remainder dengan Batch System.</p><br>
<p><strong>DEMO ONLINE</strong>:</p><br>
<p>Website : <a href=\"http://projects.kampushendra.com/helpdesk/\" target=\"_blank\"><strong>http://projects.kampushendra.com/helpdesk/</strong></a><br>Username : admin<br>Password : password</p><br>
<p><strong>SPESIFIKASI BUKU</strong>:</p><br>
<p>Judul : Membuat Helpdesk System Berbasis OOP dan PDO dengan PHP<br>Penulis : Hendra Santoso<br>Harga : <strong>Rp. 50.000</strong><br>Bonus : CD <br>Tebal Buku : 145 Halaman<br>Dimensi (L x P) : 14 x 21 Cm (Standar)<br>Tanggal Terbit : 15 September 2014</p><br>
<p>Klik <a href=\"http://bukulokomedia.com/foto_banner/cover-helpdesk.jpg\" target=\"_blank\"><strong>disini</strong></a> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-helpdesk.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-helpdesk.jpg\" alt=\"membuat-helpdesk-system-berbasis-oop-dan-pdo-dengan-php\" height=\"436\" width=\"600\"></a></p><br>
<p>.</p><br>
<p><strong>DAFTAR ISI</strong></p><br>
<p>BAB 1. Mengenal Aplikasi Helpdesk System&nbsp;&nbsp;&nbsp; <br>1.1. Alur Kerja Helpdesk System&nbsp;&nbsp;&nbsp; <br>1.2. Fitur Aplikasi Helpdesk&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br>BAB 2. Perancangan Database Helpdesk&nbsp;&nbsp;&nbsp; <br>2.1. Class Diagram&nbsp;&nbsp;&nbsp; <br>2.2. Perancangan Tabel&nbsp;&nbsp;&nbsp; <br>2.3. Implementasi Database Helpdesk dengan MySQL&nbsp;&nbsp;&nbsp; <br><br>BAB 3. Pengenalan OOP dan PDO&nbsp;&nbsp;&nbsp; <br>3.1. Apa itu OOP?&nbsp;&nbsp;&nbsp; <br>3.2. Perancangan Berorientasi Obyek&nbsp;&nbsp;&nbsp; <br>3.3. OOP PHP5&nbsp;&nbsp;&nbsp; <br>3.4. Apa itu PDO?&nbsp;&nbsp;&nbsp; <br>3.5. Setting PDO&nbsp;&nbsp;&nbsp; <br>3.6. Koneksi PDO ke Database MySQL&nbsp;&nbsp;&nbsp; <br>3.7. Menggunakan Fungsi Autoload&nbsp;&nbsp;&nbsp; <br><br>BAB 4. Layout Web Aplikasi Helpdesk&nbsp;&nbsp;&nbsp; <br>4.1. Hirarki Layout Web Aplikasi Helpdesk&nbsp;&nbsp;&nbsp; <br>4.2. Perancangan Halaman Login&nbsp;&nbsp;&nbsp; <br>4.3. Perancangan Halaman Menu Utama&nbsp;&nbsp;&nbsp; <br>4.4. Pembuatan Form Ticket dengan AJAX&nbsp;&nbsp;&nbsp; <br>4.5. Pembuatan Form Change Password&nbsp;&nbsp;&nbsp; <br><br>BAB 5. Pembuatan Halaman User&nbsp;&nbsp;&nbsp; <br>5.1. Perancangan Halaman My Tickets&nbsp;&nbsp;&nbsp; <br>5.2. Perancangan Halaman My Knowledge Base&nbsp;&nbsp;&nbsp; <br><br>BAB 6. Pembuatan Halaman Manager&nbsp;&nbsp;&nbsp; <br>6.1. Perancangan Halaman Helpdesk Statistic&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.1.1. Halaman Pivot Table&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.1.2. Halaman SLA Chart&nbsp;&nbsp;&nbsp; <br><br>BAB 7. Pembuatan Halaman Admin&nbsp;&nbsp;&nbsp; <br>7.1. Perancangan Halaman Data Master&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.1.1. Data Master User&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.1.2. Data Master Customer&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.1.3. Data Master Project&nbsp;&nbsp;&nbsp; <br>7.2. Perancangan Halaman Ticket Admin&nbsp;&nbsp;&nbsp; <br><br>BAB 8. Pembuatan System Log&nbsp;&nbsp;&nbsp; <br>8.1. Perancangan System Log&nbsp;&nbsp;&nbsp; <br>8.2. Halaman User Log&nbsp;&nbsp;&nbsp; <br>8.3. Halaman Email Log&nbsp;&nbsp;&nbsp; <br>8.4. Halaman Email Queue&nbsp;&nbsp;&nbsp; <br><br>BAB 9. Send Email dengan PHP&nbsp;&nbsp;&nbsp; <br>9.1. Setting Send Email dengan PHP&nbsp;&nbsp;&nbsp; <br>9.2. Testing Send Email&nbsp;&nbsp;&nbsp; <br>9.3. Scheduled Send Email Remainder dengan Batch&nbsp; <br></p>","Minggu","2014-12-21","14:31:58","7594helpdesk-miring.jpg","Y","10");
INSERT INTO artikel VALUES("168","Super Web Programming 10 Bahasa 10 Proyek Web","super-web-programming-10-bahasa-10-proyek-web","Y","<p>Dalam buku ini dibahas inti dari 10 bahasa pemrograman yang biasa 
dipakai untuk membuat aplikasi di lingkungan web. Selain itu, disertai 
pula dengan 10 contoh proyek web yang sudah cukup memungkinkan siapapun 
para pembaca (awam) berimajinasi sendiri bikin aplikasi web apapun 
(bernilai jutaan rupiah, atau bahkan ratusan juta rupiah), karena dengan
 mengetahui intinya, mengembangkannya ke model seperti apapun dengan 
bahasa apapun adalah persoalan mudah.</p><br>
<p><strong>DAFTAR ISI</strong></p><br>
<p>BAB. LANGKAH AWAL&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br>BAGIAN I. 10 Web Programming&nbsp;&nbsp; &nbsp;<br>BAB 1. ASP Programming&nbsp;&nbsp; &nbsp;<br>BAB 2. ASP .NET Programming&nbsp;&nbsp; &nbsp;<br>BAB 3. Flash Programming&nbsp;&nbsp; &nbsp;<br>BAB 4. HTML5 (PhoneGap) Programming&nbsp;&nbsp; &nbsp;<br>BAB 5. JavaScript (AJAX) Programming&nbsp;&nbsp; &nbsp;<br>BAB 6. JavaScript (jQuery) Programming&nbsp;&nbsp; &nbsp;<br>BAB 7. JSP Programming&nbsp;&nbsp; &nbsp;<br>BAB 8. PHP Programming&nbsp;&nbsp; &nbsp;<br>BAB 9. VBScript Programming&nbsp;&nbsp; &nbsp;<br>BAB 10. Python/CGI Programming&nbsp;&nbsp; &nbsp;<br>BAB 11. Membuat Form dari Nol&nbsp;&nbsp; &nbsp;<br>BAB 12. Web Reporting&nbsp;&nbsp; &nbsp;<br>BAB 13. Publikasi Online&nbsp;&nbsp; &nbsp;<br><br>BAGIAN II. 10 Proyek Web&nbsp;&nbsp; &nbsp;<br>BAB 14. PHP Barcode&nbsp;&nbsp; &nbsp;<br>BAB 15. PHP GMAP&nbsp;&nbsp; &nbsp;<br>BAB 16. PHP Something Recognition&nbsp;&nbsp; &nbsp;<br>BAB 17. PHP Mail&nbsp;&nbsp; &nbsp;<br>BAB 18. PHP Flash (SWF)&nbsp;&nbsp; &nbsp;<br>BAB 19. PHP File&nbsp;&nbsp; &nbsp;<br>BAB 20. PHP Shop&nbsp;&nbsp; &nbsp;<br>BAB 21. PHP Search Engine&nbsp;&nbsp; &nbsp;<br>BAB 22. PHP Sisfo Kampus&nbsp;&nbsp; &nbsp;<br>BAB 23. PHP Document Flow&nbsp;&nbsp; &nbsp;<br><br>BAGIAN III. Lampiran: Petunjuk Instalasi&nbsp;&nbsp; &nbsp;<br>IIS (Internet Information Services)&nbsp;&nbsp; &nbsp;<br>XAMPP &nbsp;&nbsp; &nbsp;<br>Tomcat &nbsp;&nbsp; &nbsp;<br>Macromedia Flash 8&nbsp;&nbsp; &nbsp;<br>JDK (Java Development Kit)&nbsp;&nbsp; &nbsp;<br>Python &nbsp;&nbsp;&nbsp; &nbsp;<br>MySQL Python&nbsp;&nbsp; &nbsp;<br>MySQL Connector ODBC&nbsp;&nbsp; &nbsp;<br>Trik Menjalankan Xampp dan IIS Sekaligus</p><br>
<p><strong>SPESIFIKASI BUKU:<br></strong></p><br>
<p>Judul : Super Web Programming 10 Bahasa 10 Proyek Web<br>Penulis : Fritz Gamaliel<br>Harga : <strong>Rp. 50.000</strong><br>Bonus : -<br>Tebal Buku : 260 Halaman<br>Dimensi (L x P) : 14 x 21 Cm (Standar)<br>Tanggal Terbit : 10 November 2014</p><br>
<p>Klik <a href=\"http://bukulokomedia.com/foto_banner/cover-superweb.jpg\" target=\"_blank\"><strong>disini</strong></a> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-superweb.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-superweb.jpg\" alt=\"super-web-programming-10-bahasa-10-proyek-web\" height=\"437\" width=\"600\"></a></p><br>
<p>.</p>","Minggu","2014-12-21","14:31:58","4425superweb-miring.jpg","Y","144");
INSERT INTO artikel VALUES("169","Program Absensi Siswa Realtime dengan PHP dan SMS Gateway","program-absensi-siswa-realtime-dengan-php-dan-sms-gateway","Y","<p>Program Absensi Siswa digunakan untuk memantau para siswa terkait 
dengan tingkat kedisiplinan dalam proses belajar di sekolah, dimana 
tingkat kedisipilinan kehadiran siswa menjadi salah satu tolok ukur 
dalam proses penilaian.</p><br>
<p>Beberapa program absensi yang penulis amati saat ini, ternyata 
dirasakan masih kurang efektif menurut para orang tua siswa, dimana 
mereka tidak bisa mengetahui apakah anak mereka&nbsp; benar-benar masuk 
sekolah atau tidak. Untuk itulah, dibuat sebuah Sistem Absensi Realtime,
 dimana&nbsp; <strong>apabila para siswa tidak mengikuti salah satu mata 
pelajaran saja, maka sistem secara otomatis akan memberikan informasi 
via SMS langsung ke nomor HP orang tua siswa</strong>.</p><br>
<p>Hal ini dimungkinkan, karena Program Absensi Siswa Realtime menggunakan teknologi <strong>SMS Gateway</strong> yang digabungkan dengan pemrograman web <strong>PHP</strong> dan <strong>MySQL</strong>. Selain itu, interface program dibuat <strong>Responsive</strong> menggunakan <strong>Bootstrap</strong>, sehingga tampilannya tetap bagus meskipun diakses melalui Smartphone.</p><br>
<p><strong>SPESIFIKASI BUKU</strong>:</p><br>
<p>Judul : Program Absensi Siswa Realtime dengan PHP dan SMS Gateway<br>Penulis : Aminudin<br>Harga : <strong>Rp. 45.000</strong><br>Bonus : CD <br>Tebal Buku : 111 Halaman<br>Dimensi (L x P) : 14 x 21 Cm (Standar)<br>Tanggal Terbit : 13 Desember 2014</p><br>
<p>Klik <a href=\"http://bukulokomedia.com/foto_banner/cover-absensi.jpg\" target=\"_blank\"><strong>disini</strong></a> untuk melihat cover gambar dalam ukuran yang lebih besar.</p><br>
<p><a href=\"http://bukulokomedia.com/foto_banner/cover-absensi.jpg\" target=\"_blank\"><img src=\"http://bukulokomedia.com/redam/gambar/image/small-absensi.jpg\" alt=\"program-absensi-siswa-realtime-dengan-php-dan-sms-gateway\" height=\"435\" width=\"600\"></a></p><br>
<p>.</p><br>
<p><strong>DAFTAR ISI</strong></p><br>
BAB 1. Pendahuluan&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br>BAB 2. Perancangan Sistem&nbsp;&nbsp;&nbsp; <br>2.1. Kebutuhan Sistem&nbsp;&nbsp;&nbsp; <br>2.2. Mengenai SMS Gateway&nbsp;&nbsp;&nbsp; <br>2.3. Desain dan Perancangan Sistem&nbsp;&nbsp;&nbsp; <br>2.4. Perancangan Database&nbsp;&nbsp;&nbsp; <br><br>BAB 3. Setting SMS Gateway&nbsp;&nbsp;&nbsp; <br><br>BAB 4. Membuat Halaman Login&nbsp;&nbsp;&nbsp; <br>4.1. Halaman Login&nbsp;&nbsp;&nbsp; <br>4.2. Mengecek Password&nbsp;&nbsp;&nbsp; <br>4.3. Halaman Utama User&nbsp;&nbsp;&nbsp; <br><br>BAB 5. Mengelola Data Siswa&nbsp;&nbsp;&nbsp; <br>5.1. Input Data Siswa&nbsp;&nbsp;&nbsp; <br>5.2. Proses Penyimpanan Data Siswa&nbsp;&nbsp;&nbsp; <br>5.3. Menampilkan Data Siswa Per Kelas&nbsp;&nbsp;&nbsp; <br>5.4. Menampilkan Data Siswa&nbsp;&nbsp;&nbsp; <br>5.5. Edit Data Siswa&nbsp;&nbsp;&nbsp; <br>5.6. Detail Data Siswa&nbsp;&nbsp;&nbsp; <br>5.7. Delete Data Siswa&nbsp;&nbsp;&nbsp; <br><br>BAB 6. Membuat Halaman Absensi&nbsp;&nbsp;&nbsp; <br>6.1. Langkah-Langkah Pembuatan&nbsp;&nbsp;&nbsp; <br>6.2. Privilege User Guru&nbsp;&nbsp;&nbsp; <br>6.3. Halaman Utama Absensi&nbsp;&nbsp;&nbsp; <br>6.4. Halaman Input Absensi&nbsp;&nbsp;&nbsp; <br>6.5. Proses Kirim SMS dan Simpan Data ke Database&nbsp;&nbsp;&nbsp; <br><br>BAB 7. Membuat Laporan Data Absensi&nbsp;&nbsp;&nbsp; <br>7.1. Langkah-Langkah Pembuatan&nbsp;&nbsp;&nbsp; <br>7.2. Privilege User Siswa&nbsp;&nbsp;&nbsp; <br>7.3. Halaman Utama Siswa&nbsp;&nbsp; <br>7.4. Hasil Laporan Absensi&nbsp;&nbsp;&nbsp; <br><br>BAB 8. Panduan Menggunakan Program Absensi&nbsp;&nbsp;&nbsp; <br>8.1. Setting Kebutuhan Sistem&nbsp;&nbsp;&nbsp; <br>8.2. Alur/Urutan Menggunakan Sistem&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.2.1. Login&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.2.2. Input Data Siswa&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.2.3. Input Data Guru&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.2.4. Input Absensi Siswa&nbsp;&nbsp;&nbsp; <br><br>BAB 9. Problem &amp; Solving&nbsp;&nbsp;&nbsp; <br>","Minggu","2014-12-21","14:31:58","3410absensi-miring.jpg","Y","37");

DROP TABLE IF EXISTS banner;

CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `posisi` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT 'kiri',
  `urutan` int(11) NOT NULL,
  `new_window` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO banner VALUES("40","Banner Samping","","static1.jpg","2014-12-21","Y","Banner_Kanan_Atas","1","N");
INSERT INTO banner VALUES("41","Banner Samping","","static2.jpg","2014-12-21","Y","Banner_Kanan_Bawah","1","N");
INSERT INTO banner VALUES("49","Welcome","#","15banner02.jpg","2014-11-23","Y","Banner_Utama","2","N");
INSERT INTO banner VALUES("48","Welcome","#","1banner01.jpg","2014-11-23","Y","Banner_Utama","1","N");
INSERT INTO banner VALUES("46","Banner Bawah","#","31add3.jpg","2014-12-31","Y","Banner_Kaki","1","Y");
INSERT INTO banner VALUES("47","Banner Produk","","56banner_h.jpg","2014-12-05","Y","Banner_Produk","1","N");
INSERT INTO banner VALUES("50","Banner Sidebar","","61block.jpg","2014-12-31","Y","Banner_Sidebar","1","Y");

DROP TABLE IF EXISTS download;

CREATE TABLE `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO download VALUES("3","Membuat Shopping Cart dengan PHP","shopping cart.pdf","2014-11-25","24");
INSERT INTO download VALUES("1","Kalender Tahun 2009","kalender2009.rar","2009-02-06","19");
INSERT INTO download VALUES("13","Skrip Captcha","captcha.rar","2014-12-18","7");
INSERT INTO download VALUES("14","Wallpaper PHP","PHP_weapon.jpg","2014-12-18","5");
INSERT INTO download VALUES("15","Slide Pemrograman VBA Excell","Excell_VBA.ppt","2014-12-18","16");
INSERT INTO download VALUES("16","Script Shopping Cart","shopping cart.pdf","2014-12-18","12");
INSERT INTO download VALUES("17","Kalender","kalender2009.rar","2014-12-18","4");
INSERT INTO download VALUES("18","Wallpaper","PHP_weapon.jpg","2014-12-18","3");
INSERT INTO download VALUES("19","Captcha","captcha.rar","2014-12-18","6");
INSERT INTO download VALUES("20","Presentasi Pemrograman","Excell_VBA.ppt","2014-12-18","11");
INSERT INTO download VALUES("21","Script Toko Online","shopping cart.pdf","2014-12-18","12");

DROP TABLE IF EXISTS gallery;

CREATE TABLE `gallery` (
  `id_gallery` int(5) NOT NULL AUTO_INCREMENT,
  `id_album` int(5) NOT NULL,
  `jdl_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gallery_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO gallery VALUES("26","1","Persiapan_23","persiapan_23","","");
INSERT INTO gallery VALUES("27","1","Persiapan_24","persiapan_24","","");
INSERT INTO gallery VALUES("25","1","Persiapan_22","persiapan_22","","");
INSERT INTO gallery VALUES("24","1","Persiapan_21","persiapan_21","","");
INSERT INTO gallery VALUES("23","1","Persiapan_20","persiapan_20","","");
INSERT INTO gallery VALUES("22","1","Persiapan_19","persiapan_19","","");
INSERT INTO gallery VALUES("6","1","Persiapan_06","persiapan_06","Paking Barang2","");
INSERT INTO gallery VALUES("7","1","Persiapan_07","persiapan_07","","");
INSERT INTO gallery VALUES("8","1","Persiapan_08","persiapan_08","","");
INSERT INTO gallery VALUES("9","1","Persiapan_09","persiapan_09","","");
INSERT INTO gallery VALUES("10","1","Persiapan_10","persiapan_10","","");
INSERT INTO gallery VALUES("11","1","Persiapan_11","persiapan_11","","");
INSERT INTO gallery VALUES("12","1","Persiapan_12","persiapan_12","","");
INSERT INTO gallery VALUES("13","1","Persiapan_13","persiapan_13","","");
INSERT INTO gallery VALUES("14","1","Persiapan_14","persiapan_14","","");
INSERT INTO gallery VALUES("15","1","Persiapan_15","persiapan_15","","");
INSERT INTO gallery VALUES("16","1","Persiapan_16","persiapan_16","","");
INSERT INTO gallery VALUES("17","1","Persiapan_17","persiapan_17","","");
INSERT INTO gallery VALUES("18","1","Persiapan_18","persiapan_18","","");
INSERT INTO gallery VALUES("28","1","Persiapan_25","persiapan_25","","");
INSERT INTO gallery VALUES("29","1","Persiapan_26","persiapan_26","","");

DROP TABLE IF EXISTS halaman;

CREATE TABLE `halaman` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `tampil_judul` enum('Y','N') NOT NULL DEFAULT 'Y',
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sidebar` varchar(5) NOT NULL,
  `disable` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO halaman VALUES("1","Konfirmasi Pembayaran","konfirmasi-pembayaran","				<p>Terima kasih atas pembayaran yang telah anda lakukan. Silahkan konfirmasi pembayaran anda melalui SMS / Pesan dengan Format :</p>				<p><strong>Bank Asal</strong> [Garis Miring] <strong>Nama Rekening Pengirim</strong> [Garis Miring] <strong>Bank Tujuan</strong> [Garis Miring] <strong>Tanggal Transfer</strong> [Garis Miring] <strong>Jumlah Transfer</strong></p>				<p>Contoh : <strong>BRI</strong><span class=\"border_box\"></span> / <strong>Aria Kusuma</strong> / <strong>MANDIRI</strong> / <strong>07.10.2014</strong> / <strong>200.000</strong></p>				<p>Kirim ke salah satu kontak berikut :</p>				<ul>					<li><span style=\"font-weight: bold;\">0812 2830 8000</span>  ( TELKOMSEL )</li>					<li><b>0856 4379 1400</b> ( IM3 )</li>					<li><span style=\"float:left\"><span style=\"font-weight: bold;\">7478D065</span>&nbsp;</span> ( BBM )</li>				</ul>","2014-12-18","Y","Y","left","Y");
INSERT INTO halaman VALUES("2","Pengiriman & Pengembalian","pengiriman--pengembalian","				<p><strong>SYARAT &amp; KETENTUAN PROSEDUR PENGIRIMAN PRODUK :</strong></p>				<ul>					<li>Produk yang dibeli baru akan dikirim apabila customer telah berhasil melakukan payment (pembayaran), baik itu melalui &nbsp;Bank Transfer (ATM, e-banking, m-banking), BCA Klikpay, Mandiri Clickpay ataupun Mastercard dan Visa.</li>					<li>Produk akan dikirimkan menggunakan jasa layanan logistik yang telah anda pilih/tentukan pada proses pembelian. Produk akan dikirimkan menggunakan jasa Logistik <strong>JNE, TIKI dan POS Indonesia.<br></strong></li>					<li>Setelah customer melakukan pembayaran, produk akan memerlukan waktu sekitar <strong>maksimum 1 hari</strong> &nbsp;untuk dipersiapkan sebelum dikirim. Setelah itu, produk akan dikirim dan akan sampai ke customer dengan estimasi waktu <strong>minimum 2 hari</strong> dan <strong>maksimum 7 hari (dari tanggal setelah payment dilakukan) dan berlaku pada order di hari kerja (Senin-Sabtu)</strong></li>					<li>Apabila customer melakukan order pada hari week-end (Minggu/Hari Besar), maka proses pengiriman produk di nomor 3 baru dapat dilakukan dimulai pada hari Senin/hari kerja.</li>				</ul>				<p>&nbsp;</p>				<p><strong>SYARAT &amp; KETENTUAN PROSEDUR PENGEMBALIAN PRODUK :</strong></p>				<p>Customer dapat melakukan permohonan pengembalian/retur produk apabila :</p>				<ul>					<li>Setelah produk sampai ke tangan customer, customer bisa langsung mengecek kondisi dan kelengkapan produk di hadapan pihak pengirim (logistik).&nbsp;</li>					<li>Apabila ketika produk sampai ke alamat customer, namun penerima paket BUKAN customer yang membeli produk, maka customer dapat mengecek kondisi dan kelengkapan produk, dan melakukan <strong>CLAIM/KOMPLAIN </strong>ke bukulokomedia.com, via telpon (pada jam kerja) atau via BBM Pin 7478D065 <strong>MAKSIMAL 1x24 JAM. (oleh karena itu dihimbau bagi customer untuk melakukan konfirmasi via Telp, SMS &amp; BBM jika produk telah diterima)</strong></li>					<li>Setelah melakukan konfirmasi claim/komplain, customer dapat mengirimkan kembali produk yang dirasa kurang lengkap/dalam kondisi rusak ke bukulokomedia.com. Ongkir pengembalian produk ke bukulokomedia.com merupakan <strong>tanggung jawab pembeli.</strong></li>					<li>Produk yang dikembalikan ke bukulokomedia.com akan dicek mengenai kelengkapan/kondisi sesuai dengan komplain customer. Apabila kondisi produk masih dapat diperbaiki, maka <strong>TIDAK AKAN DILAKUKAN FULL REPLACEMENT/PENGGANTIAN DENGAN PRODUK BARU</strong>. Produk yang diganti dengan produk baru adalah produk yang kondisi nya rusak parah/mati total/tidak dapat diperbaiki.</li>					<li>Semua ongkos kirim (kembali ke customer pasca service) dan biaya service merupakan tanggungan bukulokomedia.com. (Jika komplain dilakukan dalam kurun waktu 1x24 jam pasca produk sampai di tangan customer)</li>				</ul>","2014-12-18","Y","Y","full","Y");
INSERT INTO halaman VALUES("3","Garansi","garansi","				<p><strong>JAMINAN GARANSI</strong></p>				<p>Kami memberikan jaminan garansi untuk semua produk yang dijual dari bukulokomedia.com. Yakinkan semua produk yang anda beli dari bukulokomedia.com dilengkapi dengan Sticker / Kartu Tanda Jaminan Garansi / Invoice dari bukulokomedia.com. Perhatikan jaminan garansi yang diberikan, bila anda kurang jelas hubungi kami.</p>				<p><strong>SYARAT UMUM GARANSI:</strong></p>				<ul>					<li>Untuk produk-produk yang termasuk dalam batasan garansi, maka pembeli akan menikmati jaminan garansi pengiriman produk dan cacat produk.</li>					<li>Untuk produk yang berupa alat, bukulokomedia.com tidak menjamin semua peralatan yang dibeli sesuai dengan spesifikasi akan bekerja secara baik dan bebas dari kerusakan. bukulokomedia.com tidak bertanggung jawab atas kekurangan-kekurangan akibat design dari manufaktur.</li>									</ul>				<p>&nbsp;</p>				<ul>				</ul>				<p><strong>BATASAN GARANSI:</strong></p>				<ul>					<li>Garansi tidak berlaku untuk produk-produk yang habis terpakai misalnya cairan, baterai, pasta dan lain sebagainya.</li>					<li>Garansi tidak berlaku apabila pembeli dengan sengaja / tidak sengaja merusak segel garansi yang tertempel pada setiap produk yang dibeli. Garansi juga tidak berlaku untuk kejadian-kejadian berikut ini:      						<ul>							<li>Kerusakan akibat bencana alam (gempa, kebakaran, banjir, petir, dll) huru hara, gigitan atau tindakan-tindakan binatang, tegangan listrik yang tidak stabil, kesalahan atau kelalaian pemakai (jatuh, terkena air/cairan kimia dll) </li>							<li>Pengurangan atau penambahan peralatan aksesoris lain tanpa sepengetahuan bukulokomedia.com</li>							<li>Telah diperbaiki personal yang bukan dari bukulokomedia.com (Service Center)</li>							<li>Merubah atau memodifikasi peralatan yang ditanggung</li>							<li>Transportasi atau instalasi ulang yang salah.</li>							<li>Kerusakan akibat dihubungkan dengan peralatan lain baik secara mekanis maupun secara elektronis</li>							<li>Terkena serangan virus</li>							<li>Kesalahan instalasi perangkat/alat</li>							<li>Alat dan sejenisnya yang terganggu karena kotor</li>						</ul>					</li>				</ul>				<p>&nbsp;</p>				<p><strong>PEMBELIAN LUAR KOTA:<br></strong></p>				<ul>					<li>Untuk Anda yang membeli dari luar kota, kami juga memberikan jaminan pada semua produk yang Anda beli. Bila terjadi kerusakan, silakan hubungi Customer Service kami di 0856 4379 1400,  chat via BBM (Pin 7478D065), atau hubungi kami via menu \"HUBUNGI KAMI\" pada website untuk bantuan teknis</li>					<li>Atas saran dari Customer Service kami atau bila setelah bantuan teknis kondisi produk tetap tidak berfungsi, maka silakan kirim kembali produk yang Anda beli ke alamat toko kami. Nantinya biaya pengiriman kembali produk yang sudah kami perbaiki akan menjadi tanggungan kami untuk menjamin garansi dan kualitas produk yang kami jual adalah baik.</li>				</ul>				<p>&nbsp;</p>				<p><strong>KONSULTASI:<br></strong></p>				<ul>					<li>Untuk konsultasi, anda silakan datang ke toko kami atau hubungi customer service kami di Telp : 0856 4379 1400, BBM: 7478D065. untuk memperlancar pelayanan, sangat mengharapkan Anda mempersiapkan segala data dan informasi yang dimiliki sebelum menghubungi kami. Data-data tersebut al. Nama / tipe Produk, rincian permasalahan, setting yang mungkin ada dan bila memungkinkan, Anda berada didekat product yang bermasalah saat Anda menghubungi kami.</li>				</ul> ","2014-12-18","Y","Y","full","Y");
INSERT INTO halaman VALUES("4","Sangkalan","sangkalan","				<p style=\"text-align: center;\"><strong>Pasal Sanggahan / Pelepasan Tanggung Jawab<br></strong></p><p><strong>UMUM</strong></p>				<ul>					<li>Ketentuan dari pelepasan tanggung jawab ini (untuk selanjutnya disebut dengan “Pelepasan Tanggung Jawab”) berlaku atas situs web ini bukulokomedia.com ( BLC ) dari Toko LOKOMEDIA Yogyakarta, dengan alamat toko di Jl. Jambon. Perum. Pesona Alam Hijau 2 No. B-4, Kricak, Yogyakarta. Harap baca Pelepasan Tanggung Jawab ini secara saksama.</li>					<li>Dengan mengakses situs web ini dan atau menggunakan informasi yang disediakan pada atau melalui situs web ini, Anda setuju untuk terikat dengan Pelepasan Tanggung Jawab ini. Jika terjadi pertentangan antara persyaratan dan ketentuan dari produk dan layanan tertentu dengan Pelepasan Tanggung Jawab ini, kondisi yang spesifik kepada produk dan layanan tersebut akan tetap berlaku.</li>					<li>BLC berdiri di Yogyakarta dengan bentuk usaha mandiri/komanditer/perseroan.</li>				</ul>				<p><strong>PENGGUNAAN SITUS WEB INI</strong></p>				<ul>					<li>Informasi yang diberikan pada atau melalui situs web ini tidak boleh digunakan sebagai pengganti segala bentuk nasihat. Keputusan yang didasarkan pada informasi ini adalah untuk kepentingan dan risiko Anda sendiri.</li>					<li>Walaupun BLC berupaya untuk memberikan informasi yang akurat, lengkap dan mutakhir, yang telah diperoleh dari sumber yang dianggap andal, BLC tidak menjamin atau menyatakan, mengungkapkan atau menyiratkan, mengenai sifat informasi yang diberikan pada atau melalui situs web ini akurat, lengkap, atau mutakhir.</li>					<li>BLC mengontrol dan memelihara situs web ini dari Yogyakarta dan tidak menyatakan bahwa informasi yang disediakan pada atau melalui situs web ini sesuai atau tersedia untuk digunakan di lokasi lain. Jika Anda menggunakan situs web ini dari lokasi lain, Anda bertanggung jawab untuk mematuhi hukum setempat yang berlaku.</li>					<li>BLC tidak menyatakan atau menjamin bahwa fungsi dari situs web ini bebas dari kesalahan atau gangguan.</li>					<li>Penggunaan situs web ini yang dapat menghalangi pengguna Internet yang lain, yang dapat membahayakan/menggagalkan fungsi dari situs web dan/atau informasi yang disediakan pada atau melalui situs web ini atau perangkat lunak yang ada, tidak diizinkan.</li>				</ul>				<p><strong>INFORMASI PIHAK KETIGA, PRODUK, DAN LAYANAN</strong></p>				<p>Jika BLC menyediakan hypertext ke situs web pihak ketiga, tautan dari setiap produk atau layanan yang disediakan pada atau melalui situs web tersebut bukanlah merupakan bentuk dukungan dari BLC . Penggunaan <em>link</em> seperti itu sepenuhnya merupakan risiko Anda sendiri dan BLC tidak bertanggung jawab atau berkewajiban atas isi atau materi, penggunaan atau ketersediaan dari situs web seperti itu. BLC tidak memverifikasi kebenaran, akurasi, kelayakan, keandalan, dan kelengkapan setiap isi atau materi dari situs web seperti itu.</p>				<p><strong>HAK MILIK INTELEKTUAL</strong></p>				<p>BLC, atau pemilik yang terkait, memegang semua hak (termasuk hak cipta, merek dagang, paten dan juga hak cipta intelektual lainnya) yang terkait dengan informasi yang disediakan pada atau melalui situs web ini (termasuk semua teks, grafik, dan logo). Anda tidak dapat menyalin, mengunduh, menerbitkan, mendistribusikan, memperbanyak setiap informasi yang ada pada situs web ini dalam bentuk apa pun tanpa persetujuan tertulis sebelumnya dari BLC atau persetujuan yang sesuai dari pemilik. Namun demikian, Anda dapat mencetak dan/atau mengunduh informasi yang ada pada situs web ini untuk penggunaan pribadi Anda.</p>				<p><strong>KOMUNIKASI MELALUI INTERNET</strong></p>				<p>Pesan yang Anda kirim ke BLC melalui email mungkin tidak aman. BLC menyarankan agar Anda tidak mengirim informasi rahasia apa pun kepada BLC melalui email. Jika Anda memilih untuk mengirim pesan apa pun kepada BLC melalui email, Anda menerima risiko bahwa pesan tersebut dapat dicegat, disalahgunakan, dan diubah oleh pihak ketiga.</p>				<p><strong>PENGECUALIAN KEWAJIBAN</strong></p>				<p>BLC tidak akan bertanggung jawab atas setiap kerugian langsung, tidak langsung, khusus, insidental, karena akibat, karena hukuman, termasuk hilangnya keuntungan (walaupun jika BLC diberitahukan mengenai kemungkinan &nbsp;hal tersebut) yang muncul karena bentuk apa saja, termasuk namun tidak terbatas kepada, 				</p><ul>					<li>(i) setiap cacat, virus, dan bentuk malfungsi lainnya yang terjadi ke peralatan mana saja dan perangkat lunak lainnya yang terkait dengan akses atau penggunaan situs web ini, </li>					<li>(ii) informasi yang disediakan pada atau melalui situs web ini, </li>					<li>(iii) pencegatan, perubahan, atau penyalahgunaan informasi yang diberikan kepada BLC atau dikirim kepada Anda, </li>					<li>(iv) berfungsi atau ketidaktersediaan situs web ini, </li>					<li>(v) penyalahgunaan situs web ini, </li>					<li>(vi) kehilangan data, </li>					<li>(vii) pengunduhan atau penggunaan setiap perangkat lunak yang tersedia di situs web ini, atau </li>					<li>(viii) tuntutan pihak ketiga yang terkait dengan penggunaan situs web ini.</li>				</ul>				<p></p>				<p><strong>HUKUM YANG BERLAKU</strong></p>				<ul>					<li>Situs web ini dan Pelepasan Tanggung Jawabnya akan diatur dan dijelaskan sesuai dengan hukum Republik Indonesia. Semua pertikaian yang muncul karena atau terkait dengan Pelepasan Tanggung Jawab ini akan diserahkan kepada yurisdiksi eksklusif di Pengadilan Negeri Yogyakarta.</li>					<li>Jika terjadi pertentangan atau perbedaan dalam penafsiran antara versi bahasa yang berbeda dari Pelepasan Tanggung Jawab ini, maka versi bahasa Inggris yang akan berlaku.</li>				</ul>				<p><strong>AMANDEMEN</strong></p>				<p>BLC berhak untuk mengubah informasi yang disediakan pada atau melalui situs web termasuk ketentuan dalam Pelepasan Tanggung Jawab ini, kapan saja dan tanpa pemberitahuan. Anda disarankan untuk memeriksa kembali setiap perubahan informasi yang disediakan pada atau melalui situs web ini, termasuk persyaratan dalam Pelepasan Tanggung Jawab ini secara berkala.</p>","2014-12-18","N","Y","full","Y");
INSERT INTO halaman VALUES("5","Syarat & Ketentuan","syarat--ketentuan","				<p><strong>PENDAHULUAN</strong></p>				<p>Dengan mengakses atau menggunakan situs bukulokomedia.com, Pengguna dianggap telah memahami dan menyetujui semua isi dalam syarat dan ketentuan di bawah ini. Syarat dan ketentuan dapat diubah atau diperbaharui sewaktu-waktu tanpa ada pemberitahuan terlebih dahulu. Perubahan dari syarat dan ketentuan akan segera berlaku setelah dicantumkan di dalam situs bukulokomedia.com. Jika Pengguna merasa keberatan terhadap syarat dan ketentuan yang kami ajukan dalam Perjanjian ini, maka kami anjurkan untuk tidak menggunakan situs ini.				&nbsp;<br><br><strong>TRANSAKSI PEMBELIAN</strong>				</p>				<ul>					<li>Kami selalu berusaha untuk mencantumkan harga terbaru. Namun untuk meyakinkan harga terakhir, silakan kontak ke customer service kami, menghubungi nomor 0856 4379 1400 ataupun Pin BBM 7478D065. Harga dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya.</li>					<li>Tarif pengiriman dengan jasa ekspedisi disesuaikan dengan tarif yang diberlakukan oleh pihak ekspedisi berdasarkan pada wilayah tujuan, jenis layanan, dan berat paket yang akan dikirim.&nbsp;</li>					<li>Untuk pembelian online melalui website, pesanan dan pengiriman akan diproses setelah pembayaran diterima oleh rekening bank atas nama KHANAFI SAIPUDIN. Lama waktu pengiriman disesuaikan dengan area layanan daerah tujuan. Untuk pengiriman yang yang menggunakan ekspedisi, kami menggunakan JNE, TIKI dan POS Indonesia dengan disertai asuransi (jika anda menginginkan) untuk mencegah kehilangan atau kerusakan selama dalam perjalanan.</li>					<li>Bila Anda ingin menggunakan jasa ekspedisi selain disebutkan diatas, silakan informasikan kepada kami. Namun jaminan pengiriman sampai ke tempat tujuan sepenuhnya berada di pihak pembeli.</li>					<li>Setiap produk yang dibeli dari bukulokomedia.com dilengkapi dengan masa garansi yang disesuaikan dengan garansi pabrik masing-masing produk. Silakan klik garansi untuk informasi selengkapnya.</li>					<li>Produk yang telah dibeli tidak dapat dikembalikan atau ditukar dengan produk lain, kecuali ada perjanjian terlebih dahulu.</li>					<li>Segala usaha maksimal telah dilakukan untuk menyakinkan ketepatan seluruh informasi yang dimuat. bukulokomedia.com tidak menjamin dengan segala hormat akan ketepatan data tersebut, termasuk spesifikasi produknya maupun editorial.</li>					<li>Jika dalam masa garansi, terjadi kerusakan pada produk, silakan menghubungi kami di No. 0856 4379 1400 ataupun Pin BBM 7478D065.</li>					<li>Bila bantuan melalui telephone tidak berhasil, silakan kirim kembali produk yang rusak kepada kami. Biaya pengiriman kembali produk yang telah ditukar akan menjadi tanggungan kami, dengan demikian kami memiliki tanggung jawab untuk memberikan produk yang berkualitas baik.</li>					<li>Anda akan menerima email notifikasi mengenai Nomor Resi Pengiriman sesaat setelah produk pesanan Anda dikirim. Anda juga dapat memantau status pesanan Anda secara langsung dengan menuju ke website ekspedisi yang dipilih.</li>					<li>Untuk mengetahui tarif pengiriman, dapat anda hubungi kami di No. 0856 4379 1400 ataupun Pin BBM 7478D065.</li>				</ul>				<p><br><strong>KETENTUAN UMUM</strong></p>				<ul>					<li>Seluruh informasi seperti tulisan, gambar, video, iklan ataupun kode yang terdapat di bukulokomedia.com hanya dapat disalin, diunduh, dan digunakan untuk kepentingan pribadi pengguna, seperti pemesanan dan pembelian produk dari bukulokomedia.com dan tanpa tujuan lainnya. Pengguna tidak diperbolehkan untuk mengambil isi situs untuk direproduksi, diubah atau didistribusikan tanpa adanya izin dari pihak bukulokomedia.com. Pemberitahuan hak kepemilikan yang terdapat pada materi yang telah diunduh dilarang untuk diubah maupun dihapus.</li>					<li>Kami memiliki hak untuk membatasi akses atau tidak memberi akses kepada pengguna apabila terjadi pelanggaran dan penyalahgunaan fasilitas tanpa kewajiban untuk menyampaikan pemberitahuan terlebih dahulu kepada pengguna yang dimaksud. Kami juga berhak untuk menambah, mengganti atau menghentikan fitur-fitur tertentu sewaktu-waktu tanpa pemberitahuan terlebih dahulu.</li>					<li>Dilarang melakukan pelecehan dalam bentuk apapun di situs, termasuk melalui e-mail dan/atau chatting, hal yang bersifat menyesatkan, bersifat memfitnah, mengandung pornografi, bersifat diskriminasi atau rasis.</li>				</ul>","2014-12-18","Y","Y","full","Y");
INSERT INTO halaman VALUES("6","Kebijakan Privasi","kebijakan-privasi","				<p>Seluruh informasi pribadi yang Anda berikan kepada bukulokomedia.com hanya akan digunakan dan dilindungi oleh bukulokomedia.com. Setiap informasi yang Anda berikan terbatas untuk tujuan proses yang berkaitan dengan bukulokomedia.com dan tanpa tujuan lainnya.</p>				<p>Kami dapat mengubah Kebijakan Privasi ini dari waktu ke waktu dengan melakukan pengurangan ataupun penambahan ketentuan pada halaman ini. Perubahan terhadap kebijakan ini akan diumumkan melalui situs bukulokomedia.com atau melalui alamat dari media lain yang Anda berikan kepada kami. Anda dianjurkan untuk membaca Kebijakan Privasi ini secara berkala agar mengetahui perubahan-perubahan terbaru.&nbsp;</p>				<p><strong>PENGGUNAKAN INFORMASI YANG KAMI KUMPULKAN</strong></p>				<p>Semua informasi pribadi yang kami peroleh dari Anda secara sukarela pada saat anda mengisi form kontak, testimoni, maupun konfirmasi akan kami simpan, gunakan dan lindungi sesuai dengan undang-undang perlindungan data dan kebijakan privasi ini. Informasi Anda kami kumpulkan untuk menyediakan produk dan layanan yang terbaik bagi Anda. Informasi Anda akan dipakai untuk:&nbsp;</p>				<ul>					<li>Mempercepat proses belanja Anda.</li>					<li>Kepentingan konfirmasi pesanan.</li>					<li>Kepentingan pengiriman pesanan.</li>					<li>Mempermudah transaksi pembayaran.</li>					<li>Mengumpulkan data transaksi antara Anda dengan bukulokomedia.com</li>					<li>Menghubungi Anda untuk kepentingan riset pasar atau pengembangan situs, agar Kami dapat meningkatkan pelayanan, dan untuk menyesuaikan situs untuk memberikan layanan dan produk yang paling diminati oleh Anda.</li>					<li>Untuk mengelola sebuah kontes, promosi, survei, riset pasar, kelompok fokus atau lainnya dan untuk menyediakan Anda dengan produk atau layanan yang relevan (contoh: untuk mengirimkan hadiah kepada Anda apabila Anda telah menang dalam kontes yang diselenggarakan oleh bukulokomedia.com).</li>					<li>Kepentingan administrasi bukulokomedia.com.</li>				</ul>				<p><strong>PROMOSI DAN ACARA KHUSUS</strong></p>				<p>Kami akan mengadakan promosi dan acara khusus yang diselenggarakan oleh pihak ketiga atau rekanan kami. Jika informasi ini akan dibagi bersama pihak ketiga, kami akan memberitahukan kepada Anda pada saat pengumpulan data.&nbsp;</p>				<p><strong>BERLANGGANAN PIN BBM</strong></p>				<p>Anda akan mendapatkan pilihan untuk ingin menerima pesan broadcast promosi bukulokomedia.com. Jika Anda memilih untuk berlangganan maka bukulokomedia.com akan mengirimkan pesan secara berkala kepada Anda yang berisikan informasi tentang produk terbaru dan program promosi apa yang sedang ditawarkan. Kami hanya menggunakan Pin BBM Anda untuk keperluan bukulokomedia.com dan tidak akan membagi, menjual, menyewakan, menukar atau memberikan kepada pihak ketiga tanpa persetujuan Anda. Anda dapat memilih untuk berhenti berlangganan informasi kapan saja dengan menghapus nama bukulokomedia.com dari kontak BBM anda.</p>				<p><strong>KONEKSI KE SITUS LAIN</strong></p>				<p>Untuk mempermudah penggunaan Anda, situs kami mungkin menyediakan link ke situs-situs pihak ketiga lainnya. Namun, pada saat Anda mengunjungi link-link ini, kami tidak bertanggung jawab atas informasi apapun yang Anda berikan kepada situs-situs tersebut. Masing-masing situs memiliki kebijakan penanganan privasi tersendiri dan kami tidak bertanggung jawab atas isi dari situs mereka. Oleh karena itu, Anda harus berhati-hati dan mempelajari pernyataan kebijakan privasi yang berlaku di situs tersebut sebelum memberikan informasi Anda.&nbsp;</p>","2014-12-18","Y","Y","full","Y");
INSERT INTO halaman VALUES("7","Tentang Kami","tentang-kami","<p><strong>Bukulokomedia.com</strong> merupakan website resmi dari penerbit
Lokomedia yang bermarkas di Jl. Jambon. Perum. Pesona Alam Hijau 2 Blok B-4 Kricak, Jatimulyo, Yogyakarta
55242. Dirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret
2008.<br>
<br>
Produk unggulan dari penerbit Lokomedia adalah buku-buku serta aksesoris bertema Web, terutama PHP (<span style=\"font-weight: bold; font-style: italic\">PHP: Hypertext Preprocessor</span>) yang merupakan pemrograman Internet paling handal saat ini.</p><p><br></p><p><span class=\"center_content2\">Tokolokomedia.com adalah toko online resmi dari Penerbit Lokomedia yang 
menjual buku-buku komputer. Tokolokomedia.com&nbsp; ingin memberikan 
kemudahan kepada para calon pembeli, cara santai, mudah dan hemat dalam 
berbelanja buku berkualias dengan harga yang terjangkau.<br>
<br>
Karena itulah website ini dibuat sedemikian sederhananya, sehingga 
diharapkan dapat membantu para pengunjung untuk dapat menelusuri 
produk-produk yang ditawarkan secara lebih mudah.<br>
<br>
Akhirnya, kami mengucapkan terima kasih atas kunjungan anda di Tokolokomedia.com.
</span></p>","2014-12-18","Y","Y","full","N");
INSERT INTO halaman VALUES("20","Visi dan Misi","visi-dan-misi","<p>
Visi :
</p>
<p>
&nbsp;
</p>
<p>
&nbsp;
</p>
<p>
Misi :
</p>
<p>
&nbsp;
</p>
 ","2014-12-18","Y","Y","left","N");
INSERT INTO halaman VALUES("21","Struktur Organisasi","struktur-organisasi","Isikan struktur organisasi di bagian ini
 <p><br></p>","2014-12-18","Y","Y","left","N");
INSERT INTO halaman VALUES("22","Tutorial Pendukung Lokomedia","tutorial-pendukung-lokomedia","<ul><li><a href=\"http://cauza.web.id/artikel/151/membuat-modul-baru-pada-cms-lokomedia-studi-kasus-modul-kelas-pada-website-sekolah/\" target=\"_blank\"><b>Membuat Modul Baru pada CMS Lokomedia (Studi Kasus Modul Kelas pada Website Sekolah)</b></a></li><li><a href=\"http://ahmedridho.com/post-lokomedia-captcha-bug.html\" target=\"_blank\"><b>Lokomedia Captcha Bug</b></a></li><li><a href=\"http://blogiant.web.id/blog/detail/bikin-fungsi-ingat-saya-untuk-cms-lokomedia\" target=\"_blank\"><b>Bikin Fungsi Ingat Saya Untuk CMS Lokomedia</b></a></li><li><a href=\"http://blogiant.web.id/blog/detail/membuat-modul-bahasa-pada-cms-lokomedia\" target=\"_blank\"><b>Membuat Modul Bahasa Pada CMS Lokomedia</b></a></li><li><a href=\"http://www.rangkasku.web.id/artikel-login-style-cms-lokomedia.html\" target=\"_blank\"><b>Login Style CMS Lokomedia</b></a></li><li><a href=\"http://www.rangkasku.web.id/artikel-install-cms-lokomedia-menggunakan-xampp-control-panel-v310310.html\" target=\"_blank\"><b>Install CMS Lokomedia menggunakan xampp Control Panel V3.1.0.3.1.0</b></a></li><li><a href=\"http://cauza.web.id/artikel/148/modifikasi-url-seo-pada-lokomedia/\" target=\"_blank\"><b>Modifikasi URL SEO pada Lokomedia</b></a></li><li><a href=\"http://dokumenary.wordpress.com/2013/03/16/memasang-jquery-datatables-di-cms-lokomedia/\" target=\"_blank\"><b>Memasang jQuery DataTables Di CMS Lokomedia</b></a></li><li><a href=\"http://cauza.web.id/artikel/160/paging-navigasi-frontpage-lokomedia-menggunakan-ajax/\" target=\"_blank\"><b>Paging Navigasi Frontpage Lokomedia Menggunakan Ajax</b></a></li><li><a href=\"http://www.masbay.web.id/berita-139-cms-lokomedia--membuat-link-berita-sebelum-dan-selanjutnya-pada-cms-lokomedia.html\" target=\"_blank\"><b>Membuat link berita sebelum dan selanjutnya pada CMS Lokomedia</b></a></li><li><a href=\"http://cauza.web.id/artikel/155/menambahkan-search-engine-canggih-pada-lokomedia-google-cse/\" target=\"_blank\"><b>Menambahkan Search Engine Canggih pada Lokomedia (Google CSE)</b></a></li><li><a href=\"http://cauza.web.id/artikel/158/menangkal-spam-komentar-dengan-recaptcha-pada-lokomedia/\" target=\"_blank\"><b>Menangkal Spam Komentar dengan RECAPTCHA pada Lokomedia</b></a></li><li><a href=\"http://cauza.web.id/artikel/171/modul-admin-web-statistik-basic-untuk-lokomedia-dengan-grafik-3d\" target=\"_blank\"><b>Modul Admin Web Statistik (Basic) untuk Lokomedia dengan Grafik 3D</b></a></li><li><a href=\"http://komputerkampus.com/artikel-59/fix-bug-hacking-tinymcpuk-pada-cms-lokomedia--security-update-versi-komputerkampuscom/\" target=\"_blank\"><b>Fix Bug Hacking Tinymcpuk Pada CMS Lokomedia - Security Update Versi Komputerkampus.com</b></a></li><li><a href=\"http://komputerkampus.com/artikel-71/cara-installasi-cms-lokomedia-157-di-linux-debian-ubuntu-mint-backtrack-5-dengan-xampplampp/\" target=\"_blank\"><b>Cara installasi CMS Lokomedia 1.5.7 di Linux  (debian, ubuntu, mint, backtrack 5) dengan Xampp/Lampp</b></a></li></ul>","2014-12-20","Y","Y","left","N");
INSERT INTO halaman VALUES("8","Pemesanan","pemesanan","<p><span style=\"font-weight: bold;\">Cara Pemesanan Produk :</span></p> <ul><li>Pilih produk yang ingin Anda pesan.</li><li>Lihat kode produk.</li><li>Kirim SMS ke 0823 8534 7999 ( TELKOMSEL ) / 0817 22 5853 ( XL ) / Pesan ke BBM Pin 26614F80 dengan format berikut :</li><li>Ketik : <strong>KODE PRODUK</strong> [Garis Miring] <strong>JUMLAH</strong> [Garis Miring] <strong>NAMA ANDA</strong> [Garis Miring] <strong>NOMOR HP</strong> [Garis Miring] <strong>ALAMAT PENGIRIMAN</strong> [Garis Miring] <strong>JASA PENGIRIMAN</strong> [Garis Miring] <strong>KODE POS</strong> (Jika menggunakan POS Indonesia)</li><li>Contoh : <strong>574</strong> / <strong>1</strong> / <strong>Aria Kusuma</strong> / <strong>082385347999</strong> / <strong>Jln. Kartini No.07 Sleman, Jogjakarta</strong> / <strong>JNE</strong></li><li>Setelah
 anda mengirimkan SMS / Pesan, kami akan membalas pesan anda dengan 
menyantumkan total biaya yang harus anda transfer beserta nomor rekening
 pembayaran.</li><li>Apabila anda telah melakukan pembayaran, silakan 
KONFIRMASI pembayaran anda. Petunjuk konfirmasi ada pada menu KONFIRMASI
 pada website.</li><li>Setelah anda konfirmasi, maka produk akan segera kami kirimkan.</li></ul>","2014-12-07","Y","Y","left","N");

DROP TABLE IF EXISTS hubungi;

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO hubungi VALUES("48","aaJawaban","ghafki66@yahoo.co.id","gnfsdhxtn","fxgnrrxfn","2014-10-22");
INSERT INTO hubungi VALUES("50","Someone","someone@gmail.com","sfbsfb","fsbsb","2014-10-24");
INSERT INTO hubungi VALUES("51","sfsf","someone@gmail.com","sf","sfs","2014-10-25");
INSERT INTO hubungi VALUES("53","bliugl","ghafki66@yahoo.co.id","Testing Kontakkkkk","ggg","2014-12-06");
INSERT INTO hubungi VALUES("56","ddddddddddddddd","someone@gmail.com","a","ddd","2014-12-21");
INSERT INTO hubungi VALUES("57","a","someone@gmail.com","aa","dkljhgfgdfsd","2014-12-24");
INSERT INTO hubungi VALUES("59","Ari JM","arijm1707@gmail.com","Testing Kontakkkkk","fdgxhj.k/kljkhgfxzdty6hyumjnbv","2015-01-02");

DROP TABLE IF EXISTS identitas;

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(100) NOT NULL,
  `folder_admin` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fax` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hp1` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hp2` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `bbm` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hari_kerja1` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jam_kerja1` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hari_kerja2` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jam_kerja2` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `info_jam_kerja` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `google_verification` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO identitas VALUES("1","Penerbit Lokomedia Yogyakarta","admin","http://localhost","no-replay@bukulokomedia.com","Jl. Jambon. Perum. Pesona Alam Hijau 2 No. B-4, Kricak, Yogyakarta. 55242","0274 530 6310 ( HUNTING )","0274 530 6310","0856 4379 1400 ( INDOSAT )","0812 2830 8000 ( TELKOMSEL )","7478D065 ( BBM )","Senin - Jumat","08.00 - 17.00 WIB","Sabtu","09.00-14.00 WIB","*Tidak melayani Call/SMS di luar jam tersebut. SMS yang masuk akan dibalas hari kerja berikutnya.","bukulokomedia.com adalah website resmi dari penerbit lokomedia yang menjual buku PHP dan kaos PHP.","lokomedia, bukulokomedia, penerbit, yogyakarta","gkOqGljJZ29O6SUUvRXgs5zPCHQX_S1Ykmx6Xc-xeqk","logo.png","CV. Lokomedia");

DROP TABLE IF EXISTS katajelek;

CREATE TABLE `katajelek` (
  `id_jelek` int(11) NOT NULL AUTO_INCREMENT,
  `kata` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `ganti` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_jelek`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO katajelek VALUES("2","bajingan","b*******");
INSERT INTO katajelek VALUES("3","bangsat","b******");
INSERT INTO katajelek VALUES("4","kontol","k*****");

DROP TABLE IF EXISTS kategori;

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO kategori VALUES("163","Buku PHP","buku-php");
INSERT INTO kategori VALUES("164","Buku MySQL","buku-mysql");
INSERT INTO kategori VALUES("165","Buku HTML","buku-html");
INSERT INTO kategori VALUES("166","Buku Dreamweaver","buku-dreamweaver");
INSERT INTO kategori VALUES("167","Buku Lainnya","buku-lainnya");

DROP TABLE IF EXISTS komentar;

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_produk` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO komentar VALUES("104","660","Ariaaz","arijm1707@gmail.com"," test.........   ","2014-10-16","02:14:06","Y");
INSERT INTO komentar VALUES("105","660","Ariaa","arijm1707@gmail.com","Lorem  ipsum  dolor  sit  amet,  consectetur  adipiscing  elit.  Non  enim  quaero  quid  verum,  sed  quid  cuique  dicendum  sit.  Duo  Reges:  constructio  interrete.  Et  quidem  illud  ipsum  non  nimium  probo  et  tantum  patior,  philosophum  loqui  de  cupiditatibus  finiendis.  Uterque  enim  summo  bono  fruitur,  id  est  voluptate.  Omnis  enim  est  natura  diligens  sui.  Eorum  enim  est  haec  querela,  qui  sibi  cari  sunt  seseque  diligunt.  Sed  tamen  intellego  quid  velit.

Mene  ergo  et  Triarium  dignos  existimas,  apud  quos  turpiter  loquare?  Itaque  vides,  quo  modo  loquantur,  nova  verba  fingunt,  deserunt  usitata.  Peccata  paria.  Quae  duo  sunt,  unum  facit.  Atqui  iste  locus  est,  Piso,  tibi  etiam  atque  etiam  confirmandus,  inquam;  Quam  nemo  umquam  voluptatem  appellavit,  appellat;  Itaque  sensibus  rationem  adiunxit  et  ratione  effecta  sensus  non  reliquit.  An  potest  cupiditas  finiri?","2014-10-16","02:50:52","Y");
INSERT INTO komentar VALUES("106","660","Someone","someone@gmail.com"," Tes  komentar  bro...   ","2014-10-24","08:17:31","Y");
INSERT INTO komentar VALUES("107","660","internet","someone@gmail.com"," ..nvis;onsp&#039;&#039;b&#039;fsb.............   ","2014-10-24","08:24:51","Y");
INSERT INTO komentar VALUES("110","660","sdvsd","someone@gmail.com"," sdfsvd   ","2014-10-24","08:34:00","Y");
INSERT INTO komentar VALUES("117","660","gch","someone@gmail.com"," cgjj   ","2014-10-24","09:01:44","Y");
INSERT INTO komentar VALUES("118","660","hfkvh,","someone@gmail.com"," vhmvhm   ","2014-10-24","09:02:10","Y");
INSERT INTO komentar VALUES("146","660","Ari JM","arijm1707@gmail.com"," tes  xss
alert(&amp;#34;tes  xss&amp;#34;);   ","2014-12-28","20:50:42","Y");
INSERT INTO komentar VALUES("151","660","Ari JM","arijm1707@gmail.com"," tes  xss
alert(   ","2014-12-28","21:27:29","Y");

DROP TABLE IF EXISTS mainmenu;

CREATE TABLE `mainmenu` (
  `id_main` int(5) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`id_main`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO mainmenu VALUES("1","Profil","halaman-7-tentang-kami","Y","1");
INSERT INTO mainmenu VALUES("2","Produk","produk","Y","2");
INSERT INTO mainmenu VALUES("3","Spesial","halaman-22-tutorial-pendukung-lokomedia","Y","3");
INSERT INTO mainmenu VALUES("4","Pertanyaan","pertanyaan","Y","4");
INSERT INTO mainmenu VALUES("5","Forum","http://forum.bukulokomedia.com","Y","5");
INSERT INTO mainmenu VALUES("6","Download","download","Y","6");
INSERT INTO mainmenu VALUES("7","Artikel","artikel","Y","7");
INSERT INTO mainmenu VALUES("8","Galeri","galeri","Y","8");
INSERT INTO mainmenu VALUES("9","Kontak","kontak","Y","9");

DROP TABLE IF EXISTS newsletter;

CREATE TABLE `newsletter` (
  `id_newsletter` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kode_aktivasi` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `encode` text NOT NULL,
  PRIMARY KEY (`id_newsletter`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=latin1;

INSERT INTO newsletter VALUES("214","arijm1707@gmail.com","2014-12-29 01:09:57","eb50b42fca0edeb83fa4c3b75ed5a261","N","8b7t");
INSERT INTO newsletter VALUES("215","sample@email.tst","2014-12-29 02:22:06","c87c50357aa43e05941f26e92790ee9b","N","4pjh");

DROP TABLE IF EXISTS pertanyaan;

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(5) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jawaban` text COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO pertanyaan VALUES("1","Dimana alamat lokomedia berada","Kami berada di kota Yogyakarta, tetapi kami juga memiliki toko fisik yang berada di Jl. Jambon. Perum. Pesona Alam Hijau 2 No. B-4, Kricak, Yogyakarta. Selain toko fisik, kami juga Jualan Online melalui Facebook, BBM dan website bukulokomedia.com serta kami juga melayani pemesanan Via paket JNE, TIKI, POS INDONESIA ( Untuk pengiriman luar negeri ).","Y");
INSERT INTO pertanyaan VALUES("2","Apakah bisa membeli langsung ke bukulokomedia.com di kota Yogyakarta ?","Silahkan bagi anda yang sedang berada di kota Yogyakarta untuk datang langsung ke toko kami. Toko fisik kami berada di Jl. Jambon. Perum. Pesona Alam Hijau 2 No. B-4, Kricak, Yogyakarta.","Y");
INSERT INTO pertanyaan VALUES("3","Apa bisa produk diantar ke rumah, dan dibayar di tempat ( COD ) ?","Tentu kami juga Melayani COD (Cash on Delivery) untuk pemesanan di kota Yogyakarta. Jadi pembayaran untuk produk yang dipesan dilakukan saat pelanggan menerima produk.","Y");
INSERT INTO pertanyaan VALUES("4","Apakah bukulokomedia.com bisa dipercaya? Saya takut ditipu jika belanja Online.","Jika anda ragu / takut berbelanja online anda dapat langsung datang ke toko kami di Jl. Jambon. Perum. Pesona Alam Hijau 2 No. B-4, Kricak, Yogyakarta. Kami bisa di pertanggung jawabkan, produk kami jamin sampai ketempat anda, dan apabila produk tidak sampai dalam waktu 2 minggu uang 2X lipat akan kami kembalikan. Sebelum kami berjualan online melalui Facebook, BBM dan website bukulokomedia.com, kami terlebih dahulu telah memiliki toko fisik.","Y");
INSERT INTO pertanyaan VALUES("5","Apakah produk anda ready stock?","Kami tidak menjamin produk kami ready stock 100% karena selain peminatnya sangat banyak, kami juga melayani penjualan ke seluruh Indonesia. Jadi anda dapat menghubungi kami via Telp, SMS, BBM & Email untuk ketersediaan produk.","Y");
INSERT INTO pertanyaan VALUES("6","Bagaimana cara termudah melakukan pemesanan ?","Cara termudah dan tercepat prosesnya adalah pemesanan lewat SMS atau BBM.","Y");
INSERT INTO pertanyaan VALUES("7","Apakah harganya masih bisa ditawar?","Mengenai masalah harga bisa di tanyakan langsung kepada Customer Service via Telp, SMS atau BBM.","Y");
INSERT INTO pertanyaan VALUES("8","Berapa ongkos kirim untuk pesanan saya?","Biaya ongkos kirim sesuai jarak, biaya ongkos kirim sesuai kesepakatan antara pembeli dan kami.","Y");
INSERT INTO pertanyaan VALUES("9","Kapan pesanan saya akan dikirim?","Setiap harinya kami mengirimkan semua paket pesanan pelanggan melalui kurir JNE/ TIKI dan POS INDONESIA secara serentak pada pagi, siang, sore dan malam hari setiap harinya ( termasuk pada hari sabtu, minggu atau hari libur lainnya). No resi JNE akan dikirimkan melalui SMS/BBM ke anda setelah pengiriman.","Y");
INSERT INTO pertanyaan VALUES("10","Pesanan saya sampai saat ini belum saya terima. Kapan pesanan saya akan sampai di kota saya?","Untuk tujuan ibukota propinsi, rta-rata lama pengiriman normalnya hanya 1 hari. Untuk kota-kota lain antara 2 – 3 hari. KETERLAMBATAN 1 HARI ADALAH NORMAL. Gunanya kami SMS kan No resi JNE adalah agar anda bisa mengecek sendiri posisi paket anda di website JNE ( Di update tengah malam oleh pihak JNE ) atau telepon langsung ke kantor cabang JNE di kota anda pada jam kerja ( No telepon JNE bisa anda tanyakan ke 108 )","Y");
INSERT INTO pertanyaan VALUES("12","Apakah produk-produk yang dijual berbahaya bagi kesehatan?","Produk-produk yang kami jual aman tanpa efek samping, produk telah mendapatkan lisensi kesehatan bahwa produk yang kami pasarkan aman, tidak membahayakan kesehatan.","Y");
INSERT INTO pertanyaan VALUES("13","Kenapa harga produk di Toko lebih tinggi daripada website ini?","Karena toko kami berada di jalan protokol yang mana harga sewa toko sangat mahal. Berbeda halnya jika anda berbelanja via website ini, kami langsung mengirim produk dari gudang kami.","Y");
INSERT INTO pertanyaan VALUES("14","Di mana saya dapat konsultasi Pemrograman PHP, MySQL & Produk yang kami jual?","Anda dapat menyampaikan keluhan, saran, kritik maupun konsultasi kepada kami via Telp, SMS, BBM, atau Website bukulokomedia.com melalui menu TESTIMONI / HUBUNGI KAMI.","Y");

DROP TABLE IF EXISTS produk;

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `produk_seo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` int(5) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `komentar` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `gambar` varchar(100) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `gambar4` varchar(100) NOT NULL,
  `gambar5` varchar(100) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM AUTO_INCREMENT=681 DEFAULT CHARSET=latin1;

INSERT INTO produk VALUES("660","163","Membongkar Trik Rahasia Para Master PHP","LOKO-111","membongkar-trik-rahasia-para-master-php","<p>Deskripsi Produk<br><br><br></p>","39800","10","1","2014-12-02","Y","Y","15178membongkar-trik-rahasia-para-master-php.jpg","","","","");
INSERT INTO produk VALUES("667","163","Panduan Lengkap Menguasai Pemrograman CSS","LOKO-115","panduan-lengkap-menguasai-pemrograman-css","<span class=\"center_content2\">CSS merupakan bahasa pemrograman wajib 
yang dikuasai oleh para pembuat website, terutama web designer. Karena 
CSS menawarkan kemudahan dalam mendesain website, misalnya pemisahan 
konten dengan desain, sehingga desain halaman tersebut dapat digunakan 
berkali-kali pada halaman yang berbeda, bahkan cukup mengubah satu 
desain akan mengubah seluruh halaman yang terkait, hal ini akan 
menghemat waktu dalam mendesain web.<br>
<br>
Disamping itu, desain web yang dibuat dengan CSS lebih cepat loadingnya 
dibandingkan dengan desain menggunakan tabel dari HTML, bukankah selain 
konten, kecepatan akses merupakan faktor penting dalam dunia maya. 
Dengan berbagai keunggulan tersebut, CSS menjadi salah satu bahasa 
pemrograman yang paling disarankan dalam pembuatan website.<br>
<br>
Dalam buku ini dijelaskan lebih mendetail tentang struktur dan komponen 
dari CSS disertai pula kasus-kasus yang sering ditemui dalam sebuah 
website, seperti layout, form, button, link, menu, tooltips, dan 
lain-lain. Buku ini akan membuat pengetahuan Anda tentang CSS bertambah 
serta Anda dapat langsung mempraktekkannya pada website yang akan Anda 
buat.
</span><p><br></p>","37800","0","1","2014-12-18","Y","Y","6048panduan-lengkap-menguasai-pemrograman-css.jpg","","","","");
INSERT INTO produk VALUES("661","163","Jalan Pintas Menjadi Master PHP","LOKO-112","jalan-pintas-menjadi-master-php","<span class=\"center_content2\">Buku ini membahas bagaimana cara kerja 
para master PHP di perusahaan dalam membangun proyek website secara 
profesional. Dikupas secara step by step mulai tahap Planning, 
Designing, Coding, Testing, Promotion, sampai&nbsp; Maintenance.<br>
<br>
Dan pada bab terakhir akan dibeberkan rahasia pembuatan proyek website 
senilai Rp. 34 juta yang penulis samarkan dalam bentuk Proyek Portal 
Detik dan Bukulokomedia.com dengan desain model Layout CSS dan XHTML 
(Web 2.0) serta beberapa teknik pemrograman PHP terkini seperti: SEO URL
 Friendly, Dynamic Title dan Meta Tag, Editor TextArea (WYSIWYG), 
Layanan RSS dan Feed RSS, Pencarian Multiple Keyword, Tag Berita 
Terkait, Komentar Berita, Indeks Berita, Thumbnail, Polling, Force 
Download, Anti Injection, Anti Spam (Captcha), CMS, dan lain-lain.</span>","43800","10","1","2014-12-02","Y","N","753jalan-pintas-menjadi-master-php.jpg","","","","");
INSERT INTO produk VALUES("665","163","Membuat Katalog Online dengan PHP dan CSS","LOKO-113","membuat-katalog-online-dengan-php-dan-css","<span class=\"center_content2\">Banyak yang menganggap pemrograman web itu sulit, apalagi untuk seorang pemula. Namun, sekarang ada tools <span style=\"font-weight: bold\">Recordset</span> dari Dreamweaver yang dapat membantu kita dalam membuat aplikasi web dengan mudah dan cepat.<br>
<br>
Dengan metode <span style=\"font-weight: bold; font-style: italic\">Click Programming</span>,
 melakukan pemrograman PHP terasa lebih menyenangkan dan mengasyikkan, 
apalagi penulisan kode-kode PHP sudah sangat diminimalisir, sehingga 
pemula sekalipun dapat langsung mempraktekkannya tanpa harus dipusingkan
 dengan kerumitan kode-kode.<br>
<br>
Pada bab terakhir akan dibahas secara lengkap cara pembuatan proyek website katalog produk online. Dimulai dari tahap <span style=\"font-weight: bold; font-style: italic\">Design</span> (Photoshop. Dreamweaver, dan CSS), <span style=\"font-weight: bold; font-style: italic\">Programming</span> (PHP dan MySQL) sampai tahap <span style=\"font-weight: bold\">Evaluasi</span> dan <span style=\"font-weight: bold\">Upload Website</span> ke Internet.<br>
<br>
Dan untuk memudahkan pembaca, buku disertai CD yang berisi Source Code, Tools, Design, Free Software, dan Video Tutorial.
</span><p><br></p>","36800","10","1","2014-12-18","Y","Y","7585membuat-katalog-online-dengan-php-dan-css.jpg","","","","");
INSERT INTO produk VALUES("666","163","Trik Rahasia Master PHP Terbongkar Lagi","LOKO-114","trik-rahasia-master-php-terbongkar-lagi","<p>Setelah sukses dengan buku BEST SELLER 
\'Membongkar Trik Rahasia Para MASTER PHP\', kali ini penulis akan 
membongkar lagi trik-trik yang lebih dahsyat, masih dengan gaya khas 
menulisnya yang mengalir (mudah&nbsp;dipahami) dan aplikatif, nikmatilah 
sajian khas MASTER PHP berikut:<br>
<br>
<span style=\"font-weight: bold\">Proyek Membangun Toko Online</span><br>
</p><ul><li> Dimulai dari konsep, perancangan, implementasi sampai menjadi proyek siap pakai.</li><li>Dilengkapi juga dengan Shopping Cart, SEO URL dan Halaman Administratornya.<br>
	</li></ul>
<span style=\"font-weight: bold\">14 Trik Security dan Studi Kasus Aplikatifnya</span><br>
<ul><li>Menghalau Spam dengan Captcha.</li><li>Melumpuhkan XSS Attack.</li><li>Menangkal SQL Injection.</li><li>Menjinakkan Blind SQL Injection.</li><li>Menutup Celah Aplikasi Download (Download Vulnerabiliy).</li><li>Mencegah Voting Ganda pada Poling.</li><li>Mencegah Browsing Folder.</li><li>Mengatasi Input Data tanpa Spasi.</li><li>Word Filter.</li><li>Seputar Proteksi CMS.</li><li>Dan lain-lain.</li></ul>
<span style=\"font-weight: bold\">Update Proyek CMS Senilai Rp. 34 Juta</span><br>
<ul><li> Security Update.</li><li>Gonta-Ganti Templates.</li><li>Teknik Pembuatan Menu Horizontal.</li><li>Teknik Pembuatan Menu DropDown (Sub Menu).</li><li>Auto Link.</li><li>Aggregator RSS.</li><li>Statistik Pengunjung.</li><li>Kalender.</li><li>Validasi Data.</li><li>Shoutbox (Mini Chat).</li><li>Emoticon Smiley.</li><li>Dan lain-lain.<br>
	</li></ul>
<span style=\"font-weight: bold\">Kupas Tuntas Pembuatan Laporan PDF Berbasis Web</span><br>
<ul><li>Instalasi library PDF (ezPdf dan FPDF).</li><li>Dasar-Dasar Pembuatan Dokumen PDF dengan PHP.</li><li>Menampilkan Data dari Database dalam Format PDF.</li><li>Menampilkan Header/Logo, Footer dan Penomoran di Setiap Halaman.</li><li>Membuat Laporan PDF dari Tabel-Tabel yang Saling Berelasi (dilengkapi perhitungan sub total dan total).</li><li>Dan lain-lain.<br>
	</li></ul>
<span style=\"font-weight: bold\">Trik-Trik Lainnya</span><br>
<ul><li>Mempercantik Paging (Model Amazon, Flickr, Apple, dll).</li><li>Mempercantik Galeri Foto.</li><li>Animasi Galeri Foto.</li><li>Slide Show Foto.</li><li>Input Video Youtube.</li><li>Input Beberapa Gambar dalam TextArea.</li><li>Kupas Tuntas Editor TextArea ala Ms.Word (TinyMCE).</li><li>Dan lain-lain.&nbsp; </li></ul>","44800","0","1","2014-12-18","Y","Y","258trik-rahasia-master-php-terbongkar-lagi.jpg","","","","");
INSERT INTO produk VALUES("668","163","Membangun Web Berbasis PHP dengan Framework Codeigniter","LOKO-116","membangun-web-berbasis-php-dengan-framework-codeigniter","<span class=\"center_content2\">Framework telah menjadi tren pemrograman 
saat ini. Faktanya, banyak perusahaan mencari programmer yang bisa 
framework. Alasannya jelas, mengatasi gaya programmer yang berbeda-beda 
dalam membuat program, sehingga program mudah dikembangkan, karena tidak
 bergantung pada satu programmer saja.<br>
<br>
Codeigniter adalah salah satu framework handal berbasis PHP. Selain itu,
 kesederhanaan dan kerampingannya membuat Codeigniter menjadi framework 
yang paling mudah dipelajari dan tercepat aksesnya dibandingkan 
framework lainnya.<br>
<br>
Dalam buku ini, secara praktis dibahas dasar-dasar Codeigniter, karena 
disajikan langsung dalam bentuk studi kasus pembuatan Program Absensi 
Siswa, mulai dari perancangan database sampai menjadi proyek siap pakai.
 Sehingga memudahkan Anda dalam menguasai framework Codeigniter secara 
cepat.
</span><p><br></p>","48800","10","1","2014-12-18","Y","Y","9448membangun-web-berbasis-php-dengan-framework-codeigniter.jpg","","","","");
INSERT INTO produk VALUES("669","163","Bikin Website Super Keren dengan PHP dan jQuery","LOKO-117","bikin-website-super-keren-dengan-php-dan-jquery","<span class=\"center_content2\">jQuery merupakan library Javascript 
terhandal saat ini. Faktanya, banyak perusahaan besar tingkat dunia 
menggunakan jQuery dalam teknologi website mereka. Bahkan 
website-website lokal pun juga tidak mau ketinggalan.<br>
<br>
jQuery berhasil menyederhanakan fungsi-fungsi Javascript dan Ajax yang 
rumit, sehingga hanya dengan beberapa baris kode, kita bisa membuat 
website dengan tingkat interaktivitas yang tinggi (responsif), bahkan 
membuat animasi yang canggih tanpa memerlukan instalasi plugin flash 
pada browser. <br>
<br>
Dalam buku ini, selain membahas dasar-dasar jQuery, secara praktis 
penulis juga membahas beberapa koleksi jQuery yang sering digunakan 
dalam website, seperti accordion, datepicker, tabs, expose, overlay, 
tooltip, scrollable, flashembed, news ticker, kotak dialog, menu 
dropdown superfish, animasi slideshow headline berita, galeri foto 
carousel, validasi interaktif, grafik 3D, efek dan animasi.<br>
<br>
Tidak hanya itu, pada akhir bab juga akan disajikan cara menggabungkan 
beberapa teknik jQuery sekaligus yang semuanya langsung diterapkan dalam
 sebuah Proyek Website Lengkap Super Keren. So, agar website Anda tidak 
terlihat jadul, kuasai jQuery sekarang juga.
</span><p><br></p>","33460","10","1","2014-12-18","Y","Y","2932bikin-website-super-keren-dengan-php-dan-jquery.jpg","","","","");
INSERT INTO produk VALUES("670","163","9 Langkah Menjadi Master Framework Codeigniter","LOKO-118","9-langkah-menjadi-master-framework-codeigniter","<span class=\"center_content2\">Codeigniter merupakan salah satu Framework
 web berbasis PHP yang sangat populer saat ini, digunakan oleh berbagai 
kalangan, mulai dari web programmer sampai web developer. <br>
Membangun aplikasi framework web dengan Codeigniter merupakan salah satu
 keputusan yang sangat tepat. Karena banyaknya keuntungan dan 
fitur-fitur yang disediakan, seperti helper dan class library yang 
lengkap serta user guide yang mudah dimengerti semua kalangan. <br>
<br>
Dalam buku ini akan dibahas cara penggunaan Codeigniter secara gamblang,
 karena disertai penjelasan pada tiap baris kode dan disusun secara 
sistematis dalam 9 LANGKAH, dimulai dari Mengenal dan Memulai 
Codeigniter, Database, Operasi CRUD (Create, Read, Update, Delete), 
Teknik Paging, Mengirim Email, Operasi File, sampai Upload Form dan 
Image Manipulation.<br>
<br>
Menariknya, setiap bahasan disertai studi kasus, seperti Newsletter 
(Berlangganan Email), Membership (Sistem Keanggotaan Website), Folder 
Tree (Susunan Folder dan File), Web Gallery (Galeri Foto), dan Shopping 
Cart (Keranjang Toko Online).
</span><p><br></p>","35040","10","1","2014-12-18","Y","Y","73249-langkah-menjadi-master-framework-codeigniter.jpg","","","","");
INSERT INTO produk VALUES("671","163","67 Trik dan Ide Brilian Master PHP","LOKO-119","67-trik-dan-ide-brilian-master-php","<span class=\"center_content2\">Selama 2 tahun, saya telah menulis ratusan trik PHP dengan pendekatan <em>case study</em> dan <em>problem solving</em> melalui Blog <a href=\"http://blog.rosihanari.net\" target=\"_blank\">(http://blog.rosihanari.net</a>)
 dan telah mendapat ribuan respon positif dari pengunjung. Melalui buku 
ini, disajikan kembali trik-trik terfavorit yang sudah diedit, 
dilengkapi tampilan hasil script, dan source code siap pakai. Sehingga 
lebih mudah dipahami dan dipelajari. Berikut beberapa trik yang dibahas:
 <br>
<ul><li>Teknik Debugging Script PHP (Beberapa Error di PHP, Penyebabnya, dan Solusinya).</li><li>Enkripsi Script PHP Agar Tidak Terbaca. &nbsp;&nbsp; <br>
	Konsep Web Services dan Studi Kasusnya.</li><li>Membuat Buku Tamu dari Akun Facebook.</li><li>Auto Published Artikel dengan Cron Jobs.</li><li>Script Upload Video dan Player di Web Ala Youtube</li><li>Menyimpan Tulisan Arab ke Database MySQL.</li><li>Mencegah Submit Form Berulang Kali.</li><li>Prediksi Tanggal Kelahiran Bayi (HPL).</li><li>Generator Kode Unik Incremental Otomatis.</li><li>Form Dinamis dan Pemrosesannya Secara Simultan.</li><li>Rekap Data/Laporan dari Data Mentah (Simple dan Kompleks).</li><li>Sistem Login Aplikasi Multi User.</li><li>Upload Download File dengan Batasan Hak Akses.</li><li>Membuat Beragam Bentuk Grafik (Chart).</li><li>Import Data Format XML dan Excel ke MySQL.</li><li>Laporan Format Ms. Excel.</li><li>Mudahnya Membuat Barcode dengan PHP.</li><li>Teknik Pencarian Multi Kategori.</li><li>Membuat Tampilan Data Terurut Berdasarkan Kolom Tabel.</li><li>Membuat MP3 Player di Web. <br>
	</li><li>Dan masih banyak lagi trik brilian lainnya.</li></ul></span><p><br></p>","49800","0","1","2014-12-18","Y","Y","396967-trik-dan-ide-brilian-master-php.jpg","","","","");
INSERT INTO produk VALUES("672","163","Proyek Membuat Website Sekolah dengan Joomla!","LOKO-120","proyek-membuat-website-sekolah-dengan-joomla","<br>Dalam buku ini, Anda akan mempelajari 
cara Membuat Proyek Website Sekolah dengan Joomla yang meliputi Desain 
Template Web Sekolah, Kata Pengantar Pengelola Sekolah, Agenda, Galeri 
Kegiatan, Download File, Mini Chatting, Menu Utama Sekolah, dan 
sebagainya. <br>
<br>
Pembahasan dimulai dari Instalasi dan Dasar-Dasar Joomla sampai Membuat Proyek Siap Pakai. Adapun topik bahasannya antara lain:<br>
<ul><li>Persiapan Lahan Website Sekolah. <br>
	</li><li>Renovasi Joomla Hingga Menjadi Website Sekolah. <br>
	</li><li>Memilih Perabotan untuk Mempercantik Website Sekolah. <br>
	</li><li>Upload Website Sekolah ke Internet. <br>
	</li><li>Bonus: Aneka Trik Joomla Pilihan. </li></ul><p><br></p>","30240","0","1","2014-12-18","Y","Y","1740proyek-membuat-website-sekolah-dengan-joomla.jpg","","","","");
INSERT INTO produk VALUES("673","163","Trik dan Solusi Jitu Pemrograman Web","LOKO-121","trik-dan-solusi-jitu-pemrograman-web","Dalam membangun web, kita tidak bisa hanya
 mengandalkan satu perangkat saja, misalnya PHP. Karena terkadang, ada 
beberapa permasalahan yang mengharuskan kita menggunakan perangkat lain,
 misalnya AJAX, DOM, Javascript, XML, dan CSS. <br>
<ul><li>Dengan AJAX, kita bisa mengedit data secara langsung (Edit in Place), tanpa harus bolak-balik berpindah halaman.</li><li>Memanipulasi HTML dengan DOM (Document Object Model).</li><li>Mempercantik Tabel yang bisa Auto Scroll atau,</li><li>Membuat Menu Berbentuk Ikon atau,</li><li>Membuat Themes Sesuai dengan Keinginan User atau,</li><li>Mencetak langsung dari browser, tentu dengan bantuan Javascript dan CSS.</li><li>Dan masih banyak lagi.</li></ul><p><br></p>","29960","10","1","2014-12-18","Y","Y","676trik-dan-solusi-jitu-pemrograman-web.jpg","","","","");
INSERT INTO produk VALUES("674","163","Teknik Cepat Membangun Web dengan Framework CakePHP","LOKO-122","teknik-cepat-membangun-web-dengan-framework-cakephp","<span class=\"center_content2\">CakePHP hadir sebagai alternatif bagi Anda
 yang masih kesulitan mempelajari framework. Sesuai dengan namanya, 
CakePHP&nbsp; menawarkan kemudahan dalam membuat aplikasi web dengan cepat 
(RAD: Rapid Application Development), menjadikan belajar framework 
se-enak menikmati kue favorit. Contohnya, dengan fitur Scaffolding, Anda
 bisa membuat operasi CRUD (Create, Read, Update, Delete) hanya dengan 3
 baris kode, padahal kalau Anda membuatnya secara manual membutuhkan 
bahkan ratusan baris kode.<br>
<br>
CakePHP merupakan framework yang memiliki segudang fitur juga sudah 
support Ajax dan ORM (Object Relational Model), namun terbatasnya 
panduan dan tutorialnya menjadi kesulitan tersendiri untuk 
mempelajarinya. Dengan adanya buku ini, ternyata belajar CakePHP tidak 
sesulit yang dibayangkan. Buku dimulai dengan Dasar-Dasar Framework 
CakePHP yang membahas mulai dari Definisi, Instalasi, Konfigurasi, 
Penanganan HTML dan Database, Operasi CRUD, Teknik CakePHP (Scaffolding,
 Paging, Upload File, dll), Components (Authentication &amp; Session), 
dan terakhir ditutup dengan Proyek Lengkap Pembuatan Web Blog.
</span><p><br></p>","29960","10","1","2014-12-18","Y","Y","7381teknik-cepat-membangun-aplikasi-web-dengan-framework-cakephp.jpg","","","","");
INSERT INTO produk VALUES("675","163","Trik Dahsyat Menguasai AJAX dengan jQuery","LOKO-123","trik-dahsyat-menguasai-ajax-dengan-jquery","<span class=\"center_content2\">Setelah tahun lalu SUKSES menulis buku 
tentang jQuery pertama di Indonesia, kini penulis&nbsp; akan membeberkan 
rahasia kedahsyatan AJAX yang dibuat dengan jQuery. Selain lebih mudah 
dipelajari, belajar AJAX dengan jQuery terasa lebih menyenangkan, karena
 kita akan dimanjakan dengan animasi dan tampilan cantik khas jQuery. <br>
<br>
Beberapa kasus aplikatif dan trik pilihan yang dibahas dalam buku ini, diantaranya: <br>
<ul><li>Trik Dasar AJAX dengan jQuery</li><li>Cek Username Secara Live</li><li>Indikator Kekuatan Password</li><li>Menampilkan Password yang Disembunyikan</li><li>AutoComplete Ala Google</li><li>Pencarian Data Ala jQuery</li><li>Form Contact yang Cool</li><li>AJAX Shoutbox</li><li>3 ComboBox Dinamis yang Saling Berhubungan</li><li>Manipulasi Tampilan Form</li><li>Image Live Preview</li><li>Flying Top of Message</li><li>Pertukaran Data dengan JSON</li><li>Mematikan Seleksi Halaman Web, dan masih banyak lagi. <br>
	</li><li>Bonus Proyek Bikin Sendiri Script Forum Diskusi.<br>
	</li><li>Serta Lomba Bikin Web Templates Berhadiah Rp. 7 Juta, Contoh Templates CMS Lokomedia Terbaru Ada di CD.</li></ul></span><p><br></p>","39040","10","1","2014-12-18","Y","Y","4089trik-dahsyat-menguasai-ajax-dengan-jquery.jpg","","","","");
INSERT INTO produk VALUES("676","163","Trik Membuat Web Template dengan PHP dan CSS","LOKO-124","trik-membuat-web-template-dengan-php-dan-css","<span class=\"center_content2\">Secanggih apapun sebuah website, jika 
tidak didukung dengan tampilan desain (template) yang cantik, maka 
website tersebut terlihat tidak menarik dan membosankan. Dalam buku ini 
dibahas cara membuat template untuk dijadikan sebagai desain sebuah 
website, sehingga website terlihat bagus penampilannya. Asyiknya lagi, 
kita cukup memodifikasi template-template CSS/HTML gratisan. Sehingga 
terbebas dari masalah copyright/HAKI.<br>
<br>
Disamping itu, pembahasan buku ini disertai studi kasus, dimana setelah 
memahami struktur template CSS/HTML gratisan akan langsung diterapkan 
pada salah satu CMS yang juga gratisan, yaitu CMS Toko Online Lokomedia.
 Pada bagian akhir, disertakan trik Membuat Modul Peta Lokasi dengan 
bantuan Google Maps, Memodifikasi Template Yahoo Messenger, Membuat 
Website Multi Bahasa, dan lain-lain. Serta ada juga bonus senilai Rp. 5 
Juta khusus untuk pembeli buku ini, Anda cukup kirimkan email saja ke 
penulis, info lengkapnya ada didalam buku.
</span><p><br></p>","27860","10","1","2014-12-18","Y","Y","7614trik-membuat-web-template-dengan-php-dan-css.jpg","","","","");
INSERT INTO produk VALUES("677","163","Membuat Toko Online Berbasis AJAX dengan Prestashop","LOKO-125","membuat-toko-online-berbasis-ajax-dengan-prestashop","<span class=\"center_content2\">Prestashop merupakan salah satu CMS toko 
online gratis yang mulai banyak digunakan saat ini. Disamping karena 
kemudahan instalasi dan penggunaannya, disertai juga dengan fitur-fitur 
lengkap untuk keperluan toko online. Adapun dari segi tampilan 
disediakan banyak template cantik yang bisa digonta-ganti, serta 
interaktifitas tinggi menggunakan teknologi AJAX, dan dukungan Bahasa 
Indonesia.<br>
<br>
Beberapa fitur unggulan Prestashop, diantaranya: Newsletter. Program 
Afiliasi. Customer Review. Cash on Delivery. Mendukung Produk Digital 
untuk Jualan Software dan E-book. Pembuatan Kategori dan Sub-kategori 
Tak Terbatas. Mendukung Kombinasi Beberapa Produk dan Variasi Kapasitas.
 Penggunaan Voucher Diskon yang Bisa diberikan Kepada Konsumen Tertentu.
 Mendukung Diskon untuk Pembelian Jumlah Tertentu. Faktur dan Laporan 
Berbentuk PDF. Metode Pembayaran bisa Melalui Transfer, Kartu Kredit, 
dan Paypal. Dan sebagainya.<br>
<br>
Dalam buku ini akan dibahas care pembuatan toko online dengan Prestashop
 secara mudah, cepat dan murah. Bahkan para pemula sekalipun dapat 
mempelajarinya dengan mudah dan menerapkannya untuk memulai bisnis toko 
online.
</span><p><br></p>","27860","10","1","2014-12-18","Y","Y","5468membuat-toko-online-berbasis-ajax-dengan-prestashop.jpg","","","","");
INSERT INTO produk VALUES("678","163","Sistem Penerimaan Mahasiswa Baru Berbasis Web dan Mobile","LOKO-126","sistem-penerimaan-mahasiswa-baru-berbasis-web-dan-mobile","<p><span class=\"center_content2\">Kok bukunya tipis sih? Ya iyalah, buku ini
 kan \'spesialis\' buku praktek. Pada intinya, buku ini membahas 
langkah-langkah rahasia dalam membangun Sistem Informasi Penerimaan 
Mahasiswa Baru (PMB) Berbasis Web dan Mobile, hanya dalam 5 STEP SAJA. 
Anda akan kami bimbing secara step by step untuk langsung ACTION 
membangun dua sistem tersebut menggunakan bahasa pemrograman PHP dan 
WML, serta database MySQL.<br>
<br>
Apa saja sih 5 STEP tersebut?? Nahh,, temukan jawabannya didalam buku 
ini. Buku ini disusun dengan gaya bahasa yang santai dan mudah dipahami 
oleh semua kalangan. Bahkan kami juga menyertakan file source codenya 
secara lengkap, agar lebih memudahkan Anda.
</span></p>","39800","10","1","2014-12-18","Y","Y","2684sistem-penerimaan-mahasiswa-baru-berbasis-web-dan-mobile.jpg","","","","");
INSERT INTO produk VALUES("679","163","Teknik Cepat Menguasai CSS3","LOKO-127","teknik-cepat-menguasai-css3","<span class=\"center_content2\">Dalam dunia design grafis, tentu sudah 
tidak asing dengan istilah gradient, transform, rounded corner, RGBA 
Color, polaroid, shadow, glow, reflection, cropping, sliding, masking, 
dll. Dalam CSS 3, kita dimungkinkan untuk membuat&nbsp; efek-efek tersebut 
tanpa melibatkan gambar, sehingga ukuran filenya jauh lebih kecil dan 
ringan diakses dalam website.<br>
<br>
Tidak hanya itu saja, CSS 3 pun mempunyai kemampuan menciptakan 
efek-efek&nbsp; jQuery, seperti animasi, slideshow, dropdown menu, accordion,
 horizontal tab, tooltips, dll. Tentu ukuran filenya yang lebih kecil 
dan ringan diakses di Internet. <br>
<br>
Dalam buku ini, setelah memahami sintaks dasar CSS 3, akan dijelajahi 
fitur baru CSS 3&nbsp; dan contoh kasusnya disertai tip dan trik CSS 3. Dan 
terakhir, semua trik yang dibahas dibuku akan digabungkan semua dalam 
sebuah proyek bertajuk Pembuatan Template Blog.</span><p><br></p>","29260","10","1","2014-12-18","Y","Y","4087teknik-cepat-menguasai-css3.jpg","1240proyek-membuat-website-sekolah-dengan-joomla.jpg","8185membuat-katalog-online-dengan-php-dan-css.jpg","886967-trik-dan-ide-brilian-master-php.jpg","658trik-rahasia-master-php-terbongkar-lagi.jpg");

DROP TABLE IF EXISTS sidebar;

CREATE TABLE `sidebar` (
  `id_sidebar` int(5) NOT NULL AUTO_INCREMENT,
  `nama_sidebar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `block_1` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `block_2` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `block_3` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `block_4` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `block_5` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_sidebar`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO sidebar VALUES("1","sidebar_artikel","alamat","kontak","jam_kerja","","");
INSERT INTO sidebar VALUES("2","sidebar_artikel_detail","alamat","kontak","jam_kerja","","");
INSERT INTO sidebar VALUES("3","sidebar_halaman","kontak","jam_kerja","","","");
INSERT INTO sidebar VALUES("4","sidebar_kontak","kontak","jam_kerja","","","");
INSERT INTO sidebar VALUES("5","sidebar_kontak_aksi","kontak","","","","");
INSERT INTO sidebar VALUES("6","sidebar_testimoni","alamat","kontak","jam_kerja","","");
INSERT INTO sidebar VALUES("7","sidebar_testimoni_aksi","kontak","","","","");
INSERT INTO sidebar VALUES("8","sidebar_produk","kategori_produk","kontak","banner","widget_1","kurir");
INSERT INTO sidebar VALUES("9","sidebar_produk_kategori","kategori_produk","","","","");
INSERT INTO sidebar VALUES("10","sidebar_pencarian","kategori_produk","","","","");
INSERT INTO sidebar VALUES("11","sidebar_galeri","alamat","kontak","","","");
INSERT INTO sidebar VALUES("12","sidebar_album","alamat","kontak","","","");
INSERT INTO sidebar VALUES("13","sidebar_download","alamat","kontak","jam_kerja","","");
INSERT INTO sidebar VALUES("14","sidebar_pertanyaan","alamat","kontak","jam_kerja","","");

DROP TABLE IF EXISTS statistik;

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO statistik VALUES("127.0.0.2","2009-09-11","1","1252681630");
INSERT INTO statistik VALUES("127.0.0.1","2009-09-11","17","1252734209");
INSERT INTO statistik VALUES("127.0.0.3","2009-09-12","8","1252817594");
INSERT INTO statistik VALUES("127.0.0.1","2009-10-24","8","1256381921");
INSERT INTO statistik VALUES("127.0.0.1","2009-10-26","108","1256620074");
INSERT INTO statistik VALUES("127.0.0.1","2009-10-27","52","1256686769");
INSERT INTO statistik VALUES("127.0.0.1","2009-10-28","124","1256792223");
INSERT INTO statistik VALUES("127.0.0.1","2009-10-29","9","1256828032");
INSERT INTO statistik VALUES("127.0.0.1","2009-10-31","3","1257047101");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-01","85","1257113554");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-02","11","1257207543");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-03","165","1257292312");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-04","59","1257403499");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-05","10","1257433172");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-11","13","1258006911");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-12","10","1258048069");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-14","14","1258222519");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-17","2","1258473856");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-19","16","1258635469");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-21","4","1258863505");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-25","3","1259216216");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-26","1","1259222467");
INSERT INTO statistik VALUES("127.0.0.1","2009-11-30","11","1259651841");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-02","9","1259746407");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-03","17","1259906128");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-10","69","1260423794");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-12","26","1260560082");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-11","5","1260508621");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-13","8","1260716786");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-14","9","1260772698");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-15","9","1260837158");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-16","7","1260905627");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-17","48","1261026791");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-18","11","1261088534");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-22","3","1261477278");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-25","2","1261686043");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-26","29","1261835507");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-27","7","1261920445");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-28","3","1261965611");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-29","21","1262024011");
INSERT INTO statistik VALUES("127.0.0.1","2009-12-30","24","1262146708");
INSERT INTO statistik VALUES("127.0.0.1","2010-01-01","12","1262286131");
INSERT INTO statistik VALUES("127.0.0.1","2010-01-03","38","1262529325");
INSERT INTO statistik VALUES("127.0.0.1","2010-01-12","89","1263264291");
INSERT INTO statistik VALUES("127.0.0.1","2010-01-14","54","1263482540");
INSERT INTO statistik VALUES("127.0.0.1","2010-01-15","57","1263506901");
INSERT INTO statistik VALUES("127.0.0.1","2010-02-11","30","1265831568");
INSERT INTO statistik VALUES("127.0.0.1","2010-02-13","2","1266032303");
INSERT INTO statistik VALUES("127.0.0.1","2010-02-14","3","1266115347");
INSERT INTO statistik VALUES("127.0.0.1","2010-02-15","15","1266195235");
INSERT INTO statistik VALUES("127.0.0.1","2010-02-18","1","1266499945");
INSERT INTO statistik VALUES("127.0.0.1","2010-02-22","5","1266856332");
INSERT INTO statistik VALUES("127.0.0.1","2010-02-25","46","1267103145");
INSERT INTO statistik VALUES("127.0.0.1","2010-05-12","10","1273654648");
INSERT INTO statistik VALUES("127.0.0.1","2010-05-16","195","1274026185");
INSERT INTO statistik VALUES("127.0.0.1","2010-05-17","2","1274029517");
INSERT INTO statistik VALUES("127.0.0.1","2010-05-19","1","1274279374");
INSERT INTO statistik VALUES("127.0.0.1","2010-05-27","16","1274967085");
INSERT INTO statistik VALUES("127.0.0.1","2010-05-30","4","1275192045");
INSERT INTO statistik VALUES("127.0.0.1","2010-05-31","13","1275271939");
INSERT INTO statistik VALUES("127.0.0.1","2010-06-05","1","1275676869");
INSERT INTO statistik VALUES("127.0.0.1","2010-06-06","2","1275842170");
INSERT INTO statistik VALUES("127.0.0.1","2010-06-15","3","1276572924");
INSERT INTO statistik VALUES("127.0.0.1","2010-06-22","206","1277221605");
INSERT INTO statistik VALUES("127.0.0.1","2010-08-02","17","1280754660");
INSERT INTO statistik VALUES("127.0.0.1","2010-08-20","7","1282285305");
INSERT INTO statistik VALUES("127.0.0.1","2010-08-30","21","1283185430");
INSERT INTO statistik VALUES("127.0.0.1","2010-08-31","53","1283207455");
INSERT INTO statistik VALUES("127.0.0.1","2010-09-02","133","1283402651");
INSERT INTO statistik VALUES("127.0.0.1","2010-09-05","35","1283702206");
INSERT INTO statistik VALUES("127.0.0.1","2010-09-13","10","1284370291");
INSERT INTO statistik VALUES("127.0.0.1","2010-09-17","12","1284662303");
INSERT INTO statistik VALUES("127.0.0.1","2010-09-22","2","1285091212");
INSERT INTO statistik VALUES("127.0.0.1","2010-09-23","47","1285254071");
INSERT INTO statistik VALUES("127.0.0.1","2010-09-26","32","1285512806");
INSERT INTO statistik VALUES("127.0.0.1","2010-09-27","48","1285529871");
INSERT INTO statistik VALUES("127.0.0.1","2011-01-19","18","1295395096");
INSERT INTO statistik VALUES("127.0.0.1","2011-01-21","6","1295580166");
INSERT INTO statistik VALUES("127.0.0.1","2011-01-22","3","1295639704");
INSERT INTO statistik VALUES("127.0.0.1","2011-01-25","2","1295895420");
INSERT INTO statistik VALUES("127.0.0.1","2011-01-27","20","1296145564");
INSERT INTO statistik VALUES("127.0.0.1","2011-01-28","5","1296150116");
INSERT INTO statistik VALUES("127.0.0.1","2011-02-01","10","1296555613");
INSERT INTO statistik VALUES("127.0.0.1","2011-02-02","1","1296657225");
INSERT INTO statistik VALUES("127.0.0.1","2011-02-05","3","1296875908");
INSERT INTO statistik VALUES("127.0.0.1","2011-02-07","5","1297090649");
INSERT INTO statistik VALUES("127.0.0.1","2011-02-09","182","1297254341");
INSERT INTO statistik VALUES("127.0.0.1","2011-02-10","268","1297355704");
INSERT INTO statistik VALUES("127.0.0.1","2011-02-16","6","1297824002");
INSERT INTO statistik VALUES("127.0.0.1","2011-02-17","2","1297945065");
INSERT INTO statistik VALUES("127.0.0.1","2011-12-28","12","1325081007");
INSERT INTO statistik VALUES("127.0.0.1","2011-12-29","13","1325167281");
INSERT INTO statistik VALUES("127.0.0.1","2011-12-31","34","1325296088");
INSERT INTO statistik VALUES("127.0.0.1","2012-01-02","1","1325449458");
INSERT INTO statistik VALUES("127.0.0.1","2012-01-03","55","1325601219");
INSERT INTO statistik VALUES("127.0.0.1","2012-01-04","1","1325630436");
INSERT INTO statistik VALUES("127.0.0.1","2012-02-08","86","1328720292");
INSERT INTO statistik VALUES("127.0.0.1","2012-02-09","110","1328798857");
INSERT INTO statistik VALUES("127.0.0.1","2012-02-10","87","1328871532");
INSERT INTO statistik VALUES("127.0.0.1","2012-02-11","16","1328899301");
INSERT INTO statistik VALUES("127.0.0.1","2012-03-31","87","1333186737");
INSERT INTO statistik VALUES("127.0.0.1","2012-04-01","69","1333248528");
INSERT INTO statistik VALUES("127.0.0.1","2012-04-02","9","1333338582");
INSERT INTO statistik VALUES("127.0.0.1","2012-04-03","31","1333456570");
INSERT INTO statistik VALUES("127.0.0.1","2012-04-04","2","1333498207");
INSERT INTO statistik VALUES("127.0.0.1","2012-04-05","5","1333628029");
INSERT INTO statistik VALUES("127.0.0.1","2012-04-08","22","1333871463");
INSERT INTO statistik VALUES("127.0.0.1","2012-04-09","109","1333972788");
INSERT INTO statistik VALUES("127.0.0.1","2012-04-10","70","1334024998");
INSERT INTO statistik VALUES("127.0.0.1","2012-05-01","8","1335889888");
INSERT INTO statistik VALUES("127.0.0.1","2012-05-02","17","1335935829");
INSERT INTO statistik VALUES("127.0.0.1","2012-05-27","6","1338133681");
INSERT INTO statistik VALUES("127.0.0.1","2012-05-29","22","1338304361");
INSERT INTO statistik VALUES("127.0.0.1","2012-05-30","5","1338389383");
INSERT INTO statistik VALUES("127.0.0.1","2012-05-31","5","1338408772");
INSERT INTO statistik VALUES("127.0.0.1","2012-06-01","5","1338567612");
INSERT INTO statistik VALUES("127.0.0.1","2012-07-01","10","1341152776");
INSERT INTO statistik VALUES("127.0.0.1","2012-07-29","12","1343572702");
INSERT INTO statistik VALUES("127.0.0.1","2012-07-30","15","1343658587");
INSERT INTO statistik VALUES("127.0.0.1","2012-07-31","179","1343743877");
INSERT INTO statistik VALUES("127.0.0.1","2012-08-03","11","1344000498");
INSERT INTO statistik VALUES("127.0.0.1","2012-08-08","28","1344364863");
INSERT INTO statistik VALUES("127.0.0.1","2012-08-09","7","1344477542");
INSERT INTO statistik VALUES("127.0.0.1","2012-08-10","1","1344601882");
INSERT INTO statistik VALUES("::1","2014-10-16","4","1413433998");
INSERT INTO statistik VALUES("::1","2014-10-17","1","1413514165");
INSERT INTO statistik VALUES("::1","2014-10-25","1","1414199770");
INSERT INTO statistik VALUES("::1","2014-11-20","2","1416495033");
INSERT INTO statistik VALUES("::1","2014-11-25","19","1416934798");
INSERT INTO statistik VALUES("::1","2014-11-26","372","1417017409");
INSERT INTO statistik VALUES("::1","2014-11-27","31","1417105982");
INSERT INTO statistik VALUES("::1","2014-11-28","3","1417192012");
INSERT INTO statistik VALUES("::1","2014-11-29","2","1417278112");
INSERT INTO statistik VALUES("::1","2014-11-30","2","1417329055");
INSERT INTO statistik VALUES("::1","2014-12-01","1","1417426493");
INSERT INTO statistik VALUES("::1","2014-12-02","164","1417535076");
INSERT INTO statistik VALUES("::1","2014-12-03","234","1417618542");
INSERT INTO statistik VALUES("::1","2014-12-04","566","1417712265");
INSERT INTO statistik VALUES("::1","2014-12-05","381","1417793723");
INSERT INTO statistik VALUES("::1","2014-12-06","329","1417885029");
INSERT INTO statistik VALUES("::1","2014-12-07","99","1417922918");
INSERT INTO statistik VALUES("::1","2014-12-10","162","1418230741");
INSERT INTO statistik VALUES("::1","2014-12-11","16","1418235055");
INSERT INTO statistik VALUES("::1","2014-12-15","11","1418659358");
INSERT INTO statistik VALUES("::1","2014-12-17","142","1418835163");
INSERT INTO statistik VALUES("::1","2014-12-18","771","1418921798");
INSERT INTO statistik VALUES("::1","2014-12-19","204","1419008124");
INSERT INTO statistik VALUES("::1","2014-12-20","558","1419094794");
INSERT INTO statistik VALUES("::1","2014-12-21","633","1419176523");
INSERT INTO statistik VALUES("::1","2014-12-22","139","1419201782");
INSERT INTO statistik VALUES("::1","2014-12-24","92","1419437874");
INSERT INTO statistik VALUES("::1","2014-12-25","17","1419460364");
INSERT INTO statistik VALUES("::1","2014-12-28","156","1419785988");
INSERT INTO statistik VALUES("::1","2014-12-29","272","1419870835");
INSERT INTO statistik VALUES("127.0.0.1","2014-12-29","7417","1419794835");
INSERT INTO statistik VALUES("::1","2014-12-30","33","1419950620");
INSERT INTO statistik VALUES("::1","2014-12-31","187","1420026976");
INSERT INTO statistik VALUES("::1","2015-01-01","38","1420131074");
INSERT INTO statistik VALUES("::1","2015-01-02","68","1420167341");
INSERT INTO statistik VALUES("::1","2015-01-03","21","1420249998");
INSERT INTO statistik VALUES("::1","2015-01-04","191","1420390615");
INSERT INTO statistik VALUES("::1","2015-01-05","160","1420421216");
INSERT INTO statistik VALUES("::1","2015-01-07","28","1420620747");
INSERT INTO statistik VALUES("::1","2015-01-08","74","1420722655");
INSERT INTO statistik VALUES("::1","2015-01-09","45","1420777084");
INSERT INTO statistik VALUES("::1","2015-01-10","65","1420833213");

DROP TABLE IF EXISTS submenu;

CREATE TABLE `submenu` (
  `id_sub` int(5) NOT NULL AUTO_INCREMENT,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  `id_submain` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

INSERT INTO submenu VALUES("57","Testimonial","testimoni","9","0","Y");
INSERT INTO submenu VALUES("72","Visi dan Misi","halaman-20-visi-dan-misi","1","0","Y");
INSERT INTO submenu VALUES("73","Struktur Organisasi","halaman-21-struktur-organisasi","1","0","Y");
INSERT INTO submenu VALUES("74","Buku Komputer","","2","0","Y");
INSERT INTO submenu VALUES("75","Buku PHP","kategori-163-buku-php","2","74","Y");
INSERT INTO submenu VALUES("76","Buku MySQL","kategori-164-buku-mysql","2","74","Y");
INSERT INTO submenu VALUES("77","Buku HTML","kategori-165-buku-html","2","74","Y");
INSERT INTO submenu VALUES("78","Buku Dreamweaver","kategori-166-buku-dreamweaver","2","74","Y");
INSERT INTO submenu VALUES("79","Buku Lainnya","kategori-167-buku-lainnya","2","0","Y");

DROP TABLE IF EXISTS tampilan;

CREATE TABLE `tampilan` (
  `id_tampilan` int(5) NOT NULL AUTO_INCREMENT,
  `warna` varchar(50) NOT NULL,
  `kunci` enum('Y','N') NOT NULL DEFAULT 'N',
  `cache` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cache_setting` enum('Y','N') NOT NULL DEFAULT 'Y',
  `menu_home` varchar(50) NOT NULL,
  `tombol_beli` varchar(50) NOT NULL,
  `url_tombol_beli` varchar(50) NOT NULL,
  `tombol_habis` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `produk_home` int(2) NOT NULL,
  `produk_all` int(2) NOT NULL,
  `produk_kategori` int(2) NOT NULL,
  `produk_lainnya` int(2) NOT NULL,
  `artikel_home` int(2) NOT NULL,
  `artikel_all` int(2) NOT NULL,
  `artikel_lainnya` int(2) NOT NULL,
  `pencarian_produk` int(2) NOT NULL,
  `pencarian_artikel` int(2) NOT NULL,
  `sidebar_artikel` varchar(5) NOT NULL,
  `sidebar_artikel_detail` varchar(5) NOT NULL,
  `sidebar_kontak` varchar(5) NOT NULL,
  `sidebar_kontak_aksi` varchar(5) NOT NULL,
  `sidebar_testimoni` varchar(5) NOT NULL,
  `sidebar_testimoni_aksi` varchar(5) NOT NULL,
  `sidebar_produk` varchar(5) NOT NULL,
  `sidebar_produk_kategori` varchar(5) NOT NULL,
  `sidebar_pencarian` varchar(5) NOT NULL,
  `sidebar_galeri` varchar(5) NOT NULL,
  `sidebar_album` varchar(5) NOT NULL,
  `sidebar_download` varchar(5) NOT NULL,
  `sidebar_pertanyaan` varchar(5) NOT NULL,
  `social` varchar(10) NOT NULL,
  `facebook` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook_app_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `twitter` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `twitter_widget_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_tampilan`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tampilan VALUES("1","style","N","N","N","Beranda","Beli","halaman-8-pemesanan","Habis","Call","10","16","12","3","6","10","5","12","10","left","left","left","left","left","left","right","right","left","left","left","left","left","twitter","pages/Lokomedia/121981531278268?fref=ts","394664137368829","arijm1707","524759011518722050");

DROP TABLE IF EXISTS testimoni;

CREATE TABLE `testimoni` (
  `id_testimoni` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kota` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_testimoni`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO testimoni VALUES("2","Suryono","Solo","suryono@yahoo.com","Sungguh menakjubkan!!! TERIMAKASIH.","2009-02-25","Y");
INSERT INTO testimoni VALUES("15","Hendra Setiawan","Lampung","dedi_apr@yahoo.com","Mula mula Saya tak berapa yakin, tetapi setelah ...","2011-05-29","Y");
INSERT INTO testimoni VALUES("35","Ibu dewi","sragen","eva_adikara@yahoo.com","hehehe","2012-08-30","Y");
INSERT INTO testimoni VALUES("43","Irwan irone","Tasikmalaya","ianinspira@gmail.com","wah mantap coba kalo beli satu paket","2012-09-10","Y");
INSERT INTO testimoni VALUES("88","Arya","Pekanbaru","arya@gmail.com","Trimakasih saya telah merasakankan hasil yang benar-benar memuaskan ","2014-10-11","Y");
INSERT INTO testimoni VALUES("94","bliugl","Pekanbaru","arya@gmail.com","nanti bisa buat langgganan mas","2014-10-11","N");

DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO users VALUES("admin","21232f297a57a5a743894a0e4a801fc3","Administrator","admin@domain.com","081268655855","admin","N");
INSERT INTO users VALUES("pengelola","3c7913bc17671596a43dcb4581992bdf","Manager","","081268655855","manager","N");
INSERT INTO users VALUES("karyawan","9e014682c94e0f2cc834bf7348bda428","Karyawan","","081268655855","user","N");

DROP TABLE IF EXISTS widget;

CREATE TABLE `widget` (
  `id_widget` int(5) NOT NULL AUTO_INCREMENT,
  `nama_widget` varchar(100) NOT NULL,
  `isi_widget` text NOT NULL,
  PRIMARY KEY (`id_widget`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO widget VALUES("1","Widget Kirim SMS Gratis","<iframe src=http://smsgratis.web.id/wg3/?teks=www.bukulokomedia.com frameborder=0 style=height:350px;width:220px;>Please upgrade your browser</iframe>");
INSERT INTO widget VALUES("2","Widget Kalender Cute","<embed src=\"http://www.blogclock.cn/swf/S100106d83bd513-2.swf\" Width=\"164px\" Height=\"304px\" type=\"application/x-shockwave-flash\" quality=\"high\" wmode=\"transparent\"></embed>
<embed src=\"http://www.blogclock.cn/swf/S100015a648f15b-6.swf\" Width=\"220px\" Height=\"240px\" type=\"application/x-shockwave-flash\" quality=\"high\" wmode=\"transparent\"></embed>");
INSERT INTO widget VALUES("3","Widget 3","<embed src=\"http://www.blogclock.cn/swf/S10001600ffd6de-8.swf\" Width=\"160px\" Height=\"320px\" type=\"application/x-shockwave-flash\" quality=\"high\" wmode=\"transparent\"></embed>");

