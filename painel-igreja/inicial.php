<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'inicial';

$query = $pdo->query("SELECT *FROM usuarios WHERE id = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$name_user = $res[0]['nome'];


$query = $pdo->query("SELECT *FROM igrejas WHERE id = '$id_igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$name_igreja = $res[0]['nome'];


if(@$inicial == 'ocultar') {
    echo "<script>$(function() { 
                     alertaTempo('Você não tem permissão para estar nesta página! Verifique com o seu Pastor.');
                });
          </script>"; 
    /* echo "<script>window.location='index.php'</script>"; */
    exit();
}

$query = $pdo->query("SELECT *FROM licoes WHERE igreja = '$id_igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
if($total_reg == 1) {
    $txt_reg = 'Cadastrada';
} else {
    $txt_reg = 'Cadastradas';
}

$query = $pdo->query("SELECT *FROM celulas WHERE igreja = '$id_igreja' and lider1 = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
@$nome_celula = $res[0]['nome'];
@$lideranca = $res[0]['lider1'];
@$id_celula = $res[0]['id'];

$query = $pdo->query("SELECT *FROM celulas_membros WHERE igreja = '$id_igreja' and celula = '$id_celula'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg_membros = count($res);


echo $id_usuario. ' ' . 'id_usuario </br>';
echo $lideranca. ' ' . 'Líder da Célula </br>';
echo $id_celula. '</br>';

?>
<h2 class="txt_title_church"><?php echo $name_igreja ?></h2>
<h3 class="txt_wellcome">Bem Vindo, <?php echo $name_user ?></h3>


<div class="flex_cards_initial">
    <?php if($id_usuario == @$lideranca && $celulas != 'ocultar') { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=celulas" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/licoes.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Minha Célula</h3>
                    <span class="count_lessons"><?php echo $nome_celula ?> (<?php echo $total_reg_membros ?>)</span>
                </div>
            </a>
    <?php } else { ?>

    <?php } ?>




    <?php if($licoes == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=licoes" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/licoes.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Lições de Célula</h3>
                    <span class="count_lessons"><?php echo $txt_reg ?> (<?php echo $total_reg ?>)</span>
                </div>
            </a>
    <?php } ?>




    <?php if($eventos == 'ocultar') { ?>

    <?php } else { ?>
        <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=eventos" class="link_cards_initial">
            <div class="icon_circle">
                <img src="../img/svg/eventos.svg" class="icons_cards_initial">
            </div>

            <div class="info_cards_initial">
                <h3 class="title_initial">Eventos</h3>
                <span class="count_lessons"></span>
            </div>
        </a>
    <?php } ?>




    <?php if($tarefas == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=tarefas" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/tarefas.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Tarefas</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($cultos == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=cultos" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/culto.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Cultos</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($alertas == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=alertas" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/alertas.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Alertas</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($dadosIgreja == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=igreja" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/info-church.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Dados da Igreja</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($membros == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=membros" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/membros-users.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Membros</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($pastores == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=pastores" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/shepperds.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Pastores</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($tesoureiros == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=tesoureiros" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/membros-users.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Tesoureiros</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($secretarios == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=secretarios" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/membros-users.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Secretários</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($fornecedores == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=fonecedores" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/membros-users.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Fornecedores</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($usuarios == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=usuarios" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/membros-users.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Usuários</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($pagar == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=pagar" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/pagar.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Contas à Pagar</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($receber == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=receber" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/receber.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Contas a Receber</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($dizimos == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=dizimos" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/dizimos.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Dízimos</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($ofertas == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=ofertas" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/ofertas.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Ofertas</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($doacoes == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=doacoes" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/doacao.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Doações</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($vendas == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=vendas" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/vendas.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Vendas</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($movimentacoes == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=movimentacoes" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/movimentacoes.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Movimentações</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($documentos == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=documentos" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/documentos.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Documentos</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($patrimonio == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=patrimonio" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/patrimonios.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Patrimônio</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>
    <?php } ?>




    <?php if($grupos == 'ocultar') { ?>

    <?php } else { ?>
            <a href="http://localhost/IBMM_admin/painel-igreja/index.php?pag=grupos" class="link_cards_initial">
                <div class="icon_circle">
                    <img src="../img/svg/grupos.svg" class="icons_cards_initial">
                </div>

                <div class="info_cards_initial">
                    <h3 class="title_initial">Grupos de Ministérios</h3>
                    <span class="count_lessons"></span>
                </div>
            </a>

    <?php } ?>
</div>