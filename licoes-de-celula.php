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

    <section class="container_widget_sv">
        <div class="content_widget container">
            <div class="area_title_c">
                <div class="area_content_widget">
                    <h3 class="title_cx">Lições de Célula</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="in_widget container">
        <div class="show_txt">
            <h1 class="title">Nossas Lições</h1>
            <p class="txt__descrition__default">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            Voluptatibus rerum aut impedit odio labore, minus quo, saepe aspernatur dolor vero ullam 
            dignissimos exercitationem. Ducimus, in quibusdam fuga officia voluptas a!</p>
        </div>
    </section>

    <section class="background_licao">
        <div class="filter_licao">
            <h1 class="title tit_custom">Lições de Células</h1>
        </div>

        <form action="" method="post" class="form_search_custom container">
            <div class="container_licao_sv">
                <div class="field_input">
                    <input type="text" class="input" required>
                    <div class="label_search">Pesquisar</div>
                    <button type="submit" class="button_search_li">
                        <i class="ri-search-line search_icon_li"></i>
                    </button>
                </div>
            </div>
        </form>
    </section>

    <section class="licoes_car">
        <div class="area_licoes_cr container">
            <div class="container__join">
                <a href="#" class="card__options licao_hover">
                    <img class="img__options" src="assets/img/bg-image.png" alt="">
                    <div class="box__options">
                        <div class="container_icon_li">
                            <i class="ri-download-line icon_download_li"></i>
                        </div>
                        <h3 class="title__licao">Voe Alto</h3>
                        <p class="category_licao">Série Fé</p>
                        <span class="date_licao">29 de Julho de 2024</span>
                    </div>
                </a>
                <a href="#" class="card__options licao_hover">
                    <img class="img__options" src="assets/img/banner-3.jpg" alt="">
                    <div class="box__options">
                        <div class="container_icon_li">
                            <i class="ri-download-line icon_download_li"></i>
                        </div>
                        <h3 class="title__licao">Eis que venho sem demora</h3>
                        <p class="category_licao">Série Sobrenatural</p>
                        <span class="date_licao">29 de Julho de 2024</span>
                    </div>
                </a>
                <a href="#" class="card__options licao_hover">
                    <img class="img__options" src="assets/img/banner-4.jpg" alt="">
                    <div class="box__options">
                        <div class="container_icon_li">
                            <i class="ri-download-line icon_download_li"></i>
                        </div>
                        <h3 class="title__licao">Obediência</h3>
                        <p class="category_licao">Série Viva como Filho de Deus</p>
                        <span class="date_licao">29 de Julho de 2024</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
</body>
</html>