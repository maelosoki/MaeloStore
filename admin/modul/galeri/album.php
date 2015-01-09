<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/galeri/aksi_album.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Album</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=album&aksi=tambah'><i class='fa fa-plus'></i> Tambah album</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Judul Album</th>
                                            <th data-hide='phone'>Gambar</th>
                                            <th style='text-align:center' data-hide='phone'>Aktif</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM album ORDER BY id_album DESC');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr class='gradeA'>
												<td>$r[jdl_album]</td>
												<td>
												";
												if($r[gbr_album] == 0){echo"<img src='../images/small_no_image.jpg' width='120'>";}
												else{echo"<img src='../img_album/kecil_$r[gbr_album]' width='120'>";}
												echo"
												</td>
												<td style='text-align:center'>$r[aktif]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=album&aksi=edit&id=$r[id_album]'>EDIT</a>
																			<!--<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_album]&namafile=$r[gbr_album]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a>--></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM album WHERE id_album='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Album</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/galeri/aksi_album.php?act=update' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_album]>
											<label>Judul</label>
                                            <input type='text' name='jdl_album' value='$r[jdl_album]' class='form-control' /><br />
											<label>Gambar</label><br />
											";
											if($r[gbr_album] == 0){echo"<img src='../images/small_no_image.jpg' width='120'>";}
											else{echo"<img src='../img_album/kecil_$r[gbr_album]' width='120'>";}
											echo"
											<br /><br />
											<input type='file' name='fupload'></input><br />
											<span>*) Apabila gambar tidak diubah, dikosongkan saja.</span><hr />
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
                        <div class='panel-heading'>Tambah Album</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/galeri/aksi_album.php?act=input' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<label>Judul</label>
                                            <input type='text' name='jdl_album' class='form-control' /><br />
											<label>Gambar</label><span> ( Gambar wajib diisi )</span>
											<input type='file' name='fupload'></input><hr />
                                            <label><input type='radio' name='aktif' id='optionsRadios1' value='Y' /> Aktif</label>
											<label>&nbsp; <input type='radio' name='aktif' id='optionsRadios1' value='N' checked /> Tidak Aktif</label>
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