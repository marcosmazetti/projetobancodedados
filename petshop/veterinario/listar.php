<?php
require_once "../config/conexao.php";

require_once __DIR__ . '/../src/auth.php';
require_login();
$user = current_user();

$stmt = $pdo->query("SELECT * FROM Veterinario");
$vets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Veterinários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Lista de Veterinários</h2>
  <a href="cadastrar.php" class="btn btn-success mb-3">+ Novo Veterinário</a>
  <table class="table table-bordered table-striped">
    <tr>
      <th>CRMV</th>
      <th>Nome</th>
      <th>Data Admissão</th>
      <th>Salário</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($vets as $v): ?>
      <tr>
        <td><?= $v['CRMV'] ?></td>
        <td><?= htmlspecialchars($v['nome']) ?></td>
        <td><?= $v['dt_admissao'] ?></td>
        <td>R$ <?= number_format($v['salario'], 2, ',', '.') ?></td>
        <td>
          <a href="editar.php?CRMV=<?= $v['CRMV'] ?>" class="btn btn-warning btn-sm">Editar</a>
          <a href="excluir.php?CRMV=<?= $v['CRMV'] ?>" class="btn btn-danger btn-sm">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <a href="../public/index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>


<!-- onclick="return confirm('Deseja excluir este veterinário?')" -->
