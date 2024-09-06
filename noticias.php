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

    <section class="container_widget_news">
        <div class="content_widget container">
            <div class="area_title_c">
                <div class="area_content_widget">
                    <h3 class="title_cx">Notícias</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="in_widget container in_message">
        <div class="show_messages">
            <h1 class="title_messages mr_not">Notícias</h1>
            <span class="txt__descrition__default txt_noticias">Mantenha-se atualizado sobre as novidades da IBMM.</span>
        </div>

        <div class="search_content">
            <form action="" method="post" class="form_search_custom_me container">
                <div class="container_licao_me">
                    <div class="field_input_me">
                        <input type="text" class="input_me" required>
                        <div class="label_search_me">Pesquisar</div>
                        <button type="submit" class="button_search_li_me">
                            <i class="ri-search-line search_icon_li"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="area_messages">
        <div class="boxes_messages container">
            <div class="info_news">
                <a href="#" class="link_message">
                    <div class="box_img_mesage">
                        <img src="assets/img/celulas.png" alt="" class="image_me">
                    </div>
                </a>

                <div class="info_message">
                    <a href="#" class="link_title_news">
                        Batismo nas águas | 22 de Setembro
                    </a>
                    <div class="flx_details_news">
                        <div class="flx_de">
                            <i class="ri-calendar-line icon__ne"></i> 
                            <span class="date_me">04 de Agosto de 2024</span>
                        </div>
                        <div class="flx_de">
                            <i class="ri-time-line icon__ne"></i> 
                            <span class="hour_ne">17h30</span>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="info_news">
                <a href="#" class="link_message">
                    <div class="box_img_mesage">
                        <img src="assets/img/seja membro.jpg" alt="" class="image_me">
                    </div>
                </a>

                <div class="info_message">
                    <a href="#" class="link_title_news">
                        Encontro com Deus | 5, 6 e 7 de Julho
                    </a>
                    <div class="flx_details_news">
                        <div class="flx_de">
                            <i class="ri-calendar-line icon__ne"></i> 
                            <span class="date_me">05, 06 e 07 de Julho de 2024</span>
                        </div>
                        <div class="flx_de">
                            <i class="ri-time-line icon__ne"></i> 
                            <span class="hour_ne">17h30</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info_news">
                <a href="#" class="link_message">
                    <div class="box_img_mesage">
                        <img src="assets/img/pontos-2.png" alt="" class="image_me">
                    </div>
                </a>

                <div class="info_message">
                    <a href="#" class="link_title_news">
                        Batismo nas águas | 22 de Setembro
                    </a>
                    <div class="flx_details_news">
                        <div class="flx_de">
                            <i class="ri-calendar-line icon__ne"></i> 
                            <span class="date_me">04 de Agosto de 2024</span>
                        </div>
                        <div class="flx_de">
                            <i class="ri-time-line icon__ne"></i> 
                            <span class="hour_ne">17h30</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info_news">
                <a href="#" class="link_message">
                    <div class="box_img_mesage">
                        <img src="assets/img/pontos-2.png" alt="" class="image_me">
                    </div>
                </a>

                <div class="info_message">
                    <a href="#" class="link_title_news">
                        Batismo nas águas | 22 de Setembro
                    </a>
                    <div class="flx_details_news">
                        <div class="flx_de">
                            <i class="ri-calendar-line icon__ne"></i> 
                            <span class="date_me">04 de Agosto de 2024</span>
                        </div>
                        <div class="flx_de">
                            <i class="ri-time-line icon__ne"></i> 
                            <span class="hour_ne">17h30</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info_news">
                <a href="#" class="link_message">
                    <div class="box_img_mesage">
                        <img src="assets/img/pontos-2.png" alt="" class="image_me">
                    </div>
                </a>

                <div class="info_message">
                    <a href="#" class="link_title_news">
                        Batismo nas águas | 22 de Setembro
                    </a>
                    <div class="flx_details_news">
                        <div class="flx_de">
                            <i class="ri-calendar-line icon__ne"></i> 
                            <span class="date_me">04 de Agosto de 2024</span>
                        </div>
                        <div class="flx_de">
                            <i class="ri-time-line icon__ne"></i> 
                            <span class="hour_ne">17h30</span>
                        </div>
                    </div>
            </div>
        </div>
    </section>



</body>
</html>