<?php
require_once "../config/conexao.php";

$crmv = $_GET["CRMV"] ?? null;
if (!$crmv) { header("Location: listar.php"); exit; }

$stmt = $pdo->prepare("SELECT * FROM Veterinario WHERE CRMV=?");
$stmt->execute([$crmv]);
$v = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $dt_admissao = $_POST["dt_admissao"];
    $salario = $_POST["salario"];

    $sql = "UPDATE Veterinario SET nome=?, dt_admissao=?, salario=? WHERE CRMV=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $dt_admissao, $salario, $crmv]);
    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Veterinário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Editar Veterinário</h2>
  <form method="post">
    <div class="mb-3">
      <label>CRMV</label>
      <input type="text" class="form-control" value="<?= $v['CRMV'] ?>" readonly>
    </div>
    <div class="mb-3">
      <label>Nome</label>
      <input type="text" name="nome" class="form-control" value="<?= $v['nome'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Data de Admissão</label>
      <input type="date" name="dt_admissao" class="form-control" value="<?= $v['dt_admissao'] ?>">
    </div>
    <div class="mb-3">
      <label>Salário</label>
      <input type="number" step="0.01" name="salario" class="form-control" value="<?= $v['salario'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
