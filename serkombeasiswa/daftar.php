<?php
include 'config.php'; 
// Mengimpor file konfigurasi database (config.php) untuk menghubungkan ke database.

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    // Mengecek apakah request yang diterima adalah metode POST (berasal dari form pengisian).

    // Tangkap data dari form
    // $_POST digunakan untuk menangani data yang dikirim melalui metode HTTP POST.
    $nama = $_POST['nama']; // Nama mahasiswa dari input form.
    $email = $_POST['email']; // Email mahasiswa dari input form.
    $no_hp = $_POST['no_hp']; // Nomor HP mahasiswa dari input form.
    $semester = $_POST['semester']; // Semester saat ini dari input form.
    $ipk = $_POST['ipk']; // IPK mahasiswa berdasarkan semester.
    $beasiswa = $_POST['beasiswa']; // Jenis beasiswa yang dipilih mahasiswa.

    // Proses upload file
    $berkas = $_FILES['berkas']['name']; 
    // Nama file berkas yang diunggah.
    $berkasTmp = $_FILES['berkas']['tmp_name']; 
    // Lokasi sementara file yang diunggah.
    $targetDir = "upload/"; 
    // Direktori tujuan untuk menyimpan file.
    $targetFile = $targetDir . basename($berkas); 
    // Path lengkap lokasi file setelah diunggah.
    move_uploaded_file($berkasTmp, $targetFile); 
    // Memindahkan file dari lokasi sementara ke folder `upload`.

    // Menyimpan ke database
    $query = "INSERT INTO pendaftaran_mahasiswa (nama, email, no_hp, semester, ipk, beasiswa, berkas, status_ajuan) VALUES ('$nama', '$email', '$no_hp', '$semester', '$ipk', '$beasiswa', '$berkas', 'Belum Diverifikasi')";
    // Query SQL untuk menyimpan data mahasiswa ke tabel `mahasiswa`, dengan status ajuan awal "Belum Diverifikasi".
    $conn->query($query); 
    // Menjalankan query untuk menyimpan data ke database.

    // Setelah data disimpan lalu Redirect atau diarahkan ke halaman hasil.php
    header("Location: hasil.php");
    exit; // Menghentikan eksekusi kode setelah redirect.
}
?>
<!DOCTYPE html>
<html lang="id"> 
  <!-- Lang=language bahasa yang digunakan adalah bahasa indonesia -->
<head>
  <meta charset="UTF-8">
  <!-- Mendefinisikan format karaker yang digunakan, yaitu UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> <!-- Menggunakan framework CSS Bootstrap untuk membuat tampilan lebih rapi dan responsif.-->
  <style>
    body { background-color: #b7b7b7; } 
    /* Warna latar belakang halaman */
    .card {
      border: none;
      border-radius: 12px;
      /*membuat kartu dengan sudut membulat*/
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-title { color: #0328fc; } 
    /* Warna judul form */
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow"> <!-- Navbar ini berisi tautan ke halaman Dashboard, Daftar, dan Hasil Pendaftaran -->
  <!-- Navbar dengan menu navigasi -->
  <div class="container">
    <a class="navbar-brand" href="index.php">Beasiswa</a>
    <!-- Nama aplikasi -->
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
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'mahasiswa.php' ? 'active' : '' ?>" href="mahasiswa.php">Hasil Pendaftaran</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Konten Form -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center form-title mb-4">Form Pendaftaran Beasiswa</h3>
            <form method="POST" enctype="multipart/form-data"> <!-- Form dikirimkan menggunakan metode POST untuk mengirim data ke server. Atribut enctype="multipart/form-data" digunakan untuk memungkinkan pengunggahan file.-->
              <!-- Input Nama -->
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
              </div>
              <!-- Input Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
              </div>
              <!-- Input Nomor HP -->
              <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP Anda" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
              </div>
              <!-- Pilihan Semester -->
              <div class="mb-3">
                <label for="semester" class="form-label">Semester Saat Ini</label>
                <select class="form-select" id="semester" name="semester" required>
                  <option value="" disabled selected>Pilih Semester</option>
                  <option value="1">Semester 1</option>
                  <option value="2">Semester 2</option>
                  <option value="3">Semester 3</option>
                  <option value="4">Semester 4</option>
                  <option value="5">Semester 5</option>
                  <option value="6">Semester 6</option>
                  <option value="7">Semester 7</option>
                  <option value="8">Semester 8</option>
                </select>
              </div>
              <!-- Input IPK -->
              <div class="mb-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="text" class="form-control" id="ipk" name="ipk" readonly> <!-- Dikonfigurasi sebagai readonly, sehingga pengguna tidak bisa mengedit-->
              </div>
              <!-- Pilihan Beasiswa -->
              <div class="mb-3">
                <label for="beasiswa" class="form-label">Pilih Beasiswa</label>
                <select class="form-select" id="beasiswa" name="beasiswa" required disabled>
                  <option value="" disabled selected>Pilih Beasiswa</option>
                  <option value="Akademik">Beasiswa Akademik</option>
                  <option value="Non-Akademik">Beasiswa Non-Akademik</option>
                </select>
              </div>
              <!-- Upload Berkas -->
              <div class="mb-3">
                <label for="berkas" class="form-label">Upload Berkas Syarat</label>
                <input type="file" class="form-control" id="berkas" name="berkas" required disabled>
              </div>
              <button type="submit" class="btn btn-primary w-100" disabled>Daftar</button>
            </form>
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
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk menjalankan script setelah halaman dimuat
  const semesterSelect = document.getElementById("semester");
  const ipkInput = document.getElementById("ipk");
  const beasiswaSelect = document.getElementById("beasiswa");
  const berkasInput = document.getElementById("berkas");
  const submitButton = document.querySelector("button[type='submit']");

  // Atur IPK berdasarkan semester
  semesterSelect.addEventListener("change", function () {
    const semester = parseInt(this.value);
    const ipkValues = { 1: 2.9, 2: 3.0, 3: 3.1, 4: 3.2, 5: 3.3, 6: 3.4, 7: 3.5, 8: 3.6 }; // IPK Konstan
    const ipk = ipkValues[semester] || 3.0;

    ipkInput.value = ipk.toFixed(2); // Tampilkan IPK pada input

    // Validasi jika IPK < 3
    if (ipk < 3) { // Jika IPK kurang dari 3.0, dropdown beasiswa, unggah berkas, dan tombol submit dinonaktifkan.
      beasiswaSelect.disabled = true;  // Nonaktifkan pilihan beasiswa
      berkasInput.disabled = true;     // Nonaktifkan upload berkas
      submitButton.disabled = true;    // Nonaktifkan tombol submit
    } else {
      beasiswaSelect.disabled = false; // Aktifkan pilihan beasiswa
      berkasInput.disabled = false;    // Aktifkan upload berkas
      submitButton.disabled = false;   // Aktifkan tombol submit
      beasiswaSelect.focus();          // Fokus otomatis ke pilihan beasiswa
    }
  });
});
  </script>
</body>
</html>