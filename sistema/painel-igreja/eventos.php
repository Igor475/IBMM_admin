<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once ("../conexao.php");
$pagina = 'eventos';

if (@$eventos == 'ocultar') {
    echo "<script>$(function() { 
                     alertaTempo('Você não tem permissão para estar nesta página! Verifique com o seu Pastor.');
                });
          </script>";
    /* echo "<script>window.location='index.php'</script>"; */
    exit();
}
?>

<div class="buttons_register">
    <a href="#" onclick="inserir()" class="button_tables_register">
        Novo Evento
        <i class="bi bi-plus-lg icon_tables_registers"></i>
    </a>
</div>


<div class="tabs">
    <div class="table-container">
        <?php
        $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' order by id desc");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);
        if ($total_reg > 0) {
            ?>
            <table class="content-table" id="example">
                <thead class="thead-tabs">
                    <tr class="column-table">
                        <th class="th-table first_table" id="radius-foto">Foto</th>
                        <th class="th-table">Título</th>
                        <th class="th-table">Data</th>
                        <th class="th-table">Cadastrado Por</th>
                        <th class="th-table column-hidden">Ativo</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $titulo = $res[$i]['titulo'];
                        $subtitulo = $res[$i]['subtitulo'];
                        $descricao1 = $res[$i]['descricao1'];
                        $descricao2 = $res[$i]['descricao2'];
                        $descricao3 = $res[$i]['descricao3'];
                        $data_cad = $res[$i]['data_cad'];
                        $data_evento = $res[$i]['data_evento'];
                        $usuario = $res[$i]['usuario'];
                        $imagem = $res[$i]['imagem'];
                        $video = $res[$i]['video'];
                        $ativo = $res[$i]['ativo'];
                        $igreja = $res[$i]['igreja'];
                        $obs = $res[$i]['obs'];
                        $id = $res[$i]['id'];
                        $banner = $res[$i]['banner'];
                        $tipo = $res[$i]['tipo'];


                        $img1 = $res[$i]['img_1'];
                        $img2 = $res[$i]['img_2'];
                        $img3 = $res[$i]['img_3'];
                        $img4 = $res[$i]['img_4'];
                        $img5 = $res[$i]['img_5'];
                        $img6 = $res[$i]['img_6'];


                        $convidado1 = $res[$i]['convidado1'];
                        $convidado2 = $res[$i]['convidado2'];
                        $convidado3 = $res[$i]['convidado3'];
                        $convidado4 = $res[$i]['convidado4'];
                        $imagem1 = $res[$i]['imagem1'];
                        $imagem2 = $res[$i]['imagem2'];
                        $imagem3 = $res[$i]['imagem3'];
                        $imagem4 = $res[$i]['imagem4'];



                        if ($obs != "") {
                            $classe_obs = 'obs_filled';
                        } else {
                            $classe_obs = 'obs_empty';
                        }


                        if ($ativo == 'Sim') {
                            $classe = 'text_active';
                            $ativo = 'Desativar Item';
                            $icone = 'bi-toggle-on';
                            $ativar = 'Não';
                            $inativa = '';
                            $tab = 'Ativo';
                            $img_status = '../img/svg/status_active.svg';
                        } else {
                            $classe = 'text_desactive';
                            $ativo = 'Ativar Item';
                            $icone = 'bi-toggle-off';
                            $ativar = 'Sim';
                            $inativa = 'text_opacity';
                            $tab = 'Inativo';
                            $img_status = '../img/svg/status_inactive.svg';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_usu_cad = $res_con[0]['nome'];
                        } else {
                            $nome_usu_cad = '';
                        }


                        $data_cadF = implode('/', array_reverse(explode('-', $data_cad)));
                        $data_eventoF = implode('/', array_reverse(explode('-', $data_evento)));

                        ?>
                        <tr class="column-body <?php echo $inativa ?> <?php echo $classe_item ?>">
                            <td data-label="Foto" class="td-table" id="radius-column-foto">
                                <img class="profile_table" src="../img/eventos/<?php echo $imagem ?>" alt="Perfil"
                                    title="Perfil">
                            </td>
                            <td data-label="Título" class="td-table">
                                <?php echo $titulo ?>
                            </td>
                            <td data-label="Data Evento" class="td-table">
                                <?php echo $data_eventoF ?>
                            </td>
                            <td data-label="Nome Usuário Cadastro" class="td-table">
                                <?php echo $nome_usu_cad ?>
                            </td>
                            <td data-label="Ativo" class="td-table column-hidden">
                                <?php echo $tab ?>
                            </td>
                            <td class="td-table" id="radius-column-action">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Opções
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="editar('<?php echo $id ?>', 
                                            '<?php echo $titulo ?>', '<?php echo $subtitulo ?>', '<?php echo $descricao1 ?>', 
                                            '<?php echo $descricao2 ?>', '<?php echo $descricao3 ?>', '<?php echo $data_evento ?>', 
                                            '<?php echo $imagem ?>', '<?php echo $video ?>', '<?php echo $banner ?>', 
                                            '<?php echo $tipo ?>')">
                                                <i class="bi bi-pencil-square icons_actions"></i>
                                                Editar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="excluir('<?php echo $id ?>', '<?php echo $titulo ?>')">
                                                <i class="bi bi-trash3 icons_actions"></i>
                                                Excluir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="dados('<?php echo $titulo ?>', 
                                            '<?php echo $subtitulo ?>', '<?php echo $descricao1 ?>', '<?php echo $descricao2 ?>', 
                                            '<?php echo $descricao3 ?>', '<?php echo $data_cadF ?>', '<?php echo $data_eventoF ?>', 
                                            '<?php echo $nome_usu_cad ?>', '<?php echo $imagem ?>', '<?php echo $video ?>', 
                                            '<?php echo $ativo ?>', '<?php echo $obs ?>', '<?php echo $tipo ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item <?php echo $classe_obs ?>" href="#" onclick="obs('<?php echo $id ?>', 
                                            '<?php echo $titulo ?>', '<?php echo $obs ?>')">
                                                <i class="bi bi-chat-right-text icons_actions"></i>
                                                Observações</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="mudarStatus('<?php echo $id ?>', 
                                            '<?php echo $ativar ?>')" title="<?php echo $ativo ?>">
                                                <i class="bi <?php echo $icone ?> icons_actions <?php echo $classe ?>"></i>
                                                <?php echo $ativo ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="imagens('<?php echo $id ?>', 
                                            '<?php echo $titulo ?>', '<?php echo $img1 ?>', '<?php echo $img2 ?>', 
                                            '<?php echo $img3 ?>', '<?php echo $img4 ?>', '<?php echo $img5 ?>',
                                            '<?php echo $img6 ?>')">
                                                <i class="bi bi-file-earmark-image icons_actions"></i>
                                                Imagens da Galeria</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="convidado('<?php echo $id ?>', '<?php echo $titulo ?>',
                                            '<?php echo $convidado1 ?>', '<?php echo $convidado2 ?>', '<?php echo $convidado3 ?>', 
                                            '<?php echo $convidado4 ?>', '<?php echo $imagem1 ?>', '<?php echo $imagem2 ?>',
                                            '<?php echo $imagem3 ?>', '<?php echo $imagem4 ?>')">
                                                <i class="bi bi-person-add icons_actions"></i>
                                                Convidados</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else {
            echo 'Não existem dados cadastrados!';
        }
        ?>
    </div>
</div>







<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro" id="tituloModal"></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form" method="post">
                <div class="modal-body">
                    <div action="#" class="form-modal">
                        <div class="form first">
                            <div class="details personal">
                                <div class="fields">
                                    <div class="input-field flex_int_9">
                                        <label>Título (Max 60 Caracteres)</label>
                                        <input type="text" name="titulo" id="titulo" placeholder="Título do Evento"
                                            required>
                                    </div>

                                    <div class="input-field field_area_2">
                                        <div class="area_obs">
                                            <label>Subtitulo</label>
                                            <textarea class="txt-obs-alert" type="text" name="subtitulo" id="subtitulo"
                                                placeholder="Subtitulo do Evento" required></textarea>
                                        </div>
                                    </div>

                                    <div class="input-field field_area_2">
                                        <label>Vídeo (Se houver, colocar o link da url do YouTube)</label>
                                        <input type="url" name="video" id="video" placeholder="Url do vídeo">
                                    </div>

                                    <div class="input-field flex_int_4">
                                        <label>Data do Evento</label>
                                        <input type="date" name="data_evento" id="data_evento"
                                            value="<?php echo date('Y-m-d') ?>" required>
                                    </div>

                                    <div class="input-field flex_int_4">
                                        <label>Evento / Pregação</label>
                                        <select class="form-select" id="tipo" name="tipo">
                                            <option value="Evento">Evento</option>
                                            <option value="Mensagem">Mensagem</option>
                                            <option value="Evento com Inscrição">Evento com Inscrição</option>
                                        </select>
                                    </div>

                                    <div class="input-field field_area_2">
                                        <div class="area_obs">
                                            <label>Primeira Descrição (Se houver)</label>
                                            <textarea class="txt-obs-alert" type="text" name="descricao1"
                                                id="descricao1" placeholder="Descrição do Item"></textarea>
                                        </div>
                                    </div>

                                    <div class="input-field field_area_2">
                                        <div class="area_obs">
                                            <label>Segunda Descrição (Se houver)</label>
                                            <textarea class="txt-obs-alert" type="text" name="descricao2"
                                                id="descricao2" placeholder="Descrição do Item"></textarea>
                                        </div>
                                    </div>

                                    <div class="input-field field_area_2">
                                        <div class="area_obs">
                                            <label>Terceira Descrição (Se houver)</label>
                                            <textarea class="txt-obs-alert" type="text" name="descricao3"
                                                id="descricao3" placeholder="Descrição do Item"></textarea>
                                        </div>
                                    </div>

                                    <div class="area_photo_1">
                                        <div class="area_photo_flex">
                                            <label>Imagem</label>
                                            <input type="file" class="input_file" id="imagem" name="imagem"
                                                onChange="carregarImg();">
                                        </div>
                                        <div class="divImgVideoForm">
                                            <img class="photo_file_video_image" id="target"
                                                src="../img/eventos/sem-foto.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="area_photo_1">
                                        <div class="area_photo_flex">
                                            <label>Banner (1200 x 675)</label>
                                            <input type="file" class="input_file" id="banner" name="banner"
                                                onChange="carregarImgBanner();">
                                        </div>
                                        <div class="divImgBanner">
                                            <img class="photo_file_video_image" id="targetBanner"
                                                src="../img/eventos/sem-foto.jpg" alt="">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="igreja" id="igreja2" value="<?php echo $id_igreja ?>">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar" class="btn-close" data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Salvar
                            <i class="bi bi-pencil-square icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Excluir Registro</h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-excluir" method="post">
                <div class="modal-body">
                    <div action="#" class="form-modal-auto">
                        <div class="form first">
                            <div class="details personal">

                                <span class="text_excluir">Deseja mesmo excluir este Registro
                                    <span id="nome-excluido"></span>?

                                    <div id="mensagem-excluir"></div>

                                    <input type="hidden" name="id-excluir" id="id-excluir">

                            </div>
                        </div>
                    </div>
                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-excluir" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-remove">
                            Excluir
                            <i class="bi bi-trash3 icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Título: <span id="titulo-dados"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body scroll-modal">
                <div class="user_area">
                    <img src="../img/svg/descrition.svg" class="img_icon_data" alt="">
                    <span class="user_name">Subtitulo: </span>
                    <span class="texts_son" id="subtitulo-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Data do Cadastro:</span>
                    <span class="texts_son" id="cad-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Data do Evento: </span>
                    <span class="texts_son" id="evento-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Tipo: </span>
                    <span class="texts_son" id="tipo-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Cadastrado Por: </span>
                    <span class="texts_son" id="usu-cad-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/ativo.svg" class="img_icon_data" alt="">
                    <span class="user_name">Ativo: </span>
                    <span class="texts_son" id="ativo-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/exclamation.svg" class="img_icon_data" alt="">
                    <span class="user_name">OBS: </span>
                    <span class="texts_son" id="obs-dados"></span>
                </div>
                <div class="video_image_area">
                    <span class="area_video_modal">
                        <span class="txt_video">Vídeo</span>
                        <iframe id="video-dados" width="100%" height="300" src="" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </span>
                    <div class="area_dados_image">
                        <span class="txt_image">Imagem</span>
                        <img class="img_inf_dados" src="" id="foto-dados">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>





<div class="modal fade" id="modalObs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Observações - <span id="nome-obs"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-obs" method="post">
                <div class="modal-body">
                    <div class="area_obs">
                        <label class="txt_label_obs">Observações (Máximo de 500 Caracteres)</label>
                        <textarea class="txt-obs" name="obs" id="obs" maxlength="500"></textarea>
                    </div>

                    <div id="mensagem-obs"></div>

                    <input type="hidden" name="id-obs" id="id-obs">

                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-obs" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Salvar
                            <i class="bi bi-pencil-square icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="modal fade" id="modalGaleria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Imagens do Evento - <span id="nome-imagem"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-img" method="post">
                <div class="modal-body">
                    <div class="height_images_scroll">
                        <span class="txt_notice">Recomendadação das Imagens: 600 x 600</span>
                        <div class="area_images_gallery">
                            <div class="area_photo_rel">
                                <div class="area_photo_flex">
                                    <label>Primeira Imagem: </label>
                                    <input type="file" class="input_file" id="imagemgaleria1" name="img1"
                                        onChange="carregarImg1();">
                                </div>
                                <div class="divImgGal">
                                    <img class="photo_file_gal" id="targetgaleria1"
                                        src="../img/eventos/galeria/sem-foto.jpg" alt="">
                                </div>
                            </div>
                            <div class="area_photo_rel">
                                <div class="area_photo_flex">
                                    <label>Segunda Imagem: </label>
                                    <input type="file" class="input_file" id="imagemgaleria2" name="img2"
                                        onChange="carregarImg2();">
                                </div>
                                <div class="divImgGal">
                                    <img class="photo_file_gal" id="targetgaleria2"
                                        src="../img/eventos/galeria/sem-foto.jpg" alt="">
                                </div>
                            </div>
                            <div class="area_photo_rel">
                                <div class="area_photo_flex">
                                    <label>Terceira Imagem: </label>
                                    <input type="file" class="input_file" id="imagemgaleria3" name="img3"
                                        onChange="carregarImg3();">
                                </div>
                                <div class="divImgGal">
                                    <img class="photo_file_gal" id="targetgaleria3"
                                        src="../img/eventos/galeria/sem-foto.jpg" alt="">
                                </div>
                            </div>
                            <div class="area_photo_rel">
                                <div class="area_photo_flex">
                                    <label>Quarta Imagem: </label>
                                    <input type="file" class="input_file" id="imagemgaleria4" name="img4"
                                        onChange="carregarImg4();">
                                </div>
                                <div class="divImgGal">
                                    <img class="photo_file_gal" id="targetgaleria4"
                                        src="../img/eventos/galeria/sem-foto.jpg" alt="">
                                </div>
                            </div>
                            <div class="area_photo_rel">
                                <div class="area_photo_flex">
                                    <label>Quinta Imagem: </label>
                                    <input type="file" class="input_file" id="imagemgaleria5" name="img5"
                                        onChange="carregarImg5();">
                                </div>
                                <div class="divImgGal">
                                    <img class="photo_file_gal" id="targetgaleria5"
                                        src="../img/eventos/galeria/sem-foto.jpg" alt="">
                                </div>
                            </div>
                            <div class="area_photo_rel">
                                <div class="area_photo_flex">
                                    <label>Sexta Imagem: </label>
                                    <input type="file" class="input_file" id="imagemgaleria6" name="img6"
                                        onChange="carregarImg6();">
                                </div>
                                <div class="divImgGal">
                                    <img class="photo_file_gal" id="targetgaleria6"
                                        src="../img/eventos/galeria/sem-foto.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="mensagem-img"></div>

                    <input type="hidden" name="id-img" id="id-img">

                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-img" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Salvar
                            <i class="bi bi-pencil-square icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="modal fade" id="modalConvidado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro" id="tituloModal">Convidados do Evento - <span id="nome-titulo"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-convidado" method="post">
                <div class="modal-body">
                    <div action="#" class="form-modal">
                        <div class="form first">
                            <div class="details personal">
                                <div class="fields_guest">
                                    <div class="flex_guest">
                                        <div class="input-field-guest con_field">
                                            <label class="labels_form">Nome Convidado 1</label>
                                            <input type="text" name="convidado1" id="convidado1"
                                                placeholder="Nome do Convidado">
                                        </div>

                                        <div class="area_photo_guest fo_field">
                                            <div class="area_photo_flex">
                                                <label>Foto do Convidado 1</label>
                                                <input type="file" class="input_file" id="imagem1" name="imagem1"
                                                    onChange="carregarImgconvidado1();">
                                            </div>
                                            <div class="divImgGuestForm">
                                                <img class="photo_file_video_image" id="targetconvidado1"
                                                    src="../img/eventos/sem-foto.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="flex_guest">
                                        <div class="input-field-guest con_field">
                                            <label class="labels_form">Nome Convidado 2</label>
                                            <input type="text" name="convidado2" id="convidado2"
                                                placeholder="Nome do Convidado">
                                        </div>

                                        <div class="area_photo_guest fo_field">
                                            <div class="area_photo_flex">
                                                <label>Foto do Convidado 2</label>
                                                <input type="file" class="input_file" id="imagem2" name="imagem2"
                                                    onChange="carregarImgconvidado2();">
                                            </div>
                                            <div class="divImgGuestForm">
                                                <img class="photo_file_video_image" id="targetconvidado2"
                                                    src="../img/eventos/sem-foto.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="flex_guest">
                                        <div class="input-field-guest con_field">
                                            <label class="labels_form">Nome Convidado 3</label>
                                            <input type="text" name="convidado3" id="convidado3"
                                                placeholder="Nome do Convidado">
                                        </div>

                                        <div class="area_photo_guest fo_field">
                                            <div class="area_photo_flex">
                                                <label>Foto do Convidado 3</label>
                                                <input type="file" class="input_file" id="imagem3" name="imagem3"
                                                    onChange="carregarImgconvidado3();">
                                            </div>
                                            <div class="divImgGuestForm">
                                                <img class="photo_file_video_image" id="targetconvidado3"
                                                    src="../img/eventos/sem-foto.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="flex_guest">
                                        <div class="input-field-guest con_field">
                                            <label class="labels_form">Nome Convidado 4</label>
                                            <input type="text" name="convidado4" id="convidado4"
                                                placeholder="Nome do Convidado">
                                        </div>

                                        <div class="area_photo_guest fo_field">
                                            <div class="area_photo_flex">
                                                <label>Foto do Convidado 4</label>
                                                <input type="file" class="input_file" id="imagem4" name="imagem4"
                                                    onChange="carregarImgconvidado4();">
                                            </div>
                                            <div class="divImgGuestForm">
                                                <img class="photo_file_video_image" id="targetconvidado4"
                                                    src="../img/eventos/sem-foto.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>


                                    <div id="mensagem-convidado"></div>

                                    <input type="hidden" name="id-convidado" id="id-convidado">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-convidado" class="btn-close" data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Salvar
                            <i class="bi bi-pencil-square icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







<script type="text/javascript">
    var pag = "<?= $pagina ?>"
</script>
<script src="../js/ajax.js"></script>




<script type="text/javascript">
    function editar(id, titulo, subtitulo, descricao1, descricao2, descricao3, data_evento, imagem, video, banner, tipo) {
        $('#id').val(id);
        $('#titulo').val(titulo);
        $('#subtitulo').val(subtitulo);
        $('#descricao1').val(descricao1);
        $('#descricao2').val(descricao2);
        $('#descricao3').val(descricao3);
        $('#data_evento').val(data_evento);
        $('#video').val(video);

        $('#tipo').val(tipo).change();

        $('#target').attr('src', '../img/eventos/' + imagem);
        $('#targetBanner').attr('src', '../img/eventos/' + banner);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(titulo, subtitulo, descricao1, descricao2, descricao3, data_cad, data_evento, usuario, imagem, video, ativo, obs, tipo) {

        $('#titulo-dados').text(titulo);
        $('#subtitulo-dados').text(subtitulo);
        $('#cad-dados').text(data_cad);
        $('#evento-dados').text(data_evento);
        $('#usu-cad-dados').text(usuario);
        $('#ativo-dados').text(ativo);
        $('#obs-dados').text(obs);
        $('#tipo-dados').text(tipo);

        $('#foto-dados').attr('src', '../img/eventos/' + imagem);
        $('#video-dados').attr('src', video);

        var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function obs(id, nome, obs) {
        console.log(obs)

        for (let letra of obs) {
            if (letra === '+') {
                obs = obs.replace(' +  + ', '\n')
            }
        }


        $('#nome-obs').text(nome);
        $('#id-obs').val(id);
        $('#obs').val(obs);



        var myModal = new bootstrap.Modal(document.getElementById('modalObs'), {});
        myModal.show();
        $('#mensagem-obs').text('');
    }


    function limpar() {
        var data = "<?= $data_atual ?>"

        $('#id').val('');
        $('#titulo').val('');
        $('#subtitulo').val('');
        $('#descricao1').val('');
        $('#descricao2').val('');
        $('#descricao3').val('');
        $('#video').val('');
        $('#data_evento').val(data);

        $('#target').attr('src', '../img/eventos/sem-foto.jpg');
        $('#targetBanner').attr('src', '../img/eventos/sem-foto.jpg');
    }


    function imagens(id, titulo, img1, img2, img3, img4, img5, img6) {

        $('#nome-imagem').text(titulo);
        $('#id-img').val(id);

        $('#targetgaleria1').attr('src', '../img/eventos/galeria/' + img1);
        $('#targetgaleria2').attr('src', '../img/eventos/galeria/' + img2);
        $('#targetgaleria3').attr('src', '../img/eventos/galeria/' + img3);
        $('#targetgaleria4').attr('src', '../img/eventos/galeria/' + img4);
        $('#targetgaleria5').attr('src', '../img/eventos/galeria/' + img5);
        $('#targetgaleria6').attr('src', '../img/eventos/galeria/' + img6);

        var myModal = new bootstrap.Modal(document.getElementById('modalGaleria'), {});
        myModal.show();
        $('#mensagem-imagens').text('');
    }


    function convidado(id, titulo, convidado1, convidado2, convidado3, convidado4, imagem1, imagem2, imagem3, imagem4) {

        $('#convidado4').val(convidado4);
        $('#convidado3').val(convidado3);
        $('#convidado2').val(convidado2);
        $('#convidado1').val(convidado1);
        $('#nome-titulo').text(titulo);
        $('#id-convidado').val(id);

        $('#targetconvidado1').attr('src', '../img/eventos/' + imagem1);
        $('#targetconvidado2').attr('src', '../img/eventos/' + imagem2);
        $('#targetconvidado3').attr('src', '../img/eventos/' + imagem3);
        $('#targetconvidado4').attr('src', '../img/eventos/' + imagem4);

        var myModal = new bootstrap.Modal(document.getElementById('modalConvidado'), {});
        myModal.show();
        $('#mensagem-convidado').text('');
    }
</script>





<script type="text/javascript">
    function carregarImg1() {
        var target = document.getElementById('targetgaleria1');
        var file = document.querySelector("#imagemgaleria1").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }




    function carregarImg2() {
        var target = document.getElementById('targetgaleria2');
        var file = document.querySelector("#imagemgaleria2").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }



    function carregarImg3() {
        var target = document.getElementById('targetgaleria3');
        var file = document.querySelector("#imagemgaleria3").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }



    function carregarImg4() {
        var target = document.getElementById('targetgaleria4');
        var file = document.querySelector("#imagemgaleria4").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }



    function carregarImg5() {
        var target = document.getElementById('targetgaleria5');
        var file = document.querySelector("#imagemgaleria5").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }



    function carregarImg6() {
        var target = document.getElementById('targetgaleria6');
        var file = document.querySelector("#imagemgaleria6").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }
</script>






<script type="text/javascript">
    function carregarImgconvidado1() {
        var target = document.getElementById('targetconvidado1');
        var file = document.querySelector("#imagem1").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }




    function carregarImgconvidado2() {
        var target = document.getElementById('targetconvidado2');
        var file = document.querySelector("#imagem2").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }



    function carregarImgconvidado3() {
        var target = document.getElementById('targetconvidado3');
        var file = document.querySelector("#imagem3").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }



    function carregarImgconvidado4() {
        var target = document.getElementById('targetconvidado4');
        var file = document.querySelector("#imagem4").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }

</script>






<script type="text/javascript">
    $("#form-img").submit(function () {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/imagens.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#mensagem-img').text('');
                $('#mensagem-img').removeClass()
                if (mensagem.trim() == "Salvo com Sucesso") {

                    $('#btn-fechar-img').click();
                    window.location = "index.php?pag=" + pag;
                } else {

                    $('#mensagem-img').addClass('message_error')
                    $('#mensagem-img').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });
</script>








<script type="text/javascript">
    $("#form-convidado").submit(function () {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/convidados.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#mensagem-convidado').text('');
                $('#mensagem-convidado').removeClass()
                if (mensagem.trim() == "Salvo com Sucesso") {

                    $('#btn-fechar-convidado').click();
                    window.location = "index.php?pag=" + pag;
                } else {

                    $('#mensagem-convidado').addClass('message_error')
                    $('#mensagem-convidado').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });
</script>





<script type="text/javascript">
    
function carregarImgBanner() {
    var target = document.getElementById('targetBanner');
    var file = document.querySelector("#banner").files[0];
    var arquivo = file['name'];
    resultado = arquivo.split(".", 2);

    var reader = new FileReader();

    reader.onloadend = function () {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}
</script>




<script type="text/javascript">
    $(document).ready(function () {
        $('.sel2').select2({
            dropdownParent: $('#modalTransferir'),
        });
    });
</script>