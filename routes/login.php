<?php
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["login"])) {
        $username = htmlspecialchars($_POST['username']) ?? '';
        $password = md5($_POST['password']) ?? '';

        // Ambil data user dari database
        $stmt = mysqli_prepare($koneksi, "SELECT * FROM pengguna WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Verifikasi password
            if ($password === $row["password"]) {
                // Simpan data login ke session
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                echo "<script>alert('Login berhasil. Selamat datang, " . $row['username'] . "')</script>";
                echo "<script>window.location.href='/dashboard'</script>";
                exit;
            } else {
                $error = 'Password salah!';
            }
        } else {
            $error = 'Username tidak ditemukan!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login & Register - PertanianKu</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= APP ?>/assets/css/login.css">
</head>
<body>
  <div class="auth-wrapper" id="auth-wrapper">
    <section class="form-panel login-panel" aria-labelledby="login-heading" tabindex="0">
      <h2 id="login-heading">Masuk</h2>
      <?php if (isset($error)): ?>
        <p style="color: red"><?= $error ?></p>
    <?php endif; ?>
      <form id="loginForm" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Masukkan username" required autocomplete="off" />
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required />
        <button type="submit" name="login">Masuk</button>
      </form>
    </section>
  </div>
</body>
</html>

