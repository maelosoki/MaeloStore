<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
			<div class="paypal-block">
				<?php
					$widget=mysqli_query($konek, "SELECT * FROM widget where id_widget='2'");
					while($w=mysqli_fetch_array($widget)){
					  echo"<div class='cara_beli'>$w[isi_widget]</div>";
					}
				?>
			</div>