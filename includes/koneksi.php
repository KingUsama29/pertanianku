<?php
$host = "localhost";
$user = "root";
$password = "";
$schema = "";

try {
    $koneksi = mysqli_connect($host, $user, $password, $schema);
} catch (\Exception $e) {
    echo "Gagal tersambung ke database: " . $e->getMessage();
}