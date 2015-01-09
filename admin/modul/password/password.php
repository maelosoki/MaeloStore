<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Ganti Password</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/password/aksi_password.php'>
                                        <div class='form-group'>
											<label>Password Lama</label>
                                            <input type='password' name='pass_lama' class='form-control' /><br />
											<label>Password Baru</label>
                                            <input type='password' name='pass_baru' class='form-control' /><br />
											<label>Ulangi Password Baru</label>
                                            <input type='password' name='pass_ulangi' class='form-control' />
                                        </div>
								</div>
                            </div>
                        </div>
						<div class='panel-footer'>
                                        <button type='submit' class='btn btn-warning square-btn-adjust'><i class='fa fa-refresh'></i> Update</button>
                                    </form>
                        </div>
                    </div>
                </div>
			</div>
    </div>
";
}//penutup session
?> 