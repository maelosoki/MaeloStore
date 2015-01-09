<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
			<div class="paypal-block">
				<a href="#" title="Paypal"><img src="foto_banner/kurir.jpg" title="Ekspedisi" alt="Kurir" /></a>
			</div>