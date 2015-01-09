<?php
error_reporting(0);
if ($_GET['module']=='home'){include "home.php";}
elseif ($_GET['module']=='artikel'){ include "modul/artikel/artikel.php";}
elseif ($_GET['module']=='banner'){ include "modul/banner/banner.php";}
elseif ($_GET['module']=='newsletter'){ include "modul/newsletter/newsletter.php";}
elseif ($_GET['module']=='halaman'){ include "modul/halaman/halaman.php";}
elseif ($_GET['module']=='password'){ include "modul/password/password.php";}
elseif ($_GET['module']=='settings'){ include "modul/pengaturan/settings.php";}
elseif ($_GET['module']=='users'){ include "modul/users/users.php";}
elseif ($_GET['module']=='tampilan'){ include "modul/tampilan/tampilan.php";}
elseif ($_GET['module']=='widget'){ include "modul/widget/widget.php";}
elseif ($_GET['module']=='mainmenu'){ include "modul/menu/menu.php";}
elseif ($_GET['module']=='submenu'){ include "modul/menu/sub_menu.php";}
elseif ($_GET['module']=='download'){ include "modul/download/download.php";}
elseif ($_GET['module']=='galeri'){ include "modul/galeri/galeri.php";}
elseif ($_GET['module']=='album'){ include "modul/galeri/album.php";}
elseif ($_GET['module']=='sidebar'){ include "modul/sidebar/sidebar.php";}
elseif ($_GET['module']=='kontak'){ include "modul/kontak/kontak.php";}
elseif ($_GET['module']=='kategori'){ include "modul/kategori/kategori.php";}
elseif ($_GET['module']=='komentar'){ include "modul/komentar/komentar.php";}
elseif ($_GET['module']=='produk'){ include "modul/produk/produk.php";}
elseif ($_GET['module']=='testimoni'){ include "modul/testimoni/testimoni.php";}
elseif ($_GET['module']=='pertanyaan'){ include "modul/pertanyaan/pertanyaan.php";}
elseif ($_GET['module']=='database'){ include "modul/database/database.php";}
elseif ($_GET['module']=='sitemap'){ include "modul/sitemap/sitemap.php";}
elseif ($_GET['module']==0){header('location:index.php');}
?>