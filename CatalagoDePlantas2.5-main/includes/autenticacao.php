<?php
// autenticacao.php

function verificarLogin($usuario, $senha) {
    // Exemplo de dados simulados
    $usuarios = [
        'admin' => ['senha' => '1234', 'tipo' => 'admin'],
        'fabiane' => ['senha' => 'abcd', 'tipo' => 'usuario']
    ];

    if (isset($usuarios[$usuario]) && $usuarios[$usuario]['senha'] === $senha) {
        return ['nome' => $usuario, 'tipo' => $usuarios[$usuario]['tipo']];
    }

    return false;
}

?>
