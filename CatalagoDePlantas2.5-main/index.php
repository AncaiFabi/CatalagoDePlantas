<?php
session_start();
require_once __DIR__ . '/includes/dados.php';
require_once __DIR__ . '/includes/menu.php';

if (isset($_SESSION['erro'])) {
    echo '<div style="background-color: #fff3cd; color: #856404; 
                    padding: 15px; margin: 20px auto; max-width: 600px; 
                    border: 1px solid #ffeeba; border-radius: 5px; text-align: center;">
            ' . $_SESSION['erro'] . '
          </div>';
    unset($_SESSION['erro']);
}

$itensSessao = $_SESSION['novas_plantas'] ?? [];
$todas = array_merge($plantas, $itensSessao);

// Garantindo que cada planta tenha um 'id' associado
$todasAsPlantas = [];
foreach ($todas as $id => $planta) {
    $planta['id'] = $id;
    $todasAsPlantas[] = $planta;
}

$plantas_todas = $plantas;

// Verifica se há novas plantas na sessão
if (isset($_SESSION['novas_plantas'])) {
    foreach ($_SESSION['novas_plantas'] as $planta_nova) {
        $plantas_todas[] = $planta_nova;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Plantas & Jardins</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css"> <!-- Aqui está o novo caminho do CSS -->
</head>
<body>

    <section class="hero">
        <h1>Transforme seu espaço com verde</h1>
        <p>Descubra nossa seleção de plantas para todos os estilos e ambientes. Entregamos vida para dentro do seu lar.</p>
    </section>

    <!-- Carrossel -->
    <section class="carrossel-section">
  <div class="swiper mySwiper">
      <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="img/banner1.jpg" alt="Slide 1" style="max-width: 700px; width: 100%; height: center;"></div>
          <div class="swiper-slide"><img src="img/banner2.jpg" alt="Slide 2" style="max-width: 700px; width: 100%; height: auto;"></div>
          <div class="swiper-slide"><img src="img/banner3.jpg" alt="Slide 3" style="max-width: 700px; width: 100%; height: auto;"></div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
  </div>
</section>


    <!-- Seções informativas -->
    <section class="info-section">
        <div class="info-bloco">
            <div class="info-texto">
                <h2>Conheça nosso Catálogo</h2>
                <p>Oferecemos um catálogo diversificado com plantas ornamentais, medicinais, flores, substratos e acessórios para jardinagem, sempre com descrições claras e dicas práticas para o cultivo.Cada detalhe foi pensado para que você se conecte com a natureza no seu próprio ritmo e estilo.</p>
            </div>
            <div class="info-imagem">
                <img src="img/banner4.jpg" alt="Imagem catálogo">
            </div>
        </div>

        <div class="info-bloco reverso">
        <div class="info-texto">
                <h2>Sobre o nosso site</h2>
                <p>O Plantar & Cuidar nasceu do amor pela natureza e do desejo de aproximar as pessoas do universo verde. Nosso site é um espaço dedicado a apaixonados por jardinagem, que buscam informação de qualidade, inspiração e produtos que realmente façam a diferença no cultivo de seus espaços verdes.</p>
            </div>
            <div class="info-imagem">
                <img src="img/banner5.jpg" alt="Imagem sobre o site">
            </div>
        </div>
    </section>

    <section class="contato">
        <h3>Fale conosco</h3>
        <p>contato@plantasejardins.com</p>
        <p>(12) 3456-7890</p>
        <p>Rua das Flores, 123</p>
    </section>

    <!-- Scripts do carrossel -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="javaScript/carrossel.js"></script>

</body>
</html>
