<?php
include_once "session_factory.php";
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

if (isset($_POST["login"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Username atau password tidak boleh kosong')</script>";
        echo "<script>window.location.href = '/login.php'</script>";
        exit;
    }

    echo "<script>alert('Berhasil login! Selamat datang " . $username . "')</script>";
    echo "<script>window.location.href = '/'</script>";

    addSession("isLoggedIn", true);
    addSession("username", $username);
}

if (isset($_POST["register"])) {

}