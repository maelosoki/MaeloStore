<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/produk/aksi_produk.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Daftar Produk</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span>
							<span style='float: right;'><a class='btn btn-info square-btn-adjust' href='?module=produk&aksi=tambah'><i class='fa fa-plus'></i> Tambah Produk</a></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th data-hide='phone'>Kode</th>
                                            <th data-hide='phone'>Stok</th>
                                            <th data-hide='phone'>Link</th>
                                            <th style='text-align:center' data-hide='phone'>Status</th>
                                            <th style='text-align:center' data-hide='phone'>Komentar</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM produk ORDER BY id_produk DESC');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr>
												<td>$r[nama_produk]</td>
												<td>$r[kode_produk]</td>
												<td>$r[stok]</td>
												<td>produk-$r[id_produk]-$r[produk_seo]</td>
												<td style='text-align:center'>";
												if ($r['aktif']=='Y'){
												echo "<a href='$aksi?module=produk&act=aktif&id=$r[id_produk]'>Aktif</a>";
												}
												else{
												echo "<a href='$aksi?module=produk&act=nonaktif&id=$r[id_produk]'>Nonaktif</a>";
												}
												echo"
												</td>
												<td style='text-align:center'>$r[komentar]</td>
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=produk&aksi=edit&id=$r[id_produk]'>EDIT</a>
																			<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapus&id=$r[id_produk]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
											</tr>
											";
											}
											echo"
                                    </tbody>
									<tfoot class='hide-if-no-paging'>
										<tr>
											<td colspan='7'>
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
	$edit = mysqli_query($konek, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Produk</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/produk/aksi_produk.php?act=update' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_produk]>
											<label>Nama Produk</label>
                                            <input type='text' name='nama_produk' value='$r[nama_produk]' class='form-control' /><br />
											<label>Kode Produk (SKU)</label>
                                            <input type='text' name='kode_produk' value='$r[kode_produk]' class='form-control' /><br />
                                            <label>Kategori</label>
                                            <select name='kategori' class='form-control'>
											";
											$tampil=mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
											if ($r[id_kategori]==0){
												echo "<option value=0 selected>- Pilih Kategori -</option>";
											}
											while($w=mysqli_fetch_array($tampil)){
											if ($r[id_kategori]==$w[id_kategori]){
												echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
											}
											else{
												echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
											}
											}
											echo"
                                            </select><br />
											<label>Berat</label>
                                            <input type='text' name='berat' value='$r[berat]' class='form-control' placeholder='dalam satuan Kg' /><br />
											<label>Harga</label>
                                            <input type='text' name='harga' value='$r[harga]' class='form-control' placeholder='tanpa titik dan koma' /><br />
											<label>Stok</label>
                                            <input type='text' name='stok' value='$r[stok]' class='form-control' placeholder='apabila tidak diisi berarti stok 0' /><br />
											<label>Keterangan Produk</label>
											<br /><progress value='0' max='100' style='width:100%;'></progress>
                                            <textarea id='produk' name='deskripsi' class='form-control' rows='7'>$r[deskripsi]</textarea><hr />
											<span>*) Apabila gambar tidak diubah, dikosongkan saja.</span><br /><br />
											<label>Gambar Utama</label><br />
											";
											if($r[gambar] == 0){echo"<div class='gbr_tambahan'><img src='../images/small_no_picture.jpg'><input type='file' name='fupload'></input></div>";}
											else{echo"<div class='gbr_tambahan'><img src='../foto_produk/small_$r[gambar]'>
											<input type='file' name='fupload'></input></div>";}

											echo"<hr /><label>Gambar Tambahan</label><br />";
											if($r[gambar2] == 0){echo"<div class='gbr_tambahan'><img src='../images/small_no_picture.jpg'><input type='file' name='fupload2'></input></div>";}
											else{echo"<div class='gbr_tambahan'><img src='../foto_produk/medium_$r[gambar2]'>
											<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapusgambar2&id=$r[id_produk]&namafile=$r[gambar2]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a>
											<input type='file' name='fupload2'></input></div>";}
											
											if($r[gambar3] == 0){echo"<div class='gbr_tambahan'><img src='../images/small_no_picture.jpg'><input type='file' name='fupload3'></input></div>";}
											else{echo"<div class='gbr_tambahan'><img src='../foto_produk/medium_$r[gambar3]'>
											<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapusgambar3&id=$r[id_produk]&namafile=$r[gambar3]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a>
											<input type='file' name='fupload3'></input></div>";}
											
											if($r[gambar4] == 0){echo"<div class='gbr_tambahan'><img src='../images/small_no_picture.jpg'><input type='file' name='fupload4'></input></div>";}
											else{echo"<div class='gbr_tambahan'><img src='../foto_produk/medium_$r[gambar4]'>
											<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapusgambar4&id=$r[id_produk]&namafile=$r[gambar4]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a>
											<input type='file' name='fupload4'></input></div>";}
											
											if($r[gambar5] == 0){echo"<div class='gbr_tambahan'><img src='../images/small_no_picture.jpg'><input type='file' name='fupload5'></input></div>";}
											else{echo"<div class='gbr_tambahan'><img src='../foto_produk/medium_$r[gambar5]'>
											<a class='btn btn-danger square-btn-adjust' href='$aksi?act=hapusgambar5&id=$r[id_produk]&namafile=$r[gambar5]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a>
											<input type='file' name='fupload5'></input></div>";}

											echo"
											<hr />
											<label>Komentar : &nbsp;</label>
											";
											if ($r[komentar]=='Y')
												{echo"
													<label><input type='radio' name='komentar' id='optionsRadios1' value='Y' checked /> Aktif</label>
													<label>&nbsp; <input type='radio' name='komentar' id='optionsRadios1' value='N' /> Tidak Aktif</label>";
											}
											else{echo"
                                                <label><input type='radio' name='komentar' id='optionsRadios1' value='Y' /> Aktif</label>
												<label>&nbsp; <input type='radio' name='komentar' id='optionsRadios1' value='N' checked /> Tidak Aktif</label>";	
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
                        <div class='panel-heading'>Tambah Produk</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/produk/aksi_produk.php?act=input' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<label>Nama Produk</label>
                                            <input type='text' name='nama_produk' class='form-control' /><br />
											<label>Kode Produk (SKU)</label>
                                            <input type='text' name='kode_produk' value='$r[kode_produk]' class='form-control' /><br />
                                            <label>Kategori</label>
                                            <select name='kategori' class='form-control'>
											";
											$tampil=mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
											if ($r[id_kategori]==0){
												echo "<option value=0 selected>- Pilih Kategori -</option>";
											}  
											while($r=mysqli_fetch_array($tampil)){
											  echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
											}                              
											echo"
                                            </select><br />
											<label>Berat</label>
                                            <input type='text' name='berat' class='form-control' placeholder='dalam satuan Kg' /><br />
											<label>Harga</label>
                                            <input type='text' name='harga' class='form-control' placeholder='tanpa titik dan koma' /><br />
											<label>Stok</label>
                                            <input type='text' name='stok' class='form-control' placeholder='apabila tidak diisi berarti stok 0' /><br />
											<label>Keterangan Produk</label>
											<br /><progress value='0' max='100' style='width:100%;'></progress>
                                            <textarea id='produk' name='deskripsi' class='form-control' rows='7'>$r[deskripsi]</textarea><hr />
											<label>Gambar Produk</label><span> ( Jika tidak diisi, Gambar Tambahan tidak dapat ditambahkan )</span>
											<input type='file' name='fupload'></input><hr />
											<label>Gambar Tambahan</label><span> ( Misalnya tampak samping, atas, dll. )</span>
											<input type='file' name='fupload2'></input>
											<input type='file' name='fupload3'></input>
											<input type='file' name='fupload4'></input>
											<input type='file' name='fupload5'></input>
											<hr />
											<label>Komentar : &nbsp;</label>
                                            <label><input type='radio' name='komentar' id='optionsRadios1' value='Y' checked /> Aktif</label>
											<label>&nbsp; <input type='radio' name='komentar' id='optionsRadios1' value='N' /> Tidak Aktif</label>
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