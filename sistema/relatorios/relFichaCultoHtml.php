<?php
require_once("../conexao.php");

$id = $_GET['id'];


$query = $pdo->query("SELECT * FROM igrejas where matriz = 'Sim'");
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


$query = $pdo->query("SELECT * FROM informativos where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
if ($total_reg > 0) {
    $id = $res[0]['id'];
    $preletor = $res[0]['preletor'];
    $data = $res[0]['data'];
    $texto_base = $res[0]['texto_base'];
    $tema = $res[0]['tema'];
    $evento = $res[0]['evento'];
    $horario = $res[0]['horario'];

    $pastor_responsavel = $res[0]['pastor_responsavel'];
    $pastores = $res[0]['pastores'];
    $lider_louvor = $res[0]['lider_louvor'];
    $obreiros = $res[0]['obreiros'];
    $apoio = $res[0]['apoio'];
    $abertura = $res[0]['abertura'];
    $recado = $res[0]['recado'];

    $oferta = $res[0]['oferta'];
    $recepcao = $res[0]['recepcao'];
    $bercario = $res[0]['bercario'];
    $escolinha = $res[0]['escolinha'];
    $membros = $res[0]['membros'];
    $visitantes = $res[0]['visitantes'];
    $conversoes = $res[0]['conversoes'];
    $total_ofertas = $res[0]['total_ofertas'];
    $total_dizimos = $res[0]['total_dizimos'];

    if ($membros == 0) {
        $membros = '';
    }

    if ($visitantes == 0) {
        $visitantes = '';
    }

    if ($conversoes == 0) {
        $conversoes = '';
    }

    if ($total_ofertas == 0) {
        $total_ofertas = '';
    }

    if ($total_dizimos == 0) {
        $total_dizimos = '';
    }

    $obs = $res[0]['obs'];

    $dataF = implode('/', array_reverse(explode('-', $data)));

    $query_con = $pdo->query("SELECT * FROM pastores where id = '$pastor_responsavel'");
    $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
    if (count($res_con) > 0) {
        $nome_pastor_resp = $res_con[0]['nome'];
    } else {
        $nome_pastor_resp = '';
    }
} else {
    echo 'Id não reconhecido!';
    exit();
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Culto</title>
    <link rel="shortcut icon" href="<?php echo $url_sistema ?>img/logo-IBMM-preta.ico" />


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

        * {
            margin: 0px;
        }

        <?php if ($cabecalho_rel_img != 'Sim') { ?>
            @page {
                margin: 20px 0 0 0;
            }

            .cabecalho {
                padding: 10px;
                margin-bottom: 5px;
                width: 100%;
                font-family: "Inter", sans-serif;
            }

        <?php } else { ?>
            @page {
                margin: 0;
                padding: 0;
            }

            .cabecalho {
                padding: 0;
                margin-bottom: 0;
            }

        <?php } ?>

        body {
            margin-top: 0px;
            font-family: "Inter", sans-serif;
        }


        <?php if ($relatorio_pdf == 'Sim') { ?>

            .footer {
                margin-top: 20px;
                width: 100%;
                background-color: #ebebeb;
                padding: 7px;
                position: absolute;
                bottom: 0;
                line-height: 17px;
                color: #707070;
            }

        <?php } else { ?>
            .footer {
                margin-top: 20px;
                width: 100%;
                background-color: #ececec;
                padding: 5px;
                color: #6e6d6d;
            }

        <?php } ?>

        .coluna_name_church {
            font-size: 14px;
            color: #151515;
            letter-spacing: 0.35px;
        }

        .church_area_cab {
            display: block;

        }

        .titulo_cab {
            color: #151515;
            font-size: 16px;
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
            height: 3px;
        }

        .coluna_items {
            margin: 0px;
            float: left;
            line-height: 20px;
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

        .text_item_r {
            background-color: #f9e2e4 !important;
            color: #85323a !important;
        }

        .text_item_emp {
            background-color: #00537f1f !important;
            color: #196087 !important;
        }

        .text_opacity {
            color: #ccc !important;
            background-color: #e7e7e7 !important;
        }

        .legend_area {
            margin-bottom: 15px;
            padding: 0 15px;
        }

        .txt_legend_itens {
            padding: 7px 8px;
            font-size: 10px;
            color: #777;
            background-color: #eee;
            border-radius: 4px;
            display: inline-block;
        }

        .area_canvass {
            padding: 0 15px;
        }

        .txt_canvass {
            font-size: 12px;
            color: #777;
            letter-spacing: 0.40px;
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

        .celula {
            padding: 10px;
            height: 25px;
            border: 1px solid #525252;
        }

        table {
            border-collapse: collapse;
        }
    </style>


</head>

<body>
    <?php if ($cabecalho_rel_img != 'Sim') { ?>
        <section class="area-cab">
            <div class="cabecalho">
                <div class="coluna titulo_cab" style="width:27.5%">
                    Informativo de Culto
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
            Informativo de Culto
        </div>
        <img class="imagem" src="<?php echo $url_sistema ?>img/igrejas/<?php echo $cabecalho_rel ?>">
    <?php } ?>

    <br>
    <div class="cabecalho" style="border-bottom: solid 1px #ececec; margin-bottom: 30px">
    </div>

    <small>
        <table style="width:100%">
            <tr>
                <td class="celula"><b>Igreja: </b> <?php echo $nome_igreja ?></td>
                <td class="celula"><b>Pregrador:</b> <?php echo $preletor ?></td>
                <td class="celula"><b>Data:</b> <?php echo $dataF ?> </td>
            </tr>

            <tr>
                <td class="celula"><b>Texto Base: </b> <?php echo $texto_base ?></td>
                <td class="celula"><b>Evento:</b> <?php echo $evento ?> </td>
                <td class="celula"><b>Horário:</b> <?php echo $horario ?></td>
            </tr>

            <tr>
                <td colspan="3" class="celula"><b>Tema: </b> <?php echo $tema ?></td>

            </tr>

            <tr>
                <td class="celula"><b>Pastor Responsável:</b> <?php echo $nome_pastor_resp ?></td>
                <td colspan="2" class="celula"><b>Demais Pastores: </b> <?php echo $pastores ?></td>

            </tr>

            <tr>
                <td class="celula"><b>Responsável pelo Louvor:</b> <?php echo $lider_louvor ?></td>
                <td colspan="2" class="celula"><b>Obreiros: </b> <?php echo $obreiros ?></td>

            </tr>

            <tr>
                <td class="celula"><b>Abertura:</b> <?php echo $abertura ?></td>
                <td colspan="2" class="celula"><b>Apoio: </b> <?php echo $apoio ?></td>

            </tr>

            <tr>
                <td class="celula"><b>Recados:</b> <?php echo $recado ?></td>
                <td colspan="2" class="celula"><b>Recepção: </b> <?php echo $recepcao ?></td>

            </tr>

            <tr>
                <td class="celula"><b>Ofertas: </b> <?php echo $oferta ?></td>
                <td class="celula"><b>Berçário:</b> <?php echo $bercario ?> </td>
                <td class="celula"><b>Escolinha:</b> <?php echo $escolinha ?></td>
            </tr>

            <tr>
                <td colspan="3" class="celula"><b>Observações: </b> <?php echo $obs ?></td>

            </tr>

            <tr>
                <td class="celula"><b>Total Membros: </b> <?php echo $membros ?></td>
                <td class="celula"><b>Total Visitantes:</b> <?php echo $visitantes ?> </td>
                <td class="celula"><b>Total Conversões:</b> <?php echo $conversoes ?></td>
            </tr>

            <tr>
                <td class="celula"><b>Total Ofertas: </b> <?php echo $total_ofertas ?></td>
                <td colspan="2" class="celula"><b>Total Dízimos:</b> <?php echo $total_dizimos ?> </td>

            </tr>

        </table>
    </small>




    <div class="footer" align="center">
        <span class="txt_rodape_rel"><?php echo $end_igreja ?> - Telefone: <?php echo $tel_igreja ?> - Pastor
            Responsável: <?php echo $nome_pastor ?>
        </span>
    </div>



</body>

</html>