<?php
require_once "../config/conexao.php";

require_once __DIR__ . '/../src/auth.php';
require_login();
$user = current_user();

$stmt = $pdo->query("SELECT a.*, c.nome AS nome_cliente FROM Animal a 
                     JOIN Cliente c ON a.cpf = c.cpf ORDER BY cod_animal");
$animais = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Animais</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Lista de Animais</h2>
  <a href="cadastrar.php" class="btn btn-success mb-3">+ Novo Animal</a>
  <table class="table table-bordered table-striped">
    <tr>
      <th>Código</th>
      <th>Nome</th>
      <th>Ano Nasc.</th>
      <th>Raça</th>
      <th>Dono</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($animais as $a): ?>
      <tr>
        <td><?= $a['cod_animal'] ?></td>
        <td><?= htmlspecialchars($a['nome']) ?></td>
        <td><?= $a['ano_nasc'] ?></td>
        <td><?= htmlspecialchars($a['raca']) ?></td>
        <td><?= htmlspecialchars($a['nome_cliente']) ?></td>
        <td>
          <a href="editar.php?cod_animal=<?= $a['cod_animal'] ?>" class="btn btn-warning btn-sm">Editar</a>
          <a href="excluir.php?cod_animal=<?= $a['cod_animal'] ?>" class="btn btn-danger btn-sm"
             >Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <a href="../public/index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>

<!-- onclick="return confirm('Deseja realmente excluir este animal?')" -->
