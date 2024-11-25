<?php
// Konfigurasi Database
// $ Berfungsi untuk menyimpan data, mengakses array, mengatur loop, dan lebih banyak lag, dan $ penanda wajib pada variable dalam PHP
$host = '127.0.0.1:8111'; // seharusnya pake 'localhost' Nama host untuk database (biasanya 'localhost' jika database ada di server lokal)
$username = 'root';  // Username untuk mengakses database (default untuk server lokal adalah 'root')
$password = '';      // Password untuk user 'root' (defaultnya kosong untuk server lokal)
$database = 'serkombeasiswa_db'; // Nama database yang akan digunakan (disesuaikan dengan database yang dibuat)

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database); 
// Membuat objek koneksi MySQLi dengan parameter host, username, password, dan nama database
// $conn adalah objek koneksi yang digunakan untuk menjalankan operasi pada database

// Cek koneksi
if ($conn->connect_error) { 
    // Mengecek apakah koneksi mengalami error (dengan memeriksa properti connect_error pada objek $conn)
    die("Koneksi ke database gagal: " . $conn->connect_error);
    // Jika terjadi error, die() akan menghentikan eksekusi script dan mencetak pesan error
}
?>
