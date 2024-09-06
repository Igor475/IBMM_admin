<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once ("../conexao.php");
$pagina = 'patrimonios';

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
        Cadastrar Item
        <i class="bi bi-plus-lg icon_tables_registers"></i>
    </a>

    <div class="container_filter">
        <span class="filter_church_1">
            <i class="bi bi-circle-fill icon_church_f item_d_ig"></i>
            Item da Igreja
        </span>
        <span class="filter_church_2">
            <i class="bi bi-circle-fill icon_church_f item_c_emp"></i>
            Item Emprestado
        </span>
        <span class="filter_church_3">
            <i class="bi bi-circle-fill icon_church_f"></i>
            Item de outra Igreja
        </span>
        <span class="filter_church_4">
            <i class="bi bi-circle-fill icon_church_f"></i>
            Item Inativo
        </span>
    </div>
</div>


<div class="tabs">
    <div class="table-container">
        <?php
        $query = $pdo->query("SELECT * FROM $pagina WHERE igreja_cad = '$id_igreja' or igreja_item = '$id_igreja'
            order by id desc");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);
        if ($total_reg > 0) {
            ?>
            <table class="content-table" id="example">
                <thead class="thead-tabs">
                    <tr class="column-table">
                        <th class="th-table first_table" id="radius-foto">Foto</th>
                        <th class="th-table">Código</th>
                        <th class="th-table">Nome</th>
                        <th class="th-table">Cadastrado Por</th>
                        <th class="th-table">Data Cadastro</th>
                        <th class="th-table column-hidden">Pertence a</th>
                        <th class="th-table column-hidden">Ativo</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $codigo = $res[$i]['codigo'];
                        $descricao = $res[$i]['descricao'];
                        $valor = $res[$i]['valor'];
                        $usuario_cad = $res[$i]['usuario_cad'];
                        $foto = $res[$i]['foto'];
                        $igreja_cad = $res[$i]['igreja_cad'];
                        $data_cad = $res[$i]['data_cad'];
                        $obs = $res[$i]['obs'];
                        $igreja_item = $res[$i]['igreja_item'];
                        $usuario_emprestou = $res[$i]['usuario_emprestou'];
                        $data_emprestimo = $res[$i]['data_emprestimo'];
                        $ativo = $res[$i]['ativo'];
                        $entrada = $res[$i]['entrada'];
                        $doador = $res[$i]['doador'];
                        $id = $res[$i]['id'];


                        if ($igreja_cad == $id_igreja) {
                            $background_transferir = 'back_transferir_green';
                            $ocultar_devolucao = 'd-none';
                            $ocultar_transferir = '';
                            if ($igreja_item == $id_igreja) {
                                $classe_item = '';
                            } else {
                                $classe_item = 'text_item_r';
                            }
                        } else {
                            $background_transferir = 'back_transferir_red';
                            $ocultar_devolucao = '';
                            $ocultar_transferir = 'd-none';
                            $classe_item = 'text_item_emp';
                        }


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

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario_cad'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_usu_cad = $res_con[0]['nome'];
                        } else {
                            $nome_usu_cad = '';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario_emprestou'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_usu_emp = $res_con[0]['nome'];
                        } else {
                            $nome_usu_emp = 'Sem Empréstimo!';
                        }

                        $query_con = $pdo->query("SELECT * FROM igrejas where id = '$igreja_cad'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_ig_cad = $res_con[0]['nome'];
                        } else {
                            $nome_ig_cad = '';
                        }

                        $query_con = $pdo->query("SELECT * FROM igrejas where id = '$igreja_item'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_ig_item = $res_con[0]['nome'];
                        } else {
                            $nome_ig_item = '';
                        }



                        //Retira a quebra do texto das observações
                        $obs = str_replace(array("\n", "\r"), ' + ', $obs);

                        $data_cadF = implode('/', array_reverse(explode('-', $data_cad)));
                        $data_emprestimoF = implode('/', array_reverse(explode('-', $data_emprestimo)));
                        $valorF = number_format($valor, 2, ',', '.');
                        ?>
                        <tr class="column-body <?php echo $inativa ?> <?php echo $classe_item ?>">
                            <td data-label="Foto" class="td-table" id="radius-column-foto">
                                <img class="profile_table" src="../img/patrimonios/<?php echo $foto ?>" alt="Perfil"
                                    title="Perfil">
                            </td>
                            <td data-label="Código" class="td-table">
                                <?php echo $codigo ?>
                            </td>
                            <td data-label="Nome" class="td-table">
                                <?php echo $nome ?>
                            </td>
                            <td data-label="Nome Usuário Cadastrou" class="td-table">
                                <?php echo $nome_usu_cad ?>
                            </td>
                            <td data-label="Data de Cadastro" class="td-table column-hidden">
                                <?php echo $data_cadF ?>
                            </td>
                            <td data-label="Igreja" class="td-table column-hidden">
                                <?php echo $nome_ig_cad ?>
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
                                            '<?php echo $codigo ?>', '<?php echo $nome ?>', '<?php echo $descricao ?>', 
                                            '<?php echo $valor ?>', '<?php echo $foto ?>', '<?php echo $data_cad ?>', 
                                            '<?php echo $entrada ?>', '<?php echo $doador ?>')">
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
                                            <a class="dropdown-item" href="#" onclick="dados('<?php echo $codigo ?>', '<?php echo $nome ?>',
                                            '<?php echo $descricao ?>', '<?php echo $valor ?>', '<?php echo $foto ?>', '<?php echo $nome_usu_cad ?>', 
                                            '<?php echo $data_cadF ?>', '<?php echo $nome_ig_cad ?>', '<?php echo $nome_ig_item ?>', 
                                            '<?php echo $nome_usu_emp ?>', '<?php echo $data_emprestimoF ?>', '<?php echo $tab ?>',
                                            '<?php echo $obs ?>', '<?php echo $entrada ?>', '<?php echo $doador ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item <?php echo $classe_obs ?>" href="#" onclick="obs('<?php echo $id ?>', 
                                            '<?php echo $nome ?>', '<?php echo $obs ?>')">
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
                                            <a class="dropdown-item <?php echo $ocultar_transferir ?> <?php echo $background_transferir ?>"
                                                href="#" onclick="transferir('<?php echo $id ?>', '<?php echo $nome ?>')">
                                                <i class="bi bi-arrow-repeat icons_actions"></i>
                                                Transferir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item <?php echo $ocultar_devolucao ?> <?php echo $background_transferir ?>"
                                                href="#"
                                                onclick="devolver('<?php echo $id ?>', '<?php echo $nome ?>', '<?php echo $igreja_cad ?>')">
                                                <i class="bi bi-arrow-repeat icons_actions"></i>
                                                Devolver
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
                                    <div class="input-field flex_int">
                                        <label>Código</label>
                                        <input type="text" name="codigo" id="codigo" placeholder="Código do Item"
                                            required>
                                    </div>

                                    <div class="input-field">
                                        <label>Nome</label>
                                        <input type="text" name="nome" id="nome" placeholder="Insira o Nome" required>
                                    </div>

                                    <div class="input-field field_area_2">
                                        <label>Descrição Item</label>
                                        <input type="text" name="descricao" id="descricao"
                                            placeholder="Descrição do Item">
                                    </div>

                                    <div class="input-field flex_int">
                                        <label>Entrada (Compra / Doação)</label>
                                        <select name="entrada" id="entrada" class="form-select"
                                            aria-label="Default select example">
                                            <option value="Compra">Compra</option>
                                            <option value="Doação">Doação</option>
                                        </select>
                                    </div>

                                    <div class="input-field flex_int">
                                        <label>Valor</label>
                                        <input type="text" name="valor" id="valor"
                                            placeholder="Valor em caso de compra">
                                    </div>

                                    <div class="input-field flex_int">
                                        <label>Doador Por</label>
                                        <input type="text" name="doador" id="doador" placeholder="Nome do Doador">
                                    </div>

                                    <div class="input-field flex_int">
                                        <label>Data Cadastro</label>
                                        <input type="date" name="data_cad" id="data_cad"
                                            value="<?php echo date('Y-m-d') ?>" required>
                                    </div>

                                    <div class="area_photo_1">
                                        <div class="area_photo_flex">
                                            <label>Foto</label>
                                            <input type="file" class="input_file" id="imagem" name="imagem"
                                                onChange="carregarImg();">
                                        </div>
                                        <div class="divImg">
                                            <img class="photo_file" id="target" src="../img/patrimonios/sem-foto.jpg"
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
                <h3 class="Cadastro">Nome: <span id="nome-dados"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body scroll-modal">
                <div class="user_area">
                    <img src="../img/svg/bar-code.svg" class="img_icon_data" alt="">
                    <span class="user_name">codigo: </span>
                    <span class="texts_son" id="codigo-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/descrition.svg" class="img_icon_data" alt="">
                    <span class="user_name">Descrição:</span>
                    <span class="texts_son" id="descricao-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/dolar-simbolo.svg" class="img_icon_data" alt="">
                    <span class="user_name">Valor: </span>
                    R$ <span class="texts_son" id="valor-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Cadastrado Por: </span>
                    <span class="texts_son" id="usuario-cad-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Data de Cadastro: </span>
                    <span class="texts_son" id="data-cad-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/igreja.svg" class="img_icon_data" alt="">
                    <span class="user_name">Igreja Dona Item: </span>
                    <span class="texts_son" id="igreja-cad-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/igreja.svg" class="img_icon_data" alt="">
                    <span class="user_name">Igreja Possui Item: </span>
                    <span class="texts_son" id="igreja-item-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Emprestado Por: </span>
                    <span class="texts_son" id="usu-emp-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Data Empréstimo: </span>
                    <span class="texts_son" id="data-emp-dados"></span>
                </div>
                <div class="user_area">
                    <img src="<?php echo $img_status ?>" class="img_icon_data" alt="">
                    <span class="user_name">Status do Item: </span>
                    <span class="texts_son" id="ativo-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/indicador.svg" class="img_icon_data" alt="">
                    <span class="user_name">Compra / Doação: </span>
                    <span class="texts_son" id="entrada-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Doado Por: </span>
                    <span class="texts_son" id="doador-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/exclamation.svg" class="img_icon_data" alt="">
                    <span class="user_name">OBS: </span>
                    <span class="texts_son" id="obs-dados"></span>
                </div>
                <div class="user_profile_area">
                    <img class="img_info_profile" src="" id="foto-dados">
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
                        <label class="txt_label_obs">Observações (Máximo de 1000 Caracteres)</label>
                        <textarea class="txt-obs" name="obs" id="obs" maxlength="1000"></textarea>
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






<div class="modal fade" id="modalTransferir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Transferir - <span id="nome-transferir"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-transferir" method="post">
                <div class="modal-body">
                    <div class="input-field flex_select">
                        <label>Igreja</label>
                        <select class="sel2" id="igreja" name="igreja" requerid>
                            <?php
                            $query = $pdo->query("SELECT * FROM igrejas order by matriz desc, 
                                            nome asc");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            $total_reg = count($res);
                            if ($total_reg > 0) {
                                for ($i = 0; $i < $total_reg; $i++) {
                                    foreach ($res[$i] as $key => $value) {
                                    }

                                    $nome_reg = $res[$i]['nome'];
                                    $id_reg = $res[$i]['id'];

                                    if ($id_reg != $id_igreja) {
                                        ?>
                                        <option value="<?php echo $id_reg ?>" class="<?php echo $classe_ig ?>">
                                            <?php echo $nome_reg ?>
                                        </option>
                                    <?php }
                                }
                            } ?>
                        </select>
                    </div>

                    <div id="mensagem-transferir"></div>

                    <input type="hidden" name="id-transferir" id="id-transferir">

                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-transferir" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Transferir
                            <i class="bi bi-arrow-repeat icon-btn-form"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






<div class="modal fade" id="modalDevolver" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Devolver Item - <span id="nome-item"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-devolver" method="post">
                <div class="modal-body">
                    <div action="#" class="form-modal-auto">
                        <div class="form first">
                            <div class="details personal">

                                <span class="text_excluir">Deseja mesmo devolver este Item
                                    <span id="nome-devolver"></span>?

                                    <div id="mensagem-devolver"></div>

                                    <input type="hidden" name="id-transferir" id="id-devolver">
                                    <input type="hidden" name="igreja" id="id_ig">

                            </div>
                        </div>
                    </div>
                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-devolver" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-remove">
                            Devolver
                            <i class="bi bi-trash3 icon-btn-form"></i>
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
    function editar(id, codigo, nome, descricao, valor, foto, data_cad, entrada, doador) {
        $('#id').val(id);
        $('#nome').val(nome);
        $('#codigo').val(codigo);
        $('#descricao').val(descricao);
        $('#valor').val(valor);
        $('#data_cad').val(data_cad);
        $('#doador').val(doador);
        $('#entrada').val(entrada).change();

        $('#target').attr('src', '../img/patrimonios/' + foto);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(codigo, nome, descricao, valor, foto, usuario_cad, data_cad, igreja_cad, igreja_item, usuario_emp, data_emp, ativo,
        obs, entrada, doador) {

        if (data_emp === '00/00/0000') {
            data_emp = 'Sem Empréstimo!';
        }

        $('#nome-dados').text(nome);
        $('#descricao-dados').text(descricao);
        $('#codigo-dados').text(codigo);
        $('#valor-dados').text(valor);
        $('#usuario-cad-dados').text(usuario_cad);
        $('#data-cad-dados').text(data_cad);
        $('#igreja-cad-dados').text(igreja_cad);
        $('#igreja-item-dados').text(igreja_item);
        $('#usu-emp-dados').text(usuario_emp);
        $('#data-emp-dados').text(data_emp);
        $('#ativo-dados').text(ativo);
        $('#obs-dados').text(obs);
        $('#entrada-dados').text(entrada);
        $('#doador-dados').text(doador);
        $('#foto-dados').attr('src', '../img/patrimonios/' + foto);


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
        var data = "<?= $data_atual ?>"

        $('#id').val('');
        $('#nome').val('');
        $('#descricao').val('');
        $('#codigo').val('');
        $('#valor').val('');
        $('#doador').val('');
        $('#data_cad').val(data);

        document.getElementById("entrada").options.selectedIndex = 0;
        $('#entrada').val($('#entrada').val()).change();

        $('#target').attr('src', '../img/patrimonios/sem-foto.jpg');
    }


    function transferir(id, nome) {
        $('#id-transferir').val(id);
        $('#nome-transferir').text(nome);
        var myModal = new bootstrap.Modal(document.getElementById('modalTransferir'), {});
        myModal.show();
        $('#mensagem-transferir').text('');
        limpar();
    }


    function devolver(id, nome, igreja) {
        $('#id-devolver').val(id);
        $('#id_ig').val(igreja);
        $('#nome-devolver').text(nome);
        $('#nome-item').text(nome);
        var myModal = new bootstrap.Modal(document.getElementById('modalDevolver'), {});
        myModal.show();
        $('#mensagem-devolver').text('');
        limpar();
    }





    $("#form-transferir").submit(function () {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/transferir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#mensagem-transferir').text('');
                $('#mensagem-transferir').removeClass()
                if (mensagem.trim() == "Alterado com Sucesso") {
                    //$('#nome').val('');
                    //$('#cpf').val('');

                    $('#btn-fechar-transferir').click();
                    mensagemSalvar();
                    setTimeout(function () {
                        window.location = "index.php?pag=" + pag;
                    }, 1000);

                } else {

                    $('#mensagem-transferir').addClass('message_error')
                    $('#mensagem-transferir').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });





    $("#form-devolver").submit(function () {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/transferir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#mensagem-transferir').text('');
                $('#mensagem-transferir').removeClass()
                if (mensagem.trim() == "Alterado com Sucesso") {
                    //$('#nome').val('');
                    //$('#cpf').val('');

                    $('#btn-fechar-transferir').click();
                    mensagemSalvar();
                    setTimeout(function () {
                        window.location = "index.php?pag=" + pag;
                    }, 1000);

                } else {

                    $('#mensagem-transferir').addClass('message_error')
                    $('#mensagem-transferir').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });



</script>





<script type="text/javascript">
    $(document).ready(function () {
        $('.sel2').select2({
            dropdownParent: $('#modalTransferir'),
        });
    });
</script>