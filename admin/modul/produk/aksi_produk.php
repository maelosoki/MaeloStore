<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = '../../index.php'</script>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";
include "../../../config/fungsi_watermark.php";

$act=$_GET['act'];

// Hapus produk termasuk semua gambar terkait
if ($act=='hapus'){
	$data=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM produk WHERE id_produk='$_GET[id]'"));
	if ($data['gambar']!=''){
	mysqli_query($konek, "DELETE FROM produk WHERE id_produk='$_GET[id]'");
		unlink("../../../foto_produk/$data[gambar]");
		unlink("../../../foto_produk/medium_$data[gambar]");
		unlink("../../../foto_produk/small_$data[gambar]");
	}
	if ($data['gambar2']!=''){
	mysqli_query($konek, "DELETE FROM produk WHERE id_produk='$_GET[id]'");
		unlink("../../../foto_produk/$data[gambar2]");
		unlink("../../../foto_produk/medium_$data[gambar2]");
		unlink("../../../foto_produk/small_$data[gambar2]");
	}
	if ($data['gambar3']!=''){
	mysqli_query($konek, "DELETE FROM produk WHERE id_produk='$_GET[id]'");
		unlink("../../../foto_produk/$data[gambar3]");
		unlink("../../../foto_produk/medium_$data[gambar3]");
		unlink("../../../foto_produk/small_$data[gambar3]");
	}
	if ($data['gambar4']!=''){
	mysqli_query($konek, "DELETE FROM produk WHERE id_produk='$_GET[id]'");
		unlink("../../../foto_produk/$data[gambar4]");
		unlink("../../../foto_produk/medium_$data[gambar4]");
		unlink("../../../foto_produk/small_$data[gambar4]");
	}
	if ($data['gambar5']!=''){
	mysqli_query($konek, "DELETE FROM produk WHERE id_produk='$_GET[id]'");
		unlink("../../../foto_produk/$data[gambar5]");
		unlink("../../../foto_produk/medium_$data[gambar5]");
		unlink("../../../foto_produk/small_$data[gambar5]");
	}
	else{
		mysqli_query($konek, "DELETE FROM produk WHERE id_produk='$_GET[id]'");
	}
	header('location:../../media.php?module=produk');
}

// Hapus gambar tambahan 2
elseif ($act=='hapusgambar2'){
	$data=mysqli_fetch_array(mysqli_query($konek, "SELECT gambar2 FROM produk WHERE id_produk='$_GET[id]'"));
	if ($data['gambar2']!=''){
		mysqli_query($konek, "UPDATE produk SET gambar2 = '' WHERE id_produk = '$_GET[id]'");
		unlink("../../../foto_produk/$_GET[namafile]");
		unlink("../../../foto_produk/medium_$_GET[namafile]");
		unlink("../../../foto_produk/small_$_GET[namafile]");
	}
	echo "<script> alert('Gambar Tambahan Berhasil dihapus');window.location='../../media.php?module=produk&aksi=edit&id=$_GET[id]'</script>\n";
}

// Hapus gambar tambahan 3
elseif ($act=='hapusgambar3'){
	$data=mysqli_fetch_array(mysqli_query($konek, "SELECT gambar3 FROM produk WHERE id_produk='$_GET[id]'"));
	if ($data['gambar3']!=''){
		mysqli_query($konek, "UPDATE produk SET gambar3 = '' WHERE id_produk = '$_GET[id]'");
		unlink("../../../foto_produk/$_GET[namafile]");
		unlink("../../../foto_produk/medium_$_GET[namafile]");
		unlink("../../../foto_produk/small_$_GET[namafile]");
	}
	echo "<script> alert('Gambar Tambahan Berhasil dihapus');window.location='../../media.php?module=produk&aksi=edit&id=$_GET[id]'</script>\n";
}

// Hapus gambar tambahan 4
elseif ($act=='hapusgambar4'){
	$data=mysqli_fetch_array(mysqli_query($konek, "SELECT gambar4 FROM produk WHERE id_produk='$_GET[id]'"));
	if ($data['gambar4']!=''){
		mysqli_query($konek, "UPDATE produk SET gambar4 = '' WHERE id_produk = '$_GET[id]'");
		unlink("../../../foto_produk/$_GET[namafile]");
		unlink("../../../foto_produk/medium_$_GET[namafile]");
		unlink("../../../foto_produk/small_$_GET[namafile]");
	}
	echo "<script> alert('Gambar Tambahan Berhasil dihapus');window.location='../../media.php?module=produk&aksi=edit&id=$_GET[id]'</script>\n";
}

// Hapus gambar tambahan 5
elseif ($act=='hapusgambar5'){
	$data=mysqli_fetch_array(mysqli_query($konek, "SELECT gambar5 FROM produk WHERE id_produk='$_GET[id]'"));
	if ($data['gambar5']!=''){
		mysqli_query($konek, "UPDATE produk SET gambar5 = '' WHERE id_produk = '$_GET[id]'");
		unlink("../../../foto_produk/$_GET[namafile]");
		unlink("../../../foto_produk/medium_$_GET[namafile]");
		unlink("../../../foto_produk/small_$_GET[namafile]");
	}
	echo "<script> alert('Gambar Tambahan Berhasil dihapus');window.location='../../media.php?module=produk&aksi=edit&id=$_GET[id]'</script>\n";
}

// Input produk
elseif ($act=='input'){
	$max_file	= 2097152; // Dalam bytes, artinya 2097152 bytes = 2 MB
	$acak		= rand(1,99);

	$lokasi_file = $_FILES['fupload']['tmp_name']; $tipe_file = $_FILES['fupload']['type']; $nama_file = $_FILES['fupload']['name']; $fileSize = $_FILES['fupload']['size']; $fileError = $_FILES['fupload']['error'];
	if($fileSize == 0){$nama_file_unik = NULL;} else{$nama_file_unik = $acak.$nama_file;} 

	$lokasi_file2 = $_FILES['fupload2']['tmp_name']; $tipe_file2 = $_FILES['fupload2']['type']; $nama_file2 = $_FILES['fupload2']['name']; $fileSize2 = $_FILES['fupload2']['size']; $fileError2 = $_FILES['fupload2']['error'];
	if($fileSize2 == 0){$nama_file_unik2 = NULL;} else{$nama_file_unik2 = $acak.$nama_file2;} 

	$lokasi_file3 = $_FILES['fupload3']['tmp_name']; $tipe_file3 = $_FILES['fupload3']['type']; $nama_file3 = $_FILES['fupload3']['name']; $fileSize3 = $_FILES['fupload3']['size']; $fileError3 = $_FILES['fupload3']['error'];
	if($fileSize3 == 0){$nama_file_unik3 = NULL;} else{$nama_file_unik3 = $acak.$nama_file3;}

	$lokasi_file4 = $_FILES['fupload4']['tmp_name']; $tipe_file4 = $_FILES['fupload4']['type']; $nama_file4 = $_FILES['fupload4']['name']; $fileSize4 = $_FILES['fupload4']['size']; $fileError4 = $_FILES['fupload4']['error'];
	if($fileSize4 == 0){$nama_file_unik4 = NULL;} else{$nama_file_unik4 = $acak.$nama_file4;} 

	$lokasi_file5 = $_FILES['fupload5']['tmp_name']; $tipe_file5 = $_FILES['fupload5']['type']; $nama_file5 = $_FILES['fupload5']['name']; $fileSize5 = $_FILES['fupload5']['size']; $fileError5 = $_FILES['fupload5']['error'];
	if($fileSize5 == 0){$nama_file_unik5 = NULL;} else{$nama_file_unik5 = $acak.$nama_file5;}

	$produk_seo = seo_title($_POST['nama_produk']);

	// Apabila ada gambar yang diupload
	if (!empty($lokasi_file) || !empty($lokasi_file2) || !empty($lokasi_file3) || !empty($lokasi_file4) || !empty($lokasi_file5)){
		if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" || $tipe_file2 != "image/jpeg" AND $tipe_file2 != "image/pjpeg" || $tipe_file3 != "image/jpeg" AND $tipe_file3 != "image/pjpeg" || $tipe_file4 != "image/jpeg" AND $tipe_file4 != "image/pjpeg" || $tipe_file5 != "image/jpeg" AND $tipe_file5 != "image/pjpeg")
			{echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG'); window.location=('../../media.php?module=produk')</script>";}
		elseif($fileSize > $max_file || $fileSize2 > $max_file || $fileSize3 > $max_file || $fileSize4 > $max_file || $fileSize5 > $max_file)
			{echo "<script>window.alert('Upload Gagal, Ukuran Gambar Anda lebih dari 2Mb, Silahkan dikompress'); window.location=('../../media.php?module=produk')</script>";}
		else{
			if($fileError == 0 || $fileError2 == 0 || $fileError3 == 0 || $fileError4 == 0 || $fileError5 == 0){
				$path = "../../../foto_produk/"; 
				$new=$path.$nama_file_unik; $new2=$path.$nama_file_unik2; $new3=$path.$nama_file_unik3; $new4=$path.$nama_file_unik4; $new5=$path.$nama_file_unik5;
				watermark_produk($new); watermark_produk2($new2); watermark_produk3($new3); watermark_produk4($new4); watermark_produk5($new5);
				UploadImage($nama_file_unik); UploadImage2($nama_file_unik2); UploadImage3($nama_file_unik3); UploadImage4($nama_file_unik4); UploadImage5($nama_file_unik5);
				mysqli_query($konek, "INSERT INTO produk(nama_produk, kode_produk, produk_seo, id_kategori, berat, harga, stok, deskripsi, tgl_masuk, komentar, gambar, gambar2, gambar3, gambar4, gambar5) 
									  VALUES('$_POST[nama_produk]', '$_POST[kode_produk]', '$produk_seo', '$_POST[kategori]', '$_POST[berat]', '$_POST[harga]', '$_POST[stok]', '$_POST[deskripsi]', '$tgl_sekarang', '$_POST[komentar]',
											   '$nama_file_unik', '$nama_file_unik2', '$nama_file_unik3', '$nama_file_unik4', '$nama_file_unik5')");
				header('location:../../media.php?module=produk');
			}
		}
	}
	else{
		mysqli_query($konek, "INSERT INTO produk(nama_produk, kode_produk, produk_seo, id_kategori, berat, harga, stok, deskripsi, komentar, tgl_masuk) 
							  VALUES('$_POST[nama_produk]', '$_POST[kode_produk]', '$produk_seo', '$_POST[kategori]', '$_POST[berat]', '$_POST[harga]', '$_POST[stok]', '$_POST[deskripsi]', '$_POST[komentar]', '$tgl_sekarang')");
		header('location:../../media.php?module=produk');
	}
}

// Update produk
elseif ($act=='update'){
	$max_file	= 2097152; // Dalam bytes, artinya 2097152 bytes = 2 MB
	$acak		= rand(1,99);
	$data		= mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM produk WHERE id_produk='$_POST[id]'"));
	$path		= "../../../foto_produk/";

	$lokasi_file = $_FILES['fupload']['tmp_name']; $tipe_file = $_FILES['fupload']['type']; $nama_file = $_FILES['fupload']['name']; $fileSize = $_FILES['fupload']['size']; $fileError = $_FILES['fupload']['error'];
	if($fileSize == 0){$nama_file_unik = NULL;} else{$nama_file_unik = $acak.$nama_file;} 

	$lokasi_file2 = $_FILES['fupload2']['tmp_name']; $tipe_file2 = $_FILES['fupload2']['type']; $nama_file2 = $_FILES['fupload2']['name']; $fileSize2 = $_FILES['fupload2']['size']; $fileError2 = $_FILES['fupload2']['error'];
	if($fileSize2 == 0){$nama_file_unik2 = NULL;} else{$nama_file_unik2 = $acak.$nama_file2;} 

	$lokasi_file3 = $_FILES['fupload3']['tmp_name']; $tipe_file3 = $_FILES['fupload3']['type']; $nama_file3 = $_FILES['fupload3']['name']; $fileSize3 = $_FILES['fupload3']['size']; $fileError3 = $_FILES['fupload3']['error'];
	if($fileSize3 == 0){$nama_file_unik3 = NULL;} else{$nama_file_unik3 = $acak.$nama_file3;}

	$lokasi_file4 = $_FILES['fupload4']['tmp_name']; $tipe_file4 = $_FILES['fupload4']['type']; $nama_file4 = $_FILES['fupload4']['name']; $fileSize4 = $_FILES['fupload4']['size']; $fileError4 = $_FILES['fupload4']['error'];
	if($fileSize4 == 0){$nama_file_unik4 = NULL;} else{$nama_file_unik4 = $acak.$nama_file4;} 

	$lokasi_file5 = $_FILES['fupload5']['tmp_name']; $tipe_file5 = $_FILES['fupload5']['type']; $nama_file5 = $_FILES['fupload5']['name']; $fileSize5 = $_FILES['fupload5']['size']; $fileError5 = $_FILES['fupload5']['error'];
	if($fileSize5 == 0){$nama_file_unik5 = NULL;} else{$nama_file_unik5 = $acak.$nama_file5;}

	$produk_seo = seo_title($_POST['nama_produk']);

	// Apabila gambar utama tidak diganti
	if (empty($lokasi_file)){
	mysqli_query($konek, "UPDATE produk SET nama_produk = '$_POST[nama_produk]',
										   kode_produk	= '$_POST[kode_produk]',
										   produk_seo	= '$produk_seo', 
										   id_kategori	= '$_POST[kategori]',
										   berat		= '$_POST[berat]',
										   harga		= '$_POST[harga]',
										   stok			= '$_POST[stok]',
										   komentar		= '$_POST[komentar]',
										   deskripsi	= '$_POST[deskripsi]'
									 WHERE id_produk	= '$_POST[id]'");
	header('location:../../media.php?module=produk');
	}
	else{
		if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg")
			{echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG'); window.location=('../../media.php?module=produk')</script>";}
		elseif($fileSize > $max_file)
			{echo "<script>window.alert('Upload Gagal, Ukuran Gambar Anda lebih dari 2Mb, Silahkan dikompress'); window.location=('../../media.php?module=produk')</script>";}
		else{
			// hapus file gambar utama yang telah ada di server
			if($data['gambar']!=''){
				unlink("../../../foto_produk/$data[gambar]");
				unlink("../../../foto_produk/small_$data[gambar]");
				unlink("../../../foto_produk/medium_$data[gambar]");
			}
			// jika tidak ada error, upload gambar pengganti dan update database
			if($fileError == 0){
				$new=$path.$nama_file_unik; watermark_produk($new); UploadImage($nama_file_unik);
				mysqli_query($konek, "UPDATE produk SET nama_produk	= '$_POST[nama_produk]',
														kode_produk	= '$_POST[kode_produk]',
														produk_seo	= '$produk_seo', 
														id_kategori	= '$_POST[kategori]',
														berat		= '$_POST[berat]',
														harga		= '$_POST[harga]',
														stok		= '$_POST[stok]',
														komentar	= '$_POST[komentar]',
														deskripsi	= '$_POST[deskripsi]',
														gambar		= '$nama_file_unik' 								   
													WHERE id_produk	= '$_POST[id]'");
				header('location:../../media.php?module=produk');
			}

		}
	}

	// Apabila gambar tambahan-2 tidak diganti
	if (empty($lokasi_file2)){
	mysqli_query($konek, "UPDATE produk SET nama_produk = '$_POST[nama_produk]',
										   kode_produk	= '$_POST[kode_produk]',
										   produk_seo	= '$produk_seo', 
										   id_kategori	= '$_POST[kategori]',
										   berat		= '$_POST[berat]',
										   harga		= '$_POST[harga]',
										   stok			= '$_POST[stok]',
										   komentar		= '$_POST[komentar]',
										   deskripsi	= '$_POST[deskripsi]'
									 WHERE id_produk	= '$_POST[id]'");
	header('location:../../media.php?module=produk');
	}
	else{
		if ($tipe_file2 != "image/jpeg" AND $tipe_file2 != "image/pjpeg")
			{echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG'); window.location=('../../media.php?module=produk')</script>";}
		elseif($fileSize2 > $max_file)
			{echo "<script>window.alert('Upload Gagal, Ukuran Gambar Anda lebih dari 2Mb, Silahkan dikompress'); window.location=('../../media.php?module=produk')</script>";}
		else{
			// hapus file gambar tambahan 2 yang telah ada di server
			if($data['gambar2']!=''){
				unlink("../../../foto_produk/$data[gambar2]");
				unlink("../../../foto_produk/small_$data[gambar2]");
				unlink("../../../foto_produk/medium_$data[gambar2]");
			}
			// jika tidak ada error, upload gambar pengganti 2 dan update database
			if($fileError2 == 0){
				$new2=$path.$nama_file_unik2; watermark_produk2($new2); UploadImage2($nama_file_unik2);
				mysqli_query($konek, "UPDATE produk SET nama_produk	= '$_POST[nama_produk]',
														kode_produk	= '$_POST[kode_produk]',
														produk_seo	= '$produk_seo', 
														id_kategori	= '$_POST[kategori]',
														berat		= '$_POST[berat]',
														harga		= '$_POST[harga]',
														stok		= '$_POST[stok]',
														komentar	= '$_POST[komentar]',
														deskripsi	= '$_POST[deskripsi]',
														gambar2		= '$nama_file_unik2' 								   
													WHERE id_produk	= '$_POST[id]'");
				header('location:../../media.php?module=produk');
			}

		}
	}
	
	// Apabila gambar tambahan-3 tidak diganti
	if (empty($lokasi_file3)){
	mysqli_query($konek, "UPDATE produk SET nama_produk = '$_POST[nama_produk]',
										   kode_produk	= '$_POST[kode_produk]',
										   produk_seo	= '$produk_seo', 
										   id_kategori	= '$_POST[kategori]',
										   berat		= '$_POST[berat]',
										   harga		= '$_POST[harga]',
										   stok			= '$_POST[stok]',
										   komentar		= '$_POST[komentar]',
										   deskripsi	= '$_POST[deskripsi]'
									 WHERE id_produk	= '$_POST[id]'");
	header('location:../../media.php?module=produk');
	}
	else{
		if ($tipe_file3 != "image/jpeg" AND $tipe_file3 != "image/pjpeg")
			{echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG'); window.location=('../../media.php?module=produk')</script>";}
		elseif($fileSize3 > $max_file)
			{echo "<script>window.alert('Upload Gagal, Ukuran Gambar Anda lebih dari 2Mb, Silahkan dikompress'); window.location=('../../media.php?module=produk')</script>";}
		else{
			// hapus file gambar tambahan 3 yang telah ada di server
			if($data['gambar3']!=''){
				unlink("../../../foto_produk/$data[gambar3]");
				unlink("../../../foto_produk/small_$data[gambar3]");
				unlink("../../../foto_produk/medium_$data[gambar3]");
			}
			// jika tidak ada error, upload gambar pengganti 3 dan update database
			if($fileError3 == 0){
				$new3=$path.$nama_file_unik3; watermark_produk3($new3); UploadImage3($nama_file_unik3);
				mysqli_query($konek, "UPDATE produk SET nama_produk	= '$_POST[nama_produk]',
														kode_produk	= '$_POST[kode_produk]',
														produk_seo	= '$produk_seo', 
														id_kategori	= '$_POST[kategori]',
														berat		= '$_POST[berat]',
														harga		= '$_POST[harga]',
														stok		= '$_POST[stok]',
														komentar	= '$_POST[komentar]',
														deskripsi	= '$_POST[deskripsi]',
														gambar3		= '$nama_file_unik3' 								   
													WHERE id_produk	= '$_POST[id]'");
				header('location:../../media.php?module=produk');
			}

		}
	}
	
	// Apabila gambar tambahan-4 tidak diganti
	if (empty($lokasi_file4)){
	mysqli_query($konek, "UPDATE produk SET nama_produk = '$_POST[nama_produk]',
										   kode_produk	= '$_POST[kode_produk]',
										   produk_seo	= '$produk_seo', 
										   id_kategori	= '$_POST[kategori]',
										   berat		= '$_POST[berat]',
										   harga		= '$_POST[harga]',
										   stok			= '$_POST[stok]',
										   komentar		= '$_POST[komentar]',
										   deskripsi	= '$_POST[deskripsi]'
									 WHERE id_produk	= '$_POST[id]'");
	header('location:../../media.php?module=produk');
	}
	else{
		if ($tipe_file4 != "image/jpeg" AND $tipe_file4 != "image/pjpeg")
			{echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG'); window.location=('../../media.php?module=produk')</script>";}
		elseif($fileSize4 > $max_file)
			{echo "<script>window.alert('Upload Gagal, Ukuran Gambar Anda lebih dari 2Mb, Silahkan dikompress'); window.location=('../../media.php?module=produk')</script>";}
		else{
			// hapus file gambar tambahan 4 yang telah ada di server
			if($data['gambar4']!=''){
				unlink("../../../foto_produk/$data[gambar4]");
				unlink("../../../foto_produk/small_$data[gambar4]");
				unlink("../../../foto_produk/medium_$data[gambar4]");
			}
			// jika tidak ada error, upload gambar pengganti 4 dan update database
			if($fileError4 == 0){
				$new4=$path.$nama_file_unik4; watermark_produk4($new4); UploadImage4($nama_file_unik4);
				mysqli_query($konek, "UPDATE produk SET nama_produk	= '$_POST[nama_produk]',
														kode_produk	= '$_POST[kode_produk]',
														produk_seo	= '$produk_seo', 
														id_kategori	= '$_POST[kategori]',
														berat		= '$_POST[berat]',
														harga		= '$_POST[harga]',
														stok		= '$_POST[stok]',
														komentar	= '$_POST[komentar]',
														deskripsi	= '$_POST[deskripsi]',
														gambar4		= '$nama_file_unik4' 								   
													WHERE id_produk	= '$_POST[id]'");
				header('location:../../media.php?module=produk');
			}

		}
	}
	
	// Apabila gambar tambahan-5 tidak diganti
	if (empty($lokasi_file5)){
	mysqli_query($konek, "UPDATE produk SET nama_produk = '$_POST[nama_produk]',
										   kode_produk	= '$_POST[kode_produk]',
										   produk_seo	= '$produk_seo', 
										   id_kategori	= '$_POST[kategori]',
										   berat		= '$_POST[berat]',
										   harga		= '$_POST[harga]',
										   stok			= '$_POST[stok]',
										   komentar		= '$_POST[komentar]',
										   deskripsi	= '$_POST[deskripsi]'
									 WHERE id_produk	= '$_POST[id]'");
	header('location:../../media.php?module=produk');
	}
	else{
		if ($tipe_file5 != "image/jpeg" AND $tipe_file5 != "image/pjpeg")
			{echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG'); window.location=('../../media.php?module=produk')</script>";}
		elseif($fileSize5 > $max_file)
			{echo "<script>window.alert('Upload Gagal, Ukuran Gambar Anda lebih dari 2Mb, Silahkan dikompress'); window.location=('../../media.php?module=produk')</script>";}
		else{
			// hapus file gambar tambahan 5 yang telah ada di server
			if($data['gambar5']!=''){
				unlink("../../../foto_produk/$data[gambar5]");
				unlink("../../../foto_produk/small_$data[gambar5]");
				unlink("../../../foto_produk/medium_$data[gambar5]");
			}
			// jika tidak ada error, upload gambar pengganti 5 dan update database
			if($fileError5 == 0){
				$new5=$path.$nama_file_unik5; watermark_produk5($new5); UploadImage5($nama_file_unik5);
				mysqli_query($konek, "UPDATE produk SET nama_produk	= '$_POST[nama_produk]',
														kode_produk	= '$_POST[kode_produk]',
														produk_seo	= '$produk_seo', 
														id_kategori	= '$_POST[kategori]',
														berat		= '$_POST[berat]',
														harga		= '$_POST[harga]',
														stok		= '$_POST[stok]',
														komentar	= '$_POST[komentar]',
														deskripsi	= '$_POST[deskripsi]',
														gambar5		= '$nama_file_unik5' 								   
													WHERE id_produk	= '$_POST[id]'");
				header('location:../../media.php?module=produk');
			}

		}
	}
}

// Nonaktifkan Produk
elseif ($act=='aktif'){
	$query1=mysqli_query($konek, "UPDATE produk SET aktif='N' WHERE id_produk='$_GET[id]'");
	header('location:../../media.php?module=produk');
}
// Aktifkan Produk
elseif ($act=='nonaktif'){
	$query1=mysqli_query($konek, "UPDATE produk SET aktif='Y' WHERE id_produk='$_GET[id]'");
	header('location:../../media.php?module=produk');
}

}
?>