<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/pertanyaan/aksi_pertanyaan.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Frequently Asked Questions (FAQ) | Pertanyaan yang sering ditanyakan</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=pertanyaan&aksi=tambah'><i class='fa fa-plus'></i> Tambah Pertanyaan</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Pertanyaan</th>
                                            <th data-hide='phone'>Jawaban</th>
                                            <th style='text-align:center' data-hide='phone'>Aktif</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM pertanyaan ORDER BY id_pertanyaan');
											while($r=mysqli_fetch_array($tp)){
											$text="$r[jawaban]";
											$jawaban=substr($text, 0, 50); //Ambil isi jawaban hanya 50 karakter
												echo"
											<tr>
												<td>$r[pertanyaan]</td>
												<td>$jawaban ...</td>
												<td style='text-align:center'>$r[aktif]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=pertanyaan&aksi=edit&id=$r[id_pertanyaan]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_pertanyaan]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM pertanyaan WHERE id_pertanyaan='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit FAQ</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='$aksi?module=pertanyaan&act=update'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_pertanyaan]>
											<label>Pertanyaan</label>
                                            <input type='text' name='pertanyaan' value='$r[pertanyaan]' class='form-control' /><br />
											<label>Jawaban</label>
                                            <textarea name='jawaban' class='form-control' rows='3'>$r[jawaban]</textarea><br />
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
                        <div class='panel-heading'>Tambah FAQ</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/pertanyaan/aksi_pertanyaan.php?act=input'>
                                        <div class='form-group'>
											<label>Pertanyaan</label>
                                            <input type='text' name='pertanyaan' class='form-control' /><br />
											<label>Jawaban</label>
                                            <textarea name='jawaban' class='form-control' rows='3'></textarea><br />
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