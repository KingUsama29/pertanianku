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
        <h1>Solusi Digital untuk Pertanian Modern</h1>
        <p>Mengelola pertanian dengan informasi terpercaya dan fitur lengkap untuk hasil lebih maksimal.</p>
        <button class="btn-primary" onclick="document.getElementById('penanganan').scrollIntoView({behavior:'smooth'})">Jelajah Fitur</button>
      </div>
    </section>
    <?php include_once APP . "/components/article.php" ?>
    <section id="cuaca" class="section-container" aria-label="Cuaca">
      <h2>Cuaca Hari Ini</h2>
      <?php include_once APP . "/components/weather.php" ?>
    </section>
    <?php include_once APP . "/components/prices.php" ?>
    <?php include_once APP . "/components/contact.php" ?>
    </section>
  </main>
  <?php include_once APP . "/components/layout/footer.php" ?>
  <script src="<?= APP ?>/assets/js/script.js"></script>
</body>
</html>
