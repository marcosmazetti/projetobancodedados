<?php
require_once "../config/conexao.php";
$cod = $_GET["cod_animal"] ?? null;

if (!$cod) {
    header("Location: listar.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM Animal WHERE cod_animal = ?");
$stmt->execute([$cod]);
$animal = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$animal) {
    echo "<div class='alert alert-danger'>Animal não encontrado!</div>";
    exit;
}

$clientes = $pdo->query("SELECT cpf, nome FROM Cliente")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $ano_nasc = $_POST["ano_nasc"];
    $raca = $_POST["raca"];
    $cpf = $_POST["cpf"];

    $sql = "UPDATE Animal SET nome=?, ano_nasc=?, raca=?, cpf=? WHERE cod_animal=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $ano_nasc, $raca, $cpf, $cod]);

    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Animal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Editar Animal</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nome</label>
      <input type="text" name="nome" value="<?= htmlspecialchars($animal['nome']) ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label>Ano de Nascimento</label>
      <input type="number" name="ano_nasc" value="<?= $animal['ano_nasc'] ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label>Raça</label>
      <input type="text" name="raca" value="<?= htmlspecialchars($animal['raca']) ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label>Dono</label>
      <select name="cpf" class="form-select">
        <?php foreach ($clientes as $c): ?>
          <option value="<?= $c['cpf'] ?>" <?= $c['cpf'] == $animal['cpf'] ? 'selected' : '' ?>>
            <?= $c['nome'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="listar.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
