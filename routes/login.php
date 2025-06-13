<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Contoh akun dummy

    if (isset($_POST["login"])) {
        $users = [
            'admin' => ['password' => 'admin123', 'role' => 'admin'],
            'petani1' => ['password' => 'petani123', 'role' => 'petani'],
        ];

        $username = htmlspecialchars($_POST['username']) ?? '';
        $password = htmlspecialchars($_POST['password']) ?? '';

        if (isset($users[$username]) && $users[$username]['password'] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $users[$username]['role'];
            echo "<script>alert('Login berhasil. Selamat datang, " . $username . "')</script>";
            echo "<script>window.location.href='/dashboard'</script>";
            exit;
        } else {
            $error = 'Username atau password salah!';
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

