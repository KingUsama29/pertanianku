<?php
session_start();

function addSession($key, $value) {
    $_SESSION[$key] = $value;
}

function destroySession($key) {
    unset($_SESSION[$key]);
}

function destroyAllSessions() {
    session_destroy();
}

function hasSession($key) {
    return isset($_SESSION[$key]) ?? false;
}