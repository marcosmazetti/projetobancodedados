<?php

require_once "../config/conexao.php";

$cpf = $_GET["cpf"] ?? null;

if (!$cpf) {
    header("Location: listar.php");
    exit;
}

if (isset($_POST["confirmar"])) {
    $sql = "DELETE FROM cliente WHERE cpf = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cpf]);

    header("Location: listar.php");
    exit; 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Excluir Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow p-4">
    <h3 class="text-danger mb-4">Excluir Cliente</h3>
    <p>Tem certeza que deseja excluir o cliente de CPF <strong><?= htmlspecialchars($cpf) ?></strong>?</p>

    <form method="post">
      <button type="submit" name="confirmar" class="btn btn-danger">Sim, excluir</button>
      <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
</body>
</html>