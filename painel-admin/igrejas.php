<?php
require_once("../conexao.php");
$pagina = 'igrejas';
?>

<div class="buttons_register">
    <a href="#" onclick="inserir()" class="button_tables_register">
        Nova Igreja
        <i class="bi bi-plus-lg icon_tables_registers"></i>
    </a>
</div>


<div class="tabs">
    <div class="table-container">
        <?php
        $query = $pdo->query("SELECT * FROM $pagina order by id desc");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);
        if ($total_reg > 0) {
            ?>
            <table class="content-table" id="example">
                <thead class="thead-tabs">
                    <tr class="column-table">
                        <th class="th-table first_table" id="radius-foto">Imagem</th>
                        <th class="th-table">Nome</th>
                        <th class="th-table column-hidden">Telefone</th>
                        <th class="th-table column-hidden">Data cadastro</th>
                        <th class="th-table column-hidden">Membros</th>
                        <th class="th-table column-hidden">Responsável</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $telefone = $res[$i]['telefone'];
                        $endereco = $res[$i]['endereco'];
                        $foto = $res[$i]['imagem'];
                        $matriz = $res[$i]['matriz'];
                        $data_cad = $res[$i]['data_cad'];
                        $obs = $res[$i]['obs'];
                        $pastor = $res[$i]['pastor'];
                        $id = $res[$i]['id'];

                        $query_con = $pdo->query("SELECT * FROM pastores where id = '$pastor'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_p = $res_con[0]['nome'];
                        } else {
                            $nome_p = 'Não Definido';
                        }

                        $query_m = $pdo->query("SELECT *FROM membros WHERE  igreja = '$id'");
                        $res_m = $query_m->fetchAll(PDO::FETCH_ASSOC);
                        $membrosCad = @count($res_m);

                        //Retira a quebra do texto das observações
                        $obs = str_replace(array("\n", "\r"), ' + ', $obs);

                        $data_cadF = implode('/', array_reverse(explode('-', $data_cad)));
                        ?>
                        <tr class="column-body">
                            <td data-label="Foto" class="td-table" id="radius-column-foto">
                                <img class="profile_table" src="../img/igrejas/<?php echo $foto ?>" alt="Logo Igreja"
                                    title="Logo Igreja">
                            </td>
                            <td data-label="Nome" class="td-table">
                                <?php echo $nome ?>
                            </td>
                            <td data-label="Telefone" class="td-table">
                                <?php echo $telefone ?>
                            </td>
                            <td data-label="Data cadastro" class="td-table">
                                <?php echo $data_cadF ?>
                            </td>
                            <td data-label="Membros" class="td-table column-hidden">
                                <?php echo $membrosCad ?> Membros
                            </td>
                            <td data-label="Membros" class="td-table column-hidden">
                                <?php echo $nome_p ?>
                            </td>
                            <td class="td-table" id="radius-column-action">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Opções
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $nome ?>',
                                            '<?php echo $telefone ?>', '<?php echo $endereco ?>', '<?php echo $foto ?>', 
                                            '<?php echo $pastor ?>')">
                                                <i class="bi bi-pencil-square icons_actions"></i>
                                                Editar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="excluir('<?php echo $id ?>', '<?php echo $nome ?>')">
                                                <i class="bi bi-trash3 icons_actions"></i>
                                                Excluir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="dados('<?php echo $nome ?>', 
                                            '<?php echo $telefone ?>', '<?php echo $endereco ?>', '<?php echo $foto ?>',
                                            '<?php echo $data_cadF ?>', '<?php echo $matriz ?>', '<?php echo $nome_p ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="obs('<?php echo $id ?>', 
                                            '<?php echo $nome ?>', '<?php echo $obs ?>')">
                                                <i class="bi bi-chat-right-text icons_actions"></i>
                                                Observações</a>
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
                                    <div class="input-field">
                                        <label>Nome</label>
                                        <input type="text" name="nome" id="nome" placeholder="Insira o Nome" required>
                                    </div>

                                    <div class="input-field field_area_1">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" id="telefone" placeholder="Insira o Telefone"
                                            required>
                                    </div>

                                    <div class="input-field">
                                        <label>Endereço</label>
                                        <input type="text" name="endereco" id="endereco"
                                            placeholder="Insira o Endereço">
                                    </div>

                                    <div class="input-field field_area_select">
                                        <label>Pastor Responsável</label>
                                        <select class="sel2" id="pastor" name="pastor">
                                            <?php
                                            $query = $pdo->query("SELECT * FROM pastores order by nome asc");
                                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                            $total_reg = count($res);
                                            if ($total_reg > 0) {
                                                for ($i = 0; $i < $total_reg; $i++) {
                                                    foreach ($res[$i] as $key => $value) {
                                                    }

                                                    $nome_reg = $res[$i]['nome'];
                                                    $id_reg = $res[$i]['id'];
                                                    ?>
                                                    <option value="<?php echo $id_reg ?>">
                                                        <?php echo $nome_reg ?>
                                                    </option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="area_photo">
                                        <div class="area_photo_flex">
                                            <label>Foto</label>
                                            <input type="file" class="input_file" id="imagem" name="imagem"
                                                onChange="carregarImg();">
                                        </div>
                                        <div class="divImg">
                                            <img class="photo_file" id="target" src="../img/igrejas/sem-foto.jpg"
                                                alt="">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" id="id">

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
                <h3 class="Cadastro">Nome: <span id="nome-dados"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body scroll-modal">
                <div class="user_area">
                    <img src="../img/svg/telefone.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-phone icon_user"></i> -->
                    <span class="user_name">Telefone: </span>
                    <span class="texts_son" id="telefone-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/map_endereco.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-geo-alt icon_user"></i> -->
                    <span class="user_name">Endereço: </span>
                    <span class="texts_son" id="endereco-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Data de Cadastro: </span>
                    <span class="texts_son" id="cadastro-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/igreja.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Matriz: </span>
                    <span class="texts_son" id="matriz-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/network-group-svgrepo-com.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Pastor Responsável: </span>
                    <span class="texts_son" id="pastor-dados"></span>
                </div>
                <div class="user_profile_area">
                    <img class="img_info_profile" src="" id="foto-dados">
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






<script type="text/javascript">
    var pag = "<?= $pagina ?>" 
</script>
<script src="../js/ajax.js"></script>




<script type="text/javascript">
    function editar(id, nome, telefone, endereco, foto, pastor) {
        $('#id').val(id);
        $('#nome').val(nome);
        $('#telefone').val(telefone);
        $('#endereco').val(endereco);
        $('#pastor').val(pastor).change();
        $('#target').attr('src', '../img/igrejas/' + foto);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(nome, telefone, endereco, foto, data_cad, matriz, pastor) {
        $('#nome-dados').text(nome);
        $('#telefone-dados').text(telefone);
        $('#endereco-dados').text(endereco);
        $('#cadastro-dados').text(data_cad);
        $('#matriz-dados').text(matriz);
        $('#foto-dados').attr('src', '../img/igrejas/' + foto);
        $('#pastor-dados').text(pastor);

        var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function obs(id, nome, obs) {

        for (let letra of obs) {
            if (letra === '+') {
                obs = obs.replace(' +  + ', '\n');
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
        $('#id').val('');
        $('#nome').val('');
        $('#telefone').val('');
        $('#endereco').val('');
        
        document.getElementById("pastor").options.selectedIndex = 0;
        $('#pastor').val($('#pastor').val()).change(); 
        
        $('#target').attr('src', '../img/igrejas/sem-foto.jpg');
    }

</script>