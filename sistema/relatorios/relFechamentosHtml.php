<?php
require_once("../conexao.php");

$dataInicial = $_GET['dataInicial'];
$dataInicialF = implode('/', array_reverse(explode('-', $dataInicial)));

$separar = explode("-", $dataInicial);
$mes = $separar[1];
$ano = $separar[0];



$mesF = '';
if ($mes == '01') {
    $mesF = "Janeiro";
}

if ($mes == '02') {
    $mesF = "Fevereiro";
}

if ($mes == '03') {
    $mesF = "Março";
}

if ($mes == '04') {
    $mesF = "Abril";
}

if ($mes == '05') {
    $mesF = "Maio";
}

if ($mes == '06') {
    $mesF = "Junho";
}

if ($mes == '07') {
    $mesF = "Julho";
}

if ($mes == '08') {
    $mesF = "Agosto";
}

if ($mes == '09') {
    $mesF = "Setembro";
}

if ($mes == '10') {
    $mesF = "Outubro";
}

if ($mes == '11') {
    $mesF = "Novembro";
}

if ($mes == '12') {
    $mesF = "Dezembro";
}


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




setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));



?>


<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Fechamentos</title>
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

        .green_txt {
            color: #198754;
            background-color: #007f5f12;
            padding-bottom: 8px;
        }

        .red_txt {
            color: #f92536;
            background-color: #f9e2e4;
        }
    </style>


</head>

<body>
    <?php if ($cabecalho_rel_img != 'Sim') { ?>
        <section class="area-cab">
            <div class="cabecalho">
                <div class="coluna titulo_cab" style="width:27.5%">
                    Fechamentos do Mês <?php echo $mesF ?>/<?php echo $ano ?>
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
            Fechamentos do Mês <?php echo $mesF ?>/<?php echo $ano ?>
        </div>
        <div class="data_img">
            <span class="date_rel"><?php echo ucwords($data_hoje) ?></span>
        </div>
        <img class="imagem" src="<?php echo $url_sistema ?>img/igrejas/<?php echo $cabecalho_rel ?>">
    <?php } ?>

    <br>
    <div class="cabecalho" style="border-bottom: solid 1px #ececec; margin-bottom: 30px">
    </div>

    <?php
    $query = $pdo->query("SELECT * FROM fechamentos where month(data_fec) = '$mes' and year(data_fec) = '$ano' order by id asc");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);
    if ($total_reg > 0) {
        ?>



        <div class="table_rel_container">
            <section class="area-tab" style="background-color: #f5f5f5;">
                <div class="linha-cab head_table_rel">
                    <div class="coluna" style="width:10%">DATA</div>
                    <div class="coluna" style="width:30%">IGREJA</div>
                    <div class="coluna" style="width:12%">SAÍDAS</div>
                    <div class="coluna" style="width:12%">ENTRADAS</div>
                    <div class="coluna" style="width:12%">SALDO</div>
                    <div class="coluna" style="width:12%">PREBENDA</div>
                    <div class="coluna" style="width:12%">SALDO FINAL</div>
                </div>
            </section>
        </div>

        <?php
        for ($i = 0; $i < $total_reg; $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $data_fec = $res[$i]['data_fec'];
            $data = $res[$i]['data'];
            $saidas = $res[$i]['saidas'];
            $usuario = $res[$i]['usuario'];
            $entradas = $res[$i]['entradas'];
            $saldo = $res[$i]['saldo'];
            $prebenda = $res[$i]['prebenda'];
            $saldo_final = $res[$i]['saldo_final'];
            $igreja = $res[$i]['igreja'];

            $id = $res[$i]['id'];

            $dataF = implode('/', array_reverse(explode('-', $data)));
            $entradasF = number_format($entradas, 2, ',', '.');
            $saidasF = number_format($saidas, 2, ',', '.');
            $saldoF = number_format($saldo, 2, ',', '.');
            $prebendaF = number_format($prebenda, 2, ',', '.');
            $saldo_finalF = number_format($saldo_final, 2, ',', '.');

            $separar = explode("-", $data_fec);
            $mes = $separar[1];
            $ano = $separar[0];

            $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
            $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
            if (count($res_con) > 0) {
                $usuario_cad = $res_con[0]['nome'];

            } else {
                $usuario_cad = '';

            }

            $query_con = $pdo->query("SELECT * FROM igrejas where id = '$igreja'");
            $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
            if (count($res_con) > 0) {
                $nome_igreja = $res_con[0]['nome'];
            }


            if ($saldo >= 0) {
                $cor_saldo = 'green_txt';
            } else {
                $cor_saldo = 'red_txt';
            }

            if ($saldo_final >= 0) {
                $cor_saldo_final = 'green_txt';
            } else {
                $cor_saldo_final = 'red_txt';
            }

            ?>

            <div class="container_txt_rel">
                <section class="area-tab-2">
                    <div class="linha-cab txt_table_rel">
                        <div class="coluna_items" style="width:10%"><?php echo $dataF ?></div>
                        <div class="coluna_items" style="width:30%"><?php echo $nome_igreja ?><br><small>(<?php echo $usuario_cad ?>)</div>
                        <div class="coluna_items" style="width:12%">R$ <?php echo $saidasF ?></div>
                        <div class="coluna_items" style="width:12%">R$ <?php echo $entradasF ?></div>
                        <div class="coluna_items <?php echo $cor_saldo ?>" style="width:12%">R$ <?php echo $saldoF ?></div>
                        <div class="coluna_items" style="width:12%">R$ <?php echo $prebendaF ?></div>
                        <div class="coluna_items <?php echo $cor_saldo_final ?>" style="width:12%">R$ <?php echo $saldo_finalF ?></div>
                    </div>
                </section>
            </div>
            </div>
            </div>

        <?php } ?>


        </div>

    <?php } else {
        echo '<span class="txt_record">Nenhum Registro encontrado!</span>';
    } ?>



    <div class="col-md-12 p-2">
        <div class="area_total_rel" align="right">
            <span class="txt_result_rel">Total de Fechamentos: <?php echo $total_reg ?></span>
        </div>
    </div>
    </div>




    <div class="footer" align="center">
        <span class="txt_rodape_rel"><?php echo $end_igreja ?> - Telefone: <?php echo $tel_igreja ?> - Pastor
            Responsável: <?php echo $nome_pastor ?>
        </span>
    </div>



</body>

</html>