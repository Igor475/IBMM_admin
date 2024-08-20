<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'oracao';

if (@$tarefas == 'ocultar') {
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
        $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' order by id desc");
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
                        $motivo_oracao = $res[$i]['motivo_oracao'];
                        $telefone = $res[$i]['telefone'];
                        $usuario = $res[$i]['usuario'];
                        $igreja = $res[$i]['igreja'];
                        $id = $res[$i]['id'];

                        $dataF = implode('/', array_reverse(explode('-', $data)));

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_usuario = $res_con[0]['nome'];
                        } else {
                            $nome_usuario = '';
                        }

                        $query_con = $pdo->query("SELECT * FROM categoria_oracao where id = '$motivo_oracao'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $categoria_oracao = $res_con[0]['nome'];
                        } else {
                            $categoria_oracao = '';
                        }

                        ?>
                        <tr class="column-body <?php echo $class_text ?>">
                            <td data-label="Nome" class="td-table column-hidden">
                                <?php echo $nome ?>
                            </td>
                            <td data-label="Status" class="td-table">
                                <?php echo $email ?>
                            </td>
                            <td data-label="Status" class="td-table">
                                <?php echo $telefone ?>
                            </td>
                            <td data-label="Status" class="td-table">
                                <?php echo $categoria_oracao ?>
                            </td>
                            <td data-label="Hora" class="td-table">
                                <?php echo $hora ?>
                            </td>
                            <td data-label="Data" class="td-table">
                                <?php echo $dataF ?>
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
                                            '<?php echo $email ?>', '<?php echo $telefone ?>', '<?php echo $motivo_oracao ?>', 
                                            '<?php echo $descricao ?>')">
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
                                            <a class="dropdown-item" href="#" onclick="dados('<?php echo $nome ?>', '<?php echo $email ?>', '<?php echo $telefone ?>', 
                                                '<?php echo $categoria_oracao ?>', '<?php echo $descricao ?>', '<?php echo $dataF ?>',
                                                '<?php echo $hora ?>', '<?php echo $nome_usuario ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>
                                        <!-- <li>
                                            <a class="dropdown-item" href="#" onclick="mudarStatus('<?php echo $id ?>', 
                                            '<?php echo $ativar ?>')" title="<?php echo $ativo ?>">
                                                <i class="bi <?php echo $icone ?> icons_actions <?php echo $classe ?>"></i>
                                                <?php echo $ativo ?>
                                            </a>
                                        </li> -->
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
                                    <label>Nome</label>
                                    <input type="text" name="nome" id="nome">
                                </div>

                                <div class="input-field flex_int_1">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email">
                                </div>

                                <div class="input-field flex_int">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" id="telefone">
                                </div>

                                <div class="input-field flex_int_3">
                                    <label>Motivo da Oração</label>
                                    <select class="sel2" id="motivo_oracao" name="motivo_oracao">
                                        <?php
                                        $query = $pdo->query("SELECT * FROM categoria_oracao order by id asc");
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

                                <div class="input-field flex_int_3">
                                    <label>Descrição</label>
                                    <input type="text" name="descricao" id="descricao">
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







<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Pedido de oração de: <span id="nome-dados"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body scroll-modal">
                <div class="user_area">
                    <img src="../img/svg/email.svg" class="img_icon_data" alt="">
                    <span class="user_name">Email:</span>
                    <span class="texts_son" id="email-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/telefone.svg" class="img_icon_data" alt="">
                    <span class="user_name">Telefone:</span>
                    <span class="texts_son" id="telefone-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Motivo:</span>
                    <span class="texts_son" id="motivo-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/descrition.svg" class="img_icon_data" alt="">
                    <span class="user_name">Descrição: </span>
                    <span class="texts_son" id="descricao-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/time.svg" class="img_icon_data" alt="">
                    <span class="user_name">Hora:</span>
                    <span class="texts_son" id="hora-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Data da Oração:</span>
                    <span class="texts_son" id="data-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Usuário Baixa: </span>
                    <span class="texts_son" id="usuario-dados"></span>
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
    function editar(id, nome, email, telefone, motivo_oracao, descricao) {
        $('#id').val(id);
        $('#nome').val(nome);
        $('#email').val(email);
        $('#telefone').val(telefone);
        $('#motivo_oracao').val(motivo_oracao).change();
        $('#descricao').val(descricao);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(nome, email, telefone, categoria_oracao, descricao, data, hora, nome_usuario) {

        $('#nome-dados').text(nome);
        $('#email-dados').text(email);
        $('#telefone-dados').text(telefone);
        $('#motivo-dados').text(categoria_oracao);
        $('#descricao-dados').text(descricao);
        $('#hora-dados').text(hora);
        $('#data-dados').text(data);
        $('#usuario-dados').text(nome_usuario);


        var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function limpar() {
        var data = "<?= $data_atual ?>"

        $('#id').val('');
        $('#nome').val('');
        $('#email').val('');
        $('#telefone').val('');
        $('#descricao').val('');
        $('#motivo_oracao').val('').change();
        $('#data').val(data);
        $('#hora').val('');
    }

</script>