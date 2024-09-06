<?php
require_once ("../conexao.php");


$igreja = $_GET['igreja'];
$tipo = $_GET['tipo'];
$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];
$movimento = $_GET['movimento'];

if ($movimento == 'Conta') {
    $movimento = 'Conta à Pagar';
}

$dataInicialF = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFinalF = implode('/', array_reverse(explode('-', $dataFinal)));

if ($dataInicial == $dataFinal) {
    $texto_apuracao = 'APURADO EM ' . $dataInicialF;
} else if ($dataInicial == '1980-01-01') {
    $texto_apuracao = 'APURADO EM TODO O PERÍODO';
} else {
    $texto_apuracao = 'APURADO DE ' . $dataInicialF . ' ATÉ ' . $dataFinalF;
}

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


if ($tipo == 'Entrada') {
    $tipo_rel = ' de Entradas';
} else if ($tipo == 'Saída') {
    $tipo_rel = ' de Saídas';
} else {
    $tipo_rel = '';
}


if ($movimento == 'Conta à Pagar') {
    $movimento_rel = 'Contas à Pagar';
} else if ($movimento == 'Dízimo') {
    $movimento_rel = 'Dízimos';
} else if ($movimento == 'Oferta') {
    $movimento_rel = 'Ofertas';
} else if ($movimento == 'Doação') {
    $movimento_rel = 'Doações';
} else if ($movimento == 'Venda') {
    $movimento_rel = 'Vendas';
} else {
    $movimento_rel = '';
}


if ($movimento == '') {
    $titulo_rel = 'Relatório de Movimentações' . $tipo_rel;
} else {
    $titulo_rel = 'Relatório de ' . $movimento;
}

if ($movimento == 'Conta à Pagar' || $tipo == 'Saída') {
    $classe_total = 'txt_result_rel_out';
} else {
    $classe_total = 'txt_result_rel_entry';
}


$tipo = '%' . $tipo . '%';
$movimento = '%' . $movimento . '%';


setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));


?>


<!DOCTYPE html>
<html>

<head>
    <title>Relatório Financeiro</title>
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
            height: 30px;
            line-height: 0;
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

        /* .txt_table_rel {
            font-size: 11px;
            padding: 0 8px;
            line-height: 28px;
            color: #4c4c4c;
        } */

        .txt_result_rel_entry {
            font-size: 11px;
            letter-spacing: 0.35px;
            padding: 6px 8px;
            color: #198754;
            background-color: #e2f9e8 !important;
            border-radius: 4px;
            display: inline-block;
            float: right;
        }

        .txt_result_rel_out {
            font-size: 11px;
            letter-spacing: 0.35px;
            padding: 6px 8px;
            color: #842029;
            background-color: #f9e2e4;
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
            margin-right: 40px;
        }

        .txt_legend_itens_out {
            padding: 7px 8px;
            font-size: 10px;
            color: #842029;
            background-color: #f9e2e4;
            border-radius: 2px;
            display: inline-block;
        }

        .txt_legend_itens {
            padding: 7px 10px;
            font-size: 10px;
            color: #198754;
            background-color: #e2f9e8;
            border-radius: 2px;
            display: inline-block;
        }

        .txt_table_itens_entry {
            padding: 15px 10px;
            font-size: 11px;
            color: #198754;
            background-color: #e2f9e8 !important;
            line-height: 5px;
        }

        .txt_table_itens_out {
            padding: 15px 8px;
            font-size: 10px;
            color: #842029;
            background-color: #f9e2e4 !important;
            line-height: 5px;
        }

        .area_canvass {
            padding: 0 15px;
        }

        .txt_canvass {
            font-size: 12px;
            color: #777;
            letter-spacing: 0.40px;
        }

        .area_fin {
            width: 98%;
        }

        .legend_area_out {
            position: relative;
            top: -41px;
        }

        .table_rel {
            width: 100%;
        }

        .area_saldo_movim {
            float: right;
        }

        .area_total_xsc {
            width: 50%;
            margin-top: -20px;
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
    </style>


</head>

<body>
    <?php if ($cabecalho_rel_img != 'Sim') { ?>
        <section class="area-cab">
            <div class="cabecalho">
                <div class="coluna titulo_cab" style="width:27.5%">
                    <?php echo $titulo_rel ?>
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
            <?php echo $titulo_rel ?>
        </div>
        <div class="data_img">
            <span class="date_rel"><?php echo ucwords($data_hoje) ?></span>
        </div>
        <img class="imagem" src="<?php echo $url_sistema ?>img/igrejas/<?php echo $cabecalho_rel ?>">
    <?php } ?>

    <br>
    <div class="cabecalho" style="border-bottom: solid 1px #ececec; margin-bottom: 30px">
    </div>

    <div class="area_canvass">
        <span class="txt_canvass"><?php echo $texto_apuracao ?></span>
    </div>

    <div class="area_fin">
        <div class="legend_area" align="right">
            <div class="txt_legend_itens">Entradas</div>
        </div>

        <div class="legend_area_out" align="right">
            <div class="txt_legend_itens_out">Saídas</div>
        </div>
    </div>

    <?php
    $query = $pdo->query("SELECT * FROM movimentacoes where igreja = '$igreja' and tipo LIKE '$tipo' and movimento LIKE '$movimento'
        and data >= '$dataInicial' and data <= '$dataFinal' order by data asc, id asc");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);
    if ($total_reg > 0) {
        ?>


        <div class="table_rel_container">
            <section class="area-tab" style="background-color: #f5f5f5;">
                <div class="linha-cab head_table_rel">
                    <div class="coluna" style="width:15%">MOVIMENTO</div>
                    <div class="coluna" style="width:45%">DESCRIÇÃO</div>
                    <div class="coluna" style="width:10%">VALOR</div>
                    <div class="coluna" style="width:10%">DATA</div>
                    <div class="coluna" style="width:20%">USUÁRIO</div>
                </div>
            </section>
        </div>

        <?php
        $total = 0;
        $entradas = 0;
        $saidas = 0;
        $saldo = 0;
        for ($i = 0; $i < $total_reg; $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $usuario = $res[$i]['usuario'];
            $tipo = $res[$i]['tipo'];

            $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
            $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
            if (count($res_con) > 0) {
                $nome_usuario = $res_con[0]['nome'];
            } else {
                $nome_usuario = '';
            }

            if ($tipo == 'Entrada') {
                $classe_item = 'txt_table_itens_entry';
                $entradas += $res[$i]['valor'];
            } else {
                $classe_item = 'txt_table_itens_out';
                $saidas += $res[$i]['valor'];
            }

            $total += $res[$i]['valor'];
            $saldo = $entradas - $saidas;

            if ($saldo >= 0) {
                $classe_saldo = 'txt_result_rel_entry';
            } else {
                $classe_saldo = 'txt_result_rel_out';
            }

            ?>

            <div class="container_txt_rel">
                <section class="area-tab">
                    <div class="linha-cab <?php echo $classe_item ?>">
                        <div class="coluna" style="width:15%">
                            <?php echo $res[$i]['movimento'] ?>
                        </div>

                        <div class="coluna" style="width:45%"><?php echo $res[$i]['descricao'] ?></div>

                        <div class="coluna <?php echo $classe_valor ?>" style="width:10%">R$
                            <?php echo number_format($res[$i]['valor'], 2, ',', '.'); ?>
                        </div>

                        <div class="coluna" style="width:10%">
                            <?php echo implode('/', array_reverse(explode('-', $res[$i]['data']))) ?>
                        </div>

                        <div class="coluna" style="width:20%"><?php echo $nome_usuario ?></div>


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


    <?php if ($movimento != "%%") { ?>

        <div class="col-md-12 p-2">
            <div class="area_total_rel" align="right">
                <span class="<?php echo $classe_total ?>" style="font-weight: bold">TOTAL: R$
                    <?php echo number_format($total, 2, ',', '.'); ?></span>
            </div>
        </div>
        </div>

    <?php } else { ?>

        <div class="area_saldo_movim">
            <div class="col-md-12 p-2">
                <div class="area_total_rel" align="right">
                    <span class="txt_result_rel_entry" style="font-weight: bold">ENTRADAS
                        R$<?php echo number_format(@$entradas, 2, ',', '.'); ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-12 p-2">
            <div class="area_total_rel" align="right">
                <span class="txt_result_rel_out" style="font-weight: bold">SAÍDAS
                    R$<?php echo number_format(@$saidas, 2, ',', '.'); ?>
                </span>
            </div>
        </div>
        </div>
        <div class="col-md-12 p-2">
            <div class="area_total_xsc" align="right">
                <span class="<?php echo $classe_saldo ?>" style="font-weight: bold">SALDO:
                    R$ <?php echo number_format(@$saldo, 2, ',', '.'); ?>
                </span>
            </div>
        </div>
        </div>
        </div>

    <?php } ?>




    <div class="footer" align="center">
        <span class="txt_rodape_rel"><?php echo $end_igreja ?> - Telefone: <?php echo $tel_igreja ?> - Pastor
            Responsável: <?php echo $nome_pastor ?>
        </span>
    </div>



</body>

</html>