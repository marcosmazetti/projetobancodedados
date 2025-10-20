<?php
require_once "../config/conexao.php";


require_once __DIR__ . '/../src/auth.php';
require_login();
$user = current_user();


$stmt = $pdo->query("SELECT * FROM Cliente ORDER BY nome");
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Clientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Lista de Clientes</h2>
  <a href="cadastrar.php" class="btn btn-success mb-3">+ Novo Cliente</a>
  <table class="table table-bordered table-striped">
    <tr>
      <th>CPF</th>
      <th>Nome</th>
      <th>Telefone</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($clientes as $c): ?>
      <tr>
        <td><?= htmlspecialchars($c['cpf']) ?></td>
        <td><?= htmlspecialchars($c['nome']) ?></td>
        <td><?= htmlspecialchars($c['telefone']) ?></td>
        <td>
          <a href="editar.php?cpf=<?= $c['cpf'] ?>" class="btn  btn-warning  btn-sm">Editar</a>
          <a href="excluir.php?cpf=<?= $c['cpf'] ?>" class="btn btn-danger btn-sm">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <a href="../public/index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>

<!-- código de confirmação de exclusão do botão excluir -->
<!-- onclick="return confirm('Tem certeza que deseja excluir?')" -->
