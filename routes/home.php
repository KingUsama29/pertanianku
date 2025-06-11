<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Informasi Pertanian</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&amp;display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= PROJECT_ROOT ?>/assets/css/style.css">
</head>
<body>
  <?php include_once PROJECT_ROOT . "/components/layout/header.php" ?>
  <main>
    <section id="hero" class="hero" aria-label="Seksi hero">
      <div class="container">
        <h1>Solusi Digital untuk Pertanian Modern</h1>
        <p>Mengelola pertanian dengan informasi terpercaya dan fitur lengkap untuk hasil lebih maksimal.</p>
        <button class="btn-primary" onclick="document.getElementById('penanganan').scrollIntoView({behavior:'smooth'})">Jelajah Fitur</button>
      </div>
    </section>
    <?php include_once PROJECT_ROOT . "/components/article.php" ?>
    <?php include_once PROJECT_ROOT . "/components/weather.php" ?>
    <?php include_once PROJECT_ROOT . "/components/prices.php" ?>
    <?php include_once PROJECT_ROOT . "/components/contact.php" ?>
    </section>
  </main>
  <?php include_once PROJECT_ROOT . "/components/layout/footer.php" ?>
  <script src="<?= PROJECT_ROOT ?>/assets/js/script.js"></script>
</body>
</html>
