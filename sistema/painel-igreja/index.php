<?php
@session_start();
require_once("verificar.php");
require_once("../conexao.php");
$id_usuario = @$_SESSION['id_usuario'];
$nivel_usu = @$_SESSION['nivel_usuario'];

/* if ($nivel_usu == 'tesoureiro') {
    $esc_tesoureiro = 'd-none';
} else {
    $esc_tesoureiro = '';
} */

$data_atual = date('Y-m-d');
$hora_atual = date('H:i:s');

$mes_atual = Date('m');
$ano_atual = Date('Y');
$data_mes = $ano_atual . "-" . $mes_atual . "-01";
$data_ano = $ano_atual . "-01-01";


if (@$_GET['igreja'] > 0) {
    @$_SESSION['id_igreja'] = @$_GET['igreja'];
}

$id_igreja = @$_SESSION['id_igreja'];

//TRAZENDO OS DADOS DA IGREJA
$query = $pdo->query("SELECT * FROM igrejas WHERE id = '$id_igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_igreja = $res[0]['nome'];
$foto_igreja = $res[0]['imagem'];



$query = $pdo->query("SELECT *FROM usuarios WHERE id = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usu = $res[0]['nome'];
$email_usu = $res[0]['email'];
$cpf_usu = $res[0]['cpf'];
$senha_usu = $res[0]['senha'];
$nivel_usu = $res[0]['nivel'];
$foto_usu = $res[0]['foto'];
$id_pessoa = $res[0]['id_pessoa'];


// TRAZENDO DADOS DAS CONFIGURAÇÕES DAS IGREJAS
$query = $pdo->query("SELECT *FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$email_igr = $res[0]['email'];
$nome_igr = $res[0]['nome'];
$end_igr = $res[0]['endereco'];
$tel_igr = $res[0]['telefone'];


$pag_inicial = 'home';
if (@$_SESSION['nivel_usuario'] != 'Pastor Presidente') {
    require_once("verificar-permissoes.php");
}
if (@$_GET['pag'] != "") {
    $pag = @$_GET['pag'];
} else {
    $pag = $pag_inicial;
}
//MENU DO PAINEL 
/* $pag = @$_GET['pag'];
if ($pag == "") {
    $pag = 'home';
} */

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo-IBMM-preta.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap_style.css">
    <link rel="stylesheet" type="text/css" href="../css/menu_action_table.css">
    <link rel="stylesheet" type="text/css" href="../css/styles_modais.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <title>Painel Administrativo</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <script src="../js/script.js" defer></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css" />
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/toastr.css">
    <script type="text/javascript" src="../js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <div class="grid-container">

        <!----------------------------------- HEADER --------------------------------------->
        <header class="header">
            <div class="flex_widget_one">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="bx bx-menu icon_menu_side"></i>
                    <span class="menu_hidden">Menu</span>
                </button>

                <div class="order_prayer">
                    <div class="order_dropdown_btn" onclick="toggleOracao()">
                        <?php
                        $query = $pdo->query("SELECT * FROM oracao where igreja = '$id_igreja' and data = CurDate() and status = 'Aguardando'");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        $total_reg = @count($res);
                        if ($total_reg > 1) {
                            $texto_pedidos = 'Você possui ' . $total_reg . ' novos pedidos de Oração!';
                        } else if ($total_reg == 1) {
                            $texto_pedidos = 'Você possui ' . $total_reg . ' novo pedido de Oração!';
                        } else {
                            $texto_pedidos = 'Você não possui novos pedidos de Oração!';
                        }
                        ?>
                        <div class="box_order_img">
                            <img src="../img/svg/oracao.svg" alt="" class="img_order_prayer">
                        </div>
                        <span class="reg_order_p">
                            <?php echo $total_reg ?>
                        </span>
                    </div>

                    <ul class="items_order_prayer">
                        <div class="div_head_txt">
                            <li>
                                <?php echo $texto_pedidos ?>
                            </li>
                        </div>
                        <div class="div_content_regs">
                            <?php
                            $query = $pdo->query("SELECT * FROM oracao where igreja = '$id_igreja' and data = CurDate() and status = 'Aguardando' order by id desc limit 4");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            $total_reg = @count($res);
                            for ($i = 0; $i < $total_reg; $i++) {
                                foreach ($res[$i] as $key => $value) {
                                }
                                $id = $res[$i]['id'];
                                $nome = $res[$i]['nome'];
                                $categoria_oracao = $res[$i]['motivo_oracao'];

                                $query2 = $pdo->query("SELECT * FROM categoria_oracao where id = '$categoria_oracao'");
                                $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                $total_reg2 = @count($res2);
                                if ($total_reg2 > 0) {
                                    $nome_cat_oracao = $res2[0]['nome'];
                                } else {
                                    $nome_cat_oracao = 'Nenhum!';
                                }

                                ?>
                            <li>
                                <b>Pedido de Oração:
                                    <?php echo $id ?>
                                </b><br>
                                <b>Motivo:</b> <span class="names_pr">
                                    <?php echo $nome_cat_oracao ?>
                                </span><br>
                                <b>Nome: </b> <span class="names_pr">
                                    <?php echo $nome ?>
                                </span>
                            </li>
                            <?php } ?>
                        </div>
                        <li>
                            <div class="btn_ord">
                                <a href="index.php?pag=oracao" class="link_order_prayers">Ir para os pedidos de
                                    Oração</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="header-left">
                <form class="form-navbar" action="#">
                    <div class="area-search">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search icon'></i>
                    </div>
                </form>
            </div>
            <div class="header-right">



                <div class="profile-dropdown">
                    <div class="profile-dropdown-btn" onclick="toggle()">
                        <div class="profile-img">
                            <img class="img_profile" src="../img/membros/<?php echo $foto_usu ?>" alt="">
                        </div>
                        <span class="name_profile">
                            Olá,<br />
                            <b>
                                <?php echo @$nome_usu ?>
                            </b>
                        </span>
                        <i class="bx bx-chevron-down icon_profile_down"></i>
                    </div>

                    <ul class="profile-link">
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalPerfil">
                                <i class='bi bi-person-gear icon'></i>
                                Editar Dados
                            </a>
                        </li>
                        <?php if ($nivel_usu == 'Pastor Presidente') { ?>
                        <li>
                            <a href="../painel-admin">
                                <i class='bi bi-grid icon'></i>
                                Painel Administrador
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="../logout.php">
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
        <aside class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
                <span type="button" class="bi bi-x icon_close_side" data-bs-dismiss="offcanvas"
                    aria-label="Close"></span>
            </div>
            <div class="offcanvas-body">
                <div class="sidebar_area">
                    <div class="sidebar_sys">
                        <a class="brand">
                            <img class="img_logo" src="../img/igrejas/<?php echo $foto_igreja ?>" alt=""
                                title="Igreja Batista Missão Multiplicar">
                        </a>
                        <h4 class="title_sys">Sistema <span class="">IBMM</span></h4>
                        <div class="well_area_usu">
                            <span class="name_usu_res">Seja bem-vindo
                                <?php echo $nome_usu ?>!
                            </span>
                        </div>
                    </div>
                    <ul class="side-menu">
                        <?php if (@$home == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$home ?>">
                            <a href="index.php" class="font_main_index">
                                <i class="bi bi-house-door icon"></i>
                                Home
                            </a>
                        </li>
                        <?php } ?>
                        <li class="divider">
                            <span class="text_divider">Principal</span>
                        </li>




                        <?php if (@$menu_pessoas == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$menu_pessoas ?>">
                            <a href="#" class="font_main_index"><i class='bi bi-person-circle icon'></i> Pessoas <i
                                    class='bx bx-chevron-right icon-right'></i></a>

                            <ul class="side-dropdown">
                                <?php if (@$membros == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$membros ?>">
                                    <a href="index.php?pag=membros">Membros</a>
                                </li>
                                <?php } ?>

                                <?php if (@$pastores == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$pastores ?>">
                                    <a href="index.php?pag=pastores">Pastores</a>
                                </li>
                                <?php } ?>

                                <?php if (@$tesoureiros == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$tesoureiros ?>">
                                    <a href="index.php?pag=tesoureiros">Tesoureiros</a>
                                </li>
                                <?php } ?>

                                <?php if (@$secretarios == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$secretarios ?>">
                                    <a href="index.php?pag=secretarios">Secretários(as)</a>
                                </li>
                                <?php } ?>

                                <?php if (@$fornecedores == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$fornecedores ?>">
                                    <a href="index.php?pag=fornecedores">Fornecedores</a>
                                </li>
                                <?php } ?>

                                <?php if (@$usuarios == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$usuarios ?>">
                                    <a href="index.php?pag=usuarios">Usuários</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>






                        <?php if (@$menu_cadastros == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$menu_cadastros ?>">
                            <a href="#" class="font_main_index">
                                <i class='bi bi-pencil-square icon'></i> Cadastros <i
                                    class='bx bx-chevron-right icon-right'></i>
                            </a>

                            <ul class="side-dropdown">
                                <?php if (@$tarefas == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$tarefas ?>">
                                    <a href="index.php?pag=tarefas">Agenda / Tarefas</a>
                                </li>
                                <?php } ?>

                                <?php if (@$dadosIgreja == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$dadosIgreja ?>">
                                    <a href="index.php?pag=igrejas">
                                        Dados da Igreja
                                    </a>
                                </li>
                                <?php } ?>

                                <?php if (@$cultos == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$cultos ?>">
                                    <a href="index.php?pag=cultos">
                                        Cultos
                                    </a>
                                </li>
                                <?php } ?>

                                <?php if (@$alertas == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$alertas ?>">
                                    <a href="index.php?pag=alertas">
                                        Alertas
                                    </a>
                                </li>
                                <?php } ?>

                                <?php if (@$eventos == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$eventos ?>">
                                    <a href="index.php?pag=eventos">
                                        Eventos
                                    </a>
                                </li>
                                <?php } ?>

                                <?php if (@$licoes == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$licoes ?>">
                                    <a href="index.php?pag=licoes">Lições de Célula</a>
                                </li>
                                <?php } ?>

                                <?php if (@$categoria_licoes == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$categoria_licoes ?>">
                                    <a href="index.php?pag=categoria_licoes">Categoria das Lições</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>





                        <?php if (@$menu_financeiro == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$menu_financeiro ?>">
                            <a href="#" class="font_main_index"><i class='bi bi-currency-dollar icon'></i> Financeiro <i
                                    class='bx bx-chevron-right icon-right'></i></a>

                            <ul class="side-dropdown">
                                <?php if (@$pagar == "ocultar") { ?>

                                <?php } else { ?>

                                <li class="<?php echo @$pagar ?>">
                                    <a href="index.php?pag=pagar">Contas à Pagar</a>
                                </li>
                                <?php } ?>

                                <?php if (@$receber == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$receber ?>">
                                    <a href="index.php?pag=receber">Contas à Receber</a>
                                </li>
                                <?php } ?>

                                <?php if (@$dizimos == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$dizimos ?>">
                                    <a href="index.php?pag=dizimos">Dízimos</a>
                                </li>
                                <?php } ?>

                                <?php if (@$ofertas == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$ofertas ?>">
                                    <a href="index.php?pag=ofertas">Ofertas</a>
                                </li>
                                <?php } ?>

                                <?php if (@$doacoes == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$doacoes ?>">
                                    <a href="index.php?pag=doacoes">Doações</a>
                                </li>
                                <?php } ?>

                                <?php if (@$vendas == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$vendas ?>">
                                    <a href="index.php?pag=vendas">Vendas</a>
                                </li>
                                <?php } ?>

                                <?php if (@$movimentacoes == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$movimentacoes ?>">
                                    <a href="index.php?pag=movimentacoes">Movimentações</a>
                                </li>

                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>






                        <?php if (@$menu_secretaria == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$menu_secretaria ?>">
                            <a href="#" class="font_main_index"><i class='bi bi-folder2-open icon'></i> Secretária <i
                                    class='bx bx-chevron-right icon-right'></i></a>

                            <ul class="side-dropdown">
                                <?php if (@$documentos == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$documentos ?>">
                                    <a href="index.php?pag=documentos">Documentos</a>
                                </li>
                                <?php } ?>

                                <?php if (@$patrimonio == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$patrimonio ?>">
                                    <a href="index.php?pag=patrimonios">Patrimônio</a>
                                </li>
                                <?php } ?>

                                <?php if (@$celulas == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$celulas ?>">
                                    <a href="index.php?pag=celulas">Células</a>
                                </li>
                                <?php } ?>

                                <?php if (@$grupos == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$grupos ?>">
                                    <a href="index.php?pag=grupos">Grupos</a>
                                </li>
                                <?php } ?>

                                <?php if (@$oracao == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$oracao ?>">
                                    <a href="index.php?pag=oracao">Orações</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>






                        <?php if (@$menu_relatorio == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$menu_relatorio ?>">
                            <a href="#" class="font_main_index"><i class='bi bi-folder-symlink icon'></i> Relatórios <i
                                    class='bx bx-chevron-right icon-right'></i></a>

                            <ul class="side-dropdown">
                                <?php if (@$RelMembros == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$RelMembros ?>">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalRelMembros">Membros</a>
                                </li>
                                <?php } ?>

                                <?php if (@$RelPatrimonio == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$RelPatrimonio ?>">
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalRelPatrimonios">Patrimônios</a>
                                </li>
                                <?php } ?>

                                <?php if (@$rel_financeiro == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$rel_financeiro ?>">
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalRelFinanceiro">Financeiro</a>
                                </li>
                                <?php } ?>

                                <?php if (@$rel_auditoria == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$rel_auditoria ?>">
                                    <a href="#">Auditoria e Logs</a>
                                </li>
                                <?php } ?>

                                <?php if (@$rel_trans_membros == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$rel_trans_membros ?>">
                                    <a href="#">Tranferência de Membros</a>
                                </li>
                                <?php } ?>

                                <?php if (@$rel_fechamento == "ocultar") { ?>

                                <?php } else { ?>
                                <li class="<?php echo @$rel_fechamento ?>">
                                    <a href="#">Fechamentos Mensais</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php if (@$anexos == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$anexos ?>">
                            <a href="index.php?pag=anexos" class="font_main_index"><i
                                    class='bi bi-archive icon'></i>Anexo
                                Sede</a>
                        </li>
                        <?php } ?>

                        <li class="divider">
                            <span class="text_divider">Outros</span>
                        </li>

                        <?php if (@$notificacoes == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$notificacoes ?>">
                            <a href="#" class="font_main_index"><i class='bi bi-bell icon'></i>Notificações</a>
                        </li>
                        <?php } ?>

                        <?php if (@$backup == "ocultar") { ?>

                        <?php } else { ?>
                        <li class="<?php echo @$backup ?>">
                            <a href="#" class="font_main_index"><i class='bi bi-database-down icon'></i>Backup Banco</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </aside>
        <!----------------------------------- FIM ASIDE --------------------------------------->

        <main id="container_painel">
            <?php
            require_once($pag . '.php');
            ?>
        </main>
    </div>

</body>

</html>





<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Editar Dados</h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-usu" method="post">
                <div class="modal-body">
                    <div action="#" class="form-modal">
                        <div class="form first">
                            <div class="details personal">
                                <span class="title-modal">Personalizar detalhes</span>

                                <div class="fields">
                                    <div class="input-field">
                                        <label>Nome</label>
                                        <input type="text" name="nome_usu" id="nome_usu" placeholder="Insira o Nome"
                                            value="<?php echo $nome_usu ?>" required>
                                    </div>

                                    <div class="input-field field_cpf_1">
                                        <label>CPF</label>
                                        <input type="text" name="cpf_usu" id="cpf_usu" placeholder="Insira o CPF"
                                            value="<?php echo $cpf_usu ?>" required>
                                    </div>

                                    <div class="input-field">
                                        <label>Email</label>
                                        <input type="email" name="email_usu" id="email_usu" placeholder="Insira o Email"
                                            value="<?php echo $email_usu ?>" required>
                                    </div>

                                    <div class="input-field field_area_1">
                                        <label>Senha</label>
                                        <input type="text" name="senha_usu" id="senha_usu" placeholder="Insira a Senha"
                                            value="<?php echo $senha_usu ?>" required>
                                    </div>

                                    <div class="area_photo">
                                        <div class="area_photo_flex">
                                            <label>Foto</label>
                                            <input type="file" class="input_file" id="imagem-usu" name="imagem"
                                                onChange="carregarImg2();">
                                        </div>
                                        <div class="divImg">
                                            <img class="photo_file" id="target-usu"
                                                src="../img/membros/<?php echo $foto_usu ?>" alt="">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_usu" value="<?php echo $id_usuario ?>">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="msg-usu"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-usu" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Editar
                            <i class="bi bi-pencil-square icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






<div class="modal fade" id="modalRelMembros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Relatório de Membros</h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form method="post" action="../relatorios/relMembros.php" target="_blank">
                <div class="modal-body">
                    <div action="#" class="form-modal">
                        <div class="form first">
                            <div class="details personal">
                                <div class="fields">
                                    <div class="input-field">
                                        <label>Cargo / Membros</label>
                                        <select name="cargo" class="form-select" aria-label="Default select example">
                                            <option value="">Todos</option>
                                            <?php
                                            $query = $pdo->query("SELECT * FROM cargos order by id asc");
                                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                            $total_reg = count($res);
                                            if ($total_reg > 0) {
                                                for ($i = 0; $i < $total_reg; $i++) {
                                                    foreach ($res[$i] as $key => $value) {
                                                    }

                                                    $nome_reg = $res[$i]['nome'];
                                                    $id_reg = $res[$i]['id'];
                                                    ?>
                                            <option value="<?php echo $id_reg ?>">
                                                <?php echo $nome_reg ?>
                                            </option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>Status</label>
                                        <select name="status" class="form-select" aria-label="Default select example">
                                            <option value="">Todos</option>
                                            <option value="Sim">Ativo</option>
                                            <option value="Não">Inativo</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="igreja" value="<?php echo $id_igreja ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="msg-config"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-config" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Gerar Relatório
                            <i class="bi bi-arrow-right icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="modal fade" id="modalRelPatrimonios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Relatório de Patrimônios</h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form method="post" action="../relatorios/relPatrimonio.php" target="_blank">
                <div class="modal-body">
                    <div action="#" class="form-modal">
                        <div class="form first">
                            <div class="details personal">
                                <div class="fields">
                                    <div class="input-field">
                                        <label>Itens</label>
                                        <select name="itens" class="form-select" aria-label="Default select example">
                                            <option value="">Todos</option>
                                            <option value="1">Pertencentes a Igreja</option>
                                            <option value="2">Emprestados a Outros</option>
                                            <option value="3">Itens de Outras Igrejas</option>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>Status</label>
                                        <select name="status" class="form-select" aria-label="Default select example">
                                            <option value="">Todos</option>
                                            <option value="Sim">Ativo</option>
                                            <option value="Não">Inativo</option>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>Compra / Doação</label>
                                        <select name="entrada" class="form-select" aria-label="Default select example">
                                            <option value="">Todos</option>
                                            <option value="Compra">Compra</option>
                                            <option value="Doação">Doação</option>
                                        </select>
                                    </div>
                                </div>


                                <input type="hidden" name="igreja" value="<?php echo $id_igreja ?>">
                            </div>

                            <div class="widget_bottom_dates">
                                <div class="input-field-in">
                                    <label>Data Inicial (
                                        <a href="#" onclick="datas('1980-01-01', 'tudo-pat', 'pat')">
                                            <span class="txt_date_all" id="tudo-pat">Tudo</span>
                                        </a>
                                        <a href="#" onclick="datas('<?php echo $data_atual ?>', 'hoje-pat', 'pat')">
                                            <span class="txt_date_all" id="hoje-pat">Hoje</span>
                                        </a>
                                        <a href="#" onclick="datas('<?php echo $data_mes ?>', 'mes-pat', 'pat')">
                                            <span class="txt_date_all" id="mes-pat">Mês</span>
                                        </a>
                                        <a href="#" onclick="datas('<?php echo $data_ano ?>', 'ano-pat', 'pat')">
                                            <span class="txt_date_all" id="ano-pat">Ano</span>
                                        </a>)
                                    </label>
                                    <input type="date" name="dataInicial" id="dtInicial-pat" value="1980-01-01">
                                </div>

                                <div class="input-field-in">
                                    <label>Data Final</label>
                                    <input type="date" id="dtFinal-pat" name="dataFinal"
                                        value="<?php echo $data_atual ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="msg-config"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-config" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Gerar Relatório
                            <i class="bi bi-arrow-right icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






<div class="modal fade" id="modalRelFinanceiro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Relatório Financeiro</h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form method="post" action="../relatorios/relFinanceiro.php" target="_blank">
                <div class="modal-body">
                    <div action="#" class="form-modal">
                        <div class="form first">
                            <div class="details personal">
                                <div class="fields">
                                    <div class="input-field">
                                        <label>Movimento</label>
                                        <select name="movimento" class="form-select" aria-label="Default select example"
                                            id="movim">
                                            <option value="">Todos</option>
                                            <option value="Conta">Contas à Pagar</option>
                                            <option value="Dízimo">Dízimos</option>
                                            <option value="Oferta">Ofertas</option>
                                            <option value="Doação">Doações</option>
                                            <option value="Venda">Vendas</option>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>Entradas / Saídas</label>
                                        <select name="tipo" class="form-select" aria-label="Default select example"
                                            id="tip">
                                            <option value="">Todas</option>
                                            <option value="Entrada">Entradas</option>
                                            <option value="Saída">Saídas</option>
                                        </select>
                                    </div>
                                </div>


                                <input type="hidden" name="igreja" value="<?php echo $id_igreja ?>">
                            </div>

                            <div class="widget_bottom_dates">
                                <div class="input-field-in">
                                    <label>Data Inicial (
                                        <a href="#" onclick="datas('1980-01-01', 'tudo-fin', 'fin')">
                                            <span class="txt_date_all" id="tudo-fin">Tudo</span>
                                        </a>
                                        <a href="#" onclick="datas('<?php echo $data_atual ?>', 'hoje-fin', 'fin')">
                                            <span class="txt_date_all" id="hoje-fin">Hoje</span>
                                        </a>
                                        <a href="#" onclick="datas('<?php echo $data_mes ?>', 'mes-fin', 'fin')">
                                            <span class="txt_date_all" id="mes-fin">Mês</span>
                                        </a>
                                        <a href="#" onclick="datas('<?php echo $data_ano ?>', 'ano-fin', 'fin')">
                                            <span class="txt_date_all" id="ano-fin">Ano</span>
                                        </a>)
                                    </label>
                                    <input type="date" name="dataInicial" id="dtInicial-fin" value="1980-01-01">
                                </div>

                                <div class="input-field-in">
                                    <label>Data Final</label>
                                    <input type="date" id="dtFinal-fin" name="dataFinal"
                                        value="<?php echo $data_atual ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="msg-config"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-config" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Gerar Relatório
                            <i class="bi bi-arrow-right icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






<script src="../js/mascaras.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>







<script type="text/javascript">
    $("#form-usu").submit(function () {

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "editar-dados.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#msg-usu').text('');
                $('#msg-usu').removeClass()
                if (mensagem.trim() == "Salvo com Sucesso") {

                    $('#btn-fechar-usu').click();
                    window.location = "index.php";

                } else {

                    $('#msg-usu').addClass('message_error')
                    $('#msg-usu').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });
</script>






<script type="text/javascript">
    $("#form-config").submit(function () {

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "editar-config.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#msg-config').text('');
                $('#msg-config').removeClass()
                if (mensagem.trim() == "Salvo com Sucesso") {

                    $('#btn-fechar-config').click();
                    window.location = "index.php";

                } else {

                    $('#msg-config').addClass('message_error')
                    $('#msg-config').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });
</script>






<script type="text/javascript">
    function datas(data, id, campo) {
        var data_atual = "<?= $data_atual ?>";
        $('#dtInicial-' + campo).val(data);
        $('#dtFinal-' + campo).val(data_atual);
        document.getElementById('tudo-' + campo).style.color = "#999";
        document.getElementById('tudo-' + campo).style.backgroundColor = "#ececec";
        document.getElementById('hoje-' + campo).style.color = "#999";
        document.getElementById('hoje-' + campo).style.backgroundColor = "#ececec";
        document.getElementById('mes-' + campo).style.color = "#999";
        document.getElementById('mes-' + campo).style.backgroundColor = "#ececec";
        document.getElementById('ano-' + campo).style.color = "#999";
        document.getElementById('ano-' + campo).style.backgroundColor = "#ececec";
        document.getElementById(id).style.color = "#198754";
        document.getElementById(id).style.backgroundColor = "#007f5f12";
    }
</script>


<script type="text/javascript">
    $(function () {
        $("#movim").change(function () {
            if ($("#movim").val() != "") {
                document.getElementById("tip").options.selectedIndex = 0;
                $("#tip").val($("#tip").val()).change();
                document.getElementById('tip').disabled = true;
            } else {
                document.getElementById('tip').disabled = false;
            }
        })
    })
</script>