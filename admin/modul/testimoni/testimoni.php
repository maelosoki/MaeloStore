<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/testimoni/aksi_testimoni.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Testimoni</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th data-hide='phone'>Testimonial</th>
                                            <th style='text-align:center' data-hide='phone'>Aktif</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM testimoni ORDER BY id_testimoni DESC');
											while($r=mysqli_fetch_array($tp)){
											$text="$r[pesan]";
											$pesan=substr($text, 0, 45); //Ambil isi testimoni hanya 45 karakter
												echo"
											<tr>
												<td>$r[nama]</td>
												<td>$pesan ...</td>
												<td style='text-align:center'>$r[aktif]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=testimoni&aksi=edittestimoni&id=$r[id_testimoni]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_testimoni]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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

case "edittestimoni":
	$edit = mysqli_query($konek, "SELECT * FROM testimoni WHERE id_testimoni='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
	$tgl=tgl_indo($r[tanggal]);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Testimoni</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='$aksi?module=testimoni&act=update'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_testimoni]>
											<label>Tgl Testimoni</label>
                                            <input type='text' name='waktu' value='$tgl' class='form-control' disabled='' /><br />
											<label>Nama</label>
                                            <input type='text' name='nama' value='$r[nama]' class='form-control' /><br />
											<label>Email</label>
                                            <input type='text' name='email' value='$r[email]' class='form-control' disabled='' /><br />
											<label>Kota Asal</label>
                                            <input type='text' name='kota' value='$r[kota]' class='form-control' /><br />
											<label>Testimoni</label>
                                            <textarea name='pesan' class='form-control' rows='3'>$r[pesan]</textarea><br />
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