<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'fechamentos';


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
        Novo Fechamento
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
                        <th class="th-table">Mês/Ano</th>
                        <th class="th-table">Data</th>
                        <th class="th-table">Usuário</th>
                        <th class="th-table">Saídas</th>
                        <th class="th-table">Entradas</th>
                        <th class="th-table">Saldo</th>
                        <th class="th-table">Prebenda</th>
                        <th class="th-table">Saldo Final</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $data_fec = $res[$i]['data_fec'];
                        $data = $res[$i]['data'];
                        $saidas = $res[$i]['saidas'];
                        $usuario = $res[$i]['usuario'];
                        $entradas = $res[$i]['entradas'];
                        $saldo = $res[$i]['saldo'];
                        $prebenda = $res[$i]['prebenda'];
                        $saldo_final = $res[$i]['saldo_final'];

                        $id = $res[$i]['id'];

                        $dataF = implode('/', array_reverse(explode('-', $data)));
                        $entradasF = number_format($entradas, 2, ',', '.');
                        $saidasF = number_format($saidas, 2, ',', '.');
                        $saldoF = number_format($saldo, 2, ',', '.');
                        $prebendaF = number_format($prebenda, 2, ',', '.');
                        $saldo_finalF = number_format($saldo_final, 2, ',', '.');

                        $separar = explode("-", $data_fec);
                        $mes = $separar[1];
                        $ano = $separar[0];

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $usuario_cad = $res_con[0]['nome'];

                        } else {
                            $usuario_cad = '';

                        }

                        $mesF = '';
                        if ($mes == '01') {
                            $mesF = "Janeiro";
                        }

                        if ($mes == '02') {
                            $mesF = "Fevereiro";
                        }

                        if ($mes == '03') {
                            $mesF = "Março";
                        }

                        if ($mes == '04') {
                            $mesF = "Abril";
                        }

                        if ($mes == '05') {
                            $mesF = "Maio";
                        }

                        if ($mes == '06') {
                            $mesF = "Junho";
                        }

                        if ($mes == '07') {
                            $mesF = "Julho";
                        }

                        if ($mes == '08') {
                            $mesF = "Agosto";
                        }

                        if ($mes == '09') {
                            $mesF = "Setembro";
                        }

                        if ($mes == '10') {
                            $mesF = "Outubro";
                        }

                        if ($mes == '11') {
                            $mesF = "Novembro";
                        }

                        if ($mes == '12') {
                            $mesF = "Dezembro";
                        }

                        ?>
                        <tr class="column-body">
                            <td data-label="Mês/Ano" class="td-table">
                                <?php echo $mesF ?> / <?php echo $ano ?>
                            </td>
                            <td data-label="Data" class="td-table">
                                <?php echo $dataF ?>
                            </td>
                            <td data-label="usuario" class="td-table">
                                <?php echo $usuario_cad ?>
                            </td>
                            <td data-label="Saídas" class="td-table">
                                R$ <?php echo $saidasF ?>
                            </td>
                            <td data-label="Entradas" class="td-table">
                                R$ <?php echo $entradasF ?>
                            </td>
                            <td data-label="Saldo" class="td-table">
                                R$ <?php echo $saldoF ?>
                            </td>
                            <td data-label="Prebenda" class="td-table">
                                R$ <?php echo $prebendaF ?>
                            </td>
                            <td data-label="Saldo Final" class="td-table">
                                R$ <?php echo $saldo_finalF ?>
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
                                                onclick="excluir('<?php echo $id ?>', '<?php echo $mesF ?>')">
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
                                    <label>Qualquer Data do Mês Fechamento</label>
                                    <input type="date" id="data_fec" name="data_fec" required value="<?php echo date('Y-m-d') ?>">
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
    function limpar() {
        var data = "<?= $data_atual ?>"

        $('#id').val('');
        $('#data_fec').val(data);

        document.getElementById("membro").options.selectedIndex = 0;
        $('#membro').val($('#membro').val()).change();

    }

</script>