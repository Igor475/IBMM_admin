

<?php
require_once("cabecalho.php");

$busca = '%' . @$_POST['buscar'] . '%';


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
        <form method="post" class="form_search_custom_me container" id="searchForm">
            <div class="container_licao_me">
                <div class="field_input_me">
                    <input type="text" class="input_me" name="buscar" id="buscar">
                    <input type="hidden" id="pagina">
                    <div class="label_search_me">Pesquisar</div>
                    <button type="submit" class="button_search_li_me" onclick="listarNome()">
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
        $query = $pdo->query("SELECT * FROM eventos WHERE titulo LIKE '%$busca%' 
            AND igreja = '$id_igreja' 
            AND ativo = 'Sim' 
            AND tipo = 'Notícia' 
            ORDER BY data_evento DESC, id DESC 
            LIMIT $limite, $itens_por_pagina");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);

        /* $query_search = $pdo->query("SELECT * FROM eventos where titulo LIKE '$busca' or categoria LIKE '$busca'");
            $res_search = $query_search->fetchAll(PDO::FETCH_ASSOC);
            $total_reg_search = count($res_search); */


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
                $hora = $res[$i]['hora_evento'];
                $url = $res[$i]['url'];

                $hora  = (new DateTime($hora))->format('H:i');


                //TOTALIZANDO AS PÁGINAS
                $query_cont = $pdo->query("SELECT * FROM eventos where titulo LIKE '%$busca%' and igreja = '$id_igreja' and ativo = 'Sim'
                        and tipo = 'Notícia'");
                $res_cont = $query_cont->fetchAll(PDO::FETCH_ASSOC);
                $total_cont = count($res_cont);
                $num_paginas = ceil($total_cont / $itens_por_pagina);

        ?>
                <div id="preloader" style="display: none">
                    <div class="spinner"></div> <!-- Este é um exemplo de spinner -->
                </div>
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
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Botão Anterior -->
                <li class="page-item">
                    <a onclick="listarNome(<?php echo max(0, $pagina - 1); ?>)"
                        class="paginador pagination__link__1"
                        href="<?php echo $nome_pag ?>?pagina=<?php echo max(0, $pagina - 1); ?>"
                        aria-label="Previous">
                        <div class="pagination__items">
                            <i class="ri-arrow-left-s-line"></i>
                            <span>Anterior</span>
                        </div>
                    </a>
                </li>

                <?php
                for ($i = 0; $i < @$num_paginas; $i++) {
                    $estilo = ($pagina == $i) ? 'active txt_num_pag_1' : 'txt_num_pag_2';

                    // Exibe somente as páginas próximas
                    if ($pagina >= ($i - 2) && $pagina <= ($i + 2)) { ?>
                        <li class="page-item <?php echo $estilo ?>">
                            <a onclick="listarNome(<?php echo $i ?>)"
                                class="paginador <?php echo $estilo ?>"
                                href="<?php echo $nome_pag ?>?pagina=<?php echo $i ?>">
                                <?php echo $i + 1 ?>
                            </a>
                        </li>
                <?php }
                } ?>

                <!-- Botão Próximo -->
                <li class="page-item">
                    <a onclick="listarNome(<?php echo min($num_paginas - 1, $pagina + 1); ?>)"
                        class="paginador pagination__link__2"
                        href="<?php echo $nome_pag ?>?pagina=<?php echo min($num_paginas - 1, $pagina + 1); ?>"
                        aria-label="Next">
                        <div class="pagination__items">
                            <span>Próximo</span>
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

<?php require_once("rodape.php") ?>

</body>

</html>

<script src="assets/js/searchs.js"></script>