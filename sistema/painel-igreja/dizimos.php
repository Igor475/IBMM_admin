<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'dizimos';


if(@$dizimos == 'ocultar') {
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
        Novo Dízimo
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
                        <th class="th-table">Valor</th>
                        <th class="th-table">Membro</th>
                        <th class="th-table">Data</th>
                        <th class="th-table column-hidden">Tesoureiro / Pastor</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $valor = $res[$i]['valor'];
                        $data = $res[$i]['data'];
                        $membro = $res[$i]['membro'];
                        $usuario = $res[$i]['usuario'];

                        $id = $res[$i]['id'];

                        $dataF = implode('/', array_reverse(explode('-', $data)));
                        $valorF = number_format($valor, 2, ',', '.');

                        $query_con = $pdo->query("SELECT * FROM membros where id = '$membro'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_membro = $res_con[0]['nome'];
                        } else {
                            $nome_membro = 'Não Informado!';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $usuario_cad = $res_con[0]['nome'];
                            $nivel_usuario = $res_con[0]['nivel'];
                        } else {
                            $usuario_cad = '';
                            $nivel_usuario = '';
                        }

                        ?>
                        <tr class="column-body">
                            <td data-label="Valor" class="td-table">
                                R$ <?php echo $valorF ?></span>
                            </td>
                            <td data-label="Membro" class="td-table">
                                <?php echo $nome_membro ?>
                            </td>
                            <td data-label="Data" class="td-table">
                                <?php echo $dataF ?>
                            </td>
                            <td data-label="usuario" class="td-table column-hidden">
                                <?php echo $usuario_cad.' ('.$nivel_usuario.') ' ?>
                            </td>
                            <td class="td-table" id="radius-column-action">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Opções
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $membro ?>',
                                            '<?php echo $valor ?>', '<?php echo $data ?>', '<?php echo $usuario ?>')">
                                                <i class="bi bi-pencil-square icons_actions"></i>
                                                Editar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="excluir('<?php echo $id ?>', '<?php echo $valor ?>')">
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
                    <div action="#" class="form-modal">
                        <div class="form first">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Valor</label>
                                    <input type="text" name="valor" id="valor"
                                        placeholder="Valor do Dízimo" required>
                                </div>

                                <div class="input-field">
                                    <label>Data</label>
                                    <input type="date" name="data" id="data" required>
                                </div>

                                <div class="input-field">
                                        <label>Membro</label>
                                        <select class="sel2" id="membro" name="membro">
                                            <option value="0">Selecionar Membro</option>
                                            <?php
                                            $query = $pdo->query("SELECT * FROM membros order by id asc");
                                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                            $total_reg = count($res);
                                            if ($total_reg > 0) {
                                                for ($i = 0; $i < $total_reg; $i++) {
                                                    foreach ($res[$i] as $key => $value) {
                                                    }

                                                    $nome_reg = $res[$i]['nome'];
                                                    $cargo = $res[$i]['cargo'];
                                                    $id_reg = $res[$i]['id'];

                                                    $query_con = $pdo->query("SELECT * FROM cargos where id = '$cargo'");
                                                    $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                                                    $nome_cargo = $res_con[0]['nome'];

                                                    ?>
                                                    <option value="<?php echo $id_reg ?>">
                                                        <?php echo $nome_reg. ' ('.$nome_cargo.') ' ?>
                                                    </option>
                                                <?php }
                                            } ?>
                                        </select>
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
                                    R$ <span id="nome-excluido"></span>?

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
    function editar(id, membro, valor, data) {
        $('#id').val(id);
        $('#membro').val(membro).change();
        $('#valor').val(valor);
        $('#data').val(data);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function limpar() {
        var data = "<?= $data_atual ?>"

        $('#id').val('');
        $('#data').val(data);
        $('#valor').val('');

        document.getElementById("membro").options.selectedIndex = 0;
        $('#membro').val($('#membro').val()).change();


    }

</script>