<?php

$query = mysqli_query($koneksi, "SELECT * FROM artikel");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<section id="artikel" class="section-container" aria-label="Penanganan Hama dan Penyakit">
    <h2>Artikel Terkini</h2>
    <div class="card-grid">
        <?php foreach ($result as $value) : ?>
            <article tabindex="0" class="card" role="button" aria-pressed="false" onclick="openArticle('penanganan')" onkeypress="if(event.key==='Enter') openArticle('penanganan')">
                <div class="icon-circle" aria-hidden="true">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M14 3a7 7 0 0 0-4 12.8M14 3a6 6 0 0 1 5 5M14 3a5 5 0 0 0-4 8" />
                    <path d="M9 16a6 6 0 0 1 5 5" />
                </svg>
                </div>
                <?= $value["thumbnail"] ? '<img width="80px" height="80px" src="data:image/png;base64,' . $value["thumbnail"] . '" alt="Gambar" />' : "Tidak ada foto" ?>
                <h3><?= $value["title"] ?></h3>
                <p><?= substr($value["body"], 0, 100) ?>...</p>
                <a href="/artikel/baca?artikel_id=<?= $value["id"] ?>" class="btn-article" aria-label="Selengkapnya tentang Penanganan Hama dan Penyakit">Baca Selengkapnya</a>
            </article>
        <?php endforeach; ?>
        
    </div>
</section>