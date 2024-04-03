<?php
require_once("../conexao.php");
$pagina = 'receber';

if (@$_GET['filtrar'] == 'Vencidas') {
    $classe_vencidas = 'text_account';
    $classe_hoje = 'text_black_sans';
    $classe_todas = 'text_black_sans';
    $classe_pagas = 'text_black_sans';

    $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' and vencimento < curDate()
        and pago != 'Sim' order by vencimento asc, id asc");

} else if (@$_GET['filtrar'] == 'Hoje') {
    $classe_vencidas = 'text_black_sans';
    $classe_hoje = 'text_account';
    $classe_todas = 'text_black_sans';
    $classe_pagas = 'text_black_sans';

    $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' and vencimento = curDate()
        and pago != 'Sim' order by vencimento asc, id asc");

} else if (@$_GET['filtrar'] == 'Pagas') {
    $classe_pagas = 'text_black_sans';
    $classe_hoje = 'text_black_sans';
    $classe_todas = 'text_black_sans';
    $classe_pagas = 'text_account';

    $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' and pago = 'Sim' 
            order by vencimento asc, id asc");
} else {
    $classe_vencidas = 'text_black_sans';
    $classe_hoje = 'text_black_sans';
    $classe_pagas = 'text_black_sans';
    $classe_todas = 'text_account';

    $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' order by pago asc,
    vencimento asc, id asc");

}

?>

<div class="buttons_register">
    <a href="#" onclick="inserir()" class="button_tables_register">
        Nova Conta
        <i class="bi bi-plus-lg icon_tables_registers"></i>
    </a>

    <div class="links_filter">
        <!-- Split dropstart button -->
        <div class="btn-group dropstart">
            <button type="button" class="filter_dropdown dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropstart</span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?pag=<?php echo $pagina ?>" 
                        class="dropdown-item <?php echo $classe_todas ?>">
                        Todas
                    </a>
                </li>
                <li>
                    <a href="index.php?pag=<?php echo $pagina ?>&filtrar=Vencidas" 
                        class="dropdown-item <?php echo $classe_vencidas ?>">
                        Vencidas
                    </a>
                </li>
                <li>
                    <a href="index.php?pag=<?php echo $pagina ?>&filtrar=Hoje" 
                        class="dropdown-item <?php echo $classe_hoje ?>">
                        Vencendo Hoje
                    </a>
                </li>
                <li>
                    <a href="index.php?pag=<?php echo $pagina ?>&filtrar=Pagas" 
                        class="dropdown-item <?php echo $classe_pagas ?>">
                        Pagas
                    </a>
                </li>
            </ul>
            <button type="button" class="filter_dropdown_filt">
                Filtar Por<i class="bx bx-filter-alt icon_filter"></i>
            </button>
        </div>
    </div>
</div>


<div class="tabs">
    <div class="table-container">
        <?php
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);
        if ($total_reg > 0) {
            ?>
            <table class="content-table" id="example">
                <thead class="thead-tabs">
                    <tr class="column-table">
                        <th class="th-table">Descrição</th>
                        <th class="th-table column-hidden">Membro</th>
                        <th class="th-table">Valor</th>
                        <th class="th-table">Vencimento</th>
                        <th class="th-table">Tesoureiro / Pastor</th>
                        <th class="th-table column-hidden">Pago</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $descricao = $res[$i]['descricao'];
                        $membro = $res[$i]['membro'];
                        $valor = $res[$i]['valor'];
                        $vencimento = $res[$i]['vencimento'];
                        $pago = $res[$i]['pago'];

                        $usuario_cad = $res[$i]['usuario_cad'];
                        $usuario_baixa = $res[$i]['usuario_baixa'];
                        $data_baixa = $res[$i]['data_baixa'];
                        $data = $res[$i]['data'];
                        $igreja = $res[$i]['igreja'];

                        $id = $res[$i]['id'];


                        if ($pago == 'Sim') {
                            $classe = 'text_active';
                            $ocultar = 'none';
                        } else {
                            $classe = 'text_desactive';
                            $ocultar = '';
                        }

                        if ($vencimento >= $data_atual) {
                            $classe_linha = '';
                        } else {
                            if ($pago != 'Sim') {
                                $classe_linha = 'text_bill_later';
                            } else {
                                $classe_linha = '';
                            }
                        }



                        $query_con = $pdo->query("SELECT * FROM membros where id = '$membro'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_mem = $res_con[0]['nome'];
                        } else {
                            $nome_mem = 'Sem Membro!';
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
                        <tr class="column-body <?php echo $classe_linha ?>">
                            <td data-label="Descrição" class="td-table" id="radius-column-foto">
                                <i class="bi bi-receipt <?php echo $classe ?>"></i>
                                <?php echo $descricao ?>
                            </td>
                            <td data-label="Fornecedor" class="td-table column-hidden">
                                <?php echo $nome_mem ?>
                            </td>
                            <td data-label="Valor" class="td-table">
                                R$
                                <?php echo $valorF ?>
                            </td>
                            <td data-label="Vencimento" class="td-table">
                                <?php echo $vencimentoF ?>
                            </td>
                            <td data-label="Tesoureiro / Pastor" class="td-table column-hidden">
                                <?php echo $usuario_cad ?>
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
                                            <a class="dropdown-item <?php echo $ocultar ?>" href="#" onclick="editar('<?php echo $id ?>', 
                                            '<?php echo $descricao ?>', '<?php echo $membro ?>', '<?php echo $valor ?>', 
                                            '<?php echo $vencimento ?>')">
                                                <i class="bi bi-pencil-square icons_actions"></i>
                                                Editar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item <?php echo $ocultar ?>" href="#"
                                                onclick="excluir('<?php echo $id ?>', '<?php echo $descricao ?>')">
                                                <i class="bi bi-trash3 icons_actions"></i>
                                                Excluir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="dados('<?php echo $descricao ?>', 
                                            '<?php echo $nome_mem ?>', '<?php echo $valorF ?>', '<?php echo $dataF ?>', 
                                            '<?php echo $vencimentoF ?>', '<?php echo $usuario_cad ?>', '<?php echo $usuario_baixa ?>', 
                                            '<?php echo $data_baixaF ?>', '<?php echo $pago ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item <?php echo $ocultar ?>" href="#" onclick="baixar('<?php echo $id ?>', 
                                            '<?php echo $descricao ?>')" title="Dar baixa na Conta">
                                                <i class="bi bi-file-earmark-arrow-down-fill icons_actions icon_bill"></i>
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
                                    <div class="input-field">
                                        <label>Descrição</label>
                                        <input type="text" name="descricao" id="descricao"
                                            placeholder="Insira a Descrição" required>
                                    </div>

                                    <div class="input-field flex_int">
                                        <label>Valor</label>
                                        <input type="text" name="valor" id="valor" placeholder="Insira o Valor"
                                            required>
                                    </div>

                                    <div class="input-field">
                                        <label>Membro</label>
                                        <select class="sel2" id="membro" name="membro">
                                            <?php
                                            $query = $pdo->query("SELECT * FROM membros order by id asc");
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

                                    <div class="input-field flex_int">
                                        <label>Vencimento</label>
                                        <input type="date" name="vencimento" id="vencimento"
                                            value="<?php echo $data_atual ?>" required>
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
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-person-vcard icon_user"></i> -->
                    <span class="user_name">Membro: </span>
                    <span class="texts_son" id="membro-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/dolar-simbolo.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-envelope-at icon_user"></i> -->
                    <span class="user_name">Valor:</span>
                    <span class="texts_son" id="valor-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-phone icon_user"></i> -->
                    <span class="user_name">Data Cadastro: </span>
                    <span class="texts_son" id="data-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-geo-alt icon_user"></i> -->
                    <span class="user_name">Vencimento: </span>
                    <span class="texts_son" id="vencimento-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Usuário Cadastro: </span>
                    <span class="texts_son" id="usu-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Usuário Baixa: </span>
                    <span class="texts_son" id="usu-baixa-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Data Baixa: </span>
                    <span class="texts_son" id="data-baixa-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/indicador.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Pago: </span>
                    <span class="texts_son" id="pago-dados"></span>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="modal fade" id="modalBaixar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="Cadastro">Confirmar Pagamento</h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <form id="form-excluir" method="post">
                <div class="modal-body">
                    <div action="#" class="form-modal-auto">
                        <div class="form first">
                            <div class="details personal">

                                <span class="text_excluir">Deseja Realmente dar baixa nesta conta?
                                    <span id="descricao-baixar"></span>?

                                    <div id="mensagem-baixar"></div>

                                    <input type="hidden" name="id-baixar" id="id-baixar">

                            </div>
                        </div>
                    </div>
                </div>
                <div id="mensagem"></div>
                <div class="modal-footer">
                    <div class="area-buttons">
                        <button type="button" id="btn-fechar-baixar" class="btn-close"
                            data-bs-dismiss="modal">Fechar</button>

                        <a href="#" onclick="mudarStatus($('#id-baixar').val())" class="btn-add">
                            Baixar
                            <i class="bi bi-check2-all icon-btn-form"></i>
                        </a>
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
    function editar(id, descricao, membro, valor, vencimento) {
        $('#id').val(id);
        $('#descricao').val(descricao);
        $('#valor').val(valor);
        $('#vencimento').val(vencimento);
        $('#membro').val(membro).change();

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }


    function dados(descricao, membro, valor, data, vencimento, usuario_cad, usuario_baixa, data_baixa, pago) {

        if (data_baixa === '00/00/0000') {
            data_baixa = 'Pendente';
        }

        $('#descricao-dados').text(descricao);
        $('#membro-dados').text(membro);
        $('#valor-dados').text(valor);
        $('#data-dados').text(data);
        $('#vencimento-dados').text(vencimento);
        $('#usu-dados').text(usuario_cad);
        $('#usu-baixa-dados').text(usuario_baixa);
        $('#data-baixa-dados').text(data_baixa);
        $('#pago-dados').text(pago);


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

        document.getElementById("membro").options.selectedIndex = 0;
        $('#membro').val($('#membro').val()).change();

    }


    function baixar(id, descricao) {
        $('#id-baixar').val(id);
        $('#descricao-baixar').text(descricao);
        var myModal = new bootstrap.Modal(document.getElementById('modalBaixar'), {});
        myModal.show();
        $('#mensagem-baixar').text('');
        limpar();
    }


</script>