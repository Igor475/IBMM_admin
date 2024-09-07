<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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

    <section class="container_widget_plans">
        <div class="content_widget container">
            <div class="area_title_c">
                <div class="area_content_widget">
                    <h3 class="title_cx">Mensagens</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="in_widget container in_message">
        <div class="show_messages">
            <h1 class="title_messages">Assista nossas mensagens</h1>
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

    <section class="prin_message">
        <div class="message_des container">
            Imagem Recomendada 400x200
            <a href="#" class="image-box">
                <div class="image-container-sermon">
                    <img src="assets/img/banner-3.jpg" alt="Imagem de vídeo">
                    <i class="bi bi-play play-icon"></i>
                    <div class="text-container-sermon">
                        <span>Última Mensagem</span>
                        <h3>Pr. Marcos Ângelo</h3>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section class="area_messages">
        <div class="title">Mais Mensagens</div>

        <div class="boxes_messages container">
            <a href="#" class="link_message">
                <div class="box_img_mesage">
                    <img src="assets/img/celulas.png" alt="" class="image_me">
                </div>

                <div class="info_message">
                    <h3 class="title_message">Culto ao Vivo | Domingo | Ceia do Senhor</h3>
                    <span class="date_me">04 de Agosto</span>
                </div>
            </a>

            <a href="#" class="link_message">
                <div class="box_img_mesage">
                    <img src="assets/img/seja membro.jpg" alt="" class="image_me">
                </div>

                <div class="info_message">
                    <h3 class="title_message">Culto ao Vivo | Domingo | Ceia do Senhor</h3>
                    <span class="date_me">04 de Agosto</span>
                </div>
            </a>

            <a href="#" class="link_message">
                <div class="box_img_mesage">
                    <img src="assets/img/pontos-2.png" alt="" class="image_me">
                </div>

                <div class="info_message">
                    <h3 class="title_message">Culto ao Vivo | Domingo | Ceia do Senhor</h3>
                    <span class="date_me">04 de Agosto</span>
                </div>
            </a>

            <a href="#" class="link_message">
                <div class="box_img_mesage">
                    <img src="assets/img/pontos-2.png" alt="" class="image_me">
                </div>

                <div class="info_message">
                    <h3 class="title_message">Culto ao Vivo | Domingo | Ceia do Senhor</h3>
                    <span class="date_me">04 de Agosto</span>
                </div>
            </a>

            <a href="#" class="link_message">
                <div class="box_img_mesage">
                    <img src="assets/img/pontos-2.png" alt="" class="image_me">
                </div>

                <div class="info_message">
                    <h3 class="title_message">Culto ao Vivo | Domingo | Ceia do Senhor</h3>
                    <span class="date_me">04 de Agosto</span>
                </div>
            </a>
        </div>
    </section>



</body>

</html>