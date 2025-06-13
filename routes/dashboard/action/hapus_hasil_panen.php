<?php
require_once "./core/session.php";

if (!is_logged_in()) {
    redirect("/login");
    exit;
}

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID tidak ditemukan.");
}

// Pastikan data dengan ID tersebut ada
$stmt = mysqli_prepare($koneksi, "SELECT id FROM komoditas WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 0) {
    die("Data tidak ditemukan.");
}

// Lakukan penghapusan
$stmt = mysqli_prepare($koneksi, "DELETE FROM komoditas WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
if (mysqli_stmt_execute($stmt)) {
    header("Location: /dashboard/hasil_panen");
    exit;
} else {
    die("Gagal menghapus data.");
}
?>
