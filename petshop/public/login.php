<?php
require_once __DIR__ . '/../src/auth.php';

if (is_logged_in()) {
    header('Location: ../public/index.php');
    exit;
}

$erro = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (login($email, $senha)) {
        header('Location: ../public/index.php');
        exit;
    } else {
        $erro = "E-mail ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>🐾 Login - Sistema Petshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="card p-4 shadow" style="width: 350px;">
    <h3 class="text-center mb-3">🐾 Login</h3>

    <?php if ($erro): ?>
      <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100">Entrar</button>
    </form>

    <div class="text-center mt-3">
      <small>Não tem conta? <a href="register.php">Cadastre-se</a></small>
    </div>
  </div>
</body>
</html>
