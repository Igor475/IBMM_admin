<?php
@session_start();
require_once ("verificar.php");
require_once ("../conexao.php");
$id_usuario = @$_SESSION['id_usuario'];
$nivel_usu = @$_SESSION['nivel_usuario'];

if ($nivel_usu == 'tesoureiro') {
    $esc_tesoureiro = 'd-none';
} else {
    $esc_tesoureiro = '';
}

$data_atual = date('Y-m-d');
$hora_atual = date('H:i:s');

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


// TRAZENDO DADOS DAS CONFIGURAÇÕES DAS IGREJAS
$query = $pdo->query("SELECT *FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$email_igr = $res[0]['email'];
$nome_igr = $res[0]['nome'];
$end_igr = $res[0]['endereco'];
$tel_igr = $res[0]['telefone'];


//MENU DO PAINEL 
$pag = @$_GET['pag'];
if ($pag == "") {
    $pag = 'home';
}
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
</head>

<body>
    <div class="grid-container">

        <!----------------------------------- HEADER --------------------------------------->
        <header class="header">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <i class="bx bx-menu icon_menu_side"></i>
                <span class="menu_hidden">Menu</span>
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
                    <i class='bx bxs-bell icon'></i>
                    <span class="badge">5</span>
                </a>
                <a href="" class="nav-link">
                    <i class='bx bxs-message-square-dots icon'></i>
                    <span class="badge">8</span>
                </a>

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
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">
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
                    </div>
                    <ul class="side-menu">
                        <li>
                            <a href="index.php" class="font_main_index"><i class='bi bi-house-door icon'></i>Home</a>
                        </li>
                        <li class="divider">
                            <span class="text_divider">Principal</span>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-person-circle icon'></i> Pessoas <i
                                    class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li>
                                    <a href="index.php?pag=membros">Membros</a>
                                </li>
                                <li class="<?php echo $esc_tesoureiro ?>">
                                    <a href="index.php?pag=pastores">Pastores</a>
                                </li>
                                <li class="<?php echo $esc_tesoureiro ?>">
                                    <a href="index.php?pag=tesoureiros">Tesoureiros</a>
                                </li>
                                <li class="<?php echo $esc_tesoureiro ?>">
                                    <a href="index.php?pag=secretarios">Secretários(as)</a>
                                </li class="<?php echo $esc_tesoureiro ?>">
                                <li class="<?php echo $esc_tesoureiro ?>">
                                    <a href="index.php?pag=fornecedores">Fornecedores</a>
                                </li>
                                <li class="<?php echo $esc_tesoureiro ?>">
                                    <a href="index.php?pag=usuarios">Usuários</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-pencil-square icon'></i> Cadastros <i
                                    class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li><a href="index.php?pag=tarefas">Agenda / Tarefas</a></li>
                                <li><a href="#">Ministérios</a></li>
                                <li><a href="#">Frequências (Contas)</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-currency-dollar icon'></i> Financeiro <i
                                    class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li><a href="index.php?pag=pagar">Contas à Pagar</a></li>
                                <li><a href="index.php?pag=receber">Contas à Receber</a></li>
                                <li><a href="index.php?pag=dizimos">Dízimos</a></li>
                                <li><a href="index.php?pag=ofertas">Ofertas</a></li>
                                <li><a href="index.php?pag=doacoes">Doações</a></li>
                                <li><a href="index.php?pag=vendas">Vendas</a></li>
                                <li><a href="index.php?pag=movimentacoes">Movimentações</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-folder2-open icon'></i> Secretária <i
                                    class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li><a href="index.php?pag=documentos">Documentos</a></li>
                                <li><a href="index.php?pag=patrimonios">Patrimônio</a></li>
                                <li><a href="index.php?pag=celulas">Células</a></li>
                                <li><a href="index.php?pag=grupos">Grupos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-folder-symlink icon'></i> Relatórios <i
                                    class='bx bx-chevron-right icon-right'></i></a>
                            <ul class="side-dropdown">
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalRelMembros">Membros</a>
                                </li>
                                <li>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalRelPatrimonios">Patrimônios</a>
                                </li>
                                <li><a href="#">Financeiros</a></li>
                                <li><a href="#">Auditoria e Logs</a></li>
                                <li><a href="#">Tranferência de Membros</a></li>
                                <li><a href="#">Fechamentos Mensais</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?pag=anexos" class="font_main_index"><i
                                    class='bi bi-archive icon'></i>Anexo Sede</a>
                        </li>
                        <li class="divider">
                            <span class="text_divider">Outros</span>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-bell icon'></i>Notificações</a>
                        </li>
                        <li>
                            <a href="#" class="font_main_index"><i class='bi bi-database-down icon'></i>Backup Banco</a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!----------------------------------- FIM ASIDE --------------------------------------->

        <main id="container_painel">
            <?php
            require_once ($pag . '.php');
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