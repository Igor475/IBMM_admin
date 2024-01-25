<?php
require_once("../conexao.php");
$pagina = 'usuarios';
?>


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
                        <th class="th-table">Nome</th>
                        <th class="th-table">Cpf</th>
                        <th class="th-table">Email</th>
                        <th class="th-table">Senha</th>
                        <th class="th-table column-hidden">Nível</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $cpf = $res[$i]['cpf'];
                        $email = $res[$i]['email'];
                        $senha = $res[$i]['senha'];
                        $foto = $res[$i]['foto'];
                        $igreja = $res[$i]['igreja'];
                        $nivel = $res[$i]['nivel'];
                        $id = $res[$i]['id'];

                        $query_con = $pdo->query("SELECT * FROM igrejas where id = '$igreja'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_ig = $res_con[0]['nome'];
                        } else {
                            $nome_ig = $nome_igreja_sistema;
                        }

                        ?>
                        <tr class="column-body">
                            <td data-label="Foto" class="td-table" id="radius-column-foto">
                                <img class="profile_table" src="../img/membros/<?php echo $foto ?>" alt="Perfil" title="Perfil">
                            </td>
                            <td data-label="Nome" class="td-table">
                                <?php echo $nome ?>
                            </td>
                            <td data-label="CPF" class="td-table">
                                <?php echo $cpf ?>
                            </td>
                            <td data-label="Email" class="td-table">
                                <?php echo $email ?>
                            </td>
                            <td data-label="Telefone" class="td-table column-hidden">
                                <?php echo $senha ?>
                            </td>
                            <td data-label="Telefone" class="td-table column-hidden">
                                <?php echo $nivel ?>
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
                                            '<?php echo $nome ?>', '<?php echo $senha ?>',)">
                                                <i class="bi bi-pencil-square icons_actions"></i>
                                                Editar</a>
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
                            <div class="details personal">
                                <div class="fields">
                                    <div class="input-field">
                                        <label>Senha</label>
                                        <input type="text" name="senha" id="senha" placeholder="Insira a Senha" required>
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




<script type="text/javascript">
    var pag = "<?= $pagina ?>" 
</script>
<script src="../js/ajax.js"></script>




<script type="text/javascript">
    function editar(id, nome, senha) {
        $('#id').val(id);
        $('#senha').val(senha);

        $('#tituloModal').text('Editar Senha');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }

</script>