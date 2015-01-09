<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}
?>
		<h1>
			<span>Menu</span>
				<a class="menuBox highlight" href="javascript:void(0);">ccc</a>
			<span class="clearfix"></span>
		</h1>
		<div id="menuInnner" style="display:none; overflow: hidden;">
		  <ul class="accordion">
			<?php
				$sql=mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tampilan"));
				echo "<li><a href='home'>$sql[menu_home]</a></li>";

              $main=mysqli_query($konek, "SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY urutan ASC");
              while($r=mysqli_fetch_array($main)){

	            $sub=mysqli_query($konek, "SELECT * FROM submenu, mainmenu  
                            WHERE submenu.id_main=mainmenu.id_main 
                            AND submenu.id_main=$r[id_main] AND submenu.id_submain=0 AND submenu.aktif='Y'");
				$jml=mysqli_num_rows($sub);
				if ($jml > 0){
					echo "<li class='parent'><a href='$r[link]'>$r[nama_menu]</a>";
				}else{
					echo "<li><a href='$r[link]'>$r[nama_menu]</a>";
				}

                // apabila sub menu ditemukan                
                if ($jml > 0){
                  echo "<ul>";                 
	                while($w=mysqli_fetch_array($sub)){

						$sub2 = mysqli_query($konek, "SELECT * FROM submenu WHERE id_submain=$w[id_sub] AND id_submain!=0");
						$jml2=mysqli_num_rows($sub2);					
						if ($jml2 > 0){
							echo "<li class='parent'><a href='$w[link_sub]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp; $w[nama_sub]</a>";
						}else{
							echo "<li><a href='$w[link_sub]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp; $w[nama_sub]</a>";
						}

						if ($jml2 > 0){
							echo "<ul>";
								while($s=mysqli_fetch_array($sub2)){echo "<li><a href='$s[link_sub]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; $s[nama_sub]</a></li>";}
							echo "</ul>";
						}
					echo "</li>";
	                }
                 echo "</ul>";
                }
                else{echo "</li>";}
              }
			?>
			  <span class="clearfix"></span>
		  </ul>
		</div>