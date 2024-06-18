<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once ("../conexao.php");
$pagina = 'alertas';

if(@$patrimonio == 'ocultar') {
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
        Novo Alerta
        <i class="bi bi-plus-lg icon_tables_registers"></i>
    </a>
</div>


<div class="tabs">
    <div class="table-container">
        <?php
        $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);
        if ($total_reg > 0) {
            ?>
            <table class="content-table" id="example">
                <thead class="thead-tabs">
                    <tr class="column-table">
                        <th class="th-table">Título</th>
                        <th class="th-table">Data Expiração</th>
                        <th class="th-table">Usuário</th>
                        <th class="th-table">Ativo</th>
                        <th class="th-table column-hidden">Imagem</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $titulo = $res[$i]['titulo'];
                        $descricao = $res[$i]['descricao'];
                        $link = $res[$i]['link'];
                        $usuario = $res[$i]['usuario'];
                        $foto = $res[$i]['imagem'];
                        $data = $res[$i]['data'];
                        $igreja = $res[$i]['igreja'];
                        $ativo = $res[$i]['ativo'];
                        $id = $res[$i]['id'];


                        if ($ativo == 'Sim') {
                            $classe = 'text_active';
                            $ativo = 'Desativar Alerta';
                            $icone = 'bi-toggle-on';
                            $ativar = 'Não';
                            $inativa = '';
                            $tab = 'Ativo';

                        } else {
                            $classe = 'text_desactive';
                            $ativo = 'Ativar Alerta';
                            $icone = 'bi-toggle-off';
                            $ativar = 'Sim';
                            $inativa = 'text_opacity';
                            $tab = 'Inativo';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_usu_cad = $res_con[0]['nome'];
                        } else {
                            $nome_usu_cad = '';
                        }
                     


                        $dataF = implode('/', array_reverse(explode('-', $data)));

                        ?>
                        <tr class="column-body <?php echo $inativa ?> <?php echo $classe_item ?>">
                            <td data-label="Código" class="td-table">
                                <?php echo $titulo ?>
                            </td>
                            <td data-label="Nome" class="td-table">
                                <?php echo $dataF ?>
                            </td>
                            <td data-label="Nome Usuário Cadastrou" class="td-table">
                                <?php echo $nome_usu_cad ?>
                            </td>
                            <td data-label="Data de Cadastro" class="td-table column-hidden">
                                <?php echo $tab ?>
                            </td>
                            <td data-label="Foto" class="td-table">
                                <img class="profile_table" src="../img/alertas/<?php echo $foto ?>" alt="Imagem Alerta"
                                    title="Alerta">
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
                                            '<?php echo $titulo ?>','<?php echo $descricao ?>', '<?php echo $link ?>', 
                                            '<?php echo $foto ?>', '<?php echo $data ?>')">
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
                                            '<?php echo $descricao ?>', '<?php echo $link ?>', '<?php echo $foto ?>', 
                                            '<?php echo $dataF ?>', '<?php echo $ativo ?>', '<?php echo $nome_usu_cad ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="mudarStatus('<?php echo $id ?>', 
                                            '<?php echo $ativar ?>')" title="<?php echo $ativo ?>">
                                                <i class="bi <?php echo $icone ?> icons_actions <?php echo $classe ?>"></i>
                                                <?php echo $ativo ?>
                                            </a>
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
    <div class="modal-dialog">
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
                                    <div class="input-field flex_int_3">
                                        <label>Título</label>
                                        <input type="text" name="titulo" id="titulo" placeholder="Título do Alerta"
                                            required>
                                    </div>

                                    <div class="input-field flex_int_9">
                                        <label>Link (Se Existir)</label>
                                        <input type="text" name="link" id="link" placeholder="Insira o Link">
                                    </div>

                                    <div class="input-field flex_int_4">
                                        <label>Data de Expiração</label>
                                        <input type="date" name="data" id="data"
                                            value="<?php echo date('Y-m-d') ?>" required>
                                    </div>

                                    <div class="input-field flex_int_9">
                                        <div class="area_obs">
                                            <label class="txt_label_obs">Descrição (Max 500 Caracteres)</label>
                                            <textarea class="txt-obs-alert" maxlength="500" style="width" type="text" 
                                                name="descricao" id="descricao"></textarea>
                                        </div>
                                    </div>

                                    <div class="area_photo_1">
                                        <div class="area_photo_flex">
                                            <label>Foto</label>
                                            <input type="file" class="input_file" id="imagem" name="imagem"
                                                onChange="carregarImg();">
                                        </div>
                                        <div class="divImgAlert">
                                            <img class="photo_file_alert" id="target" src="../img/alertas/sem-foto.jpg"
                                                alt="">
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
                    <span class="user_name">Descrição: </span>
                    <span class="texts_son" id="descricao-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/link.svg" class="img_icon_data" alt="">
                    <span class="user_name">Link:</span>
                    <a href="" id="link-ref" target="_blank">
                        <span class="texts_son" id="link-dados"></span>
                    </a>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Data de Expiração: </span>
                    <span class="texts_son" id="data-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/ativo.svg" class="img_icon_data" alt="">
                    <span class="user_name">Ativo: </span>
                    <span class="texts_son" id="ativo-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Usuário Cadastro: </span>
                    <span class="texts_son" id="usuario-dados"></span>
                </div>
                <div class="user_profile_area">
                    <img class="img_info_profile" src="" id="foto-dados">
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<script type="text/javascript">
    var pag = "<?= $pagina ?>" 
</script>
<script src="../js/ajax.js"></script>




<script type="text/javascript">
    function editar(id, titulo, descricao, link, foto, data) {
        $('#id').val(id);
        $('#titulo').val(titulo);
        $('#descricao').val(descricao);
        $('#link').val(link);
        $('#data').val(data);

        $('#target').attr('src', '../img/alertas/' + foto);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(titulo, descricao, link, foto, data, ativo, usuario) {

        $('#link-ref').attr('href', link);

        $('#titulo-dados').text(titulo);
        $('#descricao-dados').text(descricao);
        $('#link-dados').text(link);
        $('#data-dados').text(data);
        $('#ativo-dados').text(ativo);
        $('#usuario-dados').text(usuario);

        $('#foto-dados').attr('src', '../img/alertas/' + foto);


        var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
        myModal.show();
        $('#mensagem').text('');
    }



    function limpar() {
        var data = "<?= $data_atual ?>"

        $('#id').val('');
        $('#titulo').val('');
        $('#descricao').val('');
        $('#link').val('');
        $('#data').val(data);


        $('#target').attr('src', '../img/alertas/sem-foto.jpg');
    }

</script>





<script type="text/javascript">
    $(document).ready(function () {
        $('.sel2').select2({
            dropdownParent: $('#modalTransferir'),
        });
    });
</script>