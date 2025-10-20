<?php
session_start();
require_once __DIR__ . "/../config/conexao.php";

function login($email, $senha) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user["senha"])) {
        $_SESSION["user"] = [
            "id" => $user["id"],
            "nome" => $user["nome"],
            "email" => $user["email"],
            "nivel" => $user["nivel"]
        ];        
        return true;
    }
    return false;
}

//echo "Usuário: " . $_SESSION["user"]["nome"]; Exibe o nome de usuário nas páginas.

function is_logged_in() {
    return isset($_SESSION["user"]);
}

function current_user() {
    return $_SESSION["user"] ?? null;
}

function require_login() {
    if (!is_logged_in()) {
        header("Location: ../public/login.php");
        exit;
    }
}

function logout() {
    session_destroy();
    header("Location: ../public/login.php");
    exit;
}
?>
