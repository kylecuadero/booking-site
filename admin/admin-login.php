<?php
session_start();
require __DIR__ . '/admin-config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  if (
    $username === ADMIN_USERNAME &&
    password_verify($password, ADMIN_PASSWORD_HASH)
  ) {
    $_SESSION['is_admin'] = true;
    header('Location: index.php');
    exit;
  } else {
    $error = 'Invalid username or password';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style><?php include __DIR__ . '/../shared-styles.css.php'; ?></style>

<style>
.admin-login-wrapper {
  max-width: 420px;
  margin: 80px auto 100px;
  padding: 0 16px;
}

.admin-login-card {
  background: var(--card);
  border: 1px solid var(--line);
  border-radius: 14px;
  padding: 22px;
  box-shadow: var(--shadow);
}

.admin-login-title {
  text-align: center;
  font-size: 22px;
  font-weight: 900;
  margin-bottom: 14px;
}

.admin-login-sub {
  text-align: center;
  color: var(--muted);
  margin-bottom: 18px;
  font-size: 14px;
}
</style>
</head>

<body>
<div class="admin-login-wrapper">
  <form method="POST" class="admin-login-card" autocomplete="off">

    <div class="admin-login-title">Admin Login</div>
    <div class="admin-login-sub">Authorized access only</div>

    <?php if ($error): ?>
      <div style="
        margin-bottom:12px;
        padding:10px;
        border-radius:10px;
        background:rgba(239,68,68,0.12);
        border:1px solid rgba(239,68,68,0.35);
        color:#ef4444;
        font-weight:700;
        text-align:center;
      ">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <label>Email</label>
    <input
      type="username"
      name="username"
      class="input"
      placeholder="Admin username"
      required
    >

    <label>Password</label>
    <input
      type="password"
      name="password"
      class="input"
      placeholder="Password"
      required
    >

    <button
      type="submit"
      class="search-btn"
      style="width:100%;margin-top:14px;"
    >
      Login
    </button>

  </form>
</div>

<?php include __DIR__ . '/../shared-footer.php'; ?>

</body>
</html>
