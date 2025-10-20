<?php
require_once "../config/conexao.php";

require_once __DIR__ . '/../src/auth.php';
require_login();
$user = current_user();

$sql = "SELECT con.*, a.nome AS nome_animal, v.nome AS nome_vet
        FROM Consulta con
        JOIN Animal a ON con.cod_animal = a.cod_animal
        JOIN Veterinario v ON con.CRMV = v.CRMV
        ORDER BY con.dia DESC, con.hora DESC";

$stmt = $pdo->query($sql);
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Consultas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Consultas Agendadas</h2>
  <a href="cadastrar.php" class="btn btn-success mb-3">+ Nova Consulta</a>
  <table class="table table-bordered table-striped">
    <tr>
      <th>Cód.</th>
      <th>Data</th>
      <th>Hora</th>
      <th>Motivo</th>
      <th>Animal</th>
      <th>Veterinário</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($consultas as $c): ?>
      <tr>
        <td><?= $c['cod_consulta'] ?></td>
        <td><?= date('d/m/Y', strtotime($c['dia'])) ?></td>
        <td><?= substr($c['hora'], 0, 5) ?></td>
        <td><?= htmlspecialchars($c['motivo']) ?></td>
        <td><?= htmlspecialchars($c['nome_animal']) ?></td>
        <td><?= htmlspecialchars($c['nome_vet']) ?></td>
        <td>
          <a href="editar.php?cod_consulta=<?= $c['cod_consulta'] ?>" class="btn btn-warning btn-sm">Editar</a>
          <a href="excluir.php?cod_consulta=<?= $c['cod_consulta'] ?>" class="btn btn-danger btn-sm">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <a href="../public/index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>


<!-- onclick="return confirm('Deseja realmente excluir esta consulta?')" -->
