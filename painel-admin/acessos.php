<?php
@session_start();
require_once ("verificar.php");
require_once ("../conexao.php");
$pagina = 'acessos';

//verificar se ele tem a permissão de estar nessa página
if (@$acessos == 'ocultar') {
    echo "<script>window.location='../index.php'</script>";
    exit();
}

?>

<div class="buttons_register">
    <a href="#" onclick="inserir()" class="button_tables_register">
        Novo Acesso
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
                        <th class="th-table first_table" id="radius-foto">Nome</th>
                        <th class="th-table">Chave</th>
                        <th class="th-table">Grupo</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }
                        $id = $res[$i]['id'];
                        $nome = $res[$i]['nome'];
                        $chave = $res[$i]['chave'];
                        $grupo = $res[$i]['grupo'];


                        $query2 = $pdo->query("SELECT * FROM grupo_acessos where id = '$grupo'");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        $total_reg2 = @count($res2);
                        if ($total_reg2 > 0) {
                            $nome_cat = $res2[0]['nome'];
                        } else {
                            $nome_cat = 'Nenhum!';
                        }
                        ?>
                        <tr class="column-body">
                            <td data-label="Nome" class="td-table" id="radius-column-foto">
                                <?php echo $nome ?>
                            </td>
                            <td data-label="Nome" class="td-table" id="radius-column-foto">
                                <?php echo $chave ?>
                            </td>
                            <td data-label="Nome" class="td-table" id="radius-column-foto">
                                <?php echo $nome_cat ?>
                            </td>
                            <td class="td-table" id="radius-column-action">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Opções
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $nome ?>', '<?php echo $chave ?>',
                                                    '<?php echo $grupo ?>')">
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
                    <div action="#" class="form-modal-auto">
                        <div class="form first">
                            <div class="fields">
                                <div class="input-field flex_int_7">
                                    <label>Nome</label>
                                    <input type="text" name="nome" id="nome" placeholder="Nome" required>
                                </div>

                                <div class="input-field">
                                    <label>Chave</label>
                                    <input type="text" name="chave" id="chave" placeholder="Chave">
                                </div>

                                <div class="input-field">
                                    <label>Grupo</label>
                                    <select class="sel2" id="grupo" name="grupo">

                                        <option value="0">Nenhum Grupo</option>
                                        <?php
                                        $query = $pdo->query("SELECT * FROM grupo_acessos ORDER BY id asc");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        $total_reg = @count($res);
                                        if ($total_reg > 0) {
                                            for ($i = 0; $i < $total_reg; $i++) {
                                                foreach ($res[$i] as $key => $value) {
                                                }
                                                echo '<option value="' . $res[$i]['id'] . '">' . $res[$i]['nome'] . '</option>';
                                            }
                                        }
                                        ?>
                                </div>

                                <input type="hidden" name="id" id="id">

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
    function editar(id, nome, chave, grupo) {
        $('#id').val(id);
        $('#nome').val(nome);
        $('#chave').val(chave);
        $('#grupo').val(grupo).change();

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function limpar() {
        $('#id').val('');
        $('#nome').val('');
        $('#chave').val('');
    }

</script>