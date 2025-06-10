<?php
include_once "session_factory.php";

if(!hasSession("isLoggedIn")) {
    header("Location: /login.php");
}