<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <title>IBMM</title>
    
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
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

    <section class="container_widget_cont">
        <div class="content_widget container">
            <div class="area_title_c">
                <div class="area_content_widget">
                    <h3 class="title_cx">Contato</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="box_contact">
            <div class="flex_con">
                <div class="box_con_1">
                    <span class="txt_con">Vamos conversar</span>
                    <h2 class="title_box_con_1">Fale Conosco</h2>

                    <div class="items_box_con">
                        <div class="content_items_con">
                            <div class="items_icons_con">
                                <i class="ri-mail-fill icons_con_r"></i>
                            </div>
                            
                            <div class="items_txt_con">
                                <span class="par_name">Email:</span>
                                <span class="txt_name_co">Conatato@ibmissaomultiplicar.com.br</span>
                            </div>
                        </div>
                        <div class="content_items_con">
                            <div class="items_icons_con">
                                <i class="ri-phone-fill icons_con_r"></i>
                            </div>
                            
                            <div class="items_txt_con">
                                <span class="par_name">Telefone:</span>
                                <span class="txt_name_co">(21) 998867793</span>
                            </div>
                        </div>
                        <div class="content_items_con">
                            <div class="items_icons_con">
                                <i class="ri-map-pin-2-fill icons_con_r"></i>
                            </div>
                            
                            <div class="items_txt_con">
                                <span class="par_name">Endereço:</span>
                                <span class="txt_name_co">Avenida Brasil, 33.815 Bangu , Rio de Janeiro, RJ, Brazil</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_con_2">
                    <span class="txt_form_con">Entre em Contato</span>
                    <h2 class="title_box_2">Preencha o formulário abaixo</h2>

                    <div class="box_form">
                        <div class="area_input_con">
                            <input type="text" class="input_cont_form" placeholder="Nome">
                        </div>
                        <div class="area_input_con">
                            <input type="text" class="input_cont_form" placeholder="Email">
                        </div>
                        <div class="area_input_con">
                            <input type="text" class="input_cont_form" placeholder="Telefone">
                        </div>
                        <div class="area_input_con">
                            <input type="text" class="input_cont_form" placeholder="Assunto">
                        </div>
                        <div class="area_input_con">
                            <textarea class="textarea_con_for" maxlength="1000" class="input_cont_form" placeholder="Mensagem"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>