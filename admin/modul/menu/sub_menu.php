<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/menu/aksi_sub_menu.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Sub Menu</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=submenu&aksi=tambah'><i class='fa fa-plus'></i> Tambah Sub Menu</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
											<th data-hide='phone'>Menu Utama</th>
                                            <th data-hide='phone'>Link</th>
                                            <th style='text-align:center' data-hide='phone'>Aktif</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tampil = mysqli_query($konek, "SELECT * FROM submenu,mainmenu WHERE submenu.id_main=mainmenu.id_main");
											while($r=mysqli_fetch_array($tampil)){
											if($r[id_submain]!=0){
												$sub = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM submenu WHERE id_sub=$r[id_submain]"));
												$mainmenu = $r[nama_menu]." &gt; ".$sub[nama_sub];
											} else {
												$mainmenu = $r[nama_menu];
											}
												echo"
											<tr class='gradeA'>
												<td>$r[nama_sub]</td>
												<td>$mainmenu</td>
												<td>$r[link_sub]</td>
												<td style='text-align:center'>$r[aktif]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=submenu&aksi=edit&id=$r[id_sub]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_sub]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Sub Menu</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/menu/aksi_sub_menu.php?act=update'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_sub]>
											<label>Nama</label>
                                            <input type='text' name='nama_sub' value='$r[nama_sub]' class='form-control' /><br />
											<label>Menu Utama</label>
											<select name='menu_utama' class='form-control'>
											";
												$tampil=mysqli_query($konek, "SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY nama_menu");
												if ($r[id_main]==0){
												echo "<option value=0 selected>- Pilih Menu Utama -</option>";
												}   
												while($w=mysqli_fetch_array($tampil)){
												if ($r[id_main]==$w[id_main]){
												  echo "<option value=$w[id_main] selected>$w[nama_menu]</option>";
												}
												else{
												  echo "<option value=$w[id_main]>$w[nama_menu]</option>";
												}
												}
											echo "
											</select><br />
											<label>Sub Menu</label>
											<select name='sub_menu' class='form-control'>
											";
												$tampil2=mysqli_query($konek, "SELECT * FROM submenu WHERE id_submain=0 AND aktif='Y' ORDER BY nama_sub");
												if ($r[id_submain]==0){
												echo "<option value=0 selected>- Pilih Sub Menu -</option>";
												}   
												while($s=mysqli_fetch_array($tampil2)){
												if ($r[id_submain]==$s[id_sub]){
												  echo "<option value=''>-</option>
														<option value=$s[id_sub] selected>$s[nama_sub]</option>
														";
												}
												else{
												  echo "<option value=$s[id_sub]>$s[nama_sub]</option>";
												}
												}
											echo "
											</select><br />
											<label>Link</label>
                                            <input type='text' name='link_sub' value='$r[link_sub]' class='form-control' /><br />
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
                        <div class='panel-heading'>Tambah Sub Menu</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/menu/aksi_sub_menu.php?act=input'>
                                        <div class='form-group'>
											<label>Nama</label>
                                            <input type='text' name='nama_sub' class='form-control' /><br />
											<label>Menu Utama</label>
											<select name='menu_utama' class='form-control'>
											<option value=0 selected>- Pilih Menu Utama -</option>
											";
												$tampil=mysqli_query($konek, "SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY nama_menu");
												while($r=mysqli_fetch_array($tampil)){
												  echo "<option value=$r[id_main]>$r[nama_menu]</option>";
												}
											echo "
											</select><br />
											<label>Sub Menu</label>
											<select name='sub_menu' class='form-control'>
											<option value=0 selected>- Pilih Sub Menu -</option>
											";
												$tampil=mysqli_query($konek, "SELECT * FROM submenu WHERE id_submain=0 AND aktif='Y' ORDER BY nama_sub");
												while($r=mysqli_fetch_array($tampil)){
												  echo "<option value=$r[id_sub]>$r[nama_sub]</option>";
												}
											echo "
											</select><br />
											<label>Link</label>
                                            <input type='text' name='link_sub' class='form-control' /><br />
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