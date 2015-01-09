<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<?php
if (isset($_GET['id'])){
    $sql = mysqli_query($konek, "SELECT nama_produk from produk where id_produk='$id'");
    $j   = mysqli_fetch_array($sql);
    if ($j) {
        echo "$j[nama_produk]";
    } 
    else{
      $sql2 = mysqli_query($konek, "SELECT nama_website from identitas LIMIT 1");
      $j2   = mysqli_fetch_array($sql2);
		  echo "$j2[nama_website]";
		}
}
else{
      $sql3 = mysqli_query($konek, "SELECT nama_website from identitas LIMIT 1");
      $j3   = mysqli_fetch_array($sql3);
		  echo "$j3[nama_website]";
}
?>