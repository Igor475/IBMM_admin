
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
    <title>Mensagem</title>

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


    <section class="video_container_pag_sermon">
        <div class="container">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>

            <div class="area_sermon_inf_pag">
                <h3>O povo sobrenatural - Pr Marcos Angelo | Missão Multiplicar</h3>
                <span>Pr. Marcos Ângelo&nbsp; • &nbsp;08 de Setembro</span>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia dolorum atque fuga deserunt beatae quasi minima nam dolorem, 
                consequuntur similique hic consequatur odio nobis perspiciatis eligendi harum rem dicta optio.</p>
            </div>

            <div class="more_sermon_pag">
                <a href="#" class="card_more_rgh">
                    <img src="assets/img/doacao.svg" alt="" class="img__svg__more">
                    <h4>Doar Agora</h4>
                </a>
                <a href="#" class="card_more_rgh">
                    <img src="assets/img/youtube.svg" alt="" class="img__svg__more">
                    <h4>YouTube</h4>
                </a>
                <a href="#" class="card_more_rgh">
                    <img src="assets/img/compartilhar.svg" alt="" class="img__svg__more">
                    <h4>Compartilhar</h4>
                </a>
            </div>

            <div class="area_cont_faith_f">
                <h1 class="title ti_faith">Dê o próximo passo de fé</h1>

                <div class="boxes_cards_words">
                    <div class="box_card_svcbn">
                        <img src="assets/img/seja membro.jpg" alt="" class="img_ca_skjh">
                        <div class="content_faith_info">
                            <span>Encontrar célula</span>
                            <h4>junte-se a uma célula</h4>
                        </div>
                    </div>
                    <div class="box_card_svcbn">
                        <img src="assets/img/seja membro.jpg" alt="" class="img_ca_skjh">
                        <div class="content_faith_info">
                            <span>Estamos aqui para você</span>
                            <h4>Peça oração</h4>
                        </div>
                    </div>
                    <div class="box_card_svcbn">
                        <img src="assets/img/seja membro.jpg" alt="" class="img_ca_skjh">
                        <div class="content_faith_info">
                            <span>Dê o próximo passo em sua fé</span>
                            <h4>Seja Batizado</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>