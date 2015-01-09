<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
$aksi="modul/sidebar/aksi_sidebar.php";
switch($_GET[aksi]){
default:
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Sidebar</div>
                        <div class='panel-body'>
							<p>Search: <input id='filter' type='text'/>&nbsp; <a href='#clear' class='clear-filter' title='clear filter'>[clear]</a>&nbsp; <span class='row-count'></span></p>
                                <table class='footable' data-filter='#filter' data-page-size='10'>
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th data-hide='phone'>Block 1</th>
                                            <th data-hide='phone'>Block 2</th>
                                            <th data-hide='phone'>Block 3</th>
											<th data-hide='phone'>Block 4</th>
											<th data-hide='phone'>Block 5</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$tp=mysqli_query($konek, 'SELECT * FROM sidebar ORDER BY id_sidebar ASC');
											while($r=mysqli_fetch_array($tp)){
												echo"
											<tr class='gradeA'>
												";
												if ($r['nama_sidebar']=='sidebar_artikel'){echo "<td>Sidebar Artikel</td>";}
												elseif ($r['nama_sidebar']=='sidebar_artikel_detail'){echo "<td>Sidebar Detail Artikel</td>";}
												elseif ($r['nama_sidebar']=='sidebar_halaman'){echo "<td>Sidebar Halaman</td>";}
												elseif ($r['nama_sidebar']=='sidebar_kontak'){echo "<td>Sidebar Kontak</td>";}
												elseif ($r['nama_sidebar']=='sidebar_kontak_aksi'){echo "<td>Sidebar Kontak Terkirim</td>";}
												elseif ($r['nama_sidebar']=='sidebar_testimoni'){echo "<td>Sidebar Testimoni</td>";}
												elseif ($r['nama_sidebar']=='sidebar_testimoni_aksi'){echo "<td>Sidebar Testimoni Terkirim</td>";}
												elseif ($r['nama_sidebar']=='sidebar_produk'){echo "<td>Sidebar Detail Produk</td>";}
												elseif ($r['nama_sidebar']=='sidebar_produk_kategori'){echo "<td>Sidebar Kategori Produk</td>";}
												elseif ($r['nama_sidebar']=='sidebar_pencarian'){echo "<td>Sidebar Hasil Pencarian</td>";}
												elseif ($r['nama_sidebar']=='sidebar_galeri'){echo "<td>Sidebar Galeri</td>";}
												elseif ($r['nama_sidebar']=='sidebar_album'){echo "<td>Sidebar Album</td>";}
												elseif ($r['nama_sidebar']=='sidebar_download'){echo "<td>Sidebar Download</td>";}
												elseif ($r['nama_sidebar']=='sidebar_pertanyaan'){echo "<td>Sidebar Pertanyaan</td>";}
												
												if ($r['block_1']==''){echo "<td>-</td>";} else {echo "<td>$r[block_1]</td>";}
												if ($r['block_2']==''){echo "<td>-</td>";} else {echo "<td>$r[block_2]</td>";}
												if ($r['block_3']==''){echo "<td>-</td>";} else {echo "<td>$r[block_3]</td>";}
												if ($r['block_4']==''){echo "<td>-</td>";} else {echo "<td>$r[block_4]</td>";}
												if ($r['block_5']==''){echo "<td>-</td>";} else {echo "<td>$r[block_5]</td>";}
												echo"
												<td style='text-align:center'><a class='btn btn-success square-btn-adjust' href='?module=sidebar&aksi=edit&id=$r[id_sidebar]'>EDIT</a></td>
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
	$edit = mysqli_query($konek, "SELECT * FROM sidebar WHERE id_sidebar='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "
    <div id='page-wrapper' >
            <div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>Edit Sidebar</div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/sidebar/aksi_sidebar.php?act=update'>
                                        <div class='form-group'>
											<input type=hidden name=id value=$r[id_sidebar]>
											<label>Nama</label>
                                            <input type='text' name='nama' value='$r[nama_sidebar]' class='form-control' disabled='' /><br />
                                            <label>Block Urutan 1</label>
                                            <select name='block_1' class='form-control'>
												"; ?>
												<option <?php if ($r[block_1] == 0 ) echo 'selected'; ?> value="">-</option>
												<option <?php if ($r[block_1] == alamat ) echo 'selected'; ?> value="alamat">Alamat</option>
												<option <?php if ($r[block_1] == banner ) echo 'selected'; ?> value="banner">Banner</option>
												<option <?php if ($r[block_1] == jam_kerja ) echo 'selected'; ?> value="jam_kerja">Jam Kerja</option>
												<option <?php if ($r[block_1] == kategori_produk ) echo 'selected'; ?> value="kategori_produk">Kategori Produk</option>
												<option <?php if ($r[block_1] == kontak ) echo 'selected'; ?> value="kontak">Kontak</option>
												<option <?php if ($r[block_1] == kurir ) echo 'selected'; ?> value="kurir">Kurir</option>
												<option <?php if ($r[block_1] == widget_1 ) echo 'selected'; ?> value="widget_1">Widget 1</option>
												<option <?php if ($r[block_1] == widget_2 ) echo 'selected'; ?> value="widget_2">Widget 2</option>
												<option <?php if ($r[block_1] == widget_3 ) echo 'selected'; ?> value="widget_3">Widget 3</option>
												<?php echo"
                                            </select><br />
                                            <label>Block Urutan 2</label>
                                            <select name='block_2' class='form-control'>
												"; ?>
												<option <?php if ($r[block_2] == 0 ) echo 'selected'; ?> value="">-</option>
												<option <?php if ($r[block_2] == alamat ) echo 'selected'; ?> value="alamat">Alamat</option>
												<option <?php if ($r[block_2] == banner ) echo 'selected'; ?> value="banner">Banner</option>
												<option <?php if ($r[block_2] == jam_kerja ) echo 'selected'; ?> value="jam_kerja">Jam Kerja</option>
												<option <?php if ($r[block_2] == kategori_produk ) echo 'selected'; ?> value="kategori_produk">Kategori Produk</option>
												<option <?php if ($r[block_2] == kontak ) echo 'selected'; ?> value="kontak">Kontak</option>
												<option <?php if ($r[block_2] == kurir ) echo 'selected'; ?> value="kurir">Kurir</option>
												<option <?php if ($r[block_2] == widget_1 ) echo 'selected'; ?> value="widget_1">Widget 1</option>
												<option <?php if ($r[block_2] == widget_2 ) echo 'selected'; ?> value="widget_2">Widget 2</option>
												<option <?php if ($r[block_2] == widget_3 ) echo 'selected'; ?> value="widget_3">Widget 3</option>
												<?php echo"
                                            </select><br />
                                            <label>Block Urutan 3</label>
                                            <select name='block_3' class='form-control'>
												"; ?>
												<option <?php if ($r[block_3] == 0 ) echo 'selected'; ?> value="">-</option>
												<option <?php if ($r[block_3] == alamat ) echo 'selected'; ?> value="alamat">Alamat</option>
												<option <?php if ($r[block_3] == banner ) echo 'selected'; ?> value="banner">Banner</option>
												<option <?php if ($r[block_3] == jam_kerja ) echo 'selected'; ?> value="jam_kerja">Jam Kerja</option>
												<option <?php if ($r[block_3] == kategori_produk ) echo 'selected'; ?> value="kategori_produk">Kategori Produk</option>
												<option <?php if ($r[block_3] == kontak ) echo 'selected'; ?> value="kontak">Kontak</option>
												<option <?php if ($r[block_3] == kurir ) echo 'selected'; ?> value="kurir">Kurir</option>
												<option <?php if ($r[block_3] == widget_1 ) echo 'selected'; ?> value="widget_1">Widget 1</option>
												<option <?php if ($r[block_3] == widget_2 ) echo 'selected'; ?> value="widget_2">Widget 2</option>
												<option <?php if ($r[block_3] == widget_3 ) echo 'selected'; ?> value="widget_3">Widget 3</option>
												<?php echo"										
                                            </select><br />
                                            <label>Block Urutan 4</label>
                                            <select name='block_4' class='form-control'>
												"; ?>
												<option <?php if ($r[block_4] == 0 ) echo 'selected'; ?> value="">-</option>
												<option <?php if ($r[block_4] == alamat ) echo 'selected'; ?> value="alamat">Alamat</option>
												<option <?php if ($r[block_4] == banner ) echo 'selected'; ?> value="banner">Banner</option>
												<option <?php if ($r[block_4] == jam_kerja ) echo 'selected'; ?> value="jam_kerja">Jam Kerja</option>
												<option <?php if ($r[block_4] == kategori_produk ) echo 'selected'; ?> value="kategori_produk">Kategori Produk</option>
												<option <?php if ($r[block_4] == kontak ) echo 'selected'; ?> value="kontak">Kontak</option>
												<option <?php if ($r[block_4] == kurir ) echo 'selected'; ?> value="kurir">Kurir</option>
												<option <?php if ($r[block_4] == widget_1 ) echo 'selected'; ?> value="widget_1">Widget 1</option>
												<option <?php if ($r[block_4] == widget_2 ) echo 'selected'; ?> value="widget_2">Widget 2</option>
												<option <?php if ($r[block_4] == widget_3 ) echo 'selected'; ?> value="widget_3">Widget 3</option>
												<?php echo"										
                                            </select><br />
                                            <label>Block Urutan 5</label>
                                            <select name='block_5' class='form-control'>
												"; ?>
												<option <?php if ($r[block_5] == 0 ) echo 'selected'; ?> value="">-</option>
												<option <?php if ($r[block_5] == alamat ) echo 'selected'; ?> value="alamat">Alamat</option>
												<option <?php if ($r[block_5] == banner ) echo 'selected'; ?> value="banner">Banner</option>
												<option <?php if ($r[block_5] == jam_kerja ) echo 'selected'; ?> value="jam_kerja">Jam Kerja</option>
												<option <?php if ($r[block_5] == kategori_produk ) echo 'selected'; ?> value="kategori_produk">Kategori Produk</option>
												<option <?php if ($r[block_5] == kontak ) echo 'selected'; ?> value="kontak">Kontak</option>
												<option <?php if ($r[block_5] == kurir ) echo 'selected'; ?> value="kurir">Kurir</option>
												<option <?php if ($r[block_5] == widget_1 ) echo 'selected'; ?> value="widget_1">Widget 1</option>
												<option <?php if ($r[block_5] == widget_2 ) echo 'selected'; ?> value="widget_2">Widget 2</option>
												<option <?php if ($r[block_5] == widget_3 ) echo 'selected'; ?> value="widget_3">Widget 3</option>
												<?php echo"
                                            </select>
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