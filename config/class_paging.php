<?php
// class paging untuk halaman produk (menampilkan semua produk)
class PagingProduk{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halproduk'])){
	$posisi=0;
	$_GET['halproduk']=1;
}
else{
	$posisi = ($_GET['halproduk']-1) * $batas;
}
return $posisi;
}
// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}
// Fungsi untuk link halaman
function navHalaman($halaman_aktif, $jmlhalaman){
// Link ke halaman sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=halproduk-$prev><span style='float:left'><< SEBELUMNYA</span></a>";
}
else{ 
	$link_halaman .= "";
}
// Link ke halaman berikutnya (Next)
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<a href=halproduk-$next><span style='float:right'>BERIKUTNYA >></span></a>";
}
else{
	$link_halaman .= "";
}
return $link_halaman;
}
}


// class paging untuk halaman kategori (menampilkan semua kategori)
class PagingKategori{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halkategori'])){
	$posisi=0;
	$_GET['halkategori']=1;
}
else{
	$posisi = ($_GET['halkategori']-1) * $batas;
}
return $posisi;
}
// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}
// Fungsi untuk link halaman
function navHalaman($halaman_aktif, $jmlhalaman){
// Link ke halaman sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=halkategori-$_GET[id]-$prev><span style='float:left'><< SEBELUMNYA</span></a>";
}
else{ 
	$link_halaman .= "";
}
// Link ke halaman berikutnya (Next)
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<a href=halkategori-$_GET[id]-$next><span style='float:right'>BERIKUTNYA >></span></a>";
}
else{
	$link_halaman .= "";
}
return $link_halaman;
}
}


// class paging untuk halaman komentar produk
class PagingKomentarProduk{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halkomentar'])){
	$posisi=0;
	$_GET['halkomentar']=1;
}
else{
	$posisi = ($_GET['halkomentar']-1) * $batas;
}
return $posisi;
}
// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}
// Fungsi untuk link halaman
function navHalaman($halaman_aktif, $jmlhalaman){
// Link ke halaman sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=halkomentar-$_GET[id]-$prev#komentar><span style='float:left'><< SEBELUMNYA</span></a>";
}
else{ 
	$link_halaman .= "";
}
// Link ke halaman berikutnya (Next)
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<a href=halkomentar-$_GET[id]-$next#komentar><span style='float:right'>BERIKUTNYA >></span></a>";
}
else{
	$link_halaman .= "";
}
return $link_halaman;
}
}


// class paging untuk halaman artikel (menampilkan semua artikel) 
class PagingArtikel{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halartikel'])){
	$posisi=0;
	$_GET['halartikel']=1;
}
else{
	$posisi = ($_GET['halartikel']-1) * $batas;
}
return $posisi;
}
// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}
// Fungsi untuk link halaman
function navHalaman($halaman_aktif, $jmlhalaman){
// Link ke halaman sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=halartikel-$prev><span style='float:left'><< SEBELUMNYA</span></a>";
}
else{ 
	$link_halaman .= "";
}
// Link ke halaman berikutnya (Next)
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<a href=halartikel-$next><span style='float:right'>BERIKUTNYA >></span></a>";
}
else{
	$link_halaman .= "";
}
return $link_halaman;
}
}


//class paging untuk halaman pencarian produk dan artikel
class PagingPencarian{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
$kategori = isset($_REQUEST['kategori']) ? $_REQUEST['kategori'] : 'produk';
if(empty($_REQUEST['halpencarian'])){
	$posisi=0;
	$_REQUEST['halpencarian']=1;
}
else{
	$posisi = ($_REQUEST['halpencarian']-1) * $batas;
}
return $posisi;
}
// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}
// Fungsi untuk link halaman
function navHalaman($halaman_aktif, $jmlhalaman){
// Link ke halaman sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=halpencarian-$_REQUEST[kata]-$_REQUEST[kategori]-$prev><span style='float:left'><< SEBELUMNYA</span></a>";
}
else{ 
$link_halaman .= "";
}
// Link ke halaman berikutnya (Next)
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<a href=halpencarian-$_REQUEST[kata]-$_REQUEST[kategori]-$next><span style='float:right'>BERIKUTNYA >></span></a>";
}
else{
	$link_halaman .= "";
}
return $link_halaman;
}
}


// class paging untuk halaman galeri foto
class PagingGaleri{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halgaleri'])){
	$posisi=0;
	$_GET['halgaleri']=1;
}
else{
	$posisi = ($_GET['halgaleri']-1) * $batas;
}
return $posisi;
}
// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}
// Fungsi untuk link halaman
function navHalaman($halaman_aktif, $jmlhalaman){
// Link ke halaman sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=halgaleri-$_GET[id]-$prev><span style='float:left'><< SEBELUMNYA</span></a>";
}
else{ 
	$link_halaman .= "";
}
// Link ke halaman berikutnya (Next)
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<a href=halgaleri-$_GET[id]-$next><span style='float:right'>BERIKUTNYA >></span></a>";
}
else{
	$link_halaman .= "";
}
return $link_halaman;
}
}
?>