<?php
$membrosCadastrados = 0;
$pastoresCadastrados = 0;
$igrejasCadastradas = 0;
$celulasCadastradas = 0;

$query = $pdo->query("SELECT *FROM igrejas");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$igrejasCadastradas = @count($res);

$query = $pdo->query("SELECT * FROM pastores");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$pastoresCadastrados = @count($res);

$query_m = $pdo->query("SELECT *FROM membros WHERE igreja = 1 and ativo = 'Sim'");
$res_m = $query_m->fetchAll(PDO::FETCH_ASSOC);
$membrosSede = @count($res_m);

$query_m = $pdo->query("SELECT *FROM membros WHERE ativo = 'Sim'");
$res_m = $query_m->fetchAll(PDO::FETCH_ASSOC);
$membrosCadastrados = @count($res_m);

?>

<h1 class="title">Estatística do sistema</h1>
<div class="info-data">
    <a href="index.php?pag=igrejas" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/church-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo @$igrejasCadastradas ?>
                </span>
                <p>Igrejas Cadastradas</p>
            </div>
        </div>
    </a>
    <a href="index.php?pag=pastores" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/network-group-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo @$pastoresCadastrados ?>
                </span>
                <p>Pastores Cadastrados</p>
            </div>
        </div>
    </a>
    <a href="#" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/cells-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo @$celulasCadastradas ?>
                </span>
                <p>Células Cadastradas</p>
            </div>
        </div>
    </a>
    <a href="#" class="card">
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
</div>



<h1 class="churchs">Igrejas (Sede e Filial)</h1>
<div class="widget-church">
    <?php
    $query = $pdo->query("SELECT * FROM igrejas order by matriz desc, nome asc");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);

    for ($i = 0; $i < $total_reg; $i++) {
        foreach ($res[$i] as $key => $value) {
        }

        $nome = $res[$i]['nome'];
        $imagem = $res[$i]['imagem'];
        $matriz = $res[$i]['matriz'];
        $pastor = $res[$i]['pastor'];
        $id_ig = $res[$i]['id'];

        if ($matriz == 'Sim') {
            $bordacard = 'bordacardsede';
            $classe = 'text_matriz';
        } else {
            $bordacard = 'bordacard';
            $classe = 'text_filiais';
        }

        $query_m = $pdo->query("SELECT *FROM membros WHERE  igreja = '$id_ig' and ativo = 'Sim'");
        $res_m = $query_m->fetchAll(PDO::FETCH_ASSOC);
        $membrosCad = @count($res_m);

        $query_con = $pdo->query("SELECT * FROM pastores where id = '$pastor'");
        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
        if (count($res_con) > 0) {
            $nome_p = $res_con[0]['nome'];
        } else {
            $nome_p = 'Não Definido';
        }

        ?>
        <a href="../painel-igreja/index.php?igreja=<?php echo $id_ig ?>" class="card-church <?php echo $bordacard ?>">
            <div class="head_church_painel_admin">
                <div class="info_church_painel_admin">
                    <p class="name-brazil <?php echo $classe ?>">
                        <?php echo $nome ?>
                    </p>
                    <span class="name-sheperd">
                        <?php echo $nome_p ?>
                    </span>
                </div>

                <div class="more-info">
                    <div class="image-church">
                        <img class="img_card" src="../img/igrejas/<?php echo $imagem ?>" alt="">
                    </div>
                    <p class="text_member">Membros
                        <?php echo @$membrosCad ?>
                    </p>
                </div>
            </div>
        </a>
    <?php } ?>
</div>