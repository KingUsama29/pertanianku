<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Informasi Pertanian</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&amp;display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= APP ?>/assets/css/style.css">
</head>
<body>
  <?php include_once APP . "/components/layout/header.php" ?>
  <main>

    <section id="hero" class="hero" aria-label="Seksi hero">
      <div class="container">
        <h1>Membawa Pengetahuan Pertanian ke Ujung Jari Anda</h1>
        <p>Temukan tips, panduan, dan berita terkini seputar dunia pertanian modern dan tradisional.</p>
        <button class="btn-primary" onclick="document.getElementById('artikel').scrollIntoView({behavior:'smooth'})">Jelajah Artikel</button>
      </div>
    </section>
    <?php include_once APP . "/components/article.php" ?>
  </main>
  <?php include_once APP . "/components/layout/footer.php" ?>
  <script src="<?= APP ?>/assets/js/script.js"></script>
</body>
</html>
