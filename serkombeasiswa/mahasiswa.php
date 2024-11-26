<?php
include 'config.php'; 
// Menyertakan file konfigurasi untuk koneksi ke database.

$result = $conn->query("SELECT * FROM pendaftaran_mahasiswa"); // $conn adalah objek koneksi yang digunakan untuk menjalankan operasi pada database
// Query untuk mengambil semua data dari tabel `pendaftaran_mahasiswa`.

// Mengambil data jumlah pendaftar berdasarkan jenis beasiswa
$data_query = $conn->query("SELECT beasiswa, COUNT(*) as jumlah FROM pendaftaran_mahasiswa GROUP BY beasiswa");
// Query ini menghitung jumlah pendaftar berdasarkan jenis beasiswa (beasiswa). Data dikelompokkan menggunakan GROUP BY.
$beasiswa_labels = [];
$beasiswa_counts = [];
// $row adalah sebuah variabel dalam PHP yang digunakan untuk menyimpan hasil dari setiap iterasi saat mengambil data dari database menggunakan fungsi seperti fetch_assoc().
// fetch_assoc = Metode ini digunakan untuk mengambil satu baris data hasil query dalam bentuk array asosiatif.
while ($row = $data_query->fetch_assoc()) {
    $beasiswa_labels[] = $row['beasiswa'];
    $beasiswa_counts[] = $row['jumlah'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Tambahkan pustaka Chart.js -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
  <style>
    body { background-color: #b7b7b7; }
  </style>
</head>
<body>

  <!-- Header Navigasi -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">Beasiswa</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'daftar.php' ? 'active' : '' ?>" href="daftar.php">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'mahasiswa.php' ? 'active' : '' ?>" href="mahasiswa.php">Hasil Pendaftaran</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten -->
  <div class="container my-5">
    <h1 class="text-center mb-4">Hasil Pendaftaran</h1>
    <div class="card"> 
    <div class="card-body">
            <!-- Tabel Hasil Pendaftaran -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No. HP</th>
                  <th>Semester</th>
                  <th>IPK</th>
                  <th>Beasiswa</th>
                  <th>Kategori Beasiswa</th>
                  <th>Berkas</th>
                  <th>Status Ajuan</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($result->num_rows > 0): ?>
                  <?php $no = 1; ?>
                  <?php while ($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['no_hp'] ?></td>
                    <td><?= $row['semester'] ?></td>
                    <td><?= $row['ipk'] ?></td>
                    <td><?= $row['beasiswa'] ?></td>
                    <td>
                      <?php if ($row['beasiswa'] == 'Akademik'): ?>
                        Akademik (Prestasi Belajar)
                      <?php elseif ($row['beasiswa'] == 'Non-Akademik'): ?>
                        Non-Akademik (Prestasi Lainnya)
                      <?php else: ?>
                        Tidak Diketahui
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="uploads/<?= $row['berkas'] ?>" download><?= $row['berkas'] ?></a> 
                    <td><?= $row['status_ajuan'] ?></td>
                  </tr>
                  <?php endwhile; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="10" class="text-center text-muted">Belum ada yang daftar.</td> // Jika tabel kosong (tidak ada data), pesan ditampilkan:
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

  <!-- Grafik Pie -->
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="text-center">Grafik Beasiswa</h5>
        <canvas id="pieChart"></canvas> <!-- Elemen Canvas untuk Grafik -->
      </div>
    </div>
  </div>
</div>

  <!-- Footer -->
  <footer class="fixed bottom-0 w-full text-center py-2 bg-gray-200">
    <p class="text-sm text-gray-600">© 2024 Muhammad Naufal Hadzami. All Rights Reserved.</p>
  </footer>

  <!-- Script Chart.js -->
  <script>
    const ctx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: <?= json_encode($beasiswa_labels) ?>, // Label dari PHP Mendeklarasikan variabel sebagai array kosong.
        datasets: [{
          data: <?= json_encode($beasiswa_counts) ?>, // Data jumlah dari PHP Variabel lain untuk menyimpan jumlah pendaftar tiap beasiswa.
          backgroundColor: ['#4CAF50', '#FF6384', '#36A2EB', '#FFCE56'], // Warna untuk tiap kategori
          hoverOffset: 4
        }]
      }
    });
  </script>
</body>
</html>
$name[0]= "naufal"
$name[1]= "Hadzami"

echo $name[1]