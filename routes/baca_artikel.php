<?php
$id = $_GET['artikel_id'] ?? null;

if (!$id) {
    die("ID tidak ditemukan.");
}

// Ambil data lama
$stmt = mysqli_prepare($koneksi, "SELECT * FROM artikel WHERE id = ?");
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Judul Artikel - Pertanianku</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../app/assets/css/artikel1.css">
</head>
<body>
  <header>
    <nav aria-label="Navigasi utama">
      <div class="logo" tabindex="0">Pertanianku</div>
      <ul class="nav-links">
        <li><a href="index.php#hero">Home</a></li>
        <li><a href="index.php#penanganan">Article</a></li>
        <li><a href="index.php#cuaca">Wheater</a></li>
        <li><a href="index.php#harga">Price</a></li>
        <li><a href="index.phplogin.php">Login</a></li>
      </ul>
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
  </header>
  
  <main>
    <article class="container" role="article" aria-label="Artikel Detail">
      <div>
        <h1 class="article-title"><?= $data["title"] ?></h1>
        <div class="article-meta">Ditulis oleh Sari | <?= $data["created_at"] ?></div>
      </div>

      <img src="data:image/png;base64,<?= $data["thumbnail"] ?>" alt="Ladang cabai organik yang subur" class="featured-image" />

      <section class="article-content">
        <p><?= $data["body"] ?></p>
      </section>

    </article>
  </main>

  <footer>
      <div class="footer-container container" role="contentinfo">
        <div class="footer-section">
          <h3>Pertanianku</h3>
          <p>Platform informasi lengkap untuk mendukung pertanian modern dan berkelanjutan.</p>
        </div>
        <div class="footer-section">
          <h3>Link Cepat</h3>
          <ul>
            <li><a href="index.php#penanganan">Home</a></li>
            <li><a href="#katalog">Katalog &amp; Panduan</a></li>
            <li><a href="#harga">Harga Komoditas</a></li>
            <li><a href="login.html">Masuk</a></li>
            <li><a href="register.html">Daftar</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Hubungi Kami</h3>
          <p>Email: support@pertanianku.id</p>
          <p>Telp: +62 812 3456 7890</p>
        </div>
      </div>
      <p style="margin-top:1.5rem; color: #fff; font-size: 0.8rem;">
        &copy; 2024 Pertanianku. All rights reserved.
      </p>
    </footer>
<script src="../app/assets/js/script.js"></script>
</body>
</html>
