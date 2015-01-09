<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/widget/aksi_widget.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Widget</div>
                        <div class='panel-body'>
                                <table class='footable' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th style='text-align:center'>Widget</th>
                                            <th data-hide='phone'>Nama</th>
                                            <th data-hide='phone'>Kode Widget</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$no = 1;
											$tp=mysqli_query($konek, 'SELECT * FROM widget ORDER BY id_widget');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr>
												<td style='text-align:center'>$no</td>
												<td>$r[nama_widget]</td>
												<td>$r[isi_widget]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=widget&aksi=edit&id=$r[id_widget]'>EDIT</a></td>
											</tr>";
											$no++;
											}
											echo"
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
";    
break;

case "edit":
	$edit = mysqli_query($konek, "SELECT * FROM widget WHERE id_widget='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Widget</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/widget/aksi_widget.php?act=update'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_widget]>
											<label>Nama Widget</label>
                                            <input type='text' name='nama_widget' value='$r[nama_widget]' class='form-control' /><br />
											<label>Kode Widget</label>
                                            <textarea name='isi_widget' class='form-control' rows='7'>$r[isi_widget]</textarea><br />
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