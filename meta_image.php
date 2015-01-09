<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<?php
if (isset($_GET['id'])){
    $query = "SELECT gambar FROM produk WHERE id_produk='$id'";
    $hasil = mysqli_query($konek, $query);
    $data  = mysqli_fetch_array($hasil);
	echo "foto_produk/$data[gambar]";
}
else{
	echo "default.jpg";
}
?>