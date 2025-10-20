<?php
require_once "../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crmv = $_POST["crmv"];
    $nome = $_POST["nome"];
    $dt_admissao = $_POST["dt_admissao"];
    $salario = $_POST["salario"];

    $sql = "INSERT INTO Veterinario (CRMV, nome, dt_admissao, salario) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$crmv, $nome, $dt_admissao, $salario]);
    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Veterinário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Cadastrar Veterinário</h2>
  <form method="post">
    <div class="mb-3">
      <label>CRMV</label>
      <input type="text" name="crmv" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nome</label>
      <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Data de Admissão</label>
      <input type="date" name="dt_admissao" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Salário</label>
      <input type="number" step="0.01" name="salario" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
