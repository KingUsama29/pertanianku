<?php
// Jika file fisik ada (misalnya gambar, CSS, JS), langsung sajikan
if (php_sapi_name() === 'cli-server') {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $fullPath = __DIR__ . $path;

    if (is_file($fullPath)) {
        return false; // biarkan server PHP menyajikan file statis
    }
}

// Kalau file tidak ada, arahkan ke index.php
require_once __DIR__ . '/index.php';
