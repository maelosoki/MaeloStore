<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/banner/aksi_banner.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Banner</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=banner&aksi=tambah'><i class='fa fa-plus'></i> Tambah Banner</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th data-hide='phone'>Gambar</th>
                                            <th data-hide='phone'>Posisi</th>
                                            <th style='text-align:center' data-hide='phone'>Tab Baru</th>
                                            <th style='text-align:center' data-hide='phone'>Urutan</th>
                                            <th style='text-align:center' data-hide='phone'>Aktif</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM banner ORDER BY id_banner DESC');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr class='gradeA'>
												<td>$r[judul]</td>
												<td><img src='../foto_banner/$r[gambar]' width='150' /></td>
												<td>$r[posisi]</td>
												<td style='text-align:center'>$r[new_window]</td>
												<td style='text-align:center'>$r[urutan]</td>
												<td style='text-align:center'>$r[publish]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=banner&aksi=edit&id=$r[id_banner]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_banner]&namafile=$r[gambar]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM banner WHERE id_banner='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
	$tgl=tgl_indo($r[tgl_posting]);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Banner</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/banner/aksi_banner.php?act=update' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_banner]>
											<label>Tgl Posting</label>
                                            <input type='text' name='waktu' value='$tgl' class='form-control' disabled='' /><br />
											<label>Judul</label>
                                            <input type='text' name='judul' value='$r[judul]' class='form-control' /><br />
											<label>Link</label>
                                            <input type='text' name='url' value='$r[url]' class='form-control' /><br />
                                            <label>Posisi</label>
                                            <select name='posisi' class='form-control'>
												"; ?>
												<option <?php if ($r[posisi] == Banner_Utama ) echo 'selected'; ?> value="Banner_Utama">Banner Utama</option>
												<option <?php if ($r[posisi] == Banner_Kanan_Atas ) echo 'selected'; ?> value="Banner_Kanan_Atas">Banner Kanan Atas</option>
												<option <?php if ($r[posisi] == Banner_Kanan_Bawah ) echo 'selected'; ?> value="Banner_Kanan_Bawah">Banner Kanan Bawah</option>
												<option <?php if ($r[posisi] == Banner_Produk ) echo 'selected'; ?> value="Banner_Produk">Banner Produk</option>
												<option <?php if ($r[posisi] == Banner_Kaki ) echo 'selected'; ?> value="Banner_Kaki">Banner Kaki</option>
												<option <?php if ($r[posisi] == Banner_Sidebar ) echo 'selected'; ?> value="Banner_Sidebar">Banner Sidebar</option>
												<?php echo"
                                            </select><br />
                                            <label>Urutan</label>
                                            <select name='urutan' class='form-control'>
												"; ?>
												<option <?php if ($r[urutan] == 1 ) echo 'selected'; ?> value="1">1</option>
												<option <?php if ($r[urutan] == 2 ) echo 'selected'; ?> value="2">2</option>
												<option <?php if ($r[urutan] == 3 ) echo 'selected'; ?> value="3">3</option>
												<option <?php if ($r[urutan] == 4 ) echo 'selected'; ?> value="4">4</option>
												<option <?php if ($r[urutan] == 5 ) echo 'selected'; ?> value="5">5</option>
												<?php echo"
                                            </select><hr />
											<label>Gambar</label><br />
                                            <img src='../foto_banner/$r[gambar]' width='200'><br /><br />
											<input type='file' name='fupload'></input><br />
											<span>*) Apabila gambar tidak diubah, dikosongkan saja.</span><hr />
											
											
											

											<label>Ketika di klik buka di Tab/Jendela baru : &nbsp;</label>
											";
											if ($r[new_window]=='Y')
												{echo"
													<label><input type='radio' name='new_window' id='optionsRadios1' value='Y' checked /> Ya</label>
													<label>&nbsp; <input type='radio' name='new_window' id='optionsRadios1' value='N' /> Tidak</label>";
											}
											else{echo"
                                                <label><input type='radio' name='new_window' id='optionsRadios1' value='Y' /> Ya</label>
												<label>&nbsp; <input type='radio' name='new_window' id='optionsRadios1' value='N' checked /> Tidak</label>";	
											}

											echo"<hr />";
											
											

											if ($r[publish]=='Y')
											{
											echo"
                                                <label><input type='radio' name='publish' id='optionsRadios1' value='Y' checked /> Aktif</label>
												<label>&nbsp; <input type='radio' name='publish' id='optionsRadios1' value='N' /> Tidak Aktif</label>
											";
											}
											else
											{
											echo"
                                                <label><input type='radio' name='publish' id='optionsRadios1' value='Y' /> Aktif</label>
												<label>&nbsp; <input type='radio' name='publish' id='optionsRadios1' value='N' checked /> Tidak Aktif</label>
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
                        <div class='panel-heading'>Tambah Banner</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/banner/aksi_banner.php?act=input' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<label>Judul</label>
                                            <input type='text' name='judul' class='form-control' /><br />
											<label>Link</label>
                                            <input type='text' name='url' class='form-control' /><br />
                                            <label>Posisi</label>
                                            <select name='posisi' class='form-control'>
												<option value='' selected>- Pilih Posisi -</option> 
												<option value='Banner_Utama' >Banner Utama</option> 
												<option value='Banner_Kanan_Atas' >Banner Kanan Atas</option> 
												<option value='Banner_Kanan_Bawah' >Banner Kanan Bawah</option>
												<option value='Banner_Produk' >Banner Produk</option> 
												<option value='Banner_Kaki' >Banner Kaki</option> 
												<option value='Banner_Sidebar' >Banner Sidebar</option> 
                                            </select><br />
                                            <label>Urutan</label>
                                            <select name='urutan' class='form-control'>
												<option value='' selected>- Pilih Urutan -</option> 
												<option value='1' >1</option> 
												<option value='2' >2</option> 
												<option value='3' >3</option> 
												<option value='4' >4</option> 
												<option value='5' >5</option> 
                                            </select><hr />
											<label>Gambar</label><span> ( Gambar wajib diisi )</span>
											<input type='file' name='fupload'></input>
											<hr />
											<label>Ketika di klik buka di Tab/Jendela baru : &nbsp;</label>
                                            <label><input type='radio' name='new_window' id='optionsRadios1' value='Y' /> Ya</label>
											<label>&nbsp; <input type='radio' name='new_window' id='optionsRadios1' value='N' checked /> Tidak</label>
											<hr />
                                            <label><input type='radio' name='publish' id='optionsRadios1' value='Y' /> Aktif</label>
											<label>&nbsp; <input type='radio' name='publish' id='optionsRadios1' value='N' checked /> Tidak Aktif</label>
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
?>    