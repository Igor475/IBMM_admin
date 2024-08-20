<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'tarefas';

if(@$tarefas == 'ocultar') {
    echo "<script>$(function() { 
                     alertaTempo('Você não tem permissão para estar nesta página! Verifique com o seu Pastor.');
                });
          </script>"; 
    /* echo "<script>window.location='index.php'</script>"; */
    exit();
}
?>


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
                        <th class="th-table">Nome</th>
                        <th class="th-table">Email</th>
                        <th class="th-table column-hidden">Telefone</th>
                        <th class="th-table">Motivo da Oração</th>
                        <th class="th-table column-hidden">Hora</th>
                        <th class="th-table column-hidden">Data</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $data = $res[$i]['data'];
                        $hora = $res[$i]['hora'];
                        $descricao = $res[$i]['descricao'];
                        $email = $res[$i]['email'];
                        $telefone = $res[$i]['telefone'];
                        $igreja = $res[$i]['igreja'];
                        $id = $res[$i]['id'];

                        $dataF = implode('/', array_reverse(explode('-', $data)));

                        ?>
                        <tr class="column-body <?php echo $class_text ?>">
                            <td data-label="Título" class="td-table">
                                <i id="icons_tarefas" class="bi bi-exclamation-circle-fill <?php echo $class_icon ?>"></i>
                                <span class=""><?php echo $titulo ?></span>
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
                            <td data-label="Status" class="td-table">
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
                                            <a class="dropdown-item" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $titulo ?>',
                                            '<?php echo $descricao ?>', '<?php echo $data ?>', '<?php echo $hora ?>')">
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
                                <div class="input-field">
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






<script type="text/javascript">
    var pag = "<?= $pagina ?>" 
</script>
<script src="../js/ajax.js"></script>




<script type="text/javascript">
    function editar(id, titulo, descricao, data, hora) {
        $('#id').val(id);
        $('#titulo').val(titulo);
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
        $('#titulo').val('');
        $('#descricao').val('');
        $('#data').val(data);
        $('#hora').val('');
    }

</script>