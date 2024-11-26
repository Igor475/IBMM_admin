<?php
require_once("../conexao.php");

$igreja_rec = $_GET['igreja'];
$id = $_GET['id'];
$obs = $_GET['obs'];

$query = $pdo->query("SELECT * FROM membros where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$igreja = $res[0]['igreja'];
$nome_membro = $res[0]['nome'];
$cargo = $res[0]['cargo'];
$data_cad = $res[0]['data_cad'];
$data_batismo = $res[0]['data_batismo'];
$estado = $res[0]['estado_civil'];

$data_cadF = implode('/', array_reverse(explode('-', $data_cad)));
$data_batF = implode('/', array_reverse(explode('-', $data_batismo)));

$query = $pdo->query("SELECT * FROM cargos where id = '$cargo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$cargo_membro = $res[0]['nome'];


$query = $pdo->query("SELECT * FROM igrejas where id = '$igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_igreja = $res[0]['nome'];
$tel_igreja = $res[0]['telefone'];
$end_igreja = $res[0]['endereco'];
$imagem_igreja = $res[0]['imagem'];
$pastor_igreja = $res[0]['pastor'];
$logo_rel = $res[0]['logo_rel'];
$cab_rel = $res[0]['cab_rel'];



if ($logo_rel != 'sem-foto.jpg') {
    $imagem_igreja = $logo_rel;

} else {
    $imagem_igreja = 'logo-rel.jpg';
}

if ($cab_rel != 'sem-foto.jpg') {
    $cabecalho_rel = $cab_rel;

} else {
    $cabecalho_rel = 'cabecalho-rel.jpg';
}


$query = $pdo->query("SELECT * FROM pastores where id = '$pastor_igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_pastor = $res[0]['nome'];



setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));

?>


<!DOCTYPE html>
<html>

<head>
    <title>Carta de Recomendação</title>
    <link rel="shortcut icon" href="../img/logo-IBMM-preta.ico" />


    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

    * {
        margin: 0px;
    }

    <?php if ($cabecalho_rel_img !='Sim') {
        ?>@page {
            margin: 20px 0 0 0;
        }

        .cabecalho {
            padding: 10px;
            margin-bottom: 5px;
            width: 100%;
            font-family: "Inter", sans-serif;
        }

        <?php
    }

    else {
        ?>@page {
            margin: 0;
            padding: 0;
        }

        .cabecalho {
            padding: 0;
            margin-bottom: 0;
        }

        <?php
    }

    ?>body {
        margin-top: 0px;
        font-family: "Inter", sans-serif;
    }


    <?php if ($relatorio_pdf=='Sim') {
        ?>.footer {
            margin-top: 20px;
            width: 100%;
            background-color: #ebebeb;
            padding: 7px;
            position: absolute;
            bottom: 0;
            line-height: 17px;
            color: #707070;
        }

        <?php
    }

    else {
        ?>.footer {
            margin-top: 20px;
            width: 100%;
            background-color: #ececec;
            padding: 5px;
            color: #6e6d6d;
        }

        <?php
    }

    ?>.coluna_name_church {
        font-size: 14px;
        color: #151515;
        letter-spacing: 0.35px;
    }

    .church_area_cab {
        display: block;

    }

    .titulo_cab {
        color: #151515;
        font-size: 17px;
    }

    .titulo {
        margin: 0;
        font-size: 28px;
        font-family: "Inter", sans-serif;
        color: #444;

    }

    .subtitulo {
        margin: 0;
        font-size: 12px;
        font-family: "Inter", sans-serif;
        color: #6e6d6d;
    }

    .area-cab {
        display: block;
        width: 100%;
        height: 10px;
    }

    .date_rel {
        color: #777;
        font-size: 12px;
        letter-spacing: 0.35px;
    }

    .end_rel {
        color: #777;
        font-size: 12px;
    }

    .coluna {
        margin: 0px;
        float: left;
        height: 5px;
    }

    .table_rel_container {
        padding: 0 15px;
    }

    .container_txt_rel {
        padding: 0 15px;
    }

    .area-tab {
        display: block;
        width: 100%;
        height: 30px;
        border: 1px solid #ececec;
    }

    .area-tab-2 {
        display: block;
        width: 100%;
        height: 35px;
        line-height: 0;
        border-bottom: 1px solid #ececec;
        border-right: 1px solid #ececec;
        border-left: 1px solid #ececec;
    }

    .txt_rodape_rel {
        font-size: 10px;
    }

    .head_table_rel {
        font-size: 11px;
        font-weight: bold;
        padding: 20px 8px;
        line-height: 0;
        letter-spacing: 0.35px;
        color: #3a3a3a;
    }

    .txt_table_rel {
        font-size: 11px;
        padding: 0 8px;
        line-height: 28px;
        color: #4c4c4c;
    }

    .txt_result_rel {
        font-size: 11px;
        letter-spacing: 0.35px;
        color: #3f3f40;
        padding: 6px 8px;
        background-color: #f5f5f5;
        border-radius: 4px;
        display: inline-block;
        float: right;
    }

    .area_total_rel {
        padding: 20px 15px;
    }

    .txt_record {
        font-size: 13px;
        text-align: center;
        color: #999;
        padding: 10px
    }

    .img_rel {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 18%;
        right: 0;
        margin: 0 auto;
        width: 70px;
        height: 70px;
    }

    .line_img_table {
        margin-top: 3px;
    }

    .img_profile_rel {
        border-radius: 50%;
    }

    .imagem {
        width: 100%;
    }

    .titulo_img {
        position: absolute;
        margin-top: 10px;
        margin-left: 10px;
    }

    .data_img {
        position: absolute;
        margin-top: 35px;
        margin-left: 10px;
    }

    .text_letter {
        padding: 0 20px;
        font-size: 14px;
        color: #999;
    }

    .txt_details_letter {
        padding: 0 20px;
        font-size: 13px;
        color: #333;
    }
    </style>


</head>

<body>
    <?php if ($cabecalho_rel_img != 'Sim') { ?>
    <section class="area-cab">
        <div class="cabecalho">
            <div class="coluna titulo_cab" style="width:27.5%">
                Carta de Recomendação
            </div>
            <div align="right" class="coluna" style="width:70%">
                <img class="img_rel" src="<?php echo $url_sistema ?>img/igrejas/<?php echo $imagem_igreja ?>">
                <span class="coluna_name_church"><?php echo $nome_igreja ?></span>
            </div>
        </div>
    </section>

    <br>

    <section class="area-cab">
        <div class="cabecalho">
            <div class="coluna" style="width:60%">
                <span class="date_rel">
                    <?php echo ucwords($data_hoje) ?>
                </span>
            </div>
            <div align="right" class="coluna" style="width:37%">
                <span class="end_rel"><?php echo $end_igreja ?></span>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <div class="titulo_cab titulo_img">
        Carta de Recomendação
    </div>
    <div class="data_img">
        <span class="date_rel"><?php echo ucwords($data_hoje) ?></span>
    </div>
    <img class="imagem" src="<?php echo $url_sistema ?>img/igrejas/<?php echo $cabecalho_rel ?>">
    <?php } ?>

    <br>
    <div class="cabecalho" style="border-bottom: solid 1px #ececec; margin-bottom: 30px">
    </div>


    <div align="center">
        <?php echo mb_strtoupper($nome_membro) ?>
    </div>

    <div style="margin-top: 20px" class="text_letter">
        <p>A paz do Senhor irmãos, Apresentamos a <?php echo $nome_igreja ?> localizada em:
            <?php echo $end_igreja ?>!
        </p>
    </div>

    <div style="margin-top: 20px" class="txt_details_letter">
        <b>Função:</b> <?php echo $cargo_membro ?><br>
        <b>Membro desde:</b> <?php echo $data_cadF ?><br>
        <?php if ($data_batismo != "" and $data_batismo != "0000-00-00") { ?>
        <b>Batizado em:</b> <?php echo $data_batF ?><br>
        <?php } ?>
        <b>Estado Civil:</b> <?php echo $estado ?>
    </div>

    <div style="margin-top: 20px" class="text_letter">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Nam at maiores tenetur natus praesentium velit corrupti repudiandae quia.
            Dignissimos laborum nulla quisquam alias autem dolorem nam modi magni
            tempora adipisci!</p>
    </div>

    <div align="center" style="margin-top: 15px" class="text_letter">
        <p><b>CONGREGAÇÃO: <?php echo mb_strtoupper($igreja_rec) ?></p></b>
    </div>

    <div align="center" style="margin-top: 20px" class="text_letter">
        Pela <b><?php echo $nome_igreja ?></b>, na data de <?php echo date('d/m/Y'); ?>
    </div>

    <div style="margin-top: 20px" class="text_letter">
        <b>OBSERVAÇÕES:</b><br>
        <?php echo $obs ?>
    </div>

    <br>
    <div align="center" style="margin-top: 20px" class="text_letter">
        __________________________________________________________________________________
        <br>
        <b>PASTOR RESPONSÁVEL </b>
    </div>

    <div class="footer" align="center">
        <span class="txt_rodape_rel">
            Essa carta de recomendação é válida até 30 dias a partir da data de geração
        </span>
    </div>



</body>

</html>