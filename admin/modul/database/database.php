<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
if ($_SESSION['leveluser']!='admin'){
	echo "<script>window.location = 'media.php?module=home'</script>";
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/database/aksi_database.php";
switch($_GET[aksi]){
default:
$path="modul/database/backup/";

if($_GET['act']=="backup")
{
	include "fungsi.php";
	backup_tables(); // Cuma backup tabel doang buat keperluan restore
	echo "<meta http-equiv='refresh' content='2; url=media.php?module=database'>";
}

elseif($_GET['act']=="full")
{
	// Backup semua tabel tanpa kecuali
	include "fungsi.php";
	backup_tables_full();

	// Generate install.txt untuk mengaktifkan modus install
	$gen = fopen("../install.txt", "w");
	fwrite($gen, "0");
	fclose($gen);

	// Copy install.bak ke Root kemudian Rename (untuk persiapan installasi nantinya)
	copy("../config/install.bak", "../install.bak");
	rename("../install.bak", "../install.php");

	include "class_backup.php"; // Bungkus semua file ke dalam zip dan file maelostore.zip disimpan ke root

	// Jika semua file sudah di backup (.zip) hapus file berikut :
	unlink("../dbackup.sql");
	unlink("../install.txt");
	unlink("../install.php");
	// Tugas sudah selesai kembali ke halaman modul
	echo "<meta http-equiv='refresh' content='2; url=media.php?module=database'>";
}

elseif ($_GET['act']=="restore")
{
				// Restore Tabel
				$filename = $path.$_GET['file']; // Path File
				$templine = ''; // Temporary variable, used to store current query
				$lines = file($filename); // Read in entire file
				foreach ($lines as $line) // Loop through each line
				{
					if (substr($line, 0, 2) == '--' || $line == '') // Skip it if it’s a comment
						continue;
					$templine .= $line; // Add this line to the current segment
					if (substr(trim($line), -1, 1) == ';') // If it has a semicolon at the end, it’s the end of the query
					{
						mysqli_query($konek, $templine); // Perform the query
						$templine = ''; // Reset temp variable to empty
					}
				}
					echo "<script>alert('Database berhasil direstore'); window.location = 'media.php?module=database'</script>";
}

elseif ($_GET['act']=="hapus")
{
	if(unlink($path.$_GET['file'])){
		echo "<meta http-equiv='refresh' content='0; url=media.php?module=database'>";
	}else{
	echo "<script>alert('File gagal dihapus'); window.location = 'media.php?module=database'</script>";
	}
}

elseif ($_GET['act']=="hapusbackup")
{
	if(unlink('../maelostore.zip')){
		echo "<meta http-equiv='refresh' content='0; url=media.php?module=database'>";
	}else{
	echo "<script>alert('File gagal dihapus'); window.location = 'media.php?module=database'</script>";
	}
}

if ($handle = opendir($path)) {
echo "
	<form method='post'>
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Backup Restore Database<span style='float:right'><a href='#help' data-toggle='modal'>?</a></span></div>
                            <div class='modal fade' id='help' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Bantuan</h4>
                                        </div>
                                        <div class='modal-body'>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class='panel-body'>
											<p><span style='float: right;'>
											";
											if(file_exists("../maelostore.zip"))
											{echo"
												<a class='btn btn-success square-btn-adjust' href='modul/database/dl.php?file=maelostore.zip')\">Download Full Website (.zip)</a>
												<a class='btn btn-danger square-btn-adjust' href='?module=database&act=hapusbackup' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a>
											";}
											else{echo "<a class='btn btn-default square-btn-adjust' href='?module=database&act=full'><i class='fa fa-download'></i> Backup Full Website</a>";}
											echo"
											</span></p><br />
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-default square-btn-adjust' href='?module=database&aksi=cek'><i class='fa fa-check-square-o'></i> Check</a>
														<a class='btn btn-warning square-btn-adjust' href='?module=database&aksi=upload'><i class='fa fa-upload'></i> Upload</a>
														<a class='btn btn-info square-btn-adjust' href='?module=database&act=backup'><i class='fa fa-download'></i> Backup</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th style='text-align:center' data-hide='phone'>No</th>
											<th data-hide='phone'>Nama</th>
                                            <th>Dibuat Tanggal</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$no = 1;
											while (false !== ($file = readdir($handle)))
												if ($file != "." && $file != ".." && strpos($file, ".sql",1) && $s = explode("-",$file))
												echo"
											<tr>
												<td style='text-align:center'>".$no++."</td>
												<td><a href='modul/database/download.php?file=$file'>$file</a></td>
												<td>".@date('d M Y H:i:s',$s[2])."</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=database&act=restore&file=$file' onClick=\"return confirm('Apakah Anda benar-benar mau merestore database? Data terbaru anda akan hilang!')\">Restore</a>
																			<a class='btn btn-danger square-btn-adjust' href='?module=database&act=hapus&file=$file' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
											</tr>
											";
											closedir($handle);
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
	</form>
";    
}
break;

case "upload":
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Upload Database</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/database/aksi_database.php?act=upload' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<label>File SQL</label>
											<input type='file' name='fupload'></input>
                                        </div>
								</div>
                            </div>
                        </div>
						<div class='panel-footer'>
                                        <button type='submit' class='btn btn-primary square-btn-adjust'><i class='fa fa-check'></i> Upload</button>
										<a class='btn btn-default square-btn-adjust' onClick='self.history.back()'><i class='fa fa-close'></i> Batal</a>
                                    </form>
                        </div>
                    </div>
                </div>
			</div>
    </div>
";
break;

case "cek":
echo "
	<form method='post'>
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Check Database<span style='float:right'><a href='#help' data-toggle='modal'>?</a></span></div>
                            <div class='modal fade' id='help' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Bantuan</h4>
                                        </div>
                                        <div class='modal-body'>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'>
								<form method='post' action='?module=database&aksi=repair'>
									<button type='submit' name='repair' class='btn btn-warning square-btn-adjust'><i class='fa fa-wrench'></i> Repair</button>
								</form>
									<a class='btn btn-default square-btn-adjust' href='?module=database'><i class='fa fa-close'></i> Kembali</a>
							</span>
							</p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th style='text-align:center' data-hide='phone'>No</th>
											<th data-hide='phone'>Tabel</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$no = 1;
											$sql_3 = "SHOW TABLES";
											$q_3 = mysqli_query($konek, $sql_3);
											while($r_3=mysqli_fetch_array( $q_3 )){
											   $table_name = $r_3[0];
											   $sql_4 = "CHECK TABLE `$table_name`";
											   $q_4 = mysqli_query($konek, $sql_4);
											   while( $r_4 = mysqli_fetch_array( $q_4 ) ){
											echo"
											<tr>
												<td style='text-align:center'>".$no++."</td>
												<td>$table_name</td>
												<td>$r_4[Msg_text]</td>
											</tr>
											";											
											   }
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
	</form>
";    
break;

case "repair":
echo "
	<form method='post'>
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Check Database<span style='float:right'><a href='#help' data-toggle='modal'>?</a></span></div>
                            <div class='modal fade' id='help' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Bantuan</h4>
                                        </div>
                                        <div class='modal-body'>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'>
								<form method='post' action='?module=database&aksi=repair'>
									<button type='submit' name='repair' class='btn btn-warning square-btn-adjust'><i class='fa fa-wrench'></i> Repair</button>
								</form>
									<a class='btn btn-default square-btn-adjust' href='?module=database'><i class='fa fa-close'></i> Kembali</a>
							</span>
							</p>
											";
											if( isset( $_POST[repair] ) ){
											sleep(5);
											echo"
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th style='text-align:center' data-hide='phone'>No</th>
											<th data-hide='phone'>Tabel</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$no = 1;
											$sql_1 = "SHOW TABLES";
											$q_1 = mysqli_query($konek, $sql_1);
											while($r_1=mysqli_fetch_array( $q_1 )){
											   $table_name = $r_1[0];
											   $sql_2 = "REPAIR TABLE `$table_name`";
											   $q_2 = mysqli_query($konek, $sql_2);
											   while( $r_2 = mysqli_fetch_array( $q_2 ) ){
											echo"
											<tr>
												<td style='text-align:center'>".$no++."</td>
												<td>$table_name</td>
												<td>$r_2[Msg_text]</td>
											</tr>
											";
											   }
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
											";
											}
											echo"
                        </div>
                    </div>
                </div>
            </div>
    </div>
	</form>
";    
break;
}//penutup switch
}//penutup session
}
?>