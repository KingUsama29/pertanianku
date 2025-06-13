<?php
$query = mysqli_query($koneksi, "SELECT * FROM komoditas");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<section id="harga" class="section-container" aria-label="Harga Komoditas Terkini">
    <h2>Harga Komoditas Terkini</h2>
    <div class="price-list">
        <?php foreach ($result as $value) : ?>
            <article class="price-card" tabindex="0" aria-label="<?= htmlspecialchars($value["title"]) ?>">
                <?= $value["foto"] ? '<img width="80px" height="80px" src="data:image/png;base64,' . $value["foto"] . '" alt="Gambar" />' : "Tidak ada foto" ?>
                <div class="product-name"><?= htmlspecialchars($value["title"]) ?></div>
                <div class="product-price">Rp <?= number_format((float) $value["harga"]) ?> / kg</div>
                <div class="product-info"><?= htmlspecialchars($value["caption"]) ?></div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
