<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login & Register - PertanianKu</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  
</head>
<body>
  <div class="auth-wrapper" id="auth-wrapper">
    <section class="form-panel login-panel" aria-labelledby="login-heading" tabindex="0">
      <h2 id="login-heading">Masuk</h2>
      <form id="loginForm" novalidate>
        <label for="login-username">Username</label>
        <input type="text" id="login-username" name="username" placeholder="Masukkan username" required />
        <label for="login-password">Password</label>
        <input type="password" id="login-password" name="password" placeholder="Masukkan password" required />
        <button type="submit">Masuk</button>
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
        <input type="text" id="register-name" name="name" placeholder="Masukkan nama lengkap" required />
        <label for="register-email">Email</label>
        <input type="email" id="register-email" name="email" placeholder="Masukkan email" required />
        <label for="register-password">Password</label>
        <input type="password" id="register-password" name="password" placeholder="Buat password" required />
        <button type="submit">Daftar</button>
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
