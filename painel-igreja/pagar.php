<?php
require_once("../conexao.php");
$pagina = 'pagar';
?>

<div class="buttons_register">
    <a href="#" onclick="inserir()" class="button_tables_register">
        Nova Conta
        <i class="bi bi-plus-lg icon_tables_registers"></i>
    </a>
</div>


<div class="tabs">
    <div class="table-container">
        <?php
        $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' order by pago asc,
            vencimento asc");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);
        if ($total_reg > 0) {
            ?>
            <table class="content-table" id="example">
                <thead class="thead-tabs">
                    <tr class="column-table">
                        <th class="th-table first_table" id="radius-foto">Arquivo</th>
                        <th class="th-table">Descrição</th>
                        <th class="th-table column-hidden">Fornecedor</th>
                        <th class="th-table">Valor</th>
                        <th class="th-table">Vencimento</th>
                        <th class="th-table column-hidden">Frequência</th>
                        <th class="th-table column-hidden" id="radius-action">Pago</th>
                        <th class="th-table last_table">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $descricao = $res[$i]['descricao'];
                        $fornecedor = $res[$i]['fornecedor'];
                        $valor = $res[$i]['valor'];
                        $vencimento = $res[$i]['vencimento'];
                        $frequencia = $res[$i]['frequencia'];
                        $arquivo = $res[$i]['arquivo'];
                        $pago = $res[$i]['pago'];

                        $usuario_cad = $res[$i]['usuario_cad'];
                        $usuario_baixa = $res[$i]['usuario_baixa'];
                        $data_baixa = $res[$i]['data_baixa'];
                        $data = $res[$i]['data'];
                        $igreja = $res[$i]['igreja'];

                        $id = $res[$i]['id'];


                        if ($pago == 'Sim') {
                            $classe = 'text_active';
                            /* $ativo = 'Desativar Membro';
                            $icone = 'bi-toggle-on';
                            $ativar = 'Não';
                            $inativa = '';
                            $tab = 'Ativo'; */
                        } else {
                            $classe = 'text_desactive';
                            /* $ativo = 'Ativar Membro';
                            $icone = 'bi-toggle-off';
                            $ativar = 'Sim';
                            $inativa = 'text_opacity';
                            $tab = 'Inativo'; */
                        }


                        $query_con = $pdo->query("SELECT * FROM fornecedores where id = '$fornecedor'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_for = $res_con[0]['nome'];
                        } else {
                            $nome_for = 'Sem Fornecedor!';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario_cad'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $usuario_cad = $res_con[0]['nome'];
                        } else {
                            $usuario_cad = '';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario_baixa'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $usuario_baixa = $res_con[0]['nome'];
                        } else {
                            $usuario_baixa = '';
                        }

                        $valorF = number_format($valor, 2, ',', '.');
                        $dataF = implode('/', array_reverse(explode('-', $data)));
                        $data_baixaF = implode('/', array_reverse(explode('-', $data_baixa)));
                        $vencimentoF = implode('/', array_reverse(explode('-', $vencimento)));
                        ?>
                        <tr class="column-body">
                            <td data-label="Foto" class="td-table" id="radius-column-foto">
                                <img class="profile_table" src="../img/contas/<?php echo $arquivo ?>" alt="Arquivo" title="Arquivo">
                            </td>
                            <td data-label="Descrição" class="td-table">
                                <?php echo $descricao ?>
                            </td>
                            <td data-label="Fornecedor" class="td-table column-hidden">
                                <?php echo $nome_for ?>
                            </td>
                            <td data-label="Valor" class="td-table">
                                R$ <?php echo $valorF ?>
                            </td>
                            <td data-label="Vencimento" class="td-table">
                                <?php echo $vencimentoF ?>
                            </td>
                            <td data-label="Frequência" class="td-table column-hidden">
                                <?php echo $frequencia ?>
                            </td>
                            <td data-label="Pago" class="td-table column-hidden">
                                <?php echo $pago ?>
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
                                            '<?php echo $descricao ?>', '<?php echo $fornecedor ?>', '<?php echo $valor ?>', 
                                            '<?php echo $vencimento ?>', '<?php echo $frequencia ?>', '<?php echo $arquivo ?>')">
                                                <i class="bi bi-pencil-square icons_actions"></i>
                                                Editar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="excluir('<?php echo $id ?>', '<?php echo $descricao ?>')">
                                                <i class="bi bi-trash3 icons_actions"></i>
                                                Excluir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="dados('<?php echo $descricao ?>', 
                                            '<?php echo $nome_for ?>', '<?php echo $valorF ?>', '<?php echo $dataF ?>', 
                                            '<?php echo $vencimentoF ?>', '<?php echo $usuario_cad ?>', '<?php echo $usuario_baixa?>', 
                                            '<?php echo $data_baixaF ?>', '<?php echo $frequencia ?>', '<?php echo $pago ?>', 
                                            '<?php echo $arquivo ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="baixa('<?php echo $id ?>', 
                                            '<?php echo $descricao ?>')" title="Dar baixa na Conta">
                                                <i class="bi bi-receipt icons_actions icon_bill"></i>
                                                Dar baixa
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
                                    <div class="input-field flex_int_6">
                                        <label>Descrição</label>
                                        <input type="text" name="descricao" id="descricao" placeholder="Insira a Descrição" required>
                                    </div>

                                    <div class="input-field field_cpf_1">
                                        <label>Fornecedor</label>
                                        <select class="sel2" id="fornecedor" name="fornecedor">
                                            <option value="0">Selecionar Fornecedor</option>
                                            <?php
                                            $query = $pdo->query("SELECT * FROM fornecedores order by id asc");
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

                                    <div class="input-field">
                                        <label>Valor</label>
                                        <input type="text" name="valor" id="valor" placeholder="Insira o Valor"
                                            required>
                                    </div>

                                    <div class="input-field flex_int_2">
                                        <label>Vencimento</label>
                                        <input type="date" name="vencimento" id="vencimento" 
                                            value="<?php echo $data_atual ?>" required>
                                    </div>

                                    <div class="input-field flex_int_4">
                                        <label>Frequência</label>
                                        <select class="sel2" id="frequencia" name="frequencia">
                                            <option value="0">Uma vez</option>
                                            <option value="1">Diária</option>
                                            <option value="2">Semanal</option>
                                            <option value="3">Mensal</option>
                                        </select>
                                    </div>

                                    <div class="area_photo_1">
                                        <div class="area_photo_flex">
                                            <label>Arquivo</label>
                                            <input type="file" class="input_file" id="imagem" name="imagem"
                                                onChange="carregarImg();">
                                        </div>
                                        <div class="divImg">
                                            <img class="photo_file_archives" id="target" src="../img/contas/sem-foto.jpg"
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
                <h3 class="Cadastro">Descrição: <span id="descricao-dados"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body scroll-modal">
                <div class="user_area">
                    <img src="../img/svg/cpf.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-person-vcard icon_user"></i> -->
                    <span class="user_name">Fornecedor: </span>
                    <span class="texts_son" id="fornecedor-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/email.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-envelope-at icon_user"></i> -->
                    <span class="user_name">Valor:</span>
                    <span class="texts_son" id="valor-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/telefone.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-phone icon_user"></i> -->
                    <span class="user_name">Data Cadastro: </span>
                    <span class="texts_son" id="data-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/map_endereco.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-geo-alt icon_user"></i> -->
                    <span class="user_name">Vencimento: </span>
                    <span class="texts_son" id="vencimento-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Usuário Cadastro: </span>
                    <span class="texts_son" id="usu-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Usuário Baixa: </span>
                    <span class="texts_son" id="usu-baixa-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/igreja.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Data Baixa: </span>
                    <span class="texts_son" id="data-baixa-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Frequência: </span>
                    <span class="texts_son" id="frequencia-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/indicador.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Pago: </span>
                    <span class="texts_son" id="pago-dados"></span>
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
    function editar(id, descricao, fornecedor, valor, vencimento, frequencia, foto) {
        $('#id').val(id);
        $('#descricao').val(descricao);
        $('#valor').val(valor);
        $('#vencimento').val(vencimento);

        $('#target').attr('src', '../img/conta/' + foto);

        $('#fornecedor').val(fornecedor).change();
        $('#frequencia').val(frequencia).change();

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(descricao, nome_for, valor, data, vencimento, usuario_cad, usuario_baixa, data_baixa, frequencia, pago, arquivo) {

        if (data_baixa === '00/00/0000') {
            data_baixa = 'Pendente';
        }

        $('#descricao-dados').text(descricao);
        $('#fornecedor-dados').text(nome_for);
        $('#valor-dados').text(valor);
        $('#data-dados').text(data);
        $('#vencimento-dados').text(vencimento);
        $('#usu-dados').text(usuario_cad);
        $('#usu-baixa-dados').text(usuario_baixa);
        $('#data-baixa-dados').text(data_baixa);
        $('#frequencia-dados').text(frequencia);
        $('#pago-dados').text(pago);
        $('#foto-dados').attr('src', '../img/contas/' + arquivo);


        var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function limpar() {
        var data_at = "<?= $data_atual ?>"

        console.log(data_at)
        
        $('#id').val('');
        $('#descricao').val('');
        $('#valor').val('');
        $('#vencimento').val(data_at);

        document.getElementById("fornecedor").options.selectedIndex = 0;
        $('#fornecedor').val($('#fornecedor').val()).change();

        document.getElementById("frequencia").options.selectedIndex = 0;
        $('#frequencia').val($('#frequencia').val()).change();

        $('#target').attr('src', '../img/contas/sem-foto.jpg');
    }

</script>