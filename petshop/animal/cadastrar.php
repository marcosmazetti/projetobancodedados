<?php
require_once "../config/conexao.php";

// Buscar clientes para o select
$clientes = $pdo->query("SELECT cpf, nome FROM Cliente")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $ano_nasc = $_POST["ano_nasc"];
    $raca = $_POST["raca"];
    $cpf = $_POST["cpf"];

    $sql = "INSERT INTO Animal (nome, ano_nasc, raca, cpf) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $ano_nasc, $raca, $cpf]);

    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Animal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Cadastrar Animal</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nome do Animal</label>
      <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Ano de Nascimento</label>
      <input type="number" name="ano_nasc" class="form-control">
    </div>
    <div class="mb-3">
      <label>Raça</label>
      <input type="text" name="raca" class="form-control">
    </div>
    <div class="mb-3">
      <label>Dono (Cliente)</label>
      <select name="cpf" class="form-select" required>
        <option value="">Selecione...</option>
        <?php foreach ($clientes as $c): ?>
          <option value="<?= $c['cpf'] ?>"><?= $c['nome'] ?> (<?= $c['cpf'] ?>)</option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
