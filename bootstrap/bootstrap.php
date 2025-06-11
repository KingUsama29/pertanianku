<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../includes/constants.php';

date_default_timezone_set('Asia/Jakarta');

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > SESSION_TIMEOUT)) {
    session_unset();    
    session_destroy();  
}
$_SESSION['LAST_ACTIVITY'] = time();

function base_url($path = '') {
    $base = rtrim(BASE_URL, '/');
    return $base . '/' . ltrim($path, '/');
}