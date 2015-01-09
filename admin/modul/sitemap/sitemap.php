<?php
session_start();
if ($_SESSION['leveluser']!='admin'){
	echo "<script>window.location = 'media.php?module=home'</script>";
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
switch($_GET[act]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Peta Situs (Sitemap)<span style='float:right'><a href='#help' data-toggle='modal'>?</a></span></div>
                            <div class='modal fade' id='help' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Bantuan</h4>
                                        </div>
                                        <div class='modal-body'>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>
                                </div>
                            </div>
						<div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=sitemap&act=ping'><i class='fa fa-refresh'></i> Buat Ulang Sitemap</a></span></p>
                            ";
							// untuk meload data xml (sitemap.xml) dengan menggunakan metode DOM XML, bisa juga dengan cara SimpleXML
							$doc = new DOMDocument();
							$doc->load( "../sitemap.xml" );
							// menampilkan data XML (parsing) ke dalam tabel HTML
							echo "
							   <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
							";
							$urls = $doc->getElementsByTagName( "url" );
							// melakukan looping penampilan data url
							foreach($urls as $url)
							{
							$locs = $url->getElementsByTagName( "loc" ); 
							$link = $locs->item(0)->nodeValue; 
							echo "
										<tr>
											<td>$link</td>
										</tr>

                                    </tbody>
							";
							}
							echo"
									<tfoot class='hide-if-no-paging'>
										<tr>
											<td colspan='7'>
												<div class='pagination pagination-centered'></div>
											</td>
										</tr>
									</tfoot>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
";
break;

case "ping":
error_reporting(0);
// Sitemap Generator
date_default_timezone_set('Asia/Jakarta');

$time = explode(" ",microtime());
$time = $time[1];

include "../config/koneksi.php";
include "../config/class_sitemap.php";

$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));

$sitemap = new SitemapGenerator("$iden[url]/");
$sitemap->createGZipFile = false;
$sitemap->maxURLsPerSitemap = 10000;
$sitemap->sitemapFileName = "sitemap.xml";
$sitemap->robotsFileName = "robots.txt";

// Tambahkan url satu per satu
$sitemap->addUrl("$iden[url]", date('c'), 'weekly', '1');
$sitemap->addUrl("$iden[url]/produk", date('c'));
	$produk=mysqli_query($konek, "SELECT * FROM produk WHERE aktif='Y' ORDER BY id_produk");
	while ($r=mysqli_fetch_array($produk)){
$sitemap->addUrl("$iden[url]/produk-$r[id_produk]-$r[produk_seo]", date('c'));
	}
	$kategori=mysqli_query($konek, "SELECT * FROM kategori ORDER BY id_kategori");
	while ($r=mysqli_fetch_array($kategori)){
$sitemap->addUrl("$iden[url]/kategori-$r[id_kategori]-$r[kategori_seo]", date('c'));
	}
$sitemap->addUrl("$iden[url]/artikel", date('c'));
	$artikel=mysqli_query($konek, "SELECT * FROM artikel WHERE aktif='Y' ORDER BY id_artikel");
	while ($r=mysqli_fetch_array($artikel)){
$sitemap->addUrl("$iden[url]/artikel-$r[id_artikel]-$r[judul_seo]", date('c'));
	}
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Respon Search Engine</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
								";
								try {
									$sitemap->createSitemap();
									$sitemap->writeSitemap();
									$sitemap->updateRobots();
									$result = $sitemap->submitSitemap("yahooAppId");
									// tampilkan status kiriman tiap search engine
									echo "<pre>";
									print_r($result);
									echo "</pre>";
								}
								catch (Exception $exc) {
									echo $exc->getTraceAsString();
								}
								echo "
								Pemakaian memori maksimal : ".number_format(memory_get_peak_usage()/(1024*1024),2)."MB
								";
								$time2 = explode(" ",microtime());
								$time2 = $time2[1];
								echo "
								<br />Waktu eksekusi: ".number_format($time2-$time)." detik
								</div>
                            </div>
                        </div>
						<div class='panel-footer'>
										<a class='btn btn-primary square-btn-adjust' href='?module=sitemap'><i class='fa fa-check'></i> Simpan</a>
										<a class='btn btn-default square-btn-adjust' onClick='self.history.back()'><i class='fa fa-close'></i> Batal</a>
                        </div>
                    </div>
                </div>
			</div>
    </div>
";
break;
}//penutup switch
}//penutup session
}
?>