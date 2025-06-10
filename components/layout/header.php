<?php
include_once __DIR__ . "../../../includes/session_factory.php";
?>
<header>
  <nav class="container" aria-label="Navigasi utama">
    <div class="logo" tabindex="0">Pertanianku</div>
    <ul class="nav-links">
      <li><a href="#hero">Beranda</a></li>
      <li><a href="#penanganan">Artikel</a></li>
      <li><a href="#cuaca">Cuaca</a></li>
      <li><a href="#harga">Hasil Panen</a></li>
      <li><?= hasSession("isLoggedIn") ? '<a href="/admin">Dashboard</a>' : '<a href="login.php">Login</a>'; ?></li>
    </ul>
    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
</header>