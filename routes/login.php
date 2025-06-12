<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Contoh akun dummy

    if (isset($_POST["login"])) {
        $users = [
            'admin' => ['password' => 'admin123', 'role' => 'admin'],
            'petani1' => ['password' => 'petani123', 'role' => 'petani'],
        ];

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

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
      <p class="toggle-link">
        Belum punya akun?
        <button type="button" id="showRegister" aria-controls="register-panel" aria-expanded="false">Daftar di sini</button>
      </p>
    </section>

    <section class="form-panel register-panel" aria-labelledby="register-heading" tabindex="0">
      <h2 id="register-heading">Daftar</h2>
      <form id="registerForm" novalidate>
        <label for="register-name">Nama Lengkap</label>
        <input type="text" name="name" placeholder="Masukkan nama lengkap" required />
        <label for="register-email">Email</label>
        <input type="email" name="email" placeholder="Masukkan email" required />
        <label for="register-password">Password</label>
        <input type="password" name="password" placeholder="Buat password" required />
        <button type="submit" name="register">Daftar</button>
      </form>
      <p class="toggle-link">
        Sudah punya akun?
        <button type="button" id="showLogin" aria-controls="login-panel" aria-expanded="false">Masuk di sini</button>
      </p>
    </section>
  </div>

<script>
  const authWrapper = document.getElementById('auth-wrapper');
  const showRegisterBtn = document.getElementById('showRegister');
  const showLoginBtn = document.getElementById('showLogin');

  showRegisterBtn.addEventListener('click', () => {
    authWrapper.classList.add('register-active');
    showRegisterBtn.setAttribute('aria-expanded', 'true');
    showLoginBtn.setAttribute('aria-expanded', 'false');
  });

  showLoginBtn.addEventListener('click', () => {
    authWrapper.classList.remove('register-active');
    showRegisterBtn.setAttribute('aria-expanded', 'false');
    showLoginBtn.setAttribute('aria-expanded', 'true');
  });
</script>
</body>
</html>

