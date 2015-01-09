<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/tampilan/aksi_tampilan.php";
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Pengaturan Tampilan</div>
                        <div class='panel-body'>
									<form method='post' action='$aksi?module=tampilan&act=update'>
                            <div class='row'>
                                <div class='col-md-6'>
										";
										$sql=mysqli_query($konek, 'SELECT * FROM tampilan LIMIT 1');
										while($r=mysqli_fetch_array($sql)){
											echo"
										<hr />
											<label>Warna Tema : &nbsp;</label>
										";
										if ($r[warna]=='style')
										{
										echo"
											<label style='color:red'><input type='radio' name='warna' id='optionsRadios1' value='style' checked /> Merah</label>
											<label style='color:blue'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_biru' /> Biru</label>
											<label style='color:green'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_hijau' /> Hijau</label>
											<label style='color:orange'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_kuning' /> Orange</label>
											<label style='color:purple'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_ungu' /> Ungu</label>
										";
										}
										elseif ($r[warna]=='style_biru')
										{
										echo"
											<label style='color:red'><input type='radio' name='warna' id='optionsRadios1' value='style' /> Merah</label>
											<label style='color:blue'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_biru' checked /> Biru</label>
											<label style='color:green'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_hijau' /> Hijau</label>
											<label style='color:orange'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_kuning' /> Orange</label>
											<label style='color:purple'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_ungu' /> Ungu</label>
										";	
										}
										elseif ($r[warna]=='style_hijau')
										{
										echo"
											<label style='color:red'><input type='radio' name='warna' id='optionsRadios1' value='style' /> Merah</label>
											<label style='color:blue'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_biru' /> Biru</label>
											<label style='color:green'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_hijau' checked /> Hijau</label>
											<label style='color:orange'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_kuning' /> Orange</label>
											<label style='color:purple'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_ungu' /> Ungu</label>
										";	
										}
										elseif ($r[warna]=='style_kuning')
										{
										echo"
											<label style='color:red'><input type='radio' name='warna' id='optionsRadios1' value='style' /> Merah</label>
											<label style='color:blue'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_biru' /> Biru</label>
											<label style='color:green'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_hijau' /> Hijau</label>
											<label style='color:orange'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_kuning' checked /> Orange</label>
											<label style='color:purple'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_ungu' /> Ungu</label>
										";	
										}
										elseif ($r[warna]=='style_ungu')
										{
										echo"
											<label style='color:red'><input type='radio' name='warna' id='optionsRadios1' value='style' /> Merah</label>
											<label style='color:blue'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_biru' /> Biru</label>
											<label style='color:green'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_hijau' /> Hijau</label>
											<label style='color:orange'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_kuning' /> Orange</label>
											<label style='color:purple'>&nbsp; <input type='radio' name='warna' id='optionsRadios1' value='style_ungu' checked /> Ungu</label>
										";	
										}
										echo"
										<hr />
											<label>Kunci Ctrl+A, Ctrl+C, Ctrl+U & Klik Kanan : &nbsp;</label>
											";
											if ($r[kunci]=='Y')
											{
											echo"
                                                <label><input type='radio' name='kunci' id='optionsRadios1' value='Y' checked /> Ya</label>
												<label>&nbsp; <input type='radio' name='kunci' id='optionsRadios1' value='N' /> Tidak</label>
											";
											}
											else
											{
											echo"
                                                <label><input type='radio' name='kunci' id='optionsRadios1' value='Y' /> Ya</label>
												<label>&nbsp; <input type='radio' name='kunci' id='optionsRadios1' value='N' checked /> Tidak</label>
											";	
											}
											echo"
										<hr />
											<label>Auto Cache : &nbsp;</label>
											";
											if ($r[cache_setting]=='Y')
											{
											echo"
                                                <label><input type='radio' name='cache_setting' id='optionsRadios1' value='Y' checked /> Ya</label>
												<label>&nbsp; <input type='radio' name='cache_setting' id='optionsRadios1' value='N' /> Tidak</label>
											";
											}
											else
											{
											echo"
                                                <label><input type='radio' name='cache_setting' id='optionsRadios1' value='Y' /> Ya</label>
												<label>&nbsp; <input type='radio' name='cache_setting' id='optionsRadios1' value='N' checked /> Tidak</label>
											";	
											}
											echo"
										<hr />
											<label>Menu Home</label>
                                            <input type='text' name='menu_home' value='$r[menu_home]' class='form-control' /><br /><hr />
										<div class='col-md-6'>
											<label>Tombol Beli</label>
                                            <input type='text' name='tombol_beli' value='$r[tombol_beli]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Link Tombol Beli</label>
                                            <input type='text' name='url_tombol_beli' value='$r[url_tombol_beli]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Tombol Habis</label>
                                            <input type='text' name='tombol_habis' value='$r[tombol_habis]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Jika Harga Rp 0</label>
                                            <input type='text' name='harga' value='$r[harga]' class='form-control' /><br /><hr />
										</div>
											<label>Jumlah Produk pada :</label><br />
										<div class='col-md-6'>
											<label>Halaman Utama</label>
                                            <input type='text' name='produk_home' value='$r[produk_home]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Halaman Produk</label>
                                            <input type='text' name='produk_all' value='$r[produk_all]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Kategori</label>
                                            <input type='text' name='produk_kategori' value='$r[produk_kategori]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Produk Lainnya</label>
                                            <input type='text' name='produk_lainnya' value='$r[produk_lainnya]' class='form-control' /><br />
										</div>
										<div class='col-md-12'>
											<label>Hasil Pencarian</label>
                                            <input type='text' name='pencarian_produk' value='$r[pencarian_produk]' class='form-control' /><br /><hr />
										</div>
											<label>Jumlah Artikel pada :</label><br />
										<div class='col-md-6'>
											<label>Halaman Utama</label>
                                            <input type='text' name='artikel_home' value='$r[artikel_home]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Halaman Artikel</label>
                                            <input type='text' name='artikel_all' value='$r[artikel_all]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Artikel Lainnya</label>
                                            <input type='text' name='artikel_lainnya' value='$r[artikel_lainnya]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Hasil Pencarian</label>
                                            <input type='text' name='pencarian_artikel' value='$r[pencarian_artikel]' class='form-control' /><br />
										</div>
								</div>
                                <div class='col-md-6'>
										<hr />
											<label>Social Widget : &nbsp;</label>
											";
											if ($r[social]=='facebook')
											{
											echo"
                                                <label><input type='radio' name='social' id='optionsRadios1' value='facebook' checked /> Facebook Like Box</label>
												<label>&nbsp; <input type='radio' name='social' id='optionsRadios1' value='twitter' /> Twitter Widget</label>
											";
											}
											else
											{
											echo"
                                                <label><input type='radio' name='social' id='optionsRadios1' value='facebook' /> Facebook Like Box</label>
												<label>&nbsp; <input type='radio' name='social' id='optionsRadios1' value='twitter' checked /> Twitter Widget</label>
											";	
											}
											echo"
										<hr />
										<div class='col-md-6'>
											<label>Facebook</label>
                                            <input type='text' name='facebook' value='$r[facebook]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Facebook App Id</label>
                                            <input type='text' name='facebook_app_id' value='$r[facebook_app_id]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Twitter</label>
                                            <input type='text' name='twitter' value='$r[twitter]' class='form-control' /><br />
										</div>
										<div class='col-md-6'>
											<label>Twitter Widget Id</label>
                                            <input type='text' name='twitter_widget_id' value='$r[twitter_widget_id]' class='form-control' /><br /><br />
										</div>
                                <table class='footable' data-filter='#filter' data-page-size='15'>
                                    <thead>
                                        <tr>
                                            <th>Posisi Sidebar</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Artikel</td>
											";
											if ($r[sidebar_artikel]=='left'){
											echo"<td><label><input type='radio' name='sidebar_artikel' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_artikel' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_artikel' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_artikel' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Detail Artikel</td>
											";
											if ($r[sidebar_artikel_detail]=='left'){
											echo"<td><label><input type='radio' name='sidebar_artikel_detail' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_artikel_detail' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_artikel_detail' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_artikel_detail' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Kontak</td>
											";
											if ($r[sidebar_kontak]=='left'){
											echo"<td><label><input type='radio' name='sidebar_kontak' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_kontak' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_kontak' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_kontak' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Kontak Terkirim</td>
											";
											if ($r[sidebar_kontak_aksi]=='left'){
											echo"<td><label><input type='radio' name='sidebar_kontak_aksi' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_kontak_aksi' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_kontak_aksi' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_kontak_aksi' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Testimoni</td>
											";
											if ($r[sidebar_testimoni]=='left'){
											echo"<td><label><input type='radio' name='sidebar_testimoni' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_testimoni' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_testimoni' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_testimoni' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Testimoni Terkirim</td>
											";
											if ($r[sidebar_testimoni_aksi]=='left'){
											echo"<td><label><input type='radio' name='sidebar_testimoni_aksi' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_testimoni_aksi' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_testimoni_aksi' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_testimoni_aksi' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Produk</td>
											";
											if ($r[sidebar_produk]=='left'){
											echo"<td><label><input type='radio' name='sidebar_produk' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_produk' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_produk' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_produk' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Kategori Produk</td>
											";
											if ($r[sidebar_produk_kategori]=='left'){
											echo"<td><label><input type='radio' name='sidebar_produk_kategori' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_produk_kategori' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_produk_kategori' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_produk_kategori' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Hasil Pencarian</td>
											";
											if ($r[sidebar_pencarian]=='left'){
											echo"<td><label><input type='radio' name='sidebar_pencarian' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_pencarian' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_pencarian' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_pencarian' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Galeri</td>
											";
											if ($r[sidebar_galeri]=='left'){
											echo"<td><label><input type='radio' name='sidebar_galeri' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_galeri' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_galeri' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_galeri' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Album</td>
											";
											if ($r[sidebar_album]=='left'){
											echo"<td><label><input type='radio' name='sidebar_album' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_album' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_album' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_album' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Download</td>
											";
											if ($r[sidebar_download]=='left'){
											echo"<td><label><input type='radio' name='sidebar_download' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_download' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_download' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_download' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                        <tr>
                                            <td>Pertanyaan</td>
											";
											if ($r[sidebar_pertanyaan]=='left'){
											echo"<td><label><input type='radio' name='sidebar_pertanyaan' id='optionsRadios1' value='left' checked /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_pertanyaan' id='optionsRadios1' value='right' /> Kanan</label></td>";
											}else{
											echo"<td><label><input type='radio' name='sidebar_pertanyaan' id='optionsRadios1' value='left' /> Kiri</label></td>
												<td><label>&nbsp; <input type='radio' name='sidebar_pertanyaan' id='optionsRadios1' value='right' checked /> Kanan</label></td>";	
											}
												echo"
                                        </tr>
                                    </tbody>
                                </table>
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