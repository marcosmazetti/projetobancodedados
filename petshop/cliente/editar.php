<?php

require_once "../config/conexao.php";

$cpf = $_GET['cpf'] ?? null;

if (!$cpf) {
    header("Location: listar.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM Cliente WHERE cpf = ?");
$stmt->execute([$cpf]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cliente) {
    echo "<div class='alert alert-danger'>Cliente não encontrado!</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];

    $sql = "UPDATE Cliente SET nome = ?, telefone = ? WHERE cpf = ?";
    $stmt = $pdo->prepare($sql);    
    $stmt->execute([$nome, $telefone, $cpf]); 

    header("Location: listar.php");    
    exit;
    
}
?>
<!DOCTYPE html>
<html lang="pt-brn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clientet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Editar Cliente</h2>


    <form method="post">
        <div class="mb-3">
            <label>CPF</label>
            <input type="text" name="cpf" class="form-control" value="<?= htmlspecialchars($cliente['cpf']) ?>" readonly>
        </div>

        <div class="mb-3">    
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($cliente['nome']) ?>" required>  
        </div>

        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($cliente['telefone']) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>    
</body>
</html>



