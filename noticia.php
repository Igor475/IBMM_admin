<?php
require_once("cabecalho.php");

$url = @$_GET['noticia'];

//PEGAR PAGINA ATUAL PARA PAGINAÇAO
if (@$_GET['pagina'] != null) {
    $pag = $_GET['pagina'];
} else {
    $pag = 0;
}

$limite = $pag * @$itens_por_pagina;
$pagina = $pag;
$nome_pag = 'noticias';


$query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and url = '$url'
    and tipo = 'Notícia'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
if ($total_reg > 0) {
    for ($i = 0; $i < $total_reg; $i++) {
        foreach ($res[$i] as $key => $value) {
        }

        $tipo = $res[$i]['tipo'];

        /* $url_notice = 'http://localhost/ibmissaomultiplicar/noticia-'.$url; 

        echo <<<HTML
            <script type="text/javascript">
                var noticiaUrl = $url_notice;
            </script>
        HTML; */


?>
        <section class="container_widget_info">
            <?php
            $query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and url = '$url'
        and tipo = 'Notícia'");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $total_reg = count($res);
            if ($total_reg > 0) {
            ?>
                <div class="content_widget container">
                    <div class="area_titles_new">
                        <?php

                        $titulo = $res[0]['titulo'];
                        $subtitulo = $res[0]['subtitulo'];
                        $data_evento = $res[0]['data_evento'];
                        $id = $res[0]['id'];
                        $banner = $res[0]['banner'];
                        $url = $res[0]['url'];
                        $video = $res[0]['video'];
                        $pregador = $res[0]['pregador'];
                        $descricao1 = $res[0]['descricao1'];
                        $descricao2 = $res[0]['descricao2'];
                        $descricao3 = $res[0]['descricao3'];
                        $tipo = $res[0]['tipo'];
                        $imagem = $res[0]['imagem'];
                        $hora = $res[0]['hora_evento'];


                        $usuario = $res[0]['usuario'];
                        $categoria = $res[0]['categoria'];

                        $query_user = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
                        $res_user = $query_user->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_user) > 0) {
                            $nome_usuario = $res_user[0]['nome'];
                            $foto_usuario = $res_user[0]['foto'];
                        } else {
                            $nome_usuario = '';
                            $foto_usuario = '';
                        }

                        $query_con = $pdo->query("SELECT * FROM categoria where id = '$categoria'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $name_cat = $res_con[0]['nome'];
                        } else {
                            $name_cat = '';
                        }

                        $img_1 = $res[0]['img_1'];
                        $img_2 = $res[0]['img_2'];
                        $img_3 = $res[0]['img_3'];
                        $img_4 = $res[0]['img_4'];
                        $img_5 = $res[0]['img_5'];
                        $img_6 = $res[0]['img_6'];

                        $convidado1 = $res[0]['convidado1'];
                        $convidado2 = $res[0]['convidado2'];
                        $convidado3 = $res[0]['convidado3'];
                        $convidado4 = $res[0]['convidado4'];

                        $descr_conv1 = $res[0]['descr_conv1'];
                        $descr_conv2 = $res[0]['descr_conv2'];
                        $descr_conv3 = $res[0]['descr_conv3'];
                        $descr_conv4 = $res[0]['descr_conv4'];

                        $imagem1 = $res[0]['imagem1'];
                        $imagem2 = $res[0]['imagem2'];
                        $imagem3 = $res[0]['imagem3'];
                        $imagem4 = $res[0]['imagem4'];

                        $data_eventoF = implode('/', array_reverse(explode('-', $data_evento)));
                        $hora  = (new DateTime($hora))->format('H:i');

                        ?>
                        <?php if ($name_cat != '') { ?>
                            <span class="categoria_new"><?php echo $name_cat ?></span>
                        <?php } else { ?>

                        <?php } ?>
                        <h1 class="title_new"><?php echo $titulo ?></h1>
                        <h3 class="subtitle_new"><?php echo $subtitulo ?></h3>
                    </div>
                    <div class="area_new">
                        <div class="flex_new_so">
                            <div class="area_info_new">
                                <div class="image_user">
                                    <img src="sistema/img/membros/<?php echo $foto_usuario ?>" alt="" class="user_post">
                                </div>
                                <div class="data_post">
                                    <h4><?php echo $nome_usuario ?></h4>
                                    <span><?php echo $data_eventoF ?> | Publicado às <?php echo $hora ?></span>
                                </div>
                            </div>
                            <div class="area_share_socials">
                                <a href="" class="link_share_new">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                                <a href="" class="link_share_new">

                                    <i class="ri-twitter-x-line"></i>
                                </a>

                                <a class="link_share_new" target="_blank" id="shareLink">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </div>
                        </div>
                        <div class="img_ne_full">
                            <img src="sistema/img/eventos/<?php echo $banner ?>" class="image_new" alt="">
                        </div>
                    </div>
                    <div class="area_txt_new">
                        <?php if ($descricao1 != '') { ?>
                            <p><?php echo $descricao1 ?></p>
                        <?php } else { ?>

                        <?php } ?>

                        <?php if ($descricao2 != '') { ?>
                            <p><?php echo $descricao2 ?></p>
                        <?php } else { ?>

                        <?php } ?>

                        <?php if ($descricao3 != '') { ?>
                            <p><?php echo $descricao3 ?></p>
                        <?php } else { ?>

                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </section>

        <section class="content_cr_news">
            <h1 class="title tit_ne_cr">Leia mais</h1>
            <div class="container">
                <div class="container_carrousel_news swiper">
                    <div class="card_news card_wapper_new">
                        <ul class="card_list_news swiper-wrapper">
                            <?php
                            $query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' 
                    and tipo = 'Notícia' and ativo = 'Sim' and url != '$url'
                    order by data_evento desc, id desc LIMIT 6");
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

                                    $categoria_carrousel = $res[$i]['categoria'];

                                    $query_news = $pdo->query("SELECT * FROM categoria where id = '$categoria_carrousel'");
                                    $res_news = $query_news->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res_news) > 0) {
                                        $name_categoria = $res_news[0]['nome'];
                                    } else {
                                        $name_categoria = '';
                                    }

                            ?>
                                    <li class="card_item_news swiper-slide">
                                        <a href="noticia-<?php echo $url ?>" class="card_link_cr_new">
                                            <img src="sistema/img/eventos/<?php echo $imagem ?>" alt="" class="card_image_news">
                                            <div class="news_content_carrousel">
                                                <p class="badge_new"><?php echo $name_categoria ?></p>
                                                <h2 class="card_title_new_cr"><?php echo $titulo ?></h2>
                                                <button class="card_button_new">
                                                    Leia mais
                                                    <i class="bi bi-arrow-right"></i>
                                                </button>
                                            </div>
                                        </a>
                                    </li>
                            <?php }
                            } ?>
                        </ul>

                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev swiper-navBtn"></div>
                        <div class="swiper-button-next swiper-navBtn"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="share">
            <div class="widget_share container">
                <h1 class="title_share">#Compartilhe</h1>
                <p class="txt__descrition__default txt_share">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>

                <div class="socials_share">
                    <a href="#" class="icons_share">
                        <i class="ri-facebook-fill icon_media_socials"></i>
                    </a>
                    <a href="#" class="icons_share">
                        <i class="ri-twitter-x-fill icon_media_socials"></i>
                    </a>
                    <a href="#" class="icons_share">
                        <i class="ri-instagram-line icon_media_socials"></i>
                    </a>
                </div>
            </div>
        </section>

        <?php require_once("rodape.php") ?>

<?php }
} else {
    // Caso o evento não seja encontrado
    echo "<script language='javascript'>$(function (){ RedirectionNews('$url') });</script>";
    exit;
} ?>