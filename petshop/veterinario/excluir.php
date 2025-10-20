<?php
require_once "../config/conexao.php";

$crmv = $_GET["CRMV"] ?? null;
if (!$crmv) { header("Location: listar.php"); exit; }

if (isset($_POST["confirmar"])) {
    $stmt = $pdo->prepare("DELETE FROM Veterinario WHERE CRMV=?");
    $stmt->execute([$crmv]);
    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Excluir Veterinário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card p-4 shadow">
    <h3 class="text-danger">Excluir Veterinário</h3>
    <p>Tem certeza que deseja excluir o veterinário de CRMV <strong><?= htmlspecialchars($crmv) ?></strong>?</p>
    <form method="post">
      <button name="confirmar" class="btn btn-danger">Excluir</button>
      <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
</body>
</html>
