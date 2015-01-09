<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<div id="container_sticky" class="normal">
			<div class="block man-block">
				<div class="block-title">Kategori Produk</div>
				  <ul class="left_menu">
						<?php
						$kategori=mysqli_query($konek, "SELECT nama_kategori, kategori.id_kategori, kategori_seo,  
											  count(produk.id_produk) as jml 
											  from kategori left join produk 
											  on produk.id_kategori=kategori.id_kategori 
											  group by nama_kategori DESC");
						while($k=mysqli_fetch_array($kategori)){
							echo "<li class='kategori'><a href='kategori-$k[id_kategori]-$k[kategori_seo]'> $k[nama_kategori] </a></li>";
						}
						?>
				  </ul> 
			</div>
</div>