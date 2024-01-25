<?php
$totalDizimos = 0;
$membrosCadastrados = 0;
$totalOfertas = 0;
$totalGastos = 0;

$query = $pdo->query("SELECT *FROM membros WHERE  igreja = '$id_igreja' and ativo = 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$membrosCadastrados = @count($res);

?>

<h1 class="title">
    <?php echo $nome_igreja ?>
</h1>
<div class="info-data">
    <a href="index.php?pag=membros" class="card">
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
    <a href="index.php?pag=igrejas" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/donations-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <small>R$</small><?php echo @$totalDizimos ?>
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
                    <small>R$</small> <?php echo @$totalOfertas ?>
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
                    <small>R$</small> <?php echo @$totalGastos ?>
                </span>
                <p>Gastos do Mês</p>
            </div>
        </div>
    </a>
</div>


<?php
$query_tar = $pdo->query("SELECT * FROM tarefas WHERE status = 'Agendada' and igreja = '$id_igreja'
order by status asc, data asc, hora asc LIMIT $quantidade_tarefas");
$res_tar = $query_tar->fetchAll(PDO::FETCH_ASSOC);
$total_reg_tar = count($res_tar);

?>
<h1 class="churchs">AGENDA / TAREFAS (<?php echo $total_reg_tar ?> Tarefas Pendentes)</h1>
<div class="widget-church">
    <?php
    $query = $pdo->query("SELECT * FROM tarefas WHERE status = 'Agendada' and igreja = '$id_igreja'
        order by status asc, data asc, hora asc LIMIT $quantidade_tarefas");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);
    if($total_reg > 0) {
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

        if($data < $data_atual || $hora < $hora_atual) {
            $classe_border = 'border_task_schedule';
            $classe_text = 'text_later_task';
            $classe_date = 'date_later_task';
        } else {
            $classe_border = 'border_task';
            $classe_text = 'text_task';
            $classe_date = 'date_task';
        }

        ?>
        <a href="index.php?pag=tarefas" class="card-church <?php echo $classe_border ?>">
            <div class="head-church">
                <div class="info-church">
                    <p class="<?php echo $classe_date ?>"><?php echo $dataF ?></p>
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

                    <p class="calendar_hour">
                        <?php echo $hora ?>
                    </p>
                </div>
            </div>
        </a>
    <?php } } else {
        echo 'Não existem tarefas Pendetes!!';
    }?>
</div>