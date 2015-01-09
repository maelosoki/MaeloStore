<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/pengaturan/aksi_settings.php";
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Pengaturan Website</div>
                        <div class='panel-body'>
									<form method='post' action='$aksi?module=settings&act=update' enctype='multipart/form-data'>
                            <div class='row'>
                                <div class='col-md-6'>
										";
										$sql=mysqli_query($konek, 'SELECT * FROM identitas LIMIT 1');
										while($r=mysqli_fetch_array($sql)){
											echo"
											<label>URL Website</label>
                                            <input type='text' name='url' value='$r[url]' class='form-control' /><br />
											<label>Email</label>
                                            <input type='email' name='email' value='$r[email]' class='form-control' /><br />
											<label>Nama Website</label>
                                            <input type='text' name='nama_website' value='$r[nama_website]' class='form-control' /><br />
											<label>Deskripsi Website</label>
											<textarea name='meta_deskripsi' class='form-control' rows='2'>$r[meta_deskripsi]</textarea><br />
											<label>Kata Kunci Website</label>
                                            <input type='text' name='meta_keyword' value='$r[meta_keyword]' class='form-control' /><br />
											<label>Google Site Verification</label>
                                            <input type='text' name='google_verification' value='$r[google_verification]' class='form-control' /><br />
											<label>Nama Perusahaan</label>
                                            <input type='text' name='nama_perusahaan' value='$r[nama_perusahaan]' class='form-control' /><br />
											<label>Alamat</label>
											<textarea name='alamat' class='form-control' rows='2'>$r[alamat]</textarea><br />
											<label>Telephone</label>
                                            <input type='text' name='no_telp' value='$r[no_telp]' class='form-control' /><br />
											<label>FAX</label>
                                            <input type='text' name='fax' value='$r[fax]' class='form-control' /><br />
								</div>
                                <div class='col-md-6'>
											<label>Handphone 1</label>
                                            <input type='text' name='hp1' value='$r[hp1]' class='form-control' /><br />
											<label>Handphone 2</label>
                                            <input type='text' name='hp2' value='$r[hp2]' class='form-control' /><br />
											<label>BBM</label>
                                            <input type='text' name='bbm' value='$r[bbm]' class='form-control' /><br />
										<div class='col-md-6'>
											<label>Hari Kerja 1</label>
                                            <input type='text' name='hari_kerja1' value='$r[hari_kerja1]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Jam Kerja 1</label>
                                            <input type='text' name='jam_kerja1' value='$r[jam_kerja1]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Hari Kerja 2</label>
                                            <input type='text' name='hari_kerja2' value='$r[hari_kerja2]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Jam Kerja 2</label>
                                            <input type='text' name='jam_kerja2' value='$r[jam_kerja2]' class='form-control' /><br />
										</div>
											<label>Informasi Jam Kerja</label>
											<textarea name='info_jam_kerja' class='form-control' rows='2'>$r[info_jam_kerja]</textarea><hr />
											<label>Logo</label><br />
                                            <img src='../images/$r[logo]' width='250'><br /><br />
											<input type='file' name='fupload'></input><br />
											<span>*) Apabila logo tidak diubah, dikosongkan saja.</span><hr />
										";
										}
										echo"
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