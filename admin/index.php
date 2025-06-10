<?php
include_once __DIR__ . "../../includes/isLoggedIn.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&amp;display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>Dashboard Pertanian</title>
  <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

  <?= require_once __DIR__ . "../../components/layout/sidebar.php" ?>

  <div class="main" id="main">
    <div class="header">
      <h1>Dashboard Pertanian</h1>
      <button class="burger" onclick="toggleSidebar()">☰</button>
    </div>
    
    <?= require_once __DIR__ . "../../components/layout/card.php" ?>
  </div>

  <script src="../assets/js/script.js"></script>
</body>
</html>
