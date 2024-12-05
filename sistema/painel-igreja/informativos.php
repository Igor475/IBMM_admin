<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'informativos';

if (@$tesoureiros == 'ocultar') {
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
        Novo Informativo de Culto
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
                        <th class="th-table first_table" id="radius-foto">Data</th>
                        <th class="th-table">Preletor</th>
                        <th class="th-table">Evento</th>
                        <th class="th-table">Horário</th>
                        <th class="th-table column-hidden">Pastor Responsável</th>
                        <th class="th-table last_table" id="radius-action">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $id = $res[$i]['id'];
                        $preletor = $res[$i]['preletor'];
                        $data = $res[$i]['data'];
                        $texto_base = $res[$i]['texto_base'];
                        $tema = $res[$i]['tema'];
                        $evento = $res[$i]['evento'];
                        $horario = $res[$i]['horario'];

                        $pastor_responsavel = $res[$i]['pastor_responsavel'];
                        $pastores = $res[$i]['pastores'];
                        $lider_louvor = $res[$i]['lider_louvor'];
                        $obreiros = $res[$i]['obreiros'];
                        $apoio = $res[$i]['apoio'];
                        $abertura = $res[$i]['abertura'];
                        $recado = $res[$i]['recado'];

                        $oferta = $res[$i]['oferta'];
                        $recepcao = $res[$i]['recepcao'];
                        $bercario = $res[$i]['bercario'];
                        $escolinha = $res[$i]['escolinha'];
                        $membros = $res[$i]['membros'];
                        $visitantes = $res[$i]['visitantes'];
                        $conversoes = $res[$i]['conversoes'];
                        $total_ofertas = $res[$i]['total_ofertas'];
                        $total_dizimos = $res[$i]['total_dizimos'];

                        $obs = $res[$i]['obs'];

                        $dataF = implode('/', array_reverse(explode('-', $data)));

                        $query_con = $pdo->query("SELECT * FROM pastores where id = '$pastor_responsavel'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_pastor_resp = $res_con[0]['nome'];
                        } else {
                            $nome_pastor_resp = '';
                        }

                        ?>
                        <tr class="column-body">
                            <td data-label="Data" class="td-table" id="radius-column-foto">
                                <?php echo $dataF ?>
                            </td>
                            <td data-label="Preletor" class="td-table">
                                <?php echo $preletor ?>
                            </td>
                            <td data-label="Evento" class="td-table">
                                <?php echo $evento ?>
                            </td>
                            <td data-label="Horário" class="td-table column-hidden">
                                <?php echo $horario ?>
                            </td>
                            <td data-label="Pastor Responsável" class="td-table column-hidden">
                                <?php echo $nome_pastor_resp ?>
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
                                                onclick="editar('<?php echo $id ?>', '<?php echo $preletor ?>', '<?php echo $data ?>', 
                                                '<?php echo $texto_base ?>', '<?php echo $tema ?>', '<?php echo $evento ?>', 
                                                '<?php echo $horario ?>', '<?php echo $obs ?>', '<?php echo $pastor_responsavel ?>', 
                                                '<?php echo $pastores ?>', '<?php echo $lider_louvor ?>', '<?php echo $obreiros ?>', 
                                                '<?php echo $apoio ?>', '<?php echo $abertura ?>', '<?php echo $recado ?>', 
                                                '<?php echo $oferta ?>', '<?php echo $recepcao ?>', '<?php echo $bercario ?>', 
                                                '<?php echo $escolinha ?>', '<?php echo $membros ?>', '<?php echo $visitantes ?>', 
                                                '<?php echo $conversoes ?>', '<?php echo $total_ofertas ?>', '<?php echo $total_dizimos ?>')">
                                                <i class="bi bi-pencil-square icons_actions"></i>
                                                Editar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="excluir('<?php echo $id ?>' , '<?php echo $tema ?>')">
                                                <i class="bi bi-trash3 icons_actions"></i>
                                                Excluir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="../relatorios/relfichaCulto.php?id=<?php echo $id ?>"
                                                target="_blank" title="Gerar PDF">
                                                <i class="bi bi-file-pdf icons_actions"></i>
                                                Gerar PDF</a>
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
    <div class="modal-dialog modal-lg">
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
                                        <label>Preletor</label>
                                        <input type="text" name="preletor" id="preletor"
                                            placeholder="Nome do Preletor / Pregador" required>
                                    </div>

                                    <div class="input-field field_cpf_1">
                                        <label>Data</label>
                                        <input type="date" name="data" id="data" required>
                                    </div>

                                    <div class="input-field">
                                        <label>Texto Base</label>
                                        <input maxlength="255" type="text" name="texto_base" id="texto_base"
                                            placeholder="Insira o Texto base" required>
                                    </div>

                                    <div class="input-field field_area_1">
                                        <label>Tema</label>
                                        <input maxlength="255" type="text" name="tema" id="tema"
                                            placeholder="Tema do Culto" required>
                                    </div>

                                    <div class="input-field">
                                        <label>Evento</label>
                                        <input type="text" name="evento" id="evento"
                                            placeholder="Culto de 3 anos da IBMM" required>
                                    </div>

                                    <div class="input-field field_area_1">
                                        <label>Horário</label>
                                        <input type="time" name="horario" id="horario">
                                    </div>

                                    <div class="input-field field_area_select flex_int_12">
                                        <label>Pastor Responsável</label>
                                        <select class="sel2" id="pastor_responsavel" name="pastor_responsavel" required>
                                            <?php
                                            $query = $pdo->query("SELECT * FROM pastores where igreja = '$id_igreja' order by id asc");
                                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                            $total_reg = count($res);
                                            if ($total_reg > 0) {

                                                for ($i = 0; $i < $total_reg; $i++) {
                                                    foreach ($res[$i] as $key => $value) {
                                                    }

                                                    $nome_reg = $res[$i]['nome'];
                                                    $id_reg = $res[$i]['id'];
                                                    ?>
                                                    <option value="<?php echo $id_reg ?>"><?php echo $nome_reg ?></option>
                                            
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>Demais Pastores</label>
                                        <input type="text" name="pastores" id="pastores" placeholder="Pastor Marcos / Pastor Paulo...">
                                    </div>

                                    <div class="input-field">
                                        <label>responsavel Louvor</label>
                                        <input type="text" name="lider_louvor" id="lider_louvor">
                                    </div>

                                    <div class="input-field">
                                        <label>Diáconos</label>
                                        <input type="text" name="obreiros" id="obreiros" placeholder="Marcos / Paulo...">
                                    </div>

                                    <div class="input-field">
                                        <label>Apoios</label>
                                        <input type="text" name="apoio" id="apoio" placeholder="Sandro / Márcia">
                                    </div>

                                    <div class="input-field">
                                        <label>Abertura</label>
                                        <input type="text" name="abertura" id="abertura" placeholder="Responsável pela Abertura">
                                    </div>

                                    <div class="input-field">
                                        <label>Anúncios</label>
                                        <input type="text" name="recado" id="recado" placeholder="Responsável pelos Recados">
                                    </div>

                                    <div class="input-field">
                                        <label>Ofertas</label>
                                        <input type="text" name="oferta" id="oferta" placeholder="Responsável pelas Ofertas">
                                    </div>

                                    <div class="input-field">
                                        <label>Recepção</label>
                                        <input type="text" name="recepcao" id="recepcao" placeholder="Responsável pela Recepção">
                                    </div>

                                    <div class="input-field">
                                        <label>Berçário</label>
                                        <input type="text" name="bercario" id="bercario" placeholder="Responsável pelo Berçário">
                                    </div>

                                    <div class="input-field">
                                        <label>Escolinha</label>
                                        <input type="text" name="escolinha" id="escolinha" placeholder="Responsável pela Escolinha">
                                    </div>

                                    <div class="input-field">
                                        <label>Observações</label>
                                        <input maxlength="1000" type="text" name="obs" id="obs" placeholder="">
                                    </div>

                                    <div class="input-field">
                                        <label>Total de membros</label>
                                        <input type="number" name="membros" id="membros" placeholder="Membros Presentes">
                                    </div>

                                    <div class="input-field">
                                        <label>Total Visitantes</label>
                                        <input type="number" name="visitantes" id="visitantes" placeholder="Visitantes Presentes">
                                    </div>

                                    <div class="input-field">
                                        <label>Total de Conversões</label>
                                        <input type="number" name="conversoes" id="conversoes" placeholder="Total de Conversões">
                                    </div>

                                    <div class="input-field">
                                        <label>Total de Ofertas</label>
                                        <input type="text" name="total_ofertas" id="total_ofertas" placeholder="Total de Ofertas">
                                    </div>

                                    <div class="input-field flex_int_8">
                                        <label>Total de Dízimos</label>
                                        <input type="text" name="total_dizimos" id="total_dizimos" placeholder="Total de Dízimos">
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





<script type="text/javascript">
    var pag = "<?= $pagina ?>" 
</script>
<script src="../js/ajax.js"></script>




<script type="text/javascript">
    function editar(id, preletor, data, texto_base, tema, evento, horario, obs, pastor_responsavel, 
        pastores, lider_louvor, obreiros, apoio, abertura, recado, oferta, recepcao, bercario, escolinha, 
        membros, visitantes, conversoes, total_ofertas, total_dizimos) {
        $('#id').val(id);
		$('#preletor').val(preletor);
		$('#data').val(data);
		$('#texto_base').val(texto_base);
		$('#tema').val(tema);
		$('#evento').val(evento);

		$('#horario').val(horario);
		$('#obs').val(obs);
		$('#pastor_responsavel').val(pastor_responsavel).change();
		$('#pastores').val(pastores);
		$('#lider_louvor').val(lider_louvor);

		$('#obreiros').val(obreiros);
		$('#apoio').val(apoio);
		$('#abertura').val(abertura);
		$('#recado').val(recado);
		$('#oferta').val(oferta);

		$('#recepcao').val(recepcao);
		$('#bercario').val(bercario);
		$('#escolinha').val(escolinha);
		$('#membros').val(membros);
		$('#visitantes').val(visitantes);

		$('#conversoes').val(conversoes);
		$('#total_ofertas').val(total_ofertas);
		$('#total_dizimos').val(total_dizimos);

        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        $('#mensagem').text('');
    }

    function limpar() {
        $('#id').val('');
		
		$('#preletor').val('');
		$('#data').val('');
		$('#texto_base').val('');
		$('#tema').val('');
		$('#evento').val('');

		$('#horario').val('');
		$('#obs').val('');
		$('#pastor_responsavel').val('');
		$('#pastores').val('');
		$('#lider_louvor').val('');

			$('#obreiros').val('');
		$('#apoio').val('');
		$('#abertura').val('');
		$('#recado').val('');
		$('#oferta').val('');

		$('#recepcao').val('');
		$('#bercario').val('');
		$('#escolinha').val('');
		$('#membros').val('');
		$('#visitantes').val('');

		$('#conversoes').val('');
		$('#total_ofertas').val('');
		$('#total_dizimos').val('');
    }

</script>