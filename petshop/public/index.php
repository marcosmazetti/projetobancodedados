<?php
require_once __DIR__ . '/../src/auth.php';
require_login();
$user = current_user();
//echo "Usuário: " . $_SESSION["user"]["nome"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Petshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg mb-5">
    <div class="container-fluid px-4">
      <span class="user-info me-3">
          👋 Olá, <?= htmlspecialchars($user["nome"]) ?>!
        </span>
      <div class="d-flex align-items-center">        
        <a href="../public/logout.php" class="btn-logout">🚪 Sair</a>
      </div>
    </div>
  </nav>

<div class="container text-center mt-5">
  <h1 class="mb-4">🐾 Sistema Petshop</h1>
  <a href="../cliente/listar.php" class="btn btn-primary m-2">👤 Clientes</a>
  <a href="../animal/listar.php" class="btn btn-success m-2">🐶 Animais</a>
  <a href="../veterinario/listar.php" class="btn btn-warning m-2">🩺 Veterinários</a>
  <a href="../consulta/listar.php" class="btn btn-info m-2">📅 Consultas</a>

  <!-- <div class="mt-5">
    <a href="../public/logout.php" class="btn btn-outline-danger">🚪 Sair</a>
  </div> -->

</div>



</body>
</html>


<!-- <?php
session_start();

// Simulação temporária de login (remova isso no sistema real)
if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "Marcos Mazetti"; // exemplo
}

$usuario = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>🐾 Sistema Petshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Poppins", sans-serif;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }
    .card:hover {
      transform: scale(1.03);
    }
    .btn {
      border-radius: 50px;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
    h1 {
      font-weight: 700;
      color: #333;
    }
    .emoji {
      font-size: 1.5em;
    }
  </style>
</head>
<body>
  <div class="container text-center">
    <div class="mb-4">
      <h1>🐾 Sistema Petshop</h1>
      <p class="text-muted">Bem-vindo, <strong><?= htmlspecialchars($usuario) ?></strong>!</p>
    </div>

    <div class="row justify-content-center g-4">
      <div class="col-md-2">
        <div class="card p-3">
          <div class="emoji mb-2">👤</div>
          <h5>Clientes</h5>
          <a href="cliente/listar.php" class="btn btn-primary mt-2 w-100">Acessar</a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card p-3">
          <div class="emoji mb-2">🐶</div>
          <h5>Animais</h5>
          <a href="animal/listar.php" class="btn btn-success mt-2 w-100">Acessar</a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card p-3">
          <div class="emoji mb-2">🩺</div>
          <h5>Veterinários</h5>
          <a href="veterinario/listar.php" class="btn btn-info mt-2 w-100">Acessar</a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card p-3">
          <div class="emoji mb-2">📅</div>
          <h5>Consultas</h5>
          <a href="consulta/listar.php" class="btn btn-warning mt-2 w-100">Acessar</a>
        </div>
      </div>
    </div>

    <div class="mt-5">
      <a href="logout.php" class="btn btn-outline-danger">🚪 Sair</a>
    </div>
  </div>
</body>
</html>
 -->
