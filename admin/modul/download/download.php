<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/download/aksi_download.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Download</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=download&aksi=tambah'><i class='fa fa-plus'></i> Tambah Download</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th data-hide='phone'>Nama File</th>
                                            <th style='text-align:center' data-hide='phone'>Tgl Posting</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM download ORDER BY id_download DESC');
											while($r=mysqli_fetch_array($tp)){
											$tgl=tgl_indo($r[tgl_posting]);
												echo"
											<tr>
												<td>$r[judul]</td>
												<td>$r[nama_file]</td>
												<td style='text-align:center'>$tgl</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=download&aksi=edit&id=$r[id_download]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_download]&namafile=$r[nama_file]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM download WHERE id_download='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
	$tgl=tgl_indo($r[tgl_posting]);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Download</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/download/aksi_download.php?act=update' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_download]>
											<label>Tgl Posting</label>
                                            <input type='text' name='tgl_posting' value='$tgl' class='form-control' disabled='' /><br />
											<label>Judul</label>
                                            <input type='text' name='judul' value='$r[judul]' class='form-control' /><br />
											<label>File</label>
                                            <input type='text' value='$r[nama_file]' class='form-control' disabled='' /><br />
											<label>Ganti File</label><br />
											<input type='file' name='fupload'></input><br />
											<span>*) Apabila file tidak diubah, dikosongkan saja.</span>
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
                        <div class='panel-heading'>Tambah File</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/download/aksi_download.php?act=input' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<label>Judul</label>
                                            <input type='text' name='judul' class='form-control' /><br />
											<label>File</label><span> ( Wajib diisi )</span>
											<input type='file' name='fupload'></input>
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