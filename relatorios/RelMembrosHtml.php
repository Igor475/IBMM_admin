<?php
require_once ("../conexao.php");

$igreja = $_GET['igreja'];
$status = $_GET['status'];
$cargo = $_GET['cargo'];


$query = $pdo->query("SELECT * FROM igrejas where id = '$igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_igreja = $res[0]['nome'];
$tel_igreja = $res[0]['telefone'];
$end_igreja = $res[0]['endereco'];
$imagem_igreja = $res[0]['imagem'];
$pastor_igreja = $res[0]['pastor'];

//EXTRAIR EXTENSÃO DO ARQUIVO
$ext = pathinfo($imagem_igreja, PATHINFO_EXTENSION);
if ($ext == 'jpg') {
    $imagem_igreja = $imagem_igreja;

} else {
    $imagem_igreja = 'logo-rel.jpg';
}

$query = $pdo->query("SELECT * FROM pastores where id = '$pastor_igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_pastor = $res[0]['nome'];


if ($cargo != "") {
    $query = $pdo->query("SELECT * FROM cargos where id = '$cargo'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $nome_cargo = $res[0]['nome'];
} else {
    $nome_cargo = "";
}

if ($status == 'Sim') {
    $status_rel = 'Ativos';
} else if ($status == 'Não') {
    $status_rel = 'Inativos';
} else {
    $status_rel = '';
}


if ($nome_cargo == "" || $status == "Membro") {
    $titulo_rel = 'Relatório de Membros ' . $status_rel;
} else {
    $titulo_rel = 'Relatório de ' . $nome_cargo . ' ' . $status_rel;
}

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));


$status = '%' . $status . '%';
$cargo = '%' . $cargo . '%';

?>


<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Membros</title>
    <link rel="shortcut icon" href="../img/logo-IBMM-preta.ico" />


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

        * {
            margin: 0px;
        }

        @page {
            margin: 20px 0 0 0;
        }

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

        .cabecalho {
            padding: 10px;
            margin-bottom: 5px;
            width: 100%;
            font-family: "Inter", sans-serif;
        }

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
    </style>


</head>

<body>
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

    <br>
    <div class="cabecalho" style="border-bottom: solid 1px #ececec; margin-bottom: 30px">
    </div>



    <?php
    $query = $pdo->query("SELECT * FROM membros where igreja = '$igreja' and ativo LIKE '$status' and cargo LIKE '$cargo' order by id desc");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);
    if ($total_reg > 0) {
        ?>



        <div class="table_rel_container">
            <section class="area-tab" style="background-color: #f5f5f5;">
                <div class="linha-cab head_table_rel">
                    <div class="coluna" style="width:25%">NOME</div>
                    <div class="coluna" style="width:10%">CARGO</div>
                    <div class="coluna" style="width:23%">EMAIL</div>
                    <div class="coluna" style="width:15%">TELEFONE</div>
                    <div class="coluna" style="width:18%">DATA CADASTRO</div>
                    <div class="coluna" style="width:12%">FOTO</div>
                </div>
            </section>
        </div>

        <?php
            for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {}
                $cargo = $res[$i]['cargo'];

                $query_con = $pdo->query("SELECT * FROM cargos where id = '$cargo'");
                $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                if (count($res_con) > 0) {
                    $nome_cargo = $res_con[0]['nome'];
                } else {
                    $nome_cargo = '';
                }
        ?>

            <div class="container_txt_rel">
                <section class="area-tab-2">
                    <div class="linha-cab txt_table_rel">
                        <div class="coluna" style="width:25%"><?php echo $res[$i]['nome'] ?></div>
                        <div class="coluna" style="width:10%"><?php echo $nome_cargo ?></div>
                        <div class="coluna" style="width:23%"><?php echo $res[$i]['email'] ?></div>
                        <div class="coluna" style="width:15%"><?php echo $res[$i]['telefone'] ?></div>
                        <div class="coluna" style="width:18%">
                            <?php echo implode('/', array_reverse(explode('-', $res[$i]['data_cad']))) ?></div>
                        <div class="coluna line_img_table" style="width:12%">
                            <img class="img_profile_rel"
                                src="<?php echo $url_sistema ?>img/membros/<?php echo $res[$i]['foto'] ?>" width="30px">
                        </div>

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
            <span class="txt_result_rel">Total de Membros: <?php echo $total_reg ?></span>
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