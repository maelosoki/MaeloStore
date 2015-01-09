<?php
error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1){echo"<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>"; exit("Direct access not permitted.");}

// ini utk melihat type browser
$agent = $_SERVER['HTTP_USER_AGENT'];

// ini utk melihat script di eksekusi dari mana GET(URL)
$uri = $_SERVER['REQUEST_URI'];

// ini utk melihat IP Pengunjung
$ip = $_SERVER['REMOTE_ADDR'];

// ini utk melihat script di refer dari mana
$ref = $_SERVER['HTTP_REFERER'];

// ini utk melihat Proxy pengunjung
$asli = $_SERVER['HTTP_X_FORWARDED_FOR'];

// ini utk melihat koneksi pengunjung
$via = $_SERVER['HTTP_VIA'];

// ini variabel tanggal
$dtime = date('r');

// perhatian jika pengunjung pakai Proxy transparent
// maka $_SERVER['HTTP_X_FORWARDED_FOR'] akan menampilkan IP Asli pengunjung
// sebaliknya $_SERVER['REMOTE_ADDR'] akan menampilkan Proxy

// ini adalah deskripsi variabel entry_line:
$entry_line = "Waktu: $dtime | IP asli: $ip | Browser: $agent | URL: $uri | Referrer: $ref | Proxy: $asli | Koneksi: $via
"; // <-- perhatian!! ini harus new line alias anda enter sekali supaya hasilnya jadi new line

// "fopen()" utk fungsi membuka file, "a" ini yg paling penting.!!,
// ini berfungsi jika file "jejak.txt" tidak ada dalam server maka PHP akan menciptakannya
$fp = fopen("jejak.txt", "a");

// "fputs()" fungsinya utk menulis log dlm file
fputs($fp, $entry_line);

// "fclose()" fungsinya untuk menutup file
fclose($fp);
?>