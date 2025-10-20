<?php
require_once "../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO Cliente (cpf, nome, telefone) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cpf, $nome, $telefone]);

    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Cadastrar Cliente</h2>
  <form method="post">
    <div class="mb-3">
      <label>CPF</label>
      <input type="text" name="cpf" maxlength="11" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nome</label>
      <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Telefone</label>
      <input type="text" name="telefone" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
