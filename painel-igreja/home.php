<?php
$membrosCadastrados = 0;
$pastoresCadastrados = 0;
$igrejasCadastradas = 0;
$celulasCadastradas = 0;

$query = $pdo->query("SELECT *FROM igrejas");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$igrejasCadastradas = @count($res);

echo $id_igreja;

?>

<h1 class="title"><?php echo $nome_igreja ?></h1>
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
                <p>Membros da Sede Cadastrados</p>
            </div>
        </div>
    </a>
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
    <a href="index.php?pag=celulas" class="card">
        <div class="head">
            <div>
                <img class="icon" src="../img/svg/cells-svgrepo-com.svg" alt="">
            </div>

            <div class="area-info">
                <span class="number">
                    <?php echo $celulasCadastradas ?>
                </span>
                <p>Células Cadastradas</p>
            </div>
        </div>
    </a>
</div>



<h1 class="churchs">Igrejas (Sede e Filial)</h1>
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

    if ($matriz == 'Sim') {
        $bordacard = 'bordacardsede';
        $classe = 'text_matriz';
    } else {
        $bordacard = 'bordacard';
        $classe = 'text_filiais';
    }

    $query_con = $pdo->query("SELECT * FROM pastores where id = '$pastor'");
    $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
    if (count($res_con) > 0) {
        $nome_p = $res_con[0]['nome'];
    } else {
        $nome_p = 'Não Definido';
    }
    ?>
    <div class="widget-church">
        <a href="#" class="card-church <?php echo $bordacard ?>">
            <div class="head-church">
                <div class="info-church">
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
                    <p class="text_member">Membros 207</p>
                </div>
            </div>
        </a>
    <?php } ?>
</div>