<?php
require_once("cabecalho.php");

if (@$_GET['pagina'] != null) {
    $pag = $_GET['pagina'];
} else {
    $pag = 0;
}

$limite = $pag * $itens_por_pagina;
$pagina = $pag;
$nome_pag = 'licoes-de-celula.php';

?>

    <section class="container_widget_sv">
        <div class="content_widget container">
            <div class="area_title_c">
                <div class="area_content_widget">
                    <h3 class="title_cx">Lições de Célula</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="in__widget__default container">
        <div class="show_txt">
            <h1 class="title">Nossas Lições</h1>
            <p class="txt__descrition__default">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            Voluptatibus rerum aut impedit odio labore, minus quo, saepe aspernatur dolor vero ullam 
            dignissimos exercitationem. Ducimus, in quibusdam fuga officia voluptas a!</p>
        </div>
    </section>

    <section class="background_licao">
        <div class="filter_licao">
            <h1 class="title tit_custom">Lições de Células</h1>
        </div>

        <form action="" method="post" class="form_search_custom container">
            <div class="container_licao_sv">
                <div class="field_input">
                    <input type="text" class="input" required>
                    <div class="label_search">Pesquisar</div>
                    <button type="submit" class="button_search_li">
                        <i class="ri-search-line search_icon_li"></i>
                    </button>
                </div>
            </div>
        </form>
    </section>

    <section class="licoes_car">
        <div class="area_licoes_cr container">
            <div class="container__join">
            <?php
        $query = $pdo->query("SELECT * FROM licoes where igreja = '$id_igreja' order by data desc, id desc LIMIT $limite, $itens_por_pagina");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);

        if ($total_reg > 0) {
            for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {}
                    $nome = $res[$i]['nome'];
                    $imagem = $res[$i]['imagem'];
                    $arquivo = $res[$i]['arquivo'];
                    $categoria = $res[$i]['categoria_licao'];
                    $data = $res[$i]['data'];
                    

                //TOTALIZANDO AS PÁGINAS
                $query_cont = $pdo->query("SELECT * FROM licoes where igreja = '$id_igreja'");
                $res_cont = $query_cont->fetchAll(PDO::FETCH_ASSOC);
                $total_cont = count($res_cont);
                $num_paginas = ceil($total_cont / $itens_por_pagina);


                $query_preg = $pdo->query("SELECT * FROM categoria_licoes where id = '$categoria'");
                    $res_preg = $query_preg->fetchAll(PDO::FETCH_ASSOC);
                    $total_reg_preg = count($res_preg);
                    if ($total_reg_preg > 0) {
                        $categoria_licao = $res_preg[0]['nome'];
                    } else {
                        $categoria_licao = '';
                    }


        ?>
                <a href="licoes/<?php echo $arquivo ?>" target="_blank" class="card__options licao_hover">
                    <img class="img__options" src="licoes/<?php echo $imagem ?>" alt="">
                    <div class="box__options">
                        <div class="container_icon_li">
                            <i class="ri-download-line icon_download_li"></i>
                        </div>
                        <h3 class="title__licao"><?php echo $nome ?></h3>
                        <p class="category_licao"><?php echo $categoria_licao ?></p>
                        <span class="date_licao"><?php echo $data ?></span>
                    </div>
                </a>
                <?php } } ?>
            </div>
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