<?php
session_start();
require_once __DIR__ . '/includes/autenticacao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $dadosUsuario = verificarLogin($usuario, $senha);

    if ($dadosUsuario) {
        $_SESSION['usuario'] = $dadosUsuario;

        if ($dadosUsuario['tipo'] === 'admin') {
            header("Location: protegido.php");
        } else {
            header("Location: index.php");
        }

        exit;
    } else {
        $erro = 'Usuário ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-box">
        <h2>🌿 Login</h2>

        <?php if ($erro): ?>
            <p class="erro"><?= $erro ?></p>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>