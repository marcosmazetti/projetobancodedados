<?php
require_once __DIR__ . '/../config/conexao.php';

$erro = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha]);
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>🐾 Cadastro - Sistema Petshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="card p-4 shadow" style="width: 350px;">
    <h3 class="text-center mb-3">🐾 Cadastrar Usuário</h3>

    <?php if ($erro): ?>
      <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
      </div>
      <button class="btn btn-success w-100">Cadastrar</button>
    </form>

    <div class="text-center mt-3">
      <small>Já tem conta? <a href="login.php">Entrar</a></small>
    </div>
  </div>
</body>
</html>
