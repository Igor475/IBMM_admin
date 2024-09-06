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

    <section class="container_widget_min">
        <div class="content_widget container">
            <div class="area_title_c">
                <div class="area_content_widget">
                    <h3 class="title_cx">Ministérios</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="in_widget container">
        <div class="show_txt">
            <h1 class="title title_def_t">Servindo com Propósito e Dedicação</h1>
            <p class="txt__descrition__default">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            Voluptatibus rerum aut impedit odio labore, minus quo, saepe aspernatur dolor vero ullam 
            dignissimos exercitationem. Ducimus, in quibusdam fuga officia voluptas a!</p>
        </div>
    </section>

    <section class="minis">
        <div class="container">
            <h2 class="title title_m_cr">Transformando Vidas Através dos Ministérios na Igreja</h2>

            <div class="cards_minis_ch">
                <div class="link_minis">
                    <div class="area_inf_min">
                        <h4 class="title_name_min">Audioviual</h4>
                        <p class="txt_desc_mini">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit
                        </p>
                        <a href="#" class="link_ins_min">Increver-se</a>
                    </div>
                </div>
                <div class="link_minis">
                    <div class="area_inf_min">
                        <h4 class="title_name_min">Recepção</h4>
                        <p class="txt_desc_mini">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit
                        </p>
                        <a href="#" class="link_ins_min">Increver-se</a>
                    </div>
                </div>
                <div class="link_minis">
                    <div class="area_inf_min">
                        <h4 class="title_name_min">Louvor</h4>
                        <p class="txt_desc_mini">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="link_ins_min">Increver-se</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="warning">
        <div class="container">
            <h2 class="title title_warn_min">Importante</h2>

            <ul class="items_requirements">
                <li>
                    <img src="assets/img/info.svg" alt="" class="svg_warn_info">
                    Ser membro da IBMM
                </li>
                <li>
                    <img src="assets/img/info.svg" alt="" class="svg_warn_info">
                    Estar participando de uma célula
                </li>
                <li>
                    <img src="assets/img/info.svg" alt="" class="svg_warn_info">
                    Ser aprovado pelo líder d ecélula
                </li>
                <li>
                    <img src="assets/img/info.svg" alt="" class="svg_warn_info">
                    Ter bom testemunho de vida
                </li>
                <li>
                    <img src="assets/img/info.svg" alt="" class="svg_warn_info">
                    Ter disponibilidade para escalas
                </li>
            </ul>
        </div>
    </section>
</body>
</html>