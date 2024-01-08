<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap_style.css">
    <link rel="stylesheet" type="text/css" href="css/menu_action_table.css">
    <title>Painel Administrativo</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="js/script.js" defer></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="grid-container">

        <!----------------------------------- HEADER --------------------------------------->
        <header class="header">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <i class="bx bx-menu icon_menu_side"></i>
                Menu
            </button>

            <div class="header-left">
                <form class="form-navbar" action="#">
                    <div class="area-search">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search icon'></i>
                    </div>
                </form>
            </div>
            <div class="header-right">
                <a href="" class="nav-link">
                    <i class='bx bxs-bell icon' ></i>
                    <span class="badge">5</span>
                </a>
                <a href="" class="nav-link">
                    <i class='bx bxs-message-square-dots icon' ></i>
                    <span class="badge">8</span>
                </a>

                <div class="profile-dropdown">
                    <div class="profile-dropdown-btn" onclick="toggle()">
                        <div class="profile-img">
                            <img class="img_profile" src="images/eu.jpg" alt="">
                        </div>
                        <span class="name_profile">
                            Olá<br/>
                            <b><?php $_SESSION['nome_usuario'] ?></b>
                        </span>
                        <i class="bx bxs-chevron-down icon_profile_down"></i>
                    </div>

                    <ul class="profile-link">
                        <li>
                            <a href="#">
                                <i class='bi bi-person-gear icon'></i>
                                Perfil
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bi bi-gear icon'></i>
                                Configurações
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bxi bi-box-arrow-right icon'></i>
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!----------------------------------- FIM HEADER --------------------------------------->

        <!----------------------------------- ASIDE --------------------------------------->
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
                <span type="button" class="bi bi-x icon_close_side" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </div>
            <div class="offcanvas-body">
                <div class="sidebar_area">
                    <div class="sidebar_sys">
                        <a class="brand">
                            <img class="img_logo" src="images/logo-IBMM-preta.png" alt="" title="Igreja Batista Missão Multiplicar">
                        </a>
                        <h4 class="title_sys">Sistema <span class="">IBMM</span></h4>
                    </div>
                    <ul class="side-menu">
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-house-door icon'></i>Home</a>
                        </li>
                        <li class="divider" data-text="Principal">Principal</li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-person-plus icon'></i> Pessoas <i class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li><a href="#">Pastor Presidente</a></li>
                                <li><a href="#">Pastores</a></li>
                                <li><a href="#">Tesoureiros</a></li>
                                <li><a href="#">Secretários(as)</a></li>
                                <li><a href="#">Usuários</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-plus-circle icon'></i> Cadastros <i class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li><a href="#">Igrejas</a></li>
                                <li><a href="#">Ministérios</a></li>
                                <li><a href="#">Frequências (Contas)</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-folder-plus icon'></i> Consultas <i class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li><a href="#">Anexos / Arquivos</a></li>
                                <li><a href="#">Patrimônios</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-folder-symlink icon' ></i> Relatórios <i class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li><a href="#">Membros</a></li>
                                <li><a href="#">Patrimônios</a></li>
                                <li><a href="#">Financeiros</a></li>
                                <li><a href="#">Auditoria e Logs</a></li>
                                <li><a href="#">Tranferência de Membros</a></li>
                                <li><a href="#">Fechamentos Mensais</a></li>
                            </ul>
                        </li>
                        <li class="divider" data-text="Outros">Outros</li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-bell icon'></i>Notificações</a>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-gear icon'></i>Configuração Geral</a>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-database-down icon'></i>Backup Banco</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <aside id="sidebar">
            <div class="sidebar-title">
                <span class="bx bx-x icon_close_side" onclick="closeSidebar()"></span>
            </div>
            <div class="sidebar_area">
                <div class="sidebar_sys">
                    <a class="brand">
                        <img class="img_logo" src="logo-IBMM-preta.png" alt="" title="Igreja Batista Missão Multiplicar">
                    </a>
                    <h4 class="title_sys">Sistema <span class="">IBMM</span></h4>
                </div>
                <ul class="side-menu">
                    <li>
                        <a href="#" class="active"><i class='bx bxs-home icon'></i>Home</a>
                    </li>
                    <li class="divider" data-text="Principal">Principal</li>
                    <li>
                        <a href="#"><i class='bx bxs-user icon'></i> Pessoas <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Pastor Presidente</a></li>
                            <li><a href="#">Pastores</a></li>
                            <li><a href="#">Tesoureiros</a></li>
                            <li><a href="#">Secretários(as)</a></li>
                            <li><a href="#">Usuários</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class='bx bx-pencil icon'></i> Cadastros <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Igrejas</a></li>
                            <li><a href="#">Ministérios</a></li>
                            <li><a href="#">Frequências (Contas)</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class='bx bx-folder icon'></i> Consultas <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Anexos / Arquivos</a></li>
                            <li><a href="#">Patrimônios</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class='bx bxs-file-pdf icon' ></i> Relatórios <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Membros</a></li>
                            <li><a href="#">Patrimônios</a></li>
                            <li><a href="#">Financeiros</a></li>
                            <li><a href="#">Auditoria e Logs</a></li>
                            <li><a href="#">Tranferência de Membros</a></li>
                            <li><a href="#">Fechamentos Mensais</a></li>
                        </ul>
                    </li>
                    <li class="divider" data-text="Outros">Outros</li>
                    <li>
                        <a href="#"><i class='bx bxs-bell icon'></i>Notificações</a>
                    </li>
                    <li>
                        <a href="#"><i class='bx bx-cog icon'></i>Configuração Geral</a>
                    </li>
                    <li>
                        <a href="#"><i class='bx bxs-data icon'></i>Backup Banco</a>
                    </li>
                </ul>
            </div>
        </aside>
        <!----------------------------------- FIM ASIDE --------------------------------------->

</body>
</html>