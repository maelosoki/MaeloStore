<?php
error_reporting(0);
if ($_GET['module']=='home'){include "pages/home.php";}
elseif ($_GET['module']=='produk'){include "pages/produk.php";}
elseif ($_GET['module']=='detail'){include "pages/produk_detail.php";}
elseif ($_GET['module']=='komentar'){include "pages/komentar.php";}
elseif ($_GET['module']=='hasilcari'){include "pages/pencarian.php";}
elseif ($_GET['module']=='kategori'){include "pages/produk_kategori.php";}
elseif ($_GET['module']=='halaman'){include "pages/halaman.php";}
elseif ($_GET['module']=='download'){include "pages/download.php";}
elseif ($_GET['module']=='semuaalbum'){include "pages/album.php";}
elseif ($_GET['module']=='detailalbum'){include "pages/galeri.php";}
elseif ($_GET['module']=='faq'){include "pages/pertanyaan.php";}
elseif ($_GET['module']=='testimoni'){include "pages/testimoni.php";}
elseif ($_GET['module']=='testimoniaksi'){include "pages/testimoni_aksi.php";}
elseif ($_GET['module']=='kontak'){include "pages/hubungi.php";}
elseif ($_GET['module']=='kontakrespon'){include "pages/hubungi_aksi.php";}
elseif ($_GET['module']=='newsletter'){include "pages/newsletter.php";}
elseif ($_GET['module']=='subscribe'){include "pages/subscribe.php";}
elseif ($_GET['module']=='unsubscribe'){include "pages/unsubscribe.php";}
elseif ($_GET['module']=='allartikel'){include "pages/artikel.php";}
elseif ($_GET['module']=='artikel'){include "pages/artikel_detail.php";}
elseif ($_GET['module']=='error'){include "pages/error.php";}
elseif ($_GET['module']==0){header('location:index.php');}
?>