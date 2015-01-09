<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	header("location:index.php");
}
else{
$pathFile = "jejak.txt"; //Jika file jejak.txt telah melebihi 10MB akan dihapus supaya tidak menghabiskan space hosting
if(filesize($pathFile) > 10485760){unlink($pathFile);} //Dalam bytes, artinya 10485760 bytes = 10 MB

//Non-aktifkan modus Cache selama login ke administrator
$tmp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
if($tmp[cache] == 'Y'){mysqli_query($konek, "UPDATE tampilan SET cache = 'N'");}
array_map('unlink', glob("../cache/*")); //Hapus semua file yang berada pada folder cache
copy("../pages/index.html", "../cache/index.html"); //Salin kembali file index.html yang terhapus

echo "
<div id='page-wrapper' >
	<div id='page-inner'>
            <div class='row'>
                <div class='col-md-12'>
                        <div class='panel-body'>
                            <div class='alert alert-info alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
								Selamat datang $_SESSION[namalengkap], silakan klik menu untuk mengelola content website.
								";	
								if ($_SESSION['leveluser']=='admin'){
									echo "<br />Jika anda telah melakukan perubahan(tambah/edit/hapus) pada produk, kategori & artikel silakan klik <a href='?module=sitemap&act=ping'>disini</a> untuk membuat sitemap baru";
								}
								else{echo "";}
								echo "
                            </div>
                            <ul class='nav nav-tabs'>
                                <li class='active'><a href='#1' data-toggle='tab'>Komentar</a>
                                </li>
                                <li class=''><a href='#2' data-toggle='tab'>Kontak</a>
                                </li>
                                <li class=''><a href='#3' data-toggle='tab'>Statistik</a>
                                </li>
                                <li class=''><a href='#4' data-toggle='tab'>Pengunjung</a>
                                </li>
                            </ul>
                            <div class='tab-content'>
                                <div class='tab-pane fade active in' id='1'><br />
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Komentar</th>
                                            <th data-hide='phone'>Nama</th>
                                            <th data-hide='phone'>Produk</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM komentar,produk where produk.id_produk=komentar.id_produk ORDER BY id_komentar DESC');
											while($r=mysqli_fetch_array($tp)){
											$tgl=tgl_indo($r[tgl]);
											$text="$r[isi_komentar]";
											$isi=substr($text, 0, 50); //Ambil isi komentar hanya 50 karakter
												echo"
											<tr>
												<td>$isi ...</td>
												<td>$r[nama_komentar]</td>
												<td><a href='../produk-$r[id_produk]-$r[produk_seo]' target='_blank'>$r[nama_produk]</a></td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=komentar&aksi=edit&id=$r[id_komentar]'>EDIT</a></td>
											</tr>
											";
											}
											echo"
                                    </tbody>
									<tfoot class='hide-if-no-paging'>
										<tr>
											<td colspan='4'>
												<div class='pagination pagination-centered'></div>
											</td>
										</tr>
									</tfoot>
                                </table>
                                </div>
                                <div class='tab-pane fade' id='2'><br />
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Email</th>
											<th data-hide='phone'>Nama</th>
                                            <th data-hide='phone'>Pesan</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$kontak=mysqli_query($konek, 'SELECT * FROM hubungi ORDER BY id_hubungi DESC');
											while($r=mysqli_fetch_array($kontak)){
											$text2="$r[pesan]";
											$pesan=substr($text2, 0, 50); //Ambil isi pesan hanya 50 karakter
												echo"
											<tr>
												<td>$r[email]</td>
												<td>$r[nama]</td>
												<td>$pesan ...</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=kontak&aksi=balas&id=$r[id_hubungi]'>BALAS</a></td>
											</tr>
											";
											}
											echo"
                                    </tbody>
									<tfoot class='hide-if-no-paging'>
										<tr>
											<td colspan='4'>
												<div class='pagination pagination-centered'></div>
											</td>
										</tr>
									</tfoot>
                                </table>
                                </div>
                                <div class='tab-pane fade' id='3'><br />
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover'>
                                    <tbody>
                                        <tr>
                                            <td style='text-align:center'><i class='fa fa-envelope-o'></i></td>
                                            <td>Hubungi Kami</td>
											";			
												$jml = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM hubungi WHERE id_hubungi"));
												if ($jml > 0){echo "<td style='text-align:center'>$jml</td>";}
												else{echo "<td style='text-align:center'>0</td>";}
											echo "
                                        </tr>
                                        <tr>
                                            <td style='text-align:center'><i class='fa fa-comments-o'></i></td>
                                            <td>Testimoni</td>
											";			
												$jml = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM testimoni WHERE id_testimoni"));
												if ($jml > 0){echo "<td style='text-align:center'>$jml</td>";}
												else{echo "<td style='text-align:center'>0</td>";}
											echo "
                                        </tr>
                                        <tr>
                                            <td style='text-align:center'><i class='fa fa-at'></i></td>
                                            <td>Newsletter</td>
											";			
												$jml = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM newsletter WHERE id_newsletter"));
												if ($jml > 0){echo "<td style='text-align:center'>$jml</td>";}
												else{echo "<td style='text-align:center'>0</td>";}
											echo "
                                        </tr>
                                        <tr>
                                            <td style='text-align:center'><i class='fa fa-download'></i></td>
                                            <td>Download</td>
											";			
												$jml = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM download WHERE id_download"));
												if ($jml > 0){echo "<td style='text-align:center'>$jml</td>";}
												else{echo "<td style='text-align:center'>0</td>";}
											echo "
                                        </tr>
                                        <tr>
                                            <td style='text-align:center'><i class='fa fa-shopping-cart'></i></td>
                                            <td>Produk</td>
											";			
												$jml = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM produk WHERE id_produk"));
												if ($jml > 0){echo "<td style='text-align:center'>$jml</td>";}
												else{echo "<td style='text-align:center'>0</td>";}
											echo "
                                        </tr>
                                        <tr>
                                            <td style='text-align:center'><i class='fa fa-comment-o'></i></td>
                                            <td>Komentar Produk</td>
											";			
												$jml = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM komentar WHERE id_produk"));
												if ($jml > 0){echo "<td style='text-align:center'>$jml</td>";}
												else{echo "<td style='text-align:center'>0</td>";}
											echo "
                                        </tr>
                                        <tr>
                                            <td style='text-align:center'><i class='fa fa-camera'></i></td>
                                            <td>Album</td>
											";			
												$jml = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM album WHERE id_album"));
												if ($jml > 0){echo "<td style='text-align:center'>$jml</td>";}
												else{echo "<td style='text-align:center'>0</td>";}
											echo "
                                        </tr>
                                        <tr>
                                            <td style='text-align:center'><i class='fa fa-file-image-o'></i></td>
                                            <td>Galeri</td>
											";			
												$jml = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM gallery WHERE id_gallery"));
												if ($jml > 0){echo "<td style='text-align:center'>$jml</td>";}
												else{echo "<td style='text-align:center'>0</td>";}
											echo "
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                               </div>
                                <div class='tab-pane fade' id='4'><br />
								";
								include "../config/library.php";
								$pengunjung       = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE tanggal='$tgl_sekarang' GROUP BY ip"));
								$hits             = mysqli_fetch_assoc(mysqli_query($konek, "SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tgl_sekarang' GROUP BY tanggal")); 
								$totalhits        = mysqli_fetch_assoc(mysqli_query($konek, "SELECT SUM(hits) as total FROM statistik")); 
								$totalpengunjung  = mysqli_num_rows(mysqli_query($konek, "SELECT online FROM statistik")); 
								$bataswaktu       = time() - 300;
								$pengunjungonline = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE online > '$bataswaktu'"));
								echo "
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover'>
                                    <tbody>
                                        <tr>
                                            <td>Pengunjung hari ini</td>
                                            <td style='text-align:center'>$pengunjung</td>
                                        </tr>
                                        <tr>
                                            <td>Total pengunjung</td>
                                            <td style='text-align:center'>$totalpengunjung</td>
                                        </tr>
                                        <tr>
                                            <td>Hits hari ini</td>
                                            <td style='text-align:center'>$hits[hitstoday]</td>
                                        </tr>
                                        <tr>
                                            <td>Total Hits</td>
                                            <td style='text-align:center'>$totalhits[total]</td>
                                        </tr>
                                        <tr>
                                            <td>Pengunjung Online</td>
                                            <td style='text-align:center'>$pengunjungonline</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                </div>
                            </div>
						</div>	
                </div>
            </div>
	</div>
</div>
";
}
?>