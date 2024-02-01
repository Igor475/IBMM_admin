<?php
require_once("../conexao.php");
$pagina = 'movimentacoes';

if (@$_GET['filtrar'] == 'Entradas') {
    $classe_entradas = 'text_account';
    $classe_saidas = 'text_black_sans';
    $classe_todas = 'text_black_sans';

    $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' and tipo = 'Entrada'
        order by id desc");

} else if (@$_GET['filtrar'] == 'Saídas') {
    $classe_entradas = 'text_black_sans';
    $classe_saidas = 'text_account';
    $classe_todas = 'text_black_sans';

    $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' and tipo = 'Saída'
        order by id desc");

} else {
    $classe_entradas = 'text_black_sans';
    $classe_saidas = 'text_black_sans';
    $classe_todas = 'text_account';

    $query = $pdo->query("SELECT * FROM $pagina WHERE igreja = '$id_igreja' order by id desc");

}

?>

<div class="buttons_register">
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
                    <a href="index.php?pag=<?php echo $pagina ?>&filtrar=Entradas" 
                        class="dropdown-item <?php echo $classe_entradas ?>">
                        Entradas
                    </a>
                </li>
                <li>
                    <a href="index.php?pag=<?php echo $pagina ?>&filtrar=Saídas" 
                        class="dropdown-item <?php echo $classe_saidas ?>">
                        Saídas
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
                        <th class="th-table">Movimento</th>
                        <th class="th-table">Descrição</th>
                        <th class="th-table">Valor</th>
                        <th class="th-table">Data</th>
                        <th class="th-table">Tesoureiro / Pastor</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $movimento = $res[$i]['movimento'];
                        $tipo = $res[$i]['tipo'];
                        $valor = $res[$i]['valor'];
                        $descricao = $res[$i]['descricao'];
                        $data = $res[$i]['data'];
                        $usuario = $res[$i]['usuario'];
                        $igreja = $res[$i]['igreja'];
                        $id = $res[$i]['id'];


                        if ($tipo == 'Entrada') {
                            $classe = 'text_active';
                        } else {
                            $classe = 'text_desactive';
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $usuario_cad = $res_con[0]['nome'];
                        } else {
                            $usuario_cad = '';
                        }

                        $valorF = number_format($valor, 2, ',', '.');
                        $dataF = implode('/', array_reverse(explode('-', $data)));
                        ?>
                        <tr class="column-body <?php echo $classe_linha ?>">
                            <td data-label="Movimento" class="td-table" id="radius-column-foto">
                                <i class="bi bi-receipt <?php echo $classe ?>"></i>
                                <?php echo $movimento ?>
                            </td>
                            <td data-label="Fornecedor" class="td-table column-hidden">
                                <?php echo $descricao ?>
                            </td>
                            <td data-label="Valor" class="td-table">
                                R$
                                <?php echo $valorF ?>
                            </td>
                            <td data-label="Vencimento" class="td-table">
                                <?php echo $dataF ?>
                            </td>
                            <td data-label="Tesoureiro / Pastor" class="td-table column-hidden">
                                <?php echo $usuario_cad ?>
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




<script type="text/javascript">
    var pag = "<?= $pagina ?>" 
</script>
<script src="../js/ajax.js"></script>

