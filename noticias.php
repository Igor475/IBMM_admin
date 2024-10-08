<?php
require_once("cabecalho.php");


if (@$_GET['pagina'] != null) {
    $pag = $_GET['pagina'];
} else {
    $pag = 0;
}

$limite = $pag * $itens_por_pagina;
$pagina = $pag;
$nome_pag = 'noticias';


?>

<section class="container_widget_news">
    <div class="content_widget container">
        <div class="area_title_c">
            <div class="area_content_widget">
                <h3 class="title_cx">Notícias</h3>
            </div>
        </div>
    </div>
</section>

<section class="in__widget__default container in_message">
    <div class="show_messages">
        <h1 class="title_messages mr_not">Notícias</h1>
        <span class="txt__descrition__default txt_noticias">Mantenha-se atualizado sobre as novidades da IBMM.</span>
    </div>

    <div class="search_content">
        <form action="" method="post" class="form_search_custom_me container">
            <div class="container_licao_me">
                <div class="field_input_me">
                    <input type="text" class="input_me" required>
                    <div class="label_search_me">Pesquisar</div>
                    <button type="submit" class="button_search_li_me">
                        <i class="ri-search-line search_icon_li"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="area_messages">
    <div class="boxes_messages container">
        <?php
            $query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and ativo = 'Sim'
                and tipo = 'Notícia' order by data_evento desc, id desc LIMIT $limite, $itens_por_pagina");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $total_reg = count($res);

            if ($total_reg > 0) {
                for ($i = 0; $i < $total_reg; $i++) {
                    foreach ($res[$i] as $key => $value) {}
                    
                        $titulo = $res[$i]['titulo'];
                        $subtitulo = $res[$i]['subtitulo'];
                        $descricao1 = $res[$i]['descricao1'];
                        $data_evento = $res[$i]['data_evento'];
                        $id = $res[$i]['id'];
                        $banner = $res[$i]['banner'];
                        $imagem = $res[$i]['imagem'];
                        $hora = $res[$i]['hora_evento'];
                        $url = $res[$i]['url'];

                        $hora  = (new DateTime($hora))->format('H:i');


                    //TOTALIZANDO AS PÁGINAS
                    $query_cont = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and ativo = 'Sim'
                        and tipo = 'Notícia'");
                    $res_cont = $query_cont->fetchAll(PDO::FETCH_ASSOC);
                    $total_cont = count($res_cont);
                    $num_paginas = ceil($total_cont / $itens_por_pagina);

        ?>
        <div class="info_news">
            <a href="noticia-<?php echo $url ?>" class="link_message">
                <div class="box_img_mesage">
                    <img src="sistema/img/eventos/<?php echo $imagem ?>" alt="" class="image_me">
                </div>
            </a>

            <div class="info_message">
                <a href="#" class="link_title_news">
                    <?php echo $titulo ?>
                </a>
                <div class="flx_details_news">
                    <div class="flx_de">
                        <i class="ri-calendar-line icon__ne"></i>
                        <span class="date_me"><?php echo $data_evento ?></span>
                    </div>
                    <div class="flx_de">
                        <i class="ri-time-line icon__ne"></i>
                        <span class="hour_ne"><?php echo $hora ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php }
        } else { ?>
            <span>Não existem notícias no momento!</span>
        <?php } ?>
    </div>

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
</section>

<?php require_once("rodape.php") ?>

</body>

</html>