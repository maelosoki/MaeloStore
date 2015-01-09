<?php
// panggil class validasi xss dan injection
require_once('class_validasi.php');

// Koneksi dan memilih database di server
$konek = mysqli_connect("localhost","root","root","maelostore") or die("Koneksi gagal");

// buat variabel untuk validasi dari file class_validasi.php
$val = new Lokovalidasi;
?>