<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/newsletter/aksi_newsletter.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Daftar Newsletter</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=newsletter&aksi=kirimpesan'><i class='fa fa-envelope-o'></i> Kirim Pesan</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th data-hide='phone'>Tanggal Mendaftar</th>
                                            <th style='text-align:center' data-hide='phone'>Status</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM newsletter ORDER BY id_newsletter');
											while($r=mysqli_fetch_array($tp)){
											$tgl_posting=tgl_indo($r[tanggal]);
												echo"
											<tr>
												<td><a href=mailto:$r[email]>$r[email]</a></td>
												<td>$tgl_posting</td>
												<td style='text-align:center'>";
												if ($r['status']=='Y'){
												echo "<a href='$aksi?module=newsletter&act=letter&id=$r[id_newsletter]'>Aktif</a>";
												}
												else{
												echo "<a href='$aksi?module=newsletter&act=unletter&id=$r[id_newsletter]'>Nonaktif</a>";
												}
												echo"
												</td>
												<td style='text-align:center'><a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_newsletter]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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

case "kirimpesan":
$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Kirim Newsletter</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='?module=newsletter&aksi=aksikirimpesan' enctype='multipart/form-data' accept-charset='utf-8'>
                                        <div class='form-group'>
											<label>Dari</label>
                                            <input type='text' name='dari' value='$iden[email]' class='form-control' /><br />
											<label>Subjek</label>
                                            <input type='text' name='judul' class='form-control' /><br />
											<label>Pesan</label>
                                            <textarea id='produk' name='pesan' class='form-control' rows='7'></textarea>
                                        </div>
								</div>
                            </div>
                        </div>
						<div class='panel-footer'>
                                        <button type='submit' class='btn btn-info square-btn-adjust'><i class='fa fa-upload'></i> Kirim</button>
										<a class='btn btn-default square-btn-adjust' onClick='self.history.back()'><i class='fa fa-close'></i> Batal</a>
                                    </form>
                        </div>
                    </div>
                </div>
			</div>
    </div>
";
break;

case "aksikirimpesan":
	$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
	$iden2=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
	$subjek = $_POST["judul"];
	$pengirim = $_POST["dari"];
	$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	$hari = date("w");
	$hari_ini = $seminggu[$hari];
	$date_time 	  = date("Y-m-d H:i:s");
	$isi =$_POST["pesan"];
		$qr=mysqli_query($konek, "SELECT * FROM newsletter WHERE status='Y'");
		while($r=mysqli_fetch_array($qr)){
		$dari = "From: $pengirim \n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=iso-8859-1";
		$pesan = "
			<table width='100%' cellpadding='5' cellspacing='5'>
				<tr>
					<td bgcolor='#333333'>
						<table align='center' width='80%'  style='border: #666666 1px solid;' cellpadding='0' cellspacing='0'>
							<tr>
								<td colspan='2' align='center' bgcolor='#E20C0C'>
									<font face='Arial, Helvetica, sans-serif' size='3' color='#fff'>
									<strong><h2>$iden[nama_perusahaan]<br />Newsletter</h2></strong>
									</font>
								</td>
							</tr>
							<tr>
								<td bgcolor='#EEE6E6' colspan='2' style='border-bottom: #666666 1px solid;'>
									<table width='99%' border='0' cellspacing='5' cellpadding='5'>
									<tr>
										<td width='52%'>
											<font face='Arial, Helvetica, sans-serif' size='2' color='#0000'>$hari_ini, $date_time</font>
										</td>
										<td width='44%' align='right'>
											<font face='Arial, Helvetica, sans-serif' size='2' color='#0000'><a href='$iden[url]'>$iden[nama_website]</a></font>
										</td>
									</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width='60%' valign='top' bgcolor='#FFFFFF'>
									<table width='100%' border='0' cellspacing='5' cellpadding='5'>
									<tr valign='top'>
										<td>$isi</td>
									</tr>
									</table>
								</td>
								<td width='40%' bgcolor='#F6F3F1' valign='top'>
									<table width='100%' cellspacing='5' cellpadding='5'>
									<tr>
										<td>
											<p style='font-family: arial,  helvetica, sans-serif;font-size: 12px;color: #0000;'>
											Email ini dikirim karena anda terdaftar di website $iden[url]</p>Silahkan klik 
											<a href='$iden[url]/berhenti-langganan-$r[encode]'>Unsubcribe</a> 
											untuk berhenti berlangganan</p>
										</td>
									</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor='#666666' colspan='2' style='border-top: #666666 1px solid;' >
									<table width='100%' border='0' cellpadding='10' cellspacing='10' align='center'>
									<tr>
										<td align='left'>
											<font face='Arial, Helvetica, sans-serif' size='2' color='#fffff'>
												<strong>Informasi</strong><br />
											</font>
											<font face='Arial, Helvetica, sans-serif' size='1' color='#fffff'>
												<strong>$iden[nama_perusahaan]</strong><br />
												<strong>Alamat</strong> : $iden[alamat]<br />
											</font>
											<font face='Arial, Helvetica, sans-serif' size='1' color='#fffff'>
												<strong>Telp</strong> : $iden[no_telp] | <strong>Mobile</strong> : $iden[hp1]<br />
												<strong>Twitter</strong> : @$iden2[twitter] | <strong>BBM</strong> : $iden[bbm]
											</font>
										</td>
									</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		";
		$tujuan = $r[email];
		$send = @mail($tujuan, $subjek, $pesan, $dari);
		}
if($send){
	echo "<script>window.alert('Email telah sukses terkirim');
		window.location=('media.php?module=newsletter')</script>";
		}else{
	echo "<script>window.alert('Email gagal terkirim!');
		window.location=('media.php?module=newsletter')</script>";
		}
break;
}//penutup switch
}//penutup session
?>    