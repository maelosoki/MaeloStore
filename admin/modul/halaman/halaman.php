<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/halaman/aksi_halaman.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Halaman Statis</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=halaman&aksi=tambah'><i class='fa fa-plus'></i> Tambah Halaman</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th style='text-align:center' data-hide='phone'>Tampil Judul</th>
                                            <th style='text-align:center' data-hide='phone'>Link</th>
											<th style='text-align:center' data-hide='phone'>Sidebar</th>
                                            <th style='text-align:center' data-hide='phone'>Aktif</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM halaman ORDER BY id_halaman DESC');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr>
												<td>$r[judul]</td>
												<td style='text-align:center'>$r[tampil_judul]</td>
												<td>halaman-$r[id_halaman]-$r[judul_seo]</td>
												<td style='text-align:center'>
													";
													if ($r[sidebar]==full){echo "-";}
													elseif ($r[sidebar]==left){echo "kiri";}
													elseif ($r[sidebar]==right){echo "kanan";}
													echo"
												</td>
												<td style='text-align:center'>$r[aktif]</td>
												";
												if ($r[disable]==Y){
												  echo "<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=halaman&aksi=edit&id=$r[id_halaman]'>EDIT</a></td>";
												}else{
												  echo "<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=halaman&aksi=edit&id=$r[id_halaman]'>EDIT</a>
														<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_halaman]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
													";
												}
										echo"</tr>";
											}
											echo"
                                    </tbody>
									<tfoot class='hide-if-no-paging'>
										<tr>
											<td colspan='6'>
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
	$edit = mysqli_query($konek, "SELECT * FROM halaman WHERE id_halaman='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
	$tgl_posting=tgl_indo($r[tgl_posting]);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Halaman</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/halaman/aksi_halaman.php?act=update'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_halaman]>
											<label>Tgl Posting</label>
                                            <input type='text' name='tgl_posting' value='$tgl_posting' class='form-control' disabled='' /><br />
											<label>Link Halaman</label>
                                            <input type='text' name='link_halaman' value='halaman-$r[id_halaman]-$r[judul_seo]' class='form-control' /><br />
											<label>Judul</label>
                                            <input type='text' name='judul' value='$r[judul]' class='form-control' /><br />
											<label>Tampilkan Judul : &nbsp;</label>
											";
											if ($r[tampil_judul]=='Y')
											{
											echo"
                                                <label><input type='radio' name='tampil_judul' id='optionsRadios1' value='Y' checked /> Ya</label>
												<label>&nbsp; <input type='radio' name='tampil_judul' id='optionsRadios1' value='N' /> Tidak</label>
											";
											}
											else
											{
											echo"
                                                <label><input type='radio' name='tampil_judul' id='optionsRadios1' value='Y' /> Ya</label>
												<label>&nbsp; <input type='radio' name='tampil_judul' id='optionsRadios1' value='N' checked /> Tidak</label>
											";	
											}
											echo"<hr />
											<label>Isi Halaman</label>
											<br /><progress value='0' max='100' style='width:100%;'></progress>
                                            <textarea id='produk' name='isi_halaman' class='form-control' rows='7'>$r[isi_halaman]</textarea><hr />
											<label>Tampilan Halaman : &nbsp;</label>
											";
											if ($r[sidebar]=='full')
											{
											echo"
												<label><input type='radio' name='sidebar' id='optionsRadios1' value='full' checked /> Tanpa Sidebar</label>
												<label>&nbsp; <input type='radio' name='sidebar' id='optionsRadios1' value='left' /> Sidebar Kiri</label>
												<label>&nbsp; <input type='radio' name='sidebar' id='optionsRadios1' value='right' /> Sidebar Kanan</label>
											";
											}
											elseif ($r[sidebar ]=='left')
											{
											echo"
												<label>&nbsp;<input type='radio' name='sidebar' id='optionsRadios1' value='full' /> Tanpa Sidebar</label>
												<label>&nbsp; &nbsp; &nbsp;<input type='radio' name='sidebar' id='optionsRadios1' value='left' checked /> Sidebar Kiri</label>
												<label>&nbsp; &nbsp; &nbsp;<input type='radio' name='sidebar' id='optionsRadios1' value='right' /> Sidebar Kanan</label>
											";	
											}
											elseif ($r[sidebar ]=='right')
											{
											echo"
												<label><input type='radio' name='sidebar' id='optionsRadios1' value='full' /> Tanpa Sidebar</label>
												<label>&nbsp; <input type='radio' name='sidebar' id='optionsRadios1' value='left' /> Sidebar Kiri</label>
												<label>&nbsp; <input type='radio' name='sidebar' id='optionsRadios1' value='right' checked /> Sidebar Kanan</label>
											";	
											}
											echo"<hr />
											<label>Halaman : &nbsp;</label>
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
                        <div class='panel-heading'>Tambah Halaman</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/halaman/aksi_halaman.php?act=input'>
                                        <div class='form-group'>
											<label>Judul</label>
                                            <input type='text' name='judul' class='form-control' /><br />
											<label>Tampilkan Judul : &nbsp;</label>
                                            <label><input type='radio' name='tampil_judul' id='optionsRadios1' value='Y' checked /> Ya</label>
											<label>&nbsp; <input type='radio' name='tampil_judul' id='optionsRadios1' value='N' /> Tidak</label><hr />
											<label>Isi Halaman</label>
											<br /><progress value='0' max='100' style='width:100%;'></progress>
                                            <textarea id='produk' name='isi_halaman' class='form-control' rows='7'></textarea><hr />
											<label>Tampilan Halaman : &nbsp;</label>
                                            <label><input type='radio' name='sidebar' id='optionsRadios1' value='full' /> Tanpa Sidebar</label>
											<label>&nbsp; <input type='radio' name='sidebar' id='optionsRadios1' value='left' checked /> Sidebar Kiri</label>
											<label>&nbsp; <input type='radio' name='sidebar' id='optionsRadios1' value='right' /> Sidebar Kanan</label><hr />
											<label>Halaman : &nbsp;</label>
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
?>    