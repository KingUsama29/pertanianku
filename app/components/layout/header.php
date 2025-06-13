<nav class="container" aria-label="Navigasi utama">
    <div class="logo" tabindex="0">Agritaniku</div>
    <ul class="nav-links">
        <li><a href="/">Beranda</a></li>
        <li><a href="/artikel">Artikel</a></li>
        <li><a href="#cuaca">Cuaca</a></li>
        <li><a href="#harga">Hasil Panen</a></li>
        <li><?= isset($_SESSION["username"]) ? '<a href="/dashboard">Dashboard</a>' : '<a href="/login">Login</a>'; ?></li>
    </ul>
    <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>