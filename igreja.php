<?php
require_once("cabecalho.php");



?>
<section class="home">
   <?php

   $query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and ativo = 'Sim'
      and banner != 'sem-foto.jpg' order by id desc limit 4");
   $res = $query->fetchAll(PDO::FETCH_ASSOC);
   $total_reg = count($res);
   if ($total_reg > 0) {
      ?>
      <div class="home__banner">
         <?php
         for ($i = 0; $i < $total_reg; $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $titulo = $res[$i]['titulo'];
            $subtitulo = $res[$i]['subtitulo'];
            $data_evento = $res[$i]['data_evento'];
            $id = $res[$i]['id'];
            $banner = $res[$i]['banner'];
            $url = $res[$i]['url'];
            $video = $res[$i]['video'];
            $tipo = $res[$i]['tipo'];

            $activeClass = $i === 0 ? 'active' : '';

            if($tipo == 'Evento') {
               $name_page = 'evento-';
            } elseif($tipo == 'Mensagem') {
               $name_page = 'mensagem-';
            } elseif($tipo == 'Evento com Inscrição') {
               $name_page = 'evento-com-inscricao-';
            } else {
               $name_page = 'evento-';
            }

            ?>
            <img class="image__banner <?php echo $activeClass ?>" src="sistema/img/eventos/<?php echo $banner ?>" alt="">
            <div class="area__banner">
               <div class="content <?php echo $activeClass ?>">
                  <h1 class="title__banner"><?php echo $titulo ?></h1>
                  <p class="descrition__banner"><?php echo $subtitulo ?></p>
                  <div class="buttons__link">
                     <?php if ($video != "") { ?>
                        <a href="#" class="link__banner__icon" onclick="videoBanner('<?php echo $titulo ?>',
                           '<?php echo $video ?>')">
                           <i class="ri-play-fill icon__banner"></i>
                        </a>
                     <? } else { ?>

                     <?php } ?>
                     <a href="<?php echo $name_page ?><?php echo $url ?>" class="link__banner">
                        Ver Mais
                     </a>
                  </div>
               </div>
            </div>
         <?php } ?>

         <div class="slider__navegation">
            <div class="nav__slider active"></div>
            <div class="nav__slider"></div>
            <div class="nav__slider"></div>
            <div class="nav__slider"></div>
         </div>
      </div>
   <?php } ?>
</section>




<!-- MODAL VÍDEO -->
<div id="myModal" class="modal">
   <div class="modal-content">
      <span class="close">&times;</span>
      <div class="video-container">
         <iframe id="videoIframe" src="<?php echo $video ?>" frameborder="0" allowfullscreen></iframe>
      </div>
   </div>
</div>
<!-- FIM MODAL VÍDEO




   <!--==================== MAIN ====================-->
<main class="main">
   <section class="section_title">
      <h1 class="title title__ibmm">A IBMM Transformando Vidas Através do Amor</h1>
      <p class="txt__descrition__default">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
         Enim illo excepturi sint molestiae cumque dignissimos! Lorem, ipsum dolor sit amet
         consectetur adipisicing elit. Enim illo excepturi sint molestiae cumque dignissimos!</p>
   </section>

   <section class="worships__cards">
      <div class="background__worships">
         <div class="content__txt__worship">
            <h1 class="title">Nossos cultos</h1>
            <p class="txt__worship">Venha estar em Comunhão Conosco</p>
         </div>
         <div class="slide__card__container swiper">
            <div class="slide__content">
               <div class="card__worship swiper-wrapper">
                  <?php
                  $query = $pdo->query("SELECT * FROM cultos where igreja = '$id_igreja'");
                  $res = $query->fetchAll(PDO::FETCH_ASSOC);
                  $total_reg = count($res);
                  if ($total_reg > 0) {

                     ?>
                     <?php
                     for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $dia = $res[$i]['dia'];
                        $hora = $res[$i]['hora'];
                        $count = 1 + ($i * 1);

                        ?>
                        <div class="worship swiper-slide">
                           <div class="name__worship">

                              <span class="overlay__worship">
                                 <div class="content__worship">
                                    <h1 class="number__worship"><?php echo $count ?></h1>
                                 </div>
                              </span>
                           </div>

                           <div class="worship__content">
                              <h2 class="worhip__title"><?php echo $nome ?></h2>
                              <p class="descrition__worship"><?php echo $dia ?> às <?php echo $hora ?></p>
                           </div>
                        </div>
                     <?php }
                  } ?>
               </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
         </div>

      </div>
   </section>

   <section class="section__versicle">
      <div class="versicle__container">
         <h1 class="title">Versículos do mês</h1>

         <div class="slides__versicles swiper">
            <div class="box__versicle">
               <div class="area__versicles swiper-wrapper">
                  <div class="flex__versicles swiper-slide">
                     <p class="txt__descrition__default margin__versicle">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit.
                        Tempora itaque illum inventore veritatis voluptates, voluptatem similique pariatur
                        iure voluptate, asperiores illo quisquam placeat accusamus eius mollitia
                        exercitationem praesentium aut nesciunt.</p>
                     <h3 class="versicle__book">Romans 5:8</h3>
                  </div>
                  <div class="flex__versicles swiper-slide">
                     <p class="txt__descrition__default margin__versicle">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit.
                        Tempora itaque illum inventore veritatis voluptates, voluptatem similique pariatur
                        iure voluptate, asperiores illo quisquam placeat accusamus eius mollitia
                        exercitationem praesentium aut nesciunt.</p>
                     <h3 class="versicle__book"> 1 Jhon 10:5</h3>
                  </div>
                  <div class="flex__versicles swiper-slide">
                     <p class="txt__descrition__default margin__versicle">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit.
                        Tempora itaque illum inventore veritatis voluptates, voluptatem similique pariatur
                        iure voluptate, asperiores illo quisquam placeat accusamus eius mollitia
                        exercitationem praesentium aut nesciunt.</p>
                     <h3 class="versicle__book">Jhon 3:16</h3>
                  </div>
               </div>
            </div>

            <div class="swiper-pagination-versicle"></div>
         </div>
      </div>
   </section>

   <section class="section__join">
      <div class="cards__join">
         <h1 class="title title__settings">Faça parte</h1>

         <div class="container__join">
            <a href="#" class="card__options">
               <img class="img__options" src="assets/img/voluntariado.jpg" alt="">
               <div class="box__options">
                  <h3 class="title__options">Ministérios</h3>
                  <p class="descrition__options">Lorem ipsum, dolor sit </p>
               </div>
            </a>
            <a href="#" class="card__options">
               <img class="img__options" src="assets/img/celulas.png" alt="">
               <div class="box__options">
                  <h3 class="title__options">Células</h3>
                  <p class="descrition__options">Lorem ipsum, dolor sit </p>
               </div>
            </a>
            <a href="#" class="card__options">
               <img class="img__options" src="assets/img/seja membro.jpg" alt="">
               <div class="box__options">
                  <h3 class="title__options">Seja Membro</h3>
                  <p class="descrition__options">Lorem ipsum, dolor sit </p>
               </div>
            </a>
         </div>
      </div>
   </section>

   <section class="section__lesson">
      <div class="box__lesson">
         <h1 class="title title__lesson">Lição de Célula</h1>
         <p class="txt__descrition__default txt__lesson">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Culpa fugiat nemo, repellendus doloribus hic molestias impedit</p>

         <?php
         $query = $pdo->query("SELECT * FROM licoes where igreja = '$id_igreja' order by id desc");
         $res = $query->fetchAll(PDO::FETCH_ASSOC);
         $total_reg = count($res);
         $arquivo = $res[0]['arquivo'];

         ?>
         <div class="links__lessons">
            <a href="licoes/<?php echo $arquivo ?>" target="_blank" class="more__lessos basis">Baixar última lição</a>
            <a href="#" class="all__lessos basis">Mais lições</a>
         </div>
      </div>
   </section>

   <section class="section__video">
      <div class="box__videos">
         <h1 class="title title__highlight">Destaque</h1>
      </div>
   </section>

   <div class="area__container__video">
      <section class="section__box">
         <?php
         $query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and ativo = 'Sim'
                  and tipo = 'Mensagem' order by id desc limit 1");
         $res = $query->fetchAll(PDO::FETCH_ASSOC);
         $total_reg = count($res);
         if ($total_reg > 0) {
            for ($i = 0; $i < $total_reg; $i++) {
               foreach ($res[$i] as $key => $value) {
               }
               $titulo = $res[$i]['titulo'];
               $subtitulo = $res[$i]['subtitulo'];
               $data_evento = $res[$i]['data_evento'];
               $id = $res[$i]['id'];
               $banner = $res[$i]['banner'];
               $imagem = $res[$i]['imagem'];
               $url = $res[$i]['url'];
               $video = $res[$i]['video'];

               ?>
               <a href="mensagem-<?php echo $url ?>" class="box__live">
                  <img class="image__sermon active" src="sistema/img/eventos/<?php echo $imagem ?>" alt="">
                  <div class="area__content__video">
                     <div class="content__sermon">
                        <div class="play__box">
                           <i class="ri-play-circle-line icon_play_video"></i>
                        </div>

                        <div class="content__info__video">
                           <h1 class="name__sermon">
                              <?php echo $titulo ?>
                           </h1>
                        </div>
                        <div class="area__info__video">
                           <div class="name__speaker">
                              <i class="ri-user-line icon__user"></i>
                              Pr. Osiel Gomes
                           </div>
                           <div class="date__video">
                              <i class="ri-calendar-schedule-line icon__calendar"></i>
                              <?php echo $data_evento ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </a>
            <?php }
         } ?>
      </section>
      <div class="area__link__more">
         <a href="#" class="more__sermons">
            <div class="txt__more">
               Ver todos
               <i class="ri-arrow-right-line icon__arrow"></i>
            </div>
         </a>
      </div>
   </div>

   <section class="section__people">
      <div class="box__options">
         <div class="opt__container">
            <div class="card__opt">
               <h3 class="title__opt">Pedir Oração</h3>
               <p class="txt__opt">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
               <a href="#" class="link__opt">Saiba mais</a>
            </div>
            <div class="card__opt">
               <h3 class="title__opt">Doação</h3>
               <p class="txt__opt">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
               <a href="#" class="link__opt">Saiba mais</a>
            </div>
            <div class="card__opt">
               <h3 class="title__opt">Localização</h3>
               <p class="txt__opt">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
               <a href="#" class="link__opt no-animation">Saiba mais</a>
            </div>
         </div>
      </div>
   </section>

   <section class="section__plan">
      <div class="box__reading">
         <h1 class="title">Plano de Leitura</h1>
         <p class="txt__descrition__default mg_txt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Ipsa ullam accusantium saepe, adipisci similique dolorum eligendi? Quis laborum temporibus
            ipsum iusto. Quo blanditiis velit, delectus dolor fuga id nostrum ex?</p>
         <div class="area__link__reading">
            <a href="#" class="more__plans">Ver planos de leitura</a>
         </div>
      </div>
   </section>

   <footer class="footer__church">
      <div class="box__footer">
         <div class="footer__ch">

            <div class="footer__flex">
               <div class="container__logo__footer">
                  <div class="logo__footer">
                     <img src="assets/img/Logo-IBMM.png" alt="" class="img__footer">
                  </div>
               </div>
               <div class="area__footer__1">
                  <h3 class="title__footer">Contato</h3>
                  <ul class="items__footer__1">
                     <li>
                        <i class="ri-mail-line icon__footer"></i>
                        contato@ibmissaomultiplicar.com.br
                     </li>
                     <li>
                        <i class="ri-phone-line icon__footer"></i>
                        (21) 998867793
                     </li>
                     <li>
                        <i class="ri-whatsapp-line icon__footer"></i>
                        (21) 998867793
                     </li>
                     <li>
                        <i class="ri-map-pin-line icon__footer"></i>
                        Avenida Brasil, 33.815 Bangu , Rio de Janeiro, RJ, Brazil, 21852-002
                     </li>
                  </ul>
               </div>
               <div class="area__footer__2">
                  <h3 class="title__footer">Links Úteis</h3>
                  <ul class="items__footer__2">
                     <li>
                        <a href="#" class="links__footer">
                           Início
                        </a>
                     </li>
                     <li>
                        <a href="#" class="links__footer">
                           ECM
                        </a>
                     </li>
                     <li>
                        <a href="#" class="links__footer">
                           Sobre
                        </a>
                     </li>
                     <li>
                        <a href="#" class="links__footer">
                           Palavra
                        </a>
                     </li>
                     <li>
                        <a href="#" class="links__footer">
                           Notícias
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="links__socials">
            <a href="#" class="socials">
               <i class="ri-facebook-fill icons__footer__socials"></i>
            </a>
            <a href="#" class="socials">
               <i class="ri-instagram-fill icons__footer__socials"></i>
            </a>
            <a href="#" class="socials">
               <i class="ri-twitter-x-fill icons__footer__socials"></i>
            </a>
         </div>
         <div class="copyright__footer">
            <span class="txt__copyright">Copyright © 2024 IBMM. All rights reserved. CNPJ: 18.829.333.0001/93</span>
         </div>
      </div>
   </footer>
</main>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>

</html>






<div class="modal fade" id="modalVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header-ban">
            <h3 class="header-ti-mod"><span id="nome-obs" class="name_ti_mod"></span></h3>
            <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
         </div>
         <div class="modal-body">
            <div class="video-container">
               <iframe id="video-dados" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0"
                  allowfullscreen></iframe>
            </div>
         </div>
      </div>
   </div>
</div>





<script type="text/javascript">
   function videoBanner(titulo, video) {

      $('#nome-obs').text(titulo);
      $('#video-dados').attr('src', video);

      var myModal = new bootstrap.Modal(document.getElementById('modalVideo'), {});
      myModal.show();
   }
</script>