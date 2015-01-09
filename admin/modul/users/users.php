<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/users/aksi_users.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Users</div>
                        <div class='panel-body'>
                                <table class='footable' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th data-hide='phone'>Username</th>
                                            <th data-hide='phone'>Nama Lengkap</th>
											<th data-hide='phone'>Email</th>
                                            <th style='text-align:center' data-hide='phone'>Blokir</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM users ORDER BY level');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr>
												<td>$r[level]</td>
												<td>$r[username]</td>
												<td>$r[nama_lengkap]</td>
												<td>$r[email]</td>
												<td style='text-align:center'>
													";
													if ($r[blokir]==Y){echo "Ya";}
													else {echo "Tidak";}
													echo"
												</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=users&aksi=edit&id=$r[level]'>EDIT</a></td>
											</tr>";
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
	$edit = mysqli_query($konek, "SELECT * FROM users WHERE level='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Users</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/users/aksi_users.php?act=update'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[level]>
											<label>Level</label>
                                            <input type='text' name='level' value='$r[level]' class='form-control' disabled='' /><br />
											<label>Nama Lengkap</label>
                                            <input type='text' name='nama_lengkap' value='$r[nama_lengkap]' class='form-control' /><br />
											<label>Email</label>
                                            <input type='email' name='email' value='$r[email]' class='form-control' /><br />
											<label>No HP</label>
                                            <input type='text' name='no_telp' value='$r[no_telp]' class='form-control' /><br />
											<label>Username</label>
                                            <input type='text' name='username' value='$r[username]' class='form-control' /><br />
											<label>Password Lama</label>
                                            <input type='password' name='pass_lama' class='form-control' disabled='' /><br />
											<label>Ganti Password</label>
                                            <input type='password' name='pass_baru' class='form-control' /><br />
											<label>Ulangi Password</label>
                                            <input type='password' name='pass_ulangi' class='form-control' /><br />
											";
											if ($r[level]==admin){
											  echo "<input type=hidden name=blokir value=N>";
											}else{
												if ($r[blokir]=='Y'){
													echo"<label>Blokir : &nbsp;</label><label><input type='radio' name='blokir' id='optionsRadios1' value='Y' checked /> Ya</label>
														 <label>&nbsp; <input type='radio' name='blokir' id='optionsRadios1' value='N' /> Tidak</label>";
												}else{echo"<label>Blokir : &nbsp;</label><label><input type='radio' name='blokir' id='optionsRadios1' value='Y' /> Ya</label>
													  <label>&nbsp; <input type='radio' name='blokir' id='optionsRadios1' value='N' checked /> Tidak</label>";	
												}
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