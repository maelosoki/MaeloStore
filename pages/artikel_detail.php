<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
<section class="content-wrapper">
	<?php
				$detail=mysqli_query($konek, "SELECT * from artikel where id_artikel='$id'");
				$d   = mysqli_fetch_array($detail);
				$baca = $d[dibaca]+1;
				if($d[aktif] == Y AND $d[gambar_tampil] == Y){
  echo "<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>";
		$sp=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan")); echo"<span style='float:$sp[sidebar_artikel_detail]'>
		<div class='col-left'>
		";
					$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='2'");
					while($block=mysqli_fetch_array($sidebar)){
					  include "block/block_$block[block_1].php";
					  include "block/block_$block[block_2].php";
					  include "block/block_$block[block_3].php";
					  include "block/block_$block[block_4].php";
					  include "block/block_$block[block_5].php";
					}
  echo "</div>
		</span>
		";
		if($sp[sidebar_artikel_detail] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";}
	echo "
		<div class='col-main'>
			<div class='block-01'>
				<h1 class='page-title' align=center>$d[judul]</h1><hr/>	
			</div>
				<div class='cara_beli'>";
					if($d[gambar] == ''){
					  echo "<div class='gambar_artikel_detail'>
							<a href='images/no_picture.jpg' title='Foto artikel tidak tersedia' data-lightbox='image'>
							<img src='images/no_picture.jpg' title='Klik Untuk Memperbesar Gambar'/></a>
							</div>";}
					else{
					  echo "<div class='gambar_artikel_detail'>
							<a href='foto_artikel/$d[gambar]' title='$d[judul]' data-lightbox='image'>
							<img src='foto_artikel/medium_$d[gambar]' title='Klik Untuk Memperbesar Gambar'/></a>
							</div>";}
					echo "$d[isi_artikel] <br />";	 		  
					echo "<div class='pembatas_artikel_lainnya'>Artikel Lainnya :</div>";
					$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
					$batas=$iden[artikel_lainnya];
					$terkini=mysqli_query($konek, "SELECT * from artikel where id_artikel<>'$id' LIMIT $batas ");
					while($t=mysqli_fetch_array($terkini)){      
						$isi_artikel = strip_tags($t['isi_artikel']); // membuat paragraf pada isi artikel dan mengabaikan tag html
						$isi = substr($isi_artikel,0,200); // ambil sebanyak 200 karakter
						$isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
						$tgl = tgl_indo($t[tanggal]);
						echo "<div class='pembatas_artikel_lainnya2'>
								<div class='gambar_artikel_lainnya'><img src=foto_artikel/small_$t[gambar] /></div>
								<div class='judul_artikel'><a href='artikel-$t[id_artikel]-$t[judul_seo]'>$t[judul]</a></div>
								<div class='ket_artikel'>$t[hari], $tgl - $t[jam] WIB | dibaca $t[dibaca] x</div>
								$isi .....
							  </div>";           
					} 
					// Apabila detail artikel dilihat, maka tambahkan berapa kali dibacanya
					mysqli_query($konek, "UPDATE artikel SET dibaca=$d[dibaca]+1 
								  WHERE id_artikel='$id'"); 
				echo "
				</div>
		</div> 
		</span>
				<div class='clearfix'></div>
		</div>";
				}
				elseif($d[aktif] == Y AND $d[gambar_tampil] == N){
  echo "<div class='content-container container'><div class='breadcrum-container'>"; include "breadcumb.php"; echo "</div>
		<div class='col-left'>
		";
					$sidebar=mysqli_query($konek, "SELECT * FROM sidebar where id_sidebar='2'");
					while($block=mysqli_fetch_array($sidebar)){
					  include "block/block_$block[block_1].php";
					  include "block/block_$block[block_2].php";
					  include "block/block_$block[block_3].php";
					  include "block/block_$block[block_4].php";
					  include "block/block_$block[block_5].php";
					}
  echo "</div>
		";
		if($sp[sidebar_artikel_detail] == right){echo"<span style='float:left'>";} else{echo"<span style='float:right'>";}
	echo "
		<div class='col-main'>
			<div class='block-01'>
				<h1 class='page-title' align=center>$d[judul]</h1><hr/>	
			</div>
				<div class='cara_beli'>";
					echo "$d[isi_artikel] <br />";	 		  
					echo "<div class='pembatas_artikel_lainnya'>Artikel Lainnya :</div>";
					$iden=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
					$batas=$iden[artikel_lainnya];
					$terkini=mysqli_query($konek, "SELECT * from artikel where id_artikel<>'$id' LIMIT $batas ");
					while($t=mysqli_fetch_array($terkini)){      
						$isi_artikel = strip_tags($t['isi_artikel']); // membuat paragraf pada isi artikel dan mengabaikan tag html
						$isi = substr($isi_artikel,0,200); // ambil sebanyak 200 karakter
						$isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
						$tgl = tgl_indo($t[tanggal]);
						echo "<div class='pembatas_artikel_lainnya2'>
								<div class='gambar_artikel_lainnya'><img src=foto_artikel/small_$t[gambar] /></div>
								<div class='judul_artikel'><a href='artikel-$t[id_artikel]-$t[judul_seo]'>$t[judul]</a></div>
								<div class='ket_artikel'>$t[hari], $tgl - $t[jam] WIB | dibaca $t[dibaca] x</div>
								$isi .....
							  </div>";           
					} 
					// Apabila detail artikel dilihat, maka tambahkan berapa kali dibacanya
					mysqli_query($konek, "UPDATE artikel SET dibaca=$d[dibaca]+1 
								  WHERE id_artikel='$id'"); 
				echo "
				</div>
		</div> 
		</span>
				<div class='clearfix'></div>
		</div>";
				}
				elseif($d[aktif] == N){
					echo "<div class='content-container container'><div class='newsletter'><strong>Artikel Tidak Aktif</strong></div></div>";
				}
				elseif($d[id_artikel] == ''){
					echo "<div class='content-container container'><div class='newsletter'><strong>Artikel Tidak Tersedia</strong></div></div>";
				}
	?>
</section>