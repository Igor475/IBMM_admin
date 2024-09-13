<?php

require_once("cabecalho.php");

if (@$_GET['pagina'] != null) {
    $pag = $_GET['pagina'];
} else {
    $pag = 0;
}

$limite = $pag * $itens_por_pagina;
$pagina = $pag;
$nome_pag = 'eventos.php';

?>
<section class="container_widget">
    <div class="content_widget container">
        <div class="area_title_c">
            <div class="area_content_widget">
                <h3 class="title_cx">Eventos</h3>
            </div>
        </div>
    </div>
</section>

<section class="in_widget container">
    <div class="show_txt">
        <h1 class="title">Próximos Eventos</h1>
    </div>

    <div class="flex_eventos">
        <?php
        $query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and ativo = 'Sim'
                and tipo = 'Evento' or tipo = 'Evento com Inscrição' order by data_evento desc, id desc LIMIT $limite, $itens_por_pagina");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);

        if ($total_reg > 0) {
            for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                $titulo = $res[$i]['titulo'];
                $subtitulo = $res[$i]['subtitulo'];
                $descricao1 = $res[$i]['descricao1'];
                $data_evento = $res[$i]['data_evento'];
                $id = $res[$i]['id'];
                $banner = $res[$i]['banner'];
                $imagem = $res[$i]['imagem'];
                $url = $res[$i]['url'];
                $video = $res[$i]['video'];
                $pregador = $res[$i]['pregador'];


                //TOTALIZANDO AS PÁGINAS
                $query_cont = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and ativo = 'Sim'
                and tipo = 'Evento'");
                $res_cont = $query_cont->fetchAll(PDO::FETCH_ASSOC);
                $total_cont = count($res_cont);
                $num_paginas = ceil($total_cont / $itens_por_pagina);


        ?>
                <div class="boxes_eventos">
                    <div class="fit_line">
                        <span class="txt_coming_soon">Vem aí</span>
                    </div>
                    <a href="evento-<?php echo $url ?>" class="img_events">
                        <img src="sistema/img/eventos/<?php echo $banner ?>" alt="" class="im_ev">
                    </a>
                    <div class="content_event_in">
                        <div class="date__event">
                            <span class="dat_ev"><?php echo $data_evento ?></span>
                        </div>
                        <div class="area__txt_ev">
                            <h2 class="title_ev"><?php echo $titulo ?></h2>
                            <p class="txt__descrition__default event__txt"><?php echo $descricao1 ?></p>
                        </div>
                        <a href="evento-<?php echo $url ?>" class="link__evento">Saiba mais</a>
                    </div>
                </div>
        <?php }
        } ?>
</section>

<div class="events__pagination">
    <a href="<?php echo $nome_pag ?>?pagina=0" class="pagination__link__1">
        <div class="pagination__items">
            <i class="ri-arrow-left-s-line"></i>
            <span>Anterior</span>
        </div>
    </a>

    <?php
    for ($i = 0; $i < @$num_paginas; $i++) {

        if ($pagina == $i) {
            $estilo = 'txt_num_pag_1';
        } else {
            $estilo = 'txt_num_pag_2';
        }

        if ($pagina >= ($i - 2) && $pagina <= ($i + 2)) { ?>
            <a class="<?php echo $estilo ?>" href="<?php echo $nome_pag ?>?pagina=<?php echo $i ?>"><?php echo $i + 1 ?></a>

    <?php }
    } ?>

    <a href="<?php echo $nome_pag ?>?pagina=<?php echo $num_paginas - 1 ?>" class="pagination__link__2">
        <div class="pagination__items">
            <span>Próximo</span>
            <i class="ri-arrow-right-s-line"></i>
        </div>
    </a>
</div>


<?php require_once("rodape.php") ?>