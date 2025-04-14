<?php
session_start();
require_once __DIR__ . '/includes/dados.php';

// Junta todas as plantas (fixas + cadastradas via sessão)
$todas = array_merge($plantas, $_SESSION['novas_plantas'] ?? []);

// Recupera o ID da planta via GET
$id = $_GET['id'] ?? null;

// Valida se o ID existe e a planta está cadastrada
$planta = $todas[$id] ?? null;
if (!$planta) {
    echo "<p style='text-align: center; font-family: Arial;'>Planta não encontrada.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $planta['titulo'] ?> - Detalhes</title>
    <link rel="stylesheet" href="css/detalhes.css">
</head>
<body>
    <div class="detalhes">
        <img src="<?= $planta['imagem'] ?>" alt="<?= $planta['titulo'] ?>">
        <h2><?= $planta['titulo'] ?></h2>

        <div class="info-extra">
            <p><strong>Categoria:</strong> <?= $planta['categoria'] ?? 'Não especificada' ?></p>
            <p><strong>Descrição:</strong> <?= $planta['descricao'] ?></p>

            <?php if (!empty($planta['tamanho'])): ?>
                <p><strong>Tamanho:</strong> <?= $planta['tamanho'] ?></p>
            <?php endif; ?>

            <?php if (!empty($planta['ambiente_ideal'])): ?>
                <p><strong>Ambiente ideal:</strong> <?= $planta['ambiente_ideal'] ?></p>
            <?php endif; ?>

            <?php if (!empty($planta['cuidados'])): ?>
                <p><strong>Cuidados:</strong> <?= $planta['cuidados'] ?></p>
            <?php endif; ?>

            <?php if (!empty($planta['curiosidade'])): ?>
                <p><strong>Curiosidade:</strong> <?= $planta['curiosidade'] ?></p>
            <?php endif; ?>
        </div>

        <a class="voltar" href="filtrar.php">← Voltar para o catálogo</a>
    </div>
</body>
</html>
