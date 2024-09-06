<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <title>IBMM</title>
    
    <script src="assets/js/swiper-bundle.min.js"></script>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
        <a href="#" class="nav__logo">
            <img width="100%" src="assets/img/Logo-IBMM.png" alt="">
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#" class="nav__link">Home</a>
                </li>

                <li class="nav__item">
                    <a href="#" class="nav__link">Quem Somos</a>
                </li>

                <li class="nav__item">
                    <a href="#" class="nav__link">Células</a>
                </li>

                <li class="nav__item">
                    <a href="#" class="nav__link">Mensagens</a>
                </li>

                <li class="nav__item">
                    <a href="#" class="nav__link">Ministérios</a>
                </li>

                <li class="nav__item">
                    <a href="#" class="nav__link">Eventos</a>
                </li>

                <li class="nav__item">
                    <a href="#" class="nav__link">Contato</a>
                </li>

                <li class="nav__item">
                    <a href="#" class="donation">Doação</a>
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
            <!-- Search button -->
            <i class="ri-search-line nav__search" id="search-btn"></i>

            <!-- Login button -->
            <i class="ri-user-line nav__login" id="login-btn"></i>

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
            <img class="login__img" src="assets/img/logo-IBMM-preta.png">
        </div>
        
        <div class="login__group">
            <div>
                <label for="email" class="login__label">Email</label>
                <input type="email" placeholder="Digite seu E-mail" id="email" class="login__input">
            </div>
            
            <div>
                <label for="password" class="login__label">Senha</label>
                <input type="password" placeholder="Sua Senha" id="password" class="login__input">
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

    <section class="container_widget_cel">
        <div class="content_widget container">
            <div class="area_title_c">
                <div class="area_content_widget">
                    <h3 class="title_cx">Células</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="in_widget container">
        <div class="show_txt">
            <h1 class="title title_def_t">O poder dos pequenos grupos em transformar vidas</h1>
            <p class="txt__descrition__default">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            Voluptatibus rerum aut impedit odio labore, minus quo, saepe aspernatur dolor vero ullam 
            dignissimos exercitationem. Ducimus, in quibusdam fuga officia voluptas a!</p>
        </div>
    </section>

    <section class="content__def">
        <div class="container">
            <h2 class="title title_cel_i">Como é uma célula?</h2>

            <div class="box_cards_cel">
                <div class="content_inf_cel">
                    <img src="assets/img/lanche.svg" alt="" class="images_con_cel">

                    <div class="flex_con_cel">
                        <h3 class="title_con_c">Lanche e Comunhão</h3>
                        <p class="txt_info_cel">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Maxime placeat quia officia recusandae illum ipsa quos explicabo natus quaerat libero
                            laboriosam ut, quis eos, consectetur excepturi exercitationem consequuntur et cum!
                        </p>
                    </div>
                </div>
                <div class="content_inf_cel">
                    <img src="assets/img/quebra-gelo.svg" alt="" class="images_con_cel">

                    <div class="flex_con_cel">
                        <h3 class="title_con_c">Quebra-gelo</h3>
                        <p class="txt_info_cel">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Maxime placeat quia officia recusandae illum ipsa quos explicabo natus quaerat libero
                            laboriosam ut, quis eos, consectetur excepturi exercitationem consequuntur et cum!
                        </p>
                    </div>
                </div>
                <div class="content_inf_cel">
                    <img src="assets/img/louvor.svg" alt="" class="images_con_cel">

                    <div class="flex_con_cel">
                        <h3 class="title_con_c">Louvor</h3>
                        <p class="txt_info_cel">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Maxime placeat quia officia recusandae illum ipsa quos explicabo natus quaerat libero
                            laboriosam ut, quis eos, consectetur excepturi exercitationem consequuntur et cum!
                        </p>
                    </div>
                </div>
                <div class="content_inf_cel">
                    <img src="assets/img/estudo.svg" alt="" class="images_con_cel">

                    <div class="flex_con_cel">
                        <h3 class="title_con_c">Estudo</h3>
                        <p class="txt_info_cel">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Maxime placeat quia officia recusandae illum ipsa quos explicabo natus quaerat libero
                            laboriosam ut, quis eos, consectetur excepturi exercitationem consequuntur et cum!
                        </p>
                    </div>
                </div>
                <div class="content_inf_cel">
                    <img src="assets/img/oracao.svg" alt="" class="images_con_cel">

                    <div class="flex_con_cel">
                        <h3 class="title_con_c">Oração</h3>
                        <p class="txt_info_cel">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Maxime placeat quia officia recusandae illum ipsa quos explicabo natus quaerat libero
                            laboriosam ut, quis eos, consectetur excepturi exercitationem consequuntur et cum!
                        </p>
                    </div>
                </div>
                <div class="content_inf_cel">
                    <img src="assets/img/descrition.svg" alt="" class="images_con_cel">

                    <div class="flex_con_cel">
                        <h3 class="title_con_c">Planejamento e Desafio</h3>
                        <p class="txt_info_cel">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Maxime placeat quia officia recusandae illum ipsa quos explicabo natus quaerat libero
                            laboriosam ut, quis eos, consectetur excepturi exercitationem consequuntur et cum!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content__def content_contact_cel">
        <div class="container cont_ali">
            <h2 class="title title_mr_d">Desejo participar de uma célula</h2>
            <p class="txt_contact_cel">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Provident vero alias, modi, magni laudantium sed, assumenda delectus dolores voluptates 
                maxime quaerat illum distinctio commodi expedita cupiditate suscipit recusandae dolor dolorum?
            </p>
            <a href="#" class="link_whats_cel">Clique aqui</a>
        </div>
    </section>

    <section class="share">
        <div class="widget_share container">
            <h1 class="title_share">#Compartilhe</h1>
            <p class="txt__descrition__default txt_share">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>

            <div class="socials_share">
                <a href="#" class="icons_share">
                    <i class="ri-facebook-fill icon_media_socials"></i>
                </a>
                <a href="#" class="icons_share">
                    <i class="ri-twitter-x-fill icon_media_socials"></i>
                </a>
                <a href="#" class="icons_share">
                    <i class="ri-instagram-line icon_media_socials"></i>
                </a>
            </div>
        </div>
    </section>

</body>
</html>