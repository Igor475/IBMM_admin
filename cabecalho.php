<?php
require_once('sistema/conexao.php');
@session_start();
if(@$_SESSION['url_igreja'] == "" || @$_GET['nome'] != "") {
     @$_SESSION['url_igreja'] = @$_GET['nome'];
}

$url = @$_SESSION['url_igreja'];
$query = $pdo->query("SELECT * FROM igrejas where url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (@count($res) > 0) {
   $nome_igreja = $res[0]['nome'];
   $foto_igreja = $res[0]['imagem'];
   $endereco_igreja = $res[0]['endereco'];
   $telefone_igreja = $res[0]['telefone'];
   $email_igreja = $res[0]['email'];
   $youtube = $res[0]['youtube'];
   $instagram = $res[0]['instagram'];
   $facebook = $res[0]['facebook'];
   $id_igreja = $res[0]['id'];
   $pastor_id = $res[0]['pastor'];
   $video_igreja = $res[0]['video'];

   $query = $pdo->query("SELECT * FROM pastores where id = '$pastor_id'");
   $res = $query->fetchAll(PDO::FETCH_ASSOC);
   $pastor_resp = $res[0]['nome'];

} else {
   echo 'A url está incorreta!';
   exit();
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Site da Igreja Batista Missão Multiplicar" />
   <meta name="keywords" content="" />
   <meta name="author" content="IB Missão Multiplicar">
   <link rel="shortcut icon" href="sistema/img/logo-IBMM-preta.ico" type="image/x-icon">
   <link rel="stylesheet" type="text/css" href="sistema/css/bootstrap_style.css">
   <!--=============== REMIXICONS ===============-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="assets/css/styles.css">
   <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
   <title><?php echo $nome_igreja ?></title>

   <!--=============== MAIN JS ===============-->
   <script src="assets/js/main.js" defer></script>
   <script src="assets/js/redirect.js"></script>
   <script src="assets/js/swiper-bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</head>

<body>
   <!--==================== HEADER ====================-->
   <header class="header" id="header">
      <nav class="nav container">
         <a href="igreja<?php echo $url ?>" class="nav__logo">
            <img width="100%" src="sistema/img/igrejas/<?php echo $foto_igreja ?>" alt="">
         </a>

         <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
               <li class="nav__item">
                  <a href="igreja<?php echo $url ?>" class="nav__link">Home</a>
               </li>

               <li class="nav__item">
                  <a href="sobre.php" class="nav__link">Sobre Nós</a>
               </li>

               <li class="nav__item">
                  <a href="celulas.php" class="nav__link">Células</a>
               </li>

               <li class="nav__item">
                  <a href="mensagens.php" class="nav__link">Mensagens</a>
               </li>

               <li class="nav__item">
                  <a href="ministerios.php" class="nav__link">Ministérios</a>
               </li>

               <li class="nav__item">
                  <a href="eventos.php" class="nav__link">Eventos</a>
               </li>

               <li class="nav__item">
                  <a href="contato.php" class="nav__link">Contato</a>
               </li>

               <li class="nav__item">
                  <a href="doacao.php" class="donation">Doação</a>
               </li>

               <div class="media__icons__reponsive">
                  <a href="#" class="link__media__responsive">
                     <i class="ri-facebook-fill"></i>
                  </a>
                  <a href="" class="link__media__responsive">
                     <i class="ri-instagram-fill"></i>
                  </a>
                  <a href="" class="link__media__responsive">
                     <i class="ri-twitter-x-fill"></i>
                  </a>
               </div>
            </ul>

            <!-- Close button -->
            <div class="nav__close" id="nav-close">
               <i class="ri-close-line"></i>
            </div>
         </div>

         <div class="nav__actions">
            <div class="nav__donation">
               <a href="" class="link__donation" id="donation">Doação</a>
            </div>

            <img src="assets/img/search.png" class="nav__search" id="search-btn" />

            <img src="assets/img/user.png" class="nav__login" id="login-btn" />

            <!-- Toggle button -->
            <div class="nav__toggle" id="nav-toggle">
               <i class="ri-menu-line"></i>
            </div>
         </div>
      </nav>
   </header>

   <!--==================== SEARCH ====================-->
   <div class="search" id="search">
      <form action="" class="search__form">
         <i class="ri-search-line search__icon"></i>
         <input type="search" placeholder="Pesquisar..." class="search__input">
      </form>

      <i class="ri-close-line search__close" id="search-close"></i>
   </div>

   <!--==================== LOGIN ====================-->
   <div class="login" id="login">
      <form action="" class="login__form">
         <div class="login__image">
            <img class="login__img" src="sistema/img/igrejas/<?php echo $foto_igreja ?>">
         </div>

         <div class="login__group">
            <div>
               <label for="email" class="login__label">Email</label>
               <input type="email" placeholder="Digite seu E-mail" id="email" class="login__input" required>
            </div>

            <div>
               <label for="password" class="login__label">Senha</label>
               <input type="password" placeholder="Sua Senha" id="password" class="login__input" required>
            </div>
         </div>

         <div>
            <a href="#" class="login__forgot">
               Esqueceu sua senha?
            </a>

            <button type="submit" class="login__button">Entrar</button>
         </div>
      </form>

      <i class="ri-close-line login__close" id="login-close"></i>
   </div>