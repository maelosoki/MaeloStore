<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
			<div class="block community-block">
				<div class="block-title">Kontak Person</div>
				<ul>
					<?php
					$sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from identitas LIMIT 1"));
					echo "
					<li>$sql[no_telp]</li>
					<li>$sql[hp1]</li>
					<li>$sql[bbm]</li>
					";
					?>
				</ul>
			</div>