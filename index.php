<?php
require_once __DIR__ . '/bootstrap/bootstrap.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$path = '/' . ltrim(str_replace($base, '', $uri), '/');

$routes = [
    '/' => 'routes/home.php',
    '/login' => 'routes/login.php',
    '/logout' => 'routes/logout.php',
    '/dashboard' => 'routes/dashboard/index.php',
    '/dashboard/daftar_petani' => 'routes/dashboard/daftar_petani.php',
    '/dashboard/hasil_panen' => 'routes/dashboard/hasil_panen.php',
];

$page = $routes[$path] ?? null;

if ($page && file_exists($page)) {
    include $page;
} else {
    http_response_code(404);
    echo "<h1>404 - Halaman tidak ditemukan</h1>";
}
