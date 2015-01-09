<?php
  include "config/koneksi.php";
  $iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM identitas"));
  $sql = mysqli_query($konek, "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 10");

  $file = fopen("rss.xml", "w");

  fwrite($file, '<?xml version="1.0"?> 
  <rss version="2.0">');

  fwrite($file, "<channel> 
				<title>$iden[nama_website]</title> 
				<link>$iden[url]</link> 
				<image>
				<url>$iden[url]/images/$iden[logo]</url>
				<link>$iden[url]</link>
				<width>100</width>
				<height>35</height>
				</image>
				<language>id-id</language>");

  while($r=mysqli_fetch_array($sql)){
  $isi_produk = htmlentities(strip_tags(nl2br($r[deskripsi]))); 
  $isi   = substr($isi_produk,0,500); 
  $isi   = substr($isi_produk,0,strrpos($isi," ")); 

  fwrite($file, "<item>
                 <title>$r[nama_produk]</title>
                 <link>$iden[url]/produk-$r[id_produk]-$r[produk_seo]</link>
                 <description>$isi ...</description>
                 </item>");}

  fwrite($file, "</channel></rss>");
  fclose($file);
?>