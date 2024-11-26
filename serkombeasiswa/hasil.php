<?php
session_start(); 
// Memulai sesi untuk memungkinkan penyimpanan dan pengelolaan data sesi pengguna.

include 'config.php'; 
// Mengimpor konfigurasi database untuk memastikan koneksi ke database dapat dilakukan.

$result = $conn->query("SELECT * FROM pendaftaran_mahasiswa ORDER BY id DESC LIMIT 1"); 
// Menjalankan query SQL untuk mengambil data mahasiswa terakhir yang baru saja disubmit.
// Query `ORDER BY id DESC` mengurutkan data berdasarkan `id` dari terbesar ke terkecil.
// `LIMIT 1` memastikan hanya 1 data terakhir yang diambil.

$data = $result->fetch_assoc(); 
// Mengambil hasil query sebagai array asosiatif sehingga data dapat diakses menggunakan nama kolom.
?>

<!DOCTYPE html>
<html lang="id">
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <style>
    body {
      background-color: #b7b7b7; 
      /* Warna latar belakang abu-abu terang untuk tampilan yang bersih. */
    }
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
      /* Memberikan efek bayangan lembut pada kartu untuk estetika. */
    }
    .gradient-text {
      background: linear-gradient(to right, #b7b7b7, #0328fc); 
      /* Teks dengan efek gradasi warna. */
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <!-- Navbar utama untuk navigasi antar halaman -->
    <div class="container">
      <a class="navbar-brand" href="index.php">Beasiswa</a>
      <!-- Judul atau nama aplikasi pada navbar -->
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <!-- Menu navigasi -->
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'daftar.php' ? 'active' : '' ?>" href="daftar.php">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'hasil.php' ? 'active' : '' ?>" href="hasil.php">Hasil Pendaftaran</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Data Mahasiswa -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h1 class="text-center gradient-text mb-4">Data Mahasiswa</h1>
            <!-- Judul besar dengan efek gradasi -->

            <!-- Status Ajuan -->
            <div class="alert alert-danger text-center" role="alert">
              <strong>Status Ajuan:</strong> Belum di verifikasi
              <!-- Menampilkan status pendaftaran mahasiswa -->
            </div>
            <hr class="mb-4">

            <!-- Informasi Mahasiswa -->
            <div class="row">
              <!-- Informasi nama -->
              <div class="col-md-6 mb-3">
                <p class="text-muted">Nama Mahasiswa</p>
                <h5><?= htmlspecialchars($data['nama']); ?></h5> // mencegah serangan XSS dengan mengonversi karakter khusus menjadi entitas HTML.
              </div>
              <!-- Informasi email -->
              <div class="col-md-6 mb-3">
                <p class="text-muted">Email Mahasiswa</p>
                <h5><?= htmlspecialchars($data['email']); ?></h5>
              </div>
              <!-- Informasi nomor HP -->
              <div class="col-md-6 mb-3">
                <p class="text-muted">No. HP</p>
                <h5><?= htmlspecialchars($data['no_hp']); ?></h5>
              </div>
              <!-- Informasi semester -->
              <div class="col-md-6 mb-3">
                <p class="text-muted">Semester Saat ini</p>
                <h5><?= htmlspecialchars($data['semester']); ?></h5>
              </div>
              <!-- Informasi IPK -->
              <div class="col-md-6 mb-3">
                <p class="text-muted">IPK</p>
                <h5><?= htmlspecialchars($data['ipk']); ?></h5>
              </div>
              <!-- Informasi jenis beasiswa -->
              <div class="col-md-6 mb-3">
                <p class="text-muted">Beasiswa</p>
                <h5><?= htmlspecialchars($data['beasiswa']); ?></h5>
              </div>
              <!-- Tautan unduh berkas -->
              <div class="col-md-12 mb-4">
                <p class="text-muted">Berkas</p>
                <a href="uploads/<?= htmlspecialchars($data['berkas']); ?>" download class="btn btn-outline-primary">
                  <?= htmlspecialchars($data['berkas']); ?> <i class="bi bi-download"></i>
                </a>
              </div>
            </div>

            <!-- Tombol Navigasi -->
            <div class="d-flex justify-content-between">
              <a href="index.php" class="btn btn-danger">Kembali</a>
              <a href="mahasiswa.php" class="btn btn-primary">Daftar Mahasiswa</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- Footer -->
 <footer class="fixed bottom-0 w-full text-center py-2 bg-gray-200">
        <p class="text-sm text-gray-600">© 2024 Muhammad Naufal Hadzami. All Rights Reserved.</p>
    </footer>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>