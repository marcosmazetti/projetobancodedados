<?php
require_once "../config/conexao.php";

$id = $_GET["cod_consulta"] ?? null;
if (!$id) { header("Location: listar.php"); exit; }

if (isset($_POST["confirmar"])) {
    $stmt = $pdo->prepare("DELETE FROM Consulta WHERE cod_consulta=?");
    $stmt->execute([$id]);
    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Excluir Consulta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow p-4">
    <h3 class="text-danger mb-3">Excluir Consulta</h3>
    <p>Tem certeza que deseja excluir a consulta <strong>#<?= htmlspecialchars($id) ?></strong>?</p>
    <form method="post">
      <button name="confirmar" class="btn btn-danger">Sim, excluir</button>
      <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
</body>
</html>
