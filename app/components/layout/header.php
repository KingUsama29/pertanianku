<nav class="container" aria-label="Navigasi utama">
    <div class="logo" tabindex="0">Pertanianku</div>
    <ul class="nav-links">
        <li><a href="#hero">Beranda</a></li>
        <li><a href="#penanganan">Artikel</a></li>
        <li><a href="#cuaca">Cuaca</a></li>
        <li><a href="#harga">Hasil Panen</a></li>
        <li><?= isset($_SESSION["username"]) ? '<a href="' . base_url("/dashboard") . '">Dashboard</a>' : '<a href="' . base_url("/login") . '">Login</a>'; ?></li>
    </ul>
    <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>