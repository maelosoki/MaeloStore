<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/kontak/aksi_kontak.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Kontak</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Email</th>
											<th data-hide='phone'>Nama</th>
                                            <th data-hide='phone'>Pesan</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$kontak=mysqli_query($konek, 'SELECT * FROM hubungi ORDER BY id_hubungi DESC');
											while($r=mysqli_fetch_array($kontak)){
											$text="$r[pesan]";
											$pesan=substr($text, 0, 50); //Ambil isi pesan hanya 50 karakter
												echo"
											<tr>
												<td>$r[email]</td>
												<td>$r[nama]</td>
												<td>$pesan ...</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=kontak&aksi=balas&id=$r[id_hubungi]'>BALAS</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_hubungi]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
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

case "balas":
	$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
	$balasemail=mysqli_query($konek, "SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r=mysqli_fetch_array($balasemail);
	$tgl=tgl_indo($r[tanggal]);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Belas Pesan</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='?module=kontak&aksi=kirimemail'>
                                        <div class='form-group'>
											<label>Tgl Pesan</label>
                                            <input type='text' name='waktu' value='$tgl' class='form-control' disabled='' /><br />
											<label>Kepada</label>
                                            <input type='text' name='nama' value='$r[nama]' class='form-control' disabled='' /><br />
                                            <input type='text' name='email' value='$r[email]' class='form-control' disabled='' /><br />
											<label>Judul</label>
                                            <input type='text' name='subjek' value='$r[subjek]' class='form-control' disabled='' /><br />
											<label>Pesan Sebelumnya</label>
                                            <textarea name='pesan' class='form-control' rows='4' disabled=''>$r[pesan]</textarea><br />
											<label>Pesan Balasan</label>
                                            <textarea name='balasan' class='form-control' rows='4'></textarea><br />
											<label>Dari</label>
                                            <input type='text' name='dari' value='$iden[email]' class='form-control' />
                                        </div>
								</div>
                            </div>
                        </div>
						<div class='panel-footer'>
                                        <button type='submit' class='btn btn-primary square-btn-adjust'><i class='fa fa-envelope-o'></i> Kirim</button>
										<a class='btn btn-default square-btn-adjust' onClick='self.history.back()'><i class='fa fa-close'></i> Batal</a>
                                    </form>
                        </div>
                    </div>
                </div>
			</div>
    </div>
";
break;

case "kirimemail":
	mail($_POST[email],$_POST[subjek],$_POST[balasan],$_POST[dari]);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='?module=kontak&aksi=kirimemail'>
                                        <div class='form-group'>
											<label>Email telah sukses terkirim ke tujuan</label>
                                        </div>
								</div>
                            </div>
                        </div>
						<div class='panel-footer'>
                                        <a href=javascript:history.go(-2) class='btn btn-primary square-btn-adjust'><i class='fa fa-reply'></i> Kembali</a>
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