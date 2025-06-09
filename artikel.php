<?php
if (!isset($_GET['artikel_id'])) {
    header("Location: /pertanianku");
    return;
}

echo $_GET['artikel_id'];