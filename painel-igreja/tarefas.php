<?php
require_once("../conexao.php");
$pagina = 'tarefas';
?>

<div class="buttons_register">
    <a href="#" onclick="inserir()" class="button_tables_register">
        Nova Tarefa
        <i class="bi bi-plus-lg icon_tables_registers"></i>
    </a>
</div>


<div class="tabs">
    <div class="table-container">
        <?php
        $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' order by status asc, 
        data asc, hora asc");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);
        if ($total_reg > 0) {
            ?>
            <table class="content-table" id="example">
                <thead class="thead-tabs">
                    <tr class="column-table">
                        <th class="th-table">Título</th>
                        <th class="th-table column-hidden">Descrição</th>
                        <th class="th-table">Hora</th>
                        <th class="th-table">Data</th>
                        <th class="th-table column-hidden">Status</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $titulo = $res[$i]['titulo'];
                        $data = $res[$i]['data'];
                        $hora = $res[$i]['hora'];
                        $descricao = $res[$i]['descricao'];
                        $status = $res[$i]['status'];
                        $igreja = $res[$i]['igreja'];
                        $id = $res[$i]['id'];

                        $dataF = implode('/', array_reverse(explode('-', $data)));

                        if ($status == 'Concluída') {
                            $classe = 'text_active';
                            $ativo = 'Reagendar Tarefa';
                            $icone = 'bi-toggle-on';
                            $ativar = 'Agendada';
                            $inativa = '';
                        } else {
                            $classe = 'text_desactive';
                            $ativo = 'Concluir Tarefa';
                            $icone = 'bi-toggle-off';
                            $ativar = 'Concluída';
                            $inativa = 'text_opacity';
                        }

                        ?>
                        <tr class="column-body">
                            <td data-label="Título" class="td-table">
                                <i id="icons_tarefas" class="bi bi-circle-fill <?php echo $classe ?> column-hidden"></i>
                                <?php echo $titulo ?>
                            </td>
                            <td data-label="Nome" class="td-table column-hidden">
                                <?php echo $descricao ?>
                            </td>
                            <td data-label="Data" class="td-table">
                                <?php echo $dataF ?>
                            </td>
                            <td data-label="Hora" class="td-table">
                                <?php echo $hora ?>
                            </td>
                            <td data-label="Nome" class="td-table column-hidden">
                                <?php echo $status ?>
                            </td>
                            <td class="td-table" id="radius-column-action">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Opções
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $descricao ?>', 
                                                '<?php echo $data ?>', '<?php echo $hora ?>')">
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
                            <div class="fields">
                                <div class="input-field flex_int_1">
                                    <label>Título (Max 25 Caracteres)</label>
                                    <input type="text" maxlength="25" name="titulo" id="titulo"
                                        placeholder="Título da Tarefa" required>
                                </div>

                                <div class="input-field flex_int_1">
                                    <label>Descricao</label>
                                    <input type="text" maxlength="50" name="descricao" id="descricao"
                                        placeholder="Insira a Descrição">
                                </div>

                                <div class="input-field flex_int_2">
                                    <label>Data</label>
                                    <input type="date" name="data" id="data" value="<?php echo $data_atual ?>">
                                </div>

                                <div class="input-field flex_int">
                                    <label>Hora</label>
                                    <input type="time" name="hora" id="hora" required>
                                </div>

                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="igreja" id="igreja" value="<?php echo $id_igreja ?>">

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
                    <div action="#" class="form-modal-excluir">
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






<script type="text/javascript">
    var pag = "<?= $pagina ?>" 
</script>
<script src="../js/ajax.js"></script>




<script type="text/javascript">
    function editar(id, descricao, data, hora) {
        $('#id').val(id);
        $('#descricao').val(descricao);
        $('#data').val(data);
        $('#hora').val(hora);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function limpar() {
        var data = "<?= $data_atual ?>"

        $('#id').val('');
        $('#descricao').val('');
        $('#data').val(data);
        $('#hora').val('');
    }

</script>