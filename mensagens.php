<?php

require_once("cabecalho.php");

if (@$_GET['pagina'] != null) {
    $pag = $_GET['pagina'];
} else {
    $pag = 0;
}

$limite = $pag * $itens_por_pagina_message;
$pagina = $pag;
$nome_pag = 'mensagens.php';

?>
<section class="container_widget_plans">
    <div class="content_widget container">
        <div class="area_title_c">
            <div class="area_content_widget">
                <h3 class="title_cx">Mensagens</h3>
            </div>
        </div>
    </div>
</section>

<div class="main__back">
    <section class="in_widget container in_message">
        <div class="show_messages">
            <h1 class="title_messages">Assista nossas mensagens</h1>
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

    <section class="prin_message">
        <div class="message_des container">
            <?php
            $query_main = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and ativo = 'Sim'
                    and tipo = 'Mensagem' order by data_evento desc, id desc LIMIT 1");
            $res_main = $query_main->fetchAll(PDO::FETCH_ASSOC);
            $total_reg_main = count($res_main);

            if ($total_reg_main > 0) {
                for ($i_m = 0; $i_m < $total_reg_main; $i_m++) {
                    foreach ($res_main[$i_m] as $key => $value_main) {
                    }
                    $titulo_main = $res_main[$i_m]['titulo'];
                    $subtitulo_main = $res_main[$i_m]['subtitulo'];
                    $descricao1_main = $res_main[$i_m]['descricao1'];
                    $data_evento_main = $res_main[$i_m]['data_evento'];
                    $id_main = $res_main[$i_m]['id'];
                    $banner_main = $res_main[$i_m]['banner'];
                    $imagem_main = $res_main[$i_m]['imagem'];
                    $url_main = $res_main[$i_m]['url'];
                    $video_main = $res_main[$i_m]['video'];
                    $pregador_main = $res_main[$i_m]['pregador'];


                    $query_preg = $pdo->query("SELECT * FROM usuarios where igreja = '$id_igreja'");
                    $res_preg = $query_preg->fetchAll(PDO::FETCH_ASSOC);
                    $total_reg_preg = count($res_preg);
                    if ($total_reg_preg > 0) {
                        $nome_pregador = $res_preg[0]['nome'];
                    } else {
                        $nome_pregador = '';
                    }


            ?>
                    Imagem Recomendada 400x200
                    <a href="mensagem-<?php echo $url_main ?>" class="image-box">
                        <div class="image-container-sermon">
                            <img src="sistema/img/eventos/<?php echo $imagem_main ?>" alt="Imagem de vídeo">
                            <i class="bi bi-play play-icon"></i>
                            <div class="text-container-sermon">
                                <span>Última mensagem</span>
                                <h3><?php echo $titulo_main ?></h3>
                            </div>
                        </div>
                    </a>
            <?php }
            } ?>
        </div>
    </section>
</div>

<section class="area_messages">
    <div class="title mess_mr">Mais Mensagens</div>

    <div class="boxes_messages container">
        <?php
        $query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and ativo = 'Sim'
                and tipo = 'Mensagem' order by data_evento desc, id desc LIMIT $limite, $itens_por_pagina_message");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);

        if ($total_reg > 0) {
            for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {}

                if ($i === 0 && $pagina == 0) {
                    continue;
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
                and tipo = 'Mensagem'");
                $res_cont = $query_cont->fetchAll(PDO::FETCH_ASSOC);
                $total_cont = count($res_cont);
                $num_paginas = ceil($total_cont / $itens_por_pagina_message);


        ?>
                <a href="mensagem-<?php echo $url ?>" class="link_message">
                    <div class="box_img_mesage">
                        <img src="sistema/img/eventos/<?php echo $imagem ?>" alt="" class="image_me">
                    </div>

                    <div class="info_message">
                        <h3 class="title_message"><?php echo $titulo ?></h3>
                        <span class="date_me"><?php echo $data_evento ?></span>
                    </div>
                </a>
        <?php }
        } ?>
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