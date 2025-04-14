<?php
session_start();
require_once __DIR__ . '/includes/funcoes.php';
require_once __DIR__ . '/includes/autenticacao.php';
require_once __DIR__ . '/includes/dados.php';

redirecionar_se_nao_logado();

// Impede acesso de usuários que não são admin
if ($_SESSION['usuario']['tipo'] !== 'admin') {
    $_SESSION['erro'] = '⚠️ Apenas administradores podem acessar essa página.';
    header('Location: index.php');
    exit;
}

$mensagem = '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $imagem = trim($_POST['imagem'] ?? '');
    $tamanho = trim($_POST['tamanho'] ?? '');
    $ambiente_ideal = trim($_POST['ambiente_ideal'] ?? '');
    $cuidados = trim($_POST['cuidados'] ?? '');
    $curiosidade = trim($_POST['curiosidade'] ?? '');

    if ($titulo && $categoria && $descricao && $imagem && $tamanho && $ambiente_ideal && $cuidados && $curiosidade) {
        $novaPlanta  = [
            'titulo' => $titulo,
            'categoria' => $categoria,
            'descricao' => $descricao,
            'imagem' => $imagem,
            'tamanho' => $tamanho,
            'ambiente_ideal' => $ambiente_ideal,
            'cuidados' => $cuidados,
            'curiosidade' => $curiosidade,
        ];

        // Verifica se já existe o índice 'novas_plantas' na sessão
        if (!isset($_SESSION['novas_plantas'])) {
            $_SESSION['novas_plantas'] = [];  // Cria o array caso não exista
        }

        // Adiciona a nova planta ao array existente
        $_SESSION['novas_plantas'][] = $novaPlanta;

        $mensagem = '🌱 Nova planta cadastrada com sucesso!';
    } else {
        $mensagem = '⚠️ Preencha todos os campos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Planta</title>
    <link rel="stylesheet" href="css/protegido.css">
</head>
<body>

<div class="formulario">
    <h2>🌿 Cadastrar Nova Planta</h2>
    <p class="aviso">⚠️ Apenas Administradores podem cadastrar novas plantas.</p>

    <?php if ($mensagem): ?>
        <p class="mensagem"><?= $mensagem ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="titulo" placeholder="Título da Planta" required>

        <select name="categoria" required>
            <option value="">Selecione a Categoria</option>
            <option value="Plantas com flores">Plantas com flores</option>
            <option value="Plantas ornamentais">Plantas ornamentais</option>
            <option value="Plantas medicinais">Plantas medicinais</option>
            <option value="Substrato e fertilizantes">Substrato e fertilizantes</option>
            <option value="Vasos e suportes">Vasos e suportes</option>
            <option value="Acessórios de jardinagem">Acessórios de jardinagem</option>
        </select>

        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <input type="text" name="imagem" placeholder="URL da imagem" required>
        <input type="text" name="tamanho" placeholder="Tamanho da planta" required>
        <input type="text" name="ambiente_ideal" placeholder="Ambiente ideal" required>
        <input type="text" name="cuidados" placeholder="Cuidados" required>
        <input type="text" name="curiosidade" placeholder="Curiosidade" required>

        <button type="submit">Cadastrar Planta</button>
    </form>

    <div class="logout">
        <a href="index.php" style="margin-right: 15px;">🏠 Ir para o Menu Principal</a>
        <a href="logout.php">🚪 Sair</a>
    </div>
</div>

</body>
</html>