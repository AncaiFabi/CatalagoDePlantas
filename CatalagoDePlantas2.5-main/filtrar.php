<?php
session_start();

require_once __DIR__ . '/includes/menu.php';
require_once __DIR__ . '/includes/dados.php';

// Junta os itens do catálogo original com os novos da sessão
$novasPlantas = $_SESSION['novas_plantas'] ?? [];
$todasAsPlantas = array_merge($plantas, $novasPlantas);

// Coleta categorias únicas
$categorias = array_unique(array_column($todasAsPlantas, 'categoria'));

// Verifica se foi enviado um filtro
$filtro = $_GET['categoria'] ?? null;

// Aplica o filtro (se houver)
$resultado = $filtro
    ? array_filter($todasAsPlantas, fn($planta) => $planta['categoria'] === $filtro)
    : $todasAsPlantas;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Plantas</title>
    <link rel="stylesheet" href="css/filtrar.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>

    <h1>🌿 Filtrar Plantas por Categoria</h1>

    <form method="get" action="">
        <div class="filtro-container">
            <label for="categoria">Escolha uma categoria:</label>
            <select name="categoria" id="categoria">
                <option value="">-- Todas --</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria ?>" <?= $filtro === $categoria ? 'selected' : '' ?>>
                        <?= $categoria ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Filtrar</button>
        </div>
    </form>

    <div class="catalogo">
        <?php if (count($resultado) > 0): ?>
            <?php foreach ($resultado as $id => $planta): ?>
                <div class="item">
                    <img src="<?= $planta['imagem'] ?>" alt="<?= $planta['titulo'] ?>">
                    <h3><?= $planta['titulo'] ?></h3>
                    <p><?= $planta['categoria'] ?></p>
                    <a href="detalhes.php?id=<?= $id ?>">Ver mais</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; width: 100%;">Nenhuma planta encontrada para esta categoria.</p>
        <?php endif; ?>
    </div>

    <section class="contato">
        <h3>Fale conosco</h3>
        <p>contato@plantasejardins.com</p>
        <p>(12) 3456-7890</p>
        <p>Rua das Flores, 123</p>
    </section>

</body>
</html>
