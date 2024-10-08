<?php
require_once('sistema/conexao.php');

@session_start();
if (@$_SESSION['url_igreja'] == "" || @$_GET['nome'] != "") {
   @$_SESSION['url_igreja'] = @$_GET['nome'];
}

$url = @$_SESSION['url_igreja'];

//VERIFICAR SE EXISTE URL DO EVENTO
if (@$_GET['evento'] != "") {
   $url_ev = @$_GET['evento'];
   $query = $pdo->query("SELECT * FROM eventos where url = '$url_ev'");
   $res = $query->fetchAll(PDO::FETCH_ASSOC);
   $id_ig_ev = $res[0]['igreja'];

   $query = $pdo->query("SELECT * FROM igrejas where id = '$id_ig_ev'");
   $res = $query->fetchAll(PDO::FETCH_ASSOC);
   $url = $res[0]['url'];
   @$_SESSION['url_igreja'] = $url;
}

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
   echo "<script>window.location='index.php'</script>";
}


/*$paginasExistentes = ['contribua.php', 'cadastro.php', 'evento.php'];

// Captura a URL requisitada
$url = basename($_SERVER['REQUEST_URI']); // Pega a parte da URL

// Verifica se a página existe
if (!in_array($url, $paginasExistentes)) {
    // Redireciona para a página de erro 404
    header("Location: erro404");
    exit(); // Encerra o script para garantir que nada mais seja executado
}*/

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
   <script src="sistema/js/ajax.js" defer></script>
   <script type="text/javascript" src="sistema/js/oracao.js" defer></script>
   <script type="text/javascript" src="sistema/js/membro.js" defer></script>
   <script type="text/javascript" src="sistema/js/mascaras.js" defer></script>
   <script src="assets/js/swiper-bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
                  <a href="celulas" class="nav__link">Células</a>
               </li>

               <li class="nav__item">
                  <a href="mensagens" class="nav__link">Mensagens</a>
               </li>

               <li class="nav__item">
                  <a href="ministerios" class="nav__link">Ministérios</a>
               </li>

               <li class="nav__item">
                  <a href="eventos" class="nav__link">Eventos</a>
               </li>

               <li class="nav__item">
                  <a href="contato" class="nav__link">Contato</a>
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
      <form method="post" action="sistema/autenticar.php" class="login__form">
         <div class="login__image">
            <img class="login__img" src="sistema/img/igrejas/<?php echo $foto_igreja ?>">
         </div>

         <?php
         if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
         }
         ?>

         <div class="login__group">
            <div>
               <label for="email" class="login__label">Digite seu Email ou CPF</label>
               <input type="text" placeholder="Email ou CPF" id="email" name="usuario" class="login__input" required>
            </div>

            <div>
               <label for="password" class="login__label">Senha</label>
               <input type="password" placeholder="Sua Senha" id="password" name="senha" class="login__input" required>
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


   <div class="alerta hide">
      A gente guarda estatísticas de visitas para melhorar sua experiência de navegação, saiba mais em nossa <a class="link-alerta" title="Ver as políticas de privacidade" data-toggle="modal" href="#modalTermosCondicoes"" >política de privacidade.</a>
   <a class=" botao-aceitar" href="#">Aceitar</a>
   </div>



   <script>
      if (!localStorage.meuCookie) {
         document.querySelector(".alerta").classList.remove('hide');
      }

      const acceptCookies = () => {
         document.querySelector(".alerta").classList.add('hide');
         localStorage.setItem("meuCookie", "accept");
      };

      const btnCookies = document.querySelector(".botao-aceitar");

      btnCookies.addEventListener('click', acceptCookies);
   </script>





   <?php
   $query = $pdo->query("SELECT * FROM alertas where ativo = 'Sim' and data >= curDate()");
   $res = $query->fetchAll(PDO::FETCH_ASSOC);
   if (@count($res) > 0) {

      $titulo = $res[0]['titulo'];
      $descricao = $res[0]['descricao'];
      $link = $res[0]['link'];
      $imagem = $res[0]['imagem'];

   ?>

      <a href="#" class="" onclick="modalAlerta('<?php echo $titulo ?>', '<?php echo $descricao ?>', '<?php echo $link ?>', '<?php echo $imagem ?>')">
         <div class="box_alert">
            <h4><?php echo $titulo ?></h4>
            <span class="read_more">Saiba mais!</span>
         </div>
      </a>

   <?php } ?>



   <div class="modal fade" id="modalAlerta" tabindex="-1">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header pad_alert">
               <h5 class="modal-title" id="exampleModalLabel"><span id="titulo-dados"></span></h5>
               <span class="bi bi-x mod_close col_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body">
               <span id="descricao-dados"></span>

               <?php if ($link != "") { ?>
                  <div id="divlink">
                     <a href="" id="link-dados-alert"><span>Clique aqui para acessar a página</span></a>
                  </div>
               <?php } else { ?>

               <?php } ?>

               <?php if ($imagem != "sem-foto.jpg") { ?>
                  <div id="divimgAlert">
                     <img src="" id="foto-dados" width="100%" class="imgAlert">
                  </div>
               <?php } else { ?>

               <?php } ?>
            </div>
         </div>
      </div>
   </div>



   <script type="text/javascript">
      function modalAlerta(titulo, descricao, link, imagem) {

         $('#titulo-dados').text(titulo);

         $('#descricao-dados').text(descricao);

         if (imagem == "") {
            document.querySelector("#divimgAlert").style.display = "none";
         }

         $('#foto-dados').attr('src', 'sistema/img/alertas/' + imagem);
         $('#link-dados-alert').attr('href', link);

         $('#modalAlerta').modal('show');

      }
   </script>