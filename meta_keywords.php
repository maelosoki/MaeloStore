<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<?php
      $sql2 = mysqli_query($konek, "SELECT meta_keyword from identitas LIMIT 1");
      $j2   = mysqli_fetch_array($sql2);
		  echo "$j2[meta_keyword]";
?>