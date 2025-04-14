<?php
function usuario_logado() {
    return isset($_SESSION['usuario']);
}

function redirecionar_se_nao_logado() {
    if (!usuario_logado()) {
        header('Location: login.php');
        exit;
    }
}

function exibir_planta($id, $planta) {
    echo '<div class="item">';
    echo '<img src="' . $planta['imagem'] . '" alt="' . $planta['titulo'] . '">';
    echo '<h3>' . $planta['titulo'] . '</h3>';
    echo '<p>' . $planta['categoria'] . '</p>';
    echo '<a href="detalhes.php?id=' . $id . '">Ver mais</a>';
    echo '</div>';
}
?>
