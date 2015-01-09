<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/komentar/aksi_komentar.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Komentar Produk</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th data-hide='phone'>Produk</th>
                                            <th data-hide='phone'>Komentar</th>
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
												<td>$r[nama_komentar]</td>
												<td><a href='../produk-$r[id_produk]-$r[produk_seo]' target='_blank'>$r[nama_produk]</a></td>
												<td>$isi ...</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=komentar&aksi=edit&id=$r[id_komentar]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_komentar]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
											</tr>
											";
											}
											echo"
                                    </tbody>
									<tfoot class='hide-if-no-paging'>
										<tr>
											<td colspan='5'>
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

case "edit":
	$edit = mysqli_query($konek, "SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
	$tgl=tgl_indo($r[tgl]);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Komentar</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/komentar/aksi_komentar.php?act=update' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_komentar]>
											<label>Waktu Komentar</label>
                                            <input type='text' name='waktu' value='$tgl - $r[jam_komentar]' class='form-control' disabled='' /><br />
											<label>Nama</label>
                                            <input type='text' name='nama_komentar' value='$r[nama_komentar]' class='form-control' disabled='' /><br />
											<label>Email</label>
                                            <input type='text' name='email' value='$r[email]' class='form-control' disabled='' /><br />
											<label>Isi Komentar</label>
                                            <textarea id='area1' name='isi_komentar' class='form-control' rows='3'>$r[isi_komentar]</textarea><br />
											";
											if ($r[aktif]=='Y')
											{
											echo"
                                                <label><input type='radio' name='aktif' id='optionsRadios1' value='Y' checked /> Aktif</label>
												<label>&nbsp; <input type='radio' name='aktif' id='optionsRadios1' value='N' /> Tidak Aktif</label>
											";
											}
											else
											{
											echo"
                                                <label><input type='radio' name='aktif' id='optionsRadios1' value='Y' /> Aktif</label>
												<label>&nbsp; <input type='radio' name='aktif' id='optionsRadios1' value='N' checked /> Tidak Aktif</label>
											";	
											}
											echo"
                                        </div>
								</div>
                            </div>
                        </div>
						<div class='panel-footer'>
                                        <button type='submit' class='btn btn-warning square-btn-adjust'><i class='fa fa-refresh'></i> Update</button>
										<a class='btn btn-default square-btn-adjust' onClick='self.history.back()'><i class='fa fa-close'></i> Batal</a>
                                    </form>
                        </div>
                    </div>
                </div>
			</div>
    </div>
";
break;
}//penutup switch
}//penutup session
?>    