<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/galeri/aksi_galeri.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Galeri</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=galeri&aksi=tambah'><i class='fa fa-plus'></i> Tambah Galeri</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th data-hide='phone'>Gambar</th>
                                            <th data-hide='phone'>Album</th>
                                            <th data-hide='phone'>Keterangan</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM gallery,album WHERE gallery.id_album=album.id_album ORDER BY id_gallery DESC');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr class='gradeA'>
												<td>$r[jdl_gallery]</td>
												<td>
												";
												if($r[gbr_gallery] == 0){echo"<img src='../images/small_no_image.jpg' width='120'>";}
												else{echo"<img src='../img_galeri/kecil_$r[gbr_gallery]' width='120'>";}
												echo"
												</td>
												<td>$r[jdl_album]</td>
												<td>$r[keterangan]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=galeri&aksi=edit&id=$r[id_gallery]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_gallery]&namafile=$r[gbr_gallery]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM gallery WHERE id_gallery='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Galeri</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/galeri/aksi_galeri.php?act=update' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_gallery]>
											<label>Judul</label>
                                            <input type='text' name='jdl_gallery' value='$r[jdl_gallery]' class='form-control' /><br />
											<label>Album</label>
											<select name='album' class='form-control'>
											";
												$tampil=mysqli_query($konek, "SELECT * FROM album ORDER BY jdl_album");
												if ($r[id_album]==0){
												echo "<option value=0 selected>- Pilih Album -</option>";
												}   

												while($w=mysqli_fetch_array($tampil)){
												if ($r[id_album]==$w[id_album]){
												  echo "<option value=$w[id_album] selected>$w[jdl_album]</option>";
												}
												else{
												  echo "<option value=$w[id_album]>$w[jdl_album]</option>";
												}
												}
											echo "
											</select><br />
											<label>Keterangan</label>
                                            <textarea name='keterangan' class='form-control' rows='2'>$r[keterangan]</textarea><br />
											<label>Gambar</label><br />
											";
											if($r[gbr_gallery] == 0){echo"<img src='../images/small_no_image.jpg' width='120'>";}
											else{echo"<img src='../img_galeri/kecil_$r[gbr_gallery]' width='120'>";}
											echo"
											<br /><br />
											<input type='file' name='fupload'></input><br />
											<span>*) Apabila gambar tidak diubah, dikosongkan saja.</span><br />
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
                        <div class='panel-heading'>Tambah Galeri</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/galeri/aksi_galeri.php?act=input' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<label>Judul</label>
                                            <input type='text' name='jdl_gallery' class='form-control' /><br />
											<label>Album</label>
											<select name='album' class='form-control'>
											<option value=0 selected>- Pilih Album -</option>
											";
											$tampil=mysqli_query($konek, "SELECT * FROM album ORDER BY jdl_album");
											while($r=mysqli_fetch_array($tampil)){
											  echo "<option value=$r[id_album]>$r[jdl_album]</option>";
											}
											echo "
											</select><br />
											<label>Keterangan</label>
                                            <textarea name='keterangan' class='form-control' rows='2'>$r[keterangan]</textarea><br />
											<label>Gambar</label><span> ( Gambar wajib diisi )</span>
											<input type='file' name='fupload'></input><br />
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