<?php
session_start();
if ($_SESSION['leveluser']!='admin' AND $_SESSION['leveluser']!='manager'){
	echo "<script>window.location = 'media.php?module=home'</script>";
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/artikel/aksi_artikel.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Daftar Artikel<span style='float:right'><a href='#help' data-toggle='modal'>?</a></span></div>
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
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=artikel&aksi=tambah'><i class='fa fa-plus'></i> Tambah Artikel</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th data-hide='phone'>Link</th>
                                            <th style='text-align:center' data-hide='phone'>Dibaca</th>
                                            <th style='text-align:center' data-hide='phone'>Aktif</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM artikel ORDER BY id_artikel DESC');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr>
												<td>$r[judul]</td>
												<td>artikel-$r[id_artikel]-$r[judul_seo]</td>
												<td style='text-align:center'>$r[dibaca] X</td>
												<td style='text-align:center'>$r[aktif]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=artikel&aksi=edit&id=$r[id_artikel]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_artikel]&namafile=$r[gambar]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM artikel WHERE id_artikel='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
	$tgl  = tgl_indo($r[tanggal]);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Artikel</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/artikel/aksi_artikel.php?act=update' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_artikel]>
											<label>Tgl Posting</label>
                                            <input type='text' name='tanggal' value='$r[hari], $tgl - $r[jam] WIB' class='form-control' disabled='' /><br />
											<label>Dibaca</label>
                                            <input type='text' name='dibaca' value='$r[dibaca] X' class='form-control' disabled='' /><br />
											<label>Judul</label>
                                            <input type='text' name='judul' value='$r[judul]' class='form-control' /><br />
											<label>Isi Artikel</label>
											<br /><progress value='0' max='100' style='width:100%;'></progress>
                                            <textarea id='produk' name='isi_artikel' class='form-control' rows='7'>$r[isi_artikel]</textarea><hr />
											<label>Foto Artikel</label><br />
											";
											if($r[gambar] == 0){echo"<img src='../images/small_no_picture.jpg'>";}
											else{echo"<img src='../foto_artikel/medium_$r[gambar]' width='200'>";}
											echo"
                                            <br /><br />
											<input type='file' name='fupload'></input><br />
											<span>*) Apabila gambar tidak diubah, dikosongkan saja.</span><hr />
											<label>Tampilkan Foto pada artikel : &nbsp;</label>
											";
											if ($r[gambar_tampil]=='Y')
											{
											echo"
                                                <label><input type='radio' name='gambar_tampil' id='optionsRadios1' value='Y' checked /> Ya</label>
												<label>&nbsp; <input type='radio' name='gambar_tampil' id='optionsRadios1' value='N' /> Tidak</label>
											";
											}
											else
											{
											echo"
                                                <label><input type='radio' name='gambar_tampil' id='optionsRadios1' value='Y' /> Ya</label>
												<label>&nbsp; <input type='radio' name='gambar_tampil' id='optionsRadios1' value='N' checked /> Tidak</label>
											";	
											}
											echo"<hr />
											<label>Artikel : &nbsp;</label>
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

case "tambah":
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Tulis Artikel</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/artikel/aksi_artikel.php?act=input' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<label>Judul</label>
                                            <input type='text' name='judul' class='form-control' /><br />
											<label>Isi Artikel</label>
											<br /><progress value='0' max='100' style='width:100%;'></progress>
                                            <textarea id='produk' name='isi_artikel' class='form-control' rows='7'></textarea><hr />
											<label>Foto Artikel</label><span> ( Gambar wajib diisi )</span>
											<input type='file' name='fupload'></input><hr />
                                            <label><input type='radio' name='aktif' id='optionsRadios1' value='Y' checked /> Aktif</label>
											<label>&nbsp; <input type='radio' name='aktif' id='optionsRadios1' value='N' /> Tidak Aktif</label>
                                        </div>
								</div>
                            </div>
                        </div>
						<div class='panel-footer'>
                                        <button type='submit' class='btn btn-primary square-btn-adjust'><i class='fa fa-check'></i> Simpan</button>
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
}
?>    