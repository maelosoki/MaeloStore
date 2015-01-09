<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
			<div class="paypal-block">
				<?php
					$banner=mysqli_query($konek, "SELECT * FROM banner where publish='Y' and posisi='Banner_Sidebar' ORDER BY urutan LIMIT 2");
					while($b=mysqli_fetch_array($banner)){
						if($b[new_window] == Y){echo"<ul><li class='banner'><a href='$b[url]' target='_blank' title='$b[judul]'><img src='foto_banner/$b[gambar]' width='220' alt='Banner' /></a>";}
						else {echo"<ul><li class='banner'><a href='$b[url]' title='$b[judul]'><img src='foto_banner/$b[gambar]' width='220' alt='Banner' /></a>";}
					}
				?>
			</div>