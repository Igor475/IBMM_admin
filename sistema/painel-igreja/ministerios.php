<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'ministerios';
$id_usuario = @$_SESSION['id_usuario'];



if (@$celulas == 'ocultar') {
    echo "<script>$(function() { 
                     alertaTempo('Você não tem permissão para estar nesta página! Verifique com o seu Pastor.');
                });
          </script>";
    /* echo "<script>window.location='index.php'</script>"; */
    exit();
}

$query_con = $pdo->query("SELECT * FROM $pagina where igreja = '$id_igreja' order by id desc");
$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
@$lider1 = $res[0]['lider1'];

if ($id_pessoa == $lider1) {
    $none = 'ocultar';
} elseif ($nivel_usu == 'secretario' || $nivel_usu == 'Pastor Presidente' || $nivel_usu == 'pastor') {
    $none = '';
} else {
    $none = 'ocultar';
}

?>

<?php if ($id_pessoa == $lider1) { ?>

<?php } elseif ($nivel_usu == 'secretario' || $nivel_usu == 'Pastor Presidente' || $nivel_usu == 'pastor') { ?>
    <div class="buttons_register">
        <a href="#" onclick="inserir()" class="button_tables_register">
            Novo Ministério
            <i class="bi bi-plus-lg icon_tables_registers"></i>
        </a>
    </div>
<?php } else { ?>

<?php } ?>


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
                        <th class="th-table">Dias</th>
                        <th class="th-table">Horário</th>
                        <th class="th-table">Pastor Responsável</th>
                        <th class="th-table">1º Líder</th>
                        <th class="th-table column-hidden">2º Líder</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $nome = $res[$i]['nome'];
                        $dias = $res[$i]['dias'];
                        $hora = $res[$i]['hora'];
                        $pastor = $res[$i]['pastor'];
                        $lider1 = $res[$i]['lider1'];
                        $lider2 = $res[$i]['lider2'];
                        $obs = $res[$i]['obs'];
                        $igreja = $res[$i]['igreja'];
                        $id = $res[$i]['id'];

                        //Totalizando os Membros
                        $query2 = $pdo->query("SELECT * FROM ministerios_membros WHERE igreja = '$id_igreja' 
                            and ministerio = '$id'");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        $membros_celula = count($res2);


                        if ($obs != "") {
                            $classe_obs = "text_obs_cels";
                        } else {
                            $classe_obs = "";
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$pastor'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_pastor = $res_con[0]['nome'];
                        } else {
                            $nome_pastor = 'Nenhum!';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$lider1'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $id_user_lider = $res_con[0]['id'];
                            $nome_lider1 = $res_con[0]['nome'];
                        } else {
                            $nome_lider1 = 'Nenhum!';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$lider2'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_lider2 = $res_con[0]['nome'];
                        } else {
                            $nome_lider2 = 'Nenhum!';
                        }

                        $query2 = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' and lider1 = '$id_usuario'");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        @$lider_celula = $res2[0]['lider1'];

                        echo $lider_celula;
                        echo $id_usuario;

                        ?>

                        <?php if ($id_usuario == $lider1 || $nivel_usu == 'Pastor Presidente' || $user_cel == $id_pessoa) { ?>
                            <tr class="column-body">
                                <td data-label="Nome" class="td-table">
                                    <span class="">
                                        <?php echo $nome ?>
                                    </span>
                                </td>
                                <td data-label="Dia" class="td-table column-hidden">
                                    <?php echo $dias ?>
                                </td>
                                <td data-label="Hora" class="td-table">
                                    <?php echo $hora ?>
                                </td>
                                <td data-label="Pastor" class="td-table">
                                    <?php echo $nome_pastor ?>
                                </td>
                                <td data-label="1º Líder" class="td-table">
                                    <?php echo $nome_lider1 ?>
                                </td>
                                <td data-label="2º Líder" class="td-table">
                                    <?php echo $nome_lider2 ?>
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
                                                '<?php echo $dias ?>', '<?php echo $hora ?>', '<?php echo $pastor ?>',
                                                 '<?php echo $lider1 ?>', '<?php echo $lider2 ?>')">
                                                    <i class="bi bi-pencil-square icons_actions"></i>
                                                    Editar</a>
                                            </li>
                                            <?php if ($id_pessoa == $lider1) { ?>

                                            <?php } elseif (
                                                $nivel_usu == 'secretario' || $nivel_usu == 'Pastor Presidente'
                                                || $nivel_usu == 'pastor'
                                            ) { ?>
                                                <li>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="excluir('<?php echo $id ?>', '<?php echo $nome ?>')">
                                                        <i class="bi bi-trash3 icons_actions"></i>
                                                        Excluir
                                                    </a>
                                                </li>
                                            <?php } ?>
                                            <li>
                                                <a class="dropdown-item" href="#" onclick="dados('<?php echo $nome ?>', '<?php echo $dias ?>',
                                                '<?php echo $hora ?>', '<?php echo $nome_pastor ?>', '<?php echo $nome_lider1 ?>', 
                                                '<?php echo $nome_lider2 ?>', '<?php echo $obs ?>', '<?php echo $membros_celula ?>')">
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
                                                <a class="dropdown-item" href="#"
                                                    onclick="addMembros('<?php echo $id ?>', '<?php echo $nome ?>', '<?php echo $igreja ?>')">
                                                    <i class="bi bi-plus-square icons_actions"></i>
                                                    Adicionar Membros
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php } else { ?>

                        <?php } ?>
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
                                    <input type="text" name="nome" id="nome" placeholder="Nome do Ministério" required>
                                </div>

                                <div class="input-field flex_int_3">
                                    <label>Dias</label>
                                    <input type="text" name="dias" id="dias" placeholder="Segunda-Feira">
                                </div>

                                <div class="input-field flex_int_2">
                                    <label>Horário</label>
                                    <input type="text" name="hora" id="hora" placeholder="Das 18:00 às 20:00">
                                </div>

                                <?php if ($lider_celula == $id_usuario) { ?>
                                    <input type="hidden" id="pastor" name="pastor">
                                    <input type="hidden" id="lider1" name="lider1">
                                <?php } elseif (
                                    $nivel_usu == 'secretario' || $nivel_usu == 'Pastor Presidente'
                                    || $nivel_usu == 'pastor'
                                ) { ?>
                                    <div class="input-field" id="hidden_select1">
                                        <label>Pastor</label>
                                        <select class="sel21" id="pastor" name="pastor">
                                            <option value="0">Selecione um Pastor</option>
                                            <?php
                                            $query = $pdo->query("SELECT * FROM usuarios WHERE igreja = '$id_igreja' order by nome asc");
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

                                    <div class="input-field" id="hidden_select3">
                                        <label>1º Líder</label>
                                        <select class="sel2" id="lider1" name="lider1">
                                            <option value="0">Selecione um Membro</option>
                                            <?php
                                            $query = $pdo->query("SELECT * FROM usuarios WHERE igreja = '$id_igreja' order by nome asc");
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

                                <?php } ?>
                                

                                <div class="input-field">
                                    <label>2º Líder</label>
                                    <select class="sel2" id="lider2" name="lider2">
                                        <option value="0">Selecione um Membro</option>
                                        <?php
                                        $query = $pdo->query("SELECT * FROM usuarios WHERE igreja = '$id_igreja' order by nome asc");
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
                <h3 class="Cadastro">Nome: <span id="nome-dados"></span></h3>
                <div class="txt_n_m">(<span id="membros-dados"></span> <span class="txt_m">Membros</span>)</div>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body scroll-modal">
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Dias: </span>
                    <span class="texts_son" id="dias-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/hour.svg" class="img_icon_data" alt="">
                    <span class="user_name">Horário:</span>
                    <span class="texts_son" id="hora-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Pastor Responsável: </span>
                    <span class="texts_son" id="pastor-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Líder do Ministério: </span>
                    <span class="texts_son" id="lider1-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">2º Líder: </span>
                    <span class="texts_son" id="lider2-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/exclamation.svg" class="img_icon_data" alt="">
                    <span class="user_name">OBS: </span>
                    <span class="texts_son" id="obs-dados"></span>
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






<div class="modal fade" id="modalAddMembros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Adicionar Membros - <span id="nome-add"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-add" method="post">
                <div class="modal-body">

                    <div class="list_members_group">
                        <div class="input-field" id="listar-membros">

                        </div>
                        <div class="list_members" id="listar-membros-add">

                        </div>
                    </div>


                    <div id="mensagem-add"></div>

                    <input type="hidden" name="id-add" id="id-add">
                    <input type="hidden" name="id-igreja" id="id-ig">

                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-add" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn-add">
                            Adicionar
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
    function editar(id, nome, dias, hora, pastor, lider1, lider2) {
        $('#id').val(id);
        $('#nome').val(nome);
        $('#dias').val(dias);
        $('#hora').val(hora);
        $('#pastor').val(pastor).change();
        $('#lider1').val(lider1).change();
        $('#lider2').val(lider2).change();

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(nome, dias, hora, pastor, lider1, lider2, obs, membros) {

        $('#nome-dados').text(nome);
        $('#dias-dados').text(dias);
        $('#hora-dados').text(hora);
        $('#pastor-dados').text(pastor);
        $('#lider1-dados').text(lider1);
        $('#lider2-dados').text(lider2);
        $('#obs-dados').text(obs);
        $('#membros-dados').text(membros);


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


    function addMembros(id, nome, igreja) {

        $('#nome-add').text(nome);
        $('#id-add').val(id);
        $('#id-ig').val(igreja);

        listarMembrosCB(id, igreja);
        listarMembrosAdd(id, igreja);

        var myModal = new bootstrap.Modal(document.getElementById('modalAddMembros'), {});
        myModal.show();
        $('#mensagem-add').text('');
    }


    function limpar() {

        $('#id').val('');
        $('#nome').val('');
        $('#dias').val('');
        $('#hora').val('');

        document.getElementById("pastor").options.selectedIndex = 0;
        $('#pastor').val($('#pastor').val()).change();

        document.getElementById("lider1").options.selectedIndex = 0;
        $('#lider1').val($('#lider1').val()).change();

        document.getElementById("lider2").options.selectedIndex = 0;
        $('#lider2').val($('#lider2').val()).change();
        
    }


    $("#form-add").submit(function () {
        event.preventDefault();
        var formData = new FormData(this);

        var igreja = "<?= $id_igreja ?>";
        var celula = $('#id-add').val();

        $.ajax({
            url: pag + "/add-membros.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#mensagem-add').text('');
                $('#mensagem-add').removeClass()
                if (mensagem.trim() == "Adicionado com Sucesso") {

                    listarMembrosCB(celula, igreja);
                    listarMembrosAdd(celula, igreja);

                } else {

                    $('#mensagem-add').addClass('message_error');
                    $('#mensagem-add').text(mensagem);
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });


    function listarMembrosCB(celula, igreja) {

        $.ajax({
            url: pag + "/listar-membros.php",
            method: 'POST',
            data: {
                celula,
                igreja
            },
            dataType: "text",

            success: function (result) {
                $("#listar-membros").html(result);
            },

        });

    }


    function listarMembrosAdd(celula, igreja) {

        $.ajax({
            url: pag + "/listar-membros-add.php",
            method: 'POST',
            data: {
                celula,
                igreja
            },
            dataType: "text",

            success: function (result) {
                $("#listar-membros-add").html(result);
            },

        });

    }


    function excluirMembro(id) {
        event.preventDefault();

        var igreja = "<?= $id_igreja ?>";
        var celula = $('#id-add').val();

        $.ajax({
            url: pag + "/excluir-membro.php",
            method: 'POST',
            data: {
                id
            },
            dataType: "text",

            success: function (result) {
                listarMembrosCB(celula, igreja);
                listarMembrosAdd(celula, igreja);
            },

        });

    }


    $(document).ready(function () {
        $('.sel2').select2({
            placeholder: 'Selecione um Líder',
            dropdownParent: $('#modalForm'),
        });
    });

    $(document).ready(function () {
        $('.sel21').select2({
            placeholder: 'Selecione um Pastor',
            dropdownParent: $('#modalForm'),
        });
    });
</script>


<!-- <script type="text/javascript">
    var idPessoa = "<?= $id_pessoa ?>";
    var lider = "<?= $lider1 ?>";
    var nivelUsu = "<?= $nivel_usu ?>";

    var hiddenSelect1 = document.getElementById('hidden_select1');
    var hiddenSelect2 = document.getElementById('hidden_select2');
    var hiddenSelect3 = document.getElementById('hidden_select3');

    if (idPessoa == lider) {
        hiddenSelect1.style.display = "none";
    } else if (nivelUsu == 'secretario' || nivelUsu == 'Pastor Presidente' || nivelUsu == 'pastor') {
        hiddenSelect1.style.display = "block";
    } else {
        hiddenSelect1.style.display = "none";
    }

    if (idPessoa == lider) {
        hiddenSelect2.style.display = "none";
    } else if (nivelUsu == 'secretario' || nivelUsu == 'Pastor Presidente' || nivelUsu == 'pastor') {
        hiddenSelect2.style.display = "block";
    } else {
        hiddenSelect2.style.display = "none";
    }

    if (idPessoa == lider) {
        hiddenSelect3.style.display = "none";
    } else if (nivelUsu == 'secretario' || nivelUsu == 'Pastor Presidente' || nivelUsu == 'pastor') {
        hiddenSelect3.style.display = "block";
    } else {
        hiddenSelect3.style.display = "none";
    }       
</script> -->