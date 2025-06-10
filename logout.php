<?php
include_once __DIR__ . "/includes/session_factory.php";

if (hasSession("isLoggedIn")) {
    destroyAllSessions();
}

header("Location: /");
exit;