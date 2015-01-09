<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
			<div class="block community-block">
				<div class="block-title">Jam Kerja</div>
				<ul>
					<li class="question-row"><strong>Customer Service:</strong><br/>
						<?php
						$sql = mysqli_fetch_array(mysqli_query($konek, "SELECT * from identitas LIMIT 1"));
						echo "
						$sql[hari_kerja1] : $sql[jam_kerja1]<br/>
						$sql[hari_kerja2] : $sql[jam_kerja2]
					</li>
					<li class='question-row'><strong>Jam Kerja Transaksi:</strong><br/>
						$sql[hari_kerja1] : $sql[jam_kerja1]<br/>
						$sql[hari_kerja2] : $sql[jam_kerja2]
					</li>
					<li>$sql[info_jam_kerja]</li>
						";
						?>
				</ul>
			</div>