<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/menu/aksi_menu.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Menu Utama</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=mainmenu&aksi=tambah'><i class='fa fa-plus'></i> Tambah Menu</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th data-hide='phone'>Link</th>
                                            <th style='text-align:center' data-hide='phone'>Urutan</th>
                                            <th style='text-align:center' data-hide='phone'>Aktif</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM mainmenu ORDER BY urutan ASC');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr class='gradeA'>
												<td>$r[nama_menu]</td>
												<td>$r[link]</td>
												<td style='text-align:center'>$r[urutan]</td>
												<td style='text-align:center'>$r[aktif]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=mainmenu&aksi=edit&id=$r[id_main]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_main]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM mainmenu WHERE id_main='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Menu</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/menu/aksi_menu.php?act=update'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_main]>
											<label>Nama</label>
                                            <input type='text' name='nama_menu' value='$r[nama_menu]' class='form-control' /><br />
											<label>Link</label>
                                            <input type='text' name='link' value='$r[link]' class='form-control' /><br />
                                            <label>Urutan</label>
                                            <select name='urutan' class='form-control'>
												<option value=$r[urutan] selected>$r[urutan]</option> 
												<option value='1' >1</option> 
												<option value='2' >2</option> 
												<option value='3' >3</option> 
												<option value='4' >4</option> 
												<option value='5' >5</option> 
												<option value='6' >6</option> 
												<option value='7' >7</option> 
												<option value='8' >8</option> 
												<option value='9' >9</option> 
												<option value='10' >10</option> 
                                            </select><br />
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
                        <div class='panel-heading'>Tambah Menu</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/menu/aksi_menu.php?act=input'>
                                        <div class='form-group'>
											<label>Nama</label>
                                            <input type='text' name='nama_menu' class='form-control' /><br />
											<label>Link</label>
                                            <input type='text' name='link' class='form-control' /><br />
                                            <label>Urutan</label>
                                            <select name='urutan' class='form-control'>
												<option value='' selected>- Pilih Urutan -</option> 
												<option value='1' >1</option> 
												<option value='2' >2</option> 
												<option value='3' >3</option> 
												<option value='4' >4</option> 
												<option value='5' >5</option> 
												<option value='6' >6</option> 
												<option value='7' >7</option> 
												<option value='8' >8</option> 
												<option value='9' >9</option> 
												<option value='10' >10</option> 
                                            </select><br />
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