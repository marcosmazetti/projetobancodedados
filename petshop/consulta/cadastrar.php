<?php
require_once "../config/conexao.php";

$animais = $pdo->query("SELECT cod_animal, nome FROM Animal ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);
$vets = $pdo->query("SELECT CRMV, nome FROM Veterinario ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $motivo = $_POST["motivo"];
    $cod_animal = $_POST["cod_animal"];
    $crmv = $_POST["CRMV"];

    $sql = "INSERT INTO Consulta (dia, hora, motivo, cod_animal, CRMV) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$dia, $hora, $motivo, $cod_animal, $crmv]);

    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Consulta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Cadastrar Nova Consulta</h2>
  <form method="post">
    <div class="mb-3">
      <label>Data</label>
      <input type="date" name="dia" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Hora</label>
      <input type="time" name="hora" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Motivo</label>
      <input type="text" name="motivo" class="form-control">
    </div>
    <div class="mb-3">
      <label>Animal</label>
      <select name="cod_animal" class="form-select" required>
        <option value="">Selecione o animal...</option>
        <?php foreach ($animais as $a): ?>
          <option value="<?= $a['cod_animal'] ?>"><?= htmlspecialchars($a['nome']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Veterinário</label>
      <select name="CRMV" class="form-select" required>
        <option value="">Selecione o veterinário...</option>
        <?php foreach ($vets as $v): ?>
          <option value="<?= $v['CRMV'] ?>"><?= htmlspecialchars($v['nome']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
