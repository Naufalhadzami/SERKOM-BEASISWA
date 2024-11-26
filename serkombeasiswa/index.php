<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"> <!-- Encoding karakter UTF-8 untuk mendukung teks multibahasa -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur skala tampilan di perangkat mobile -->
  <title>Beasiswa</title> <!-- Judul halaman -->
  <!-- Menyertakan Bootstrap 5 untuk gaya dan tata letak -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-[#b7b7b7]"> <!-- Latar belakang halaman berwarna abu-abu terang -->
<style>
    body { background-color: #b7b7b7; } /* Latar belakang abu-abu terang untuk tampilan bersih */
  </style>
  
  <!-- Navbar (Navigasi) -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">Beasiswa</a> <!-- Logo atau nama aplikasi -->
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto"> <!-- Daftar menu navigasi -->
          <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li> <!-- Tautan ke Dashboard -->
          <li class="nav-item"><a class="nav-link" href="daftar.php">Daftar</a></li> <!-- Tautan ke halaman Daftar -->
          <li class="nav-item"><a class="nav-link" href="mahasiswa.php">Hasil Pendaftaran</a></li> <!-- Tautan ke halaman Hasil Pendaftaran -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Konten Utama -->
  <div class="container mt-5"> <!-- Membuat area konten dengan margin atas -->
    <h1 class="text-center">Informasi Beasiswa</h1> <!-- Judul besar halaman, di tengah -->
    <div class="row mt-4"> <!-- Baris untuk kartu informasi beasiswa -->
    <img class="rounded-t-lg" src="https://dewanpendidikanktt.org/storage/assets/images/1660574415.png" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 51%; height: auto;" />
      <!-- Informasi Beasiswa Akademik -->
      <div class="col-md-6"> <!-- Kolom berisi informasi beasiswa akademik -->
        <div class="card"> <!-- Membuat kartu -->
          <div class="card-body">
            <h5 class="card-title">Beasiswa Akademik</h5> <!-- Judul kartu -->
            <p class="card-text">Syarat Pendaftaran:</p> <!-- Deskripsi syarat -
            <ul> <!-- Daftar syarat -->
              <li>1. Mahasiswa aktif semester 1 - 8 dan terdaftar di PDDIKTI.</li> <!-- Syarat 1 -->
              <li>2. Memiliki IPK (Indeks Prestasi Kumulatif) minimal 3.0.</li> <!-- Syarat 2 -->
              <li>3. Tidak sedang/akan menerima bantuan Pendidikan/beasiswa yang lain (PPA, Bidikmisi, dan yang lainnya).Tidak menerima beasiswa lain.</li> <!-- Syarat 3 -->
            </ul>
          </div>
        </div>
      </div>

      <!-- Informasi Beasiswa Non-Akademik -->
      <div class="col-md-6"> <!-- Kolom berisi informasi beasiswa non-akademik -->
        <div class="card"> <!-- Membuat kartu -->
          <div class="card-body">
            <h5 class="card-title">Beasiswa Non-Akademik</h5> <!-- Judul kartu -->
            <p class="card-text">Syarat Pendaftaran:</p> <!-- Deskripsi syarat -->
            <ul> <!-- Daftar syarat -->
              <li>1. Mahasiswa aktif semester 1 - 8 dan terdaftar di PDDIKTI.</li> <!-- Syarat 1 -->
              <li>2. Memiliki IPK (Indeks Prestasi Kumulatif) minimal 3.0.</li> <!-- Syarat 2 -->
              <li>3. Tidak sedang/akan menerima bantuan Pendidikan/beasiswa yang lain (PPA, Bidikmisi, dan yang lainnya).</li> <!-- Syarat 3 -->
            </ul>
          </div>
        </div>
      </div>
        <!-- Footer -->
        <footer class="fixed bottom-0 w-full text-center py-2 bg-gray-200">
            <p class="text-sm text-gray-600">© 2024 Muhammad Naufal Hadzami. All Rights Reserved.</p>
        </footer>
    </div>
  </div>
</body>
</html>
