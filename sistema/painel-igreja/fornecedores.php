<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'fornecedores';


if(@$fornecedores == 'ocultar') {
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
        Novo Fornecedor
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
                        <th class="th-table" id="radius-foto">Nome</th>
                        <th class="th-table">Email</th>
                        <th class="th-table column-hidden">Telefone</th>
                        <th class="th-table column-hidden">Produto</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $email = $res[$i]['email'];
                        $telefone = $res[$i]['telefone'];
                        $endereco = $res[$i]['endereco'];
                        $produto = $res[$i]['produto'];
                        $id = $res[$i]['id'];
                        ?>
                        <tr class="column-body">
                            <td data-label="Nome" class="td-table" id="radius-column-foto">
                                <?php echo $nome ?>
                            </td>
                            <td data-label="Email" class="td-table">
                                <?php echo $email ?>
                            </td>
                            <td data-label="Telefone" class="td-table column-hidden">
                                <?php echo $telefone ?>
                            </td>
                            <td data-label="Telefone" class="td-table column-hidden">
                                <?php echo $produto ?>
                            </td>
                            <td class="td-table" id="radius-column-action">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Opções
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="editar('<?php echo $id ?>', '<?php echo $nome ?>', '<?php echo $email ?>',
                                                '<?php echo $telefone ?>', '<?php echo $endereco ?>', '<?php echo $produto ?>')">
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
                                                onclick="dados('<?php echo $nome ?>', '<?php echo $email ?>', 
                                                '<?php echo $telefone ?>', '<?php echo $endereco ?>', '<?php echo $produto ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
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

                                    <div class="input-field">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" placeholder="Insira o Email">
                                    </div>

                                    <div class="input-field field_area_1">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" id="telefone" placeholder="Insira o Telefone">
                                    </div>

                                    <div class="input-field">
                                        <label>Produto / Serviço</label>
                                        <input type="text" name="produto" id="produto"
                                            placeholder="Tipo de Produto / Serviço Fornecido">
                                    </div>

                                    <div class="input-field">
                                        <label>Endereço</label>
                                        <input type="text" name="endereco" id="endereco"
                                            placeholder="Insira o Endereço">
                                    </div>

                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="id_igreja" id="id_igreja"
                                        value="<?php echo $id_igreja ?>">

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
                    <img src="../img/svg/email.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-envelope-at icon_user"></i> -->
                    <span class="user_name">Email:</span>
                    <span class="texts_son" id="email-dados"></span>
                </div>
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
                    <img src="../img/svg/indicador.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-person-vcard icon_user"></i> -->
                    <span class="user_name">Produto / Serviço: </span>
                    <span class="texts_son" id="produto-dados"></span>
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
    function editar(id, nome, email, telefone, endereco, produto) {
        $('#id').val(id);
        $('#nome').val(nome);
        $('#email').val(email);
        $('#telefone').val(telefone);
        $('#endereco').val(endereco);
        $('#produto').val(produto);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(nome, email, telefone, endereco, produto) {
        $('#nome-dados').text(nome);
        $('#email-dados').text(email);
        $('#telefone-dados').text(telefone);
        $('#endereco-dados').text(endereco);
        $('#produto-dados').text(produto);

        var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function limpar() {
        $('#id').val('');
        $('#nome').val('');
        $('#email').val('');
        $('#produto').val('');
        $('#telefone').val('');
        $('#endereco').val('');
    }

</script>