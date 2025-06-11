<?php
if (!isset($_SESSION['username'])) {
    header('Location: ' . base_url('/login'));
    exit;
}
?>

<h2>Dashboard</h2>
<p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</p>
<p>Role Anda: <strong><?= htmlspecialchars($_SESSION['role']) ?></strong></p>

<ul>
    <li><a href="<?= base_url('/dashboard/daftar_petani') ?>">Kelola Petani</a></li>
    <li><a href="<?= base_url('/dashboard/hasil_panen') ?>">Kelola Hasil Panen</a></li>
</ul>
