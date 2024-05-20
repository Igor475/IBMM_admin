<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php

@session_start();
$nivel_usu = @$_SESSION['nivel_usuario'];

if ($nivel_usu == 'tesoureiro') {
    $esc_tesoureiro = 'd-none';
    $esc_pastor = '';
} else {
    $esc_tesoureiro = '';
    $esc_pastor = 'd-none';

    if (@$_GET['mostrar'] == 'sim') {
        $esc_pastor = '';
        $icone_plus = 'bi bi-chevron-up';
        $mostrar = 'nao';
    } else {
        $esc_pastor = 'd-none';
        $icone_plus = 'bi bi-chevron-down';
        $mostrar = 'sim';
    }
}


$totalDizimos = 0;
$membrosCadastrados = 0;
$gruposCadastrados = 0;
$celulasCadastradas = 0;
$totalOfertas = 0;
$totalGastos = 0;
$totalVendas = 0;
$totalDoacoes = 0;
$saldoMes = 0;

$pagarVencidas = 0;
$pagarHoje = 0;
$receberHoje = 0;

$query = $pdo->query("SELECT *FROM membros WHERE igreja = '$id_igreja' and ativo = 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$membrosCadastrados = @count($res);

$query = $pdo->query("SELECT *FROM pagar WHERE igreja = '$id_igreja' and
    vencimento = curDate() and pago != 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$pagarHoje = @count($res);

$query = $pdo->query("SELECT *FROM receber WHERE igreja = '$id_igreja' and vencimento = curDate()
    and pago != 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$receberHoje = @count($res);

$query = $pdo->query("SELECT *FROM pagar WHERE igreja = '$id_igreja' and vencimento < curDate() 
    and pago != 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$pagarVencidas = @count($res);

$mes_atual = Date('m');
$ano_atual = Date('Y');
$dataInicioMes = $ano_atual . "-" . $mes_atual . "-01";

$query = $pdo->query("SELECT * FROM movimentacoes where igreja = '$id_igreja' and data >= '$dataInicioMes'
    and data <= curDate()");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
    for ($i = 0; $i < $total_reg; $i++) {
        foreach ($res[$i] as $key => $value) {
        }
        $tipo = $res[$i]['tipo'];
        $movimento = $res[$i]['movimento'];

        if ($tipo == 'Saída') {
            $totalGastos += $res[$i]['valor'];
        }

        if ($movimento == 'Dízimo') {
            $totalDizimos += $res[$i]['valor'];
        }

        if ($movimento == 'Oferta') {
            $totalOfertas += $res[$i]['valor'];
        }

        if ($movimento == 'Venda') {
            $totalVendas += $res[$i]['valor'];
        }

        if ($movimento == 'Doação') {
            $totalDoacoes += $res[$i]['valor'];
        }

    }
}

$saldoMes = $totalDizimos + $totalOfertas + $totalVendas + $totalDoacoes - $totalGastos;
if ($saldoMes < 0) {
    $classeSaldo = 'money-church-danger';
} else {
    $classeSaldo = 'money-church';
}

$totalGastos = number_format($totalGastos, 2, ',', '.');
$totalDizimos = number_format($totalDizimos, 2, ',', '.');
$totalOfertas = number_format($totalOfertas, 2, ',', '.');
$totalVendas = number_format($totalVendas, 2, ',', '.');
$totalDoacoes = number_format($totalDoacoes, 2, ',', '.');
$saldoMes = number_format($saldoMes, 2, ',', '.');


if(@$home == 'ocultar') {
    echo "<script>$(function() { 
                     alertaTempo('Você não tem permissão para estar nesta página! Verifique com o seu Pastor.');
                });
          </script>"; 
    /* echo "<script>window.location='index.php'</script>"; */
    exit();
}

?>

<div class="header_church">
    <h1 class="title">
        <?php echo $nome_igreja ?>
    </h1>
    <div class="area-money">
        Saldo do Mês: <span class="<?php echo $classeSaldo ?>">R$
            <?php echo $saldoMes ?>
        </span>
    </div>
</div>
<div class="info-data">
    <a href="index.php?pag=igrejas" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/donations-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <small>R$</small>
                    <?php echo @$totalDizimos ?>
                </span>
                <p>Dízimos do Mês</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=pastores" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/donation-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <small>R$</small>
                    <?php echo @$totalOfertas ?>
                </span>
                <p>Ofertas do Mês</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=celulas" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/loss-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number text_alert">
                    <small>R$</small>
                    <?php echo @$totalGastos ?>
                </span>
                <p>Gastos do Mês</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=igrejas" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/profits-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <small>R$</small>
                    <?php echo @$totalVendas ?>
                </span>
                <p>Vendas do Mês</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=pastores" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/donate-donation-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <small>R$</small>
                    <?php echo @$totalDoacoes ?>
                </span>
                <p>Doações do Mês</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=membros" class="card <?php echo $esc_tesoureiro ?>">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/membro.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo @$membrosCadastrados ?>
                </span>
                <p>Total de Membros</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=membros" class="card <?php echo $esc_tesoureiro ?>">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/group-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo @$gruposCadastrados ?>
                </span>
                <p>Total de Grupos</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=membros" class="card <?php echo $esc_tesoureiro ?>">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/cells-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo @$celulasCadastradas ?>
                </span>
                <p>Total de Células</p>
            </div>
        </div>
    </a>



    <a href="index.php?pag=membros" class="card <?php echo $esc_pastor ?>">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/invoice-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo @$pagarHoje ?>
                </span>
                <p>Contas para Pagar Hoje</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=membros" class="card <?php echo $esc_pastor ?>">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/conta-para-receber.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo @$receberHoje ?>
                </span>
                <p>Contas à Receber Hoje</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=membros" class="card <?php echo $esc_pastor ?>">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/notification-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number text_alert">
                    <?php echo @$pagarVencidas ?>
                </span>
                <p>Contas para Pagar Vencidas</p>
            </div>
        </div>
    </a>
</div>
<div class="area_read_more <?php echo $esc_tesoureiro ?>">
    <a href="index.php?mostrar=<?php echo $mostrar ?>" class="read_more">
        <i class="bi <?php echo $icone_plus?> icon_load_more"></i>
    </a>
</div>


<?php
$query_tar = $pdo->query("SELECT * FROM tarefas WHERE status = 'Agendada' and igreja = '$id_igreja'
    order by status asc, data asc, hora asc LIMIT $quantidade_tarefas");
$res_tar = $query_tar->fetchAll(PDO::FETCH_ASSOC);
$total_reg_tar = count($res_tar);

?>
<h1 class="churchs">AGENDA / TAREFAS (
    <?php echo $total_reg_tar ?> Tarefas Pendentes)
</h1>
<div class="widget-church">
    <?php
    $query = $pdo->query("SELECT * FROM tarefas WHERE status = 'Agendada' and igreja = '$id_igreja'
        order by status asc, data asc, hora asc LIMIT $quantidade_tarefas");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);
    if ($total_reg > 0) {
        for ($i = 0; $i < $total_reg; $i++) {
            foreach ($res[$i] as $key => $value) {
            }

            $titulo = $res[$i]['titulo'];
            $data = $res[$i]['data'];
            $hora = $res[$i]['hora'];
            $descricao = $res[$i]['descricao'];
            $status = $res[$i]['status'];
            $id = $res[$i]['id'];

            $dataF = implode('/', array_reverse(explode('-', $data)));

            if ($data < $data_atual || $hora < $hora_atual) {
                $classe_border = 'border_task_schedule';
                $classe_text = 'text_later_task';
                $classe_date = 'date_later_task';
                $classe_hour = 'hour_later_task';
            } else {
                $classe_border = 'border_task';
                $classe_text = 'text_task';
                $classe_date = 'date_task';
                $classe_hour = 'hour_task';
            }

            ?>
            <a href="index.php?pag=tarefas" class="card-church <?php echo $classe_border ?>">
                <div class="head-church">
                    <div class="info-church">
                        <p class="<?php echo $classe_date ?>">
                            <?php echo $dataF ?>
                        </p>
                        <span class="<?php echo $classe_text ?>">
                            <?php echo $titulo ?>
                        </span>
                        <p class="information-task">
                            <?php echo $descricao ?>
                        </p>
                    </div>

                    <div class="more-info">
                        <div class="calendar-church">
                            <img class="icon-tasks" src="../img/svg/tasks-list-svgrepo-com.svg" alt="">
                        </div>

                        <p class="calendar_hour <?php echo $classe_hour ?>">
                            <?php echo $hora ?>
                        </p>
                    </div>
                </div>
            </a>
        <?php }
    } else {
        echo 'Não existem tarefas Pendentes!!';
    } ?>
</div>