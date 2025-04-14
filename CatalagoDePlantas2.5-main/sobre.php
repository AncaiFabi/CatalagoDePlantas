<?php
session_start();
require_once __DIR__ . "/includes/menu.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="css/sobre.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<div class="container-sobre">
    <h1>🌱 Sobre Nós</h1>

    <div class="integrantes">
        <div class="integrante">
            <h2>Fabiane</h2>
            <img src="img/fabi.jpg" alt="Foto de Fabiane">
            <p>"Apaixonada por tecnologia e sustentabilidade, Fabiane acredita que o futuro do planeta depende de pequenas escolhas conscientes.
                No projeto Cuidar & Plantar, ela une inovação e cuidado ambiental para inspirar novas gerações a cultivar um mundo mais verde."</p>
        </div>

        <div class="integrante">
            <h2>Sarah</h2>
            <img src="img/sarah.jpg" alt="Foto de Sarah">
            <p>"Movida pelo desejo de reconectar as pessoas com a natureza, Sarah vê na tecnologia uma ponte entre o digital e o natural. 
                Seu trabalho no Cuidar & Plantar reflete seu compromisso com soluções criativas e sustentáveis para um amanhã mais saudável."</p>
        </div>
    </div>
</div>

<section class="contato">
        <h3>Fale conosco</h3>
        <p>contato@plantasejardins.com</p>
        <p>(12) 3456-7890</p>
        <p>Rua das Flores, 123</p>
    </section>

</body>
</html>
