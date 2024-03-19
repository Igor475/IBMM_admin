<?php
require_once("../conexao.php");
$pagina = 'anexos';
?>

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
                        <th class="th-table">Logo</th>
                        <th class="th-table">Igreja</th>
                        <th class="th-table">Nome</th>
                        <th class="th-table column-hidden">Descrição</th>
                        <th class="th-table">Arquivo</th>
                        <th class="th-table column-hidden">Data</th>
                        <th class="th-table column-hidden">Secretário / Pastor</th>
                        <th class="th-table last_table">Ações</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                    <?php
                    for ($i = 0; $i < $total_reg; $i++) {
                        foreach ($res[$i] as $key => $value) {
                        }

                        $descricao = $res[$i]['descricao'];
                        $nome = $res[$i]['nome'];
                        $usuario = $res[$i]['usuario'];
                        $data = $res[$i]['data'];
                        $arquivo = $res[$i]['arquivo'];
                        $igreja = $res[$i]['igreja'];

                        $id = $res[$i]['id'];

                        //EXTRAINDO EXTENSÃO DO ARQUIVO
                        $ext = pathinfo($arquivo, PATHINFO_EXTENSION);
                        if ($ext == 'pdf') {
                            $tumb_arquivo = 'pdf.png';
                        } else if ($ext == 'rar' || $ext == 'zip') {
                            $tumb_arquivo = 'rar.png';
                        } else if ($ext == 'doc' || $ext == 'docx') {
                            $tumb_arquivo = 'word.png';
                        } else {
                            $tumb_arquivo = $arquivo;
                        }

                        $query_con = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $usuario_cad = $res_con[0]['nome'];
                        } else {
                            $usuario_cad = '';
                        }

                        $query_con = $pdo->query("SELECT * FROM igrejas where id = '$igreja'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_igreja = $res_con[0]['nome'];
                            $foto_igreja = $res_con[0]['imagem'];
                        } else {
                            $nome_igreja = '';
                        }


                        $dataF = implode('/', array_reverse(explode('-', $data)));
                        ?>
                        <tr class="column-body <?php echo $classe_linha ?>">
                            <td data-label="Foto" class="td-table" id="radius-column-foto">
                                <img class="profile_table" src="../img/igrejas/<?php echo $foto_igreja ?>">
                            </td>
                            <td data-label="Igreja" class="td-table" id="radius-column-foto">
                                <?php echo $nome_igreja ?>
                            </td>
                            <td data-label="Nome" class="td-table" id="radius-column-foto">
                                <a class="text_doc" href="../img/documentos/<?php echo $arquivo ?>" target="_blank" title="<?php echo $arquivo ?>">
                                   <?php echo $nome ?>
                                </a>
                            </td>
                            <td data-label="Descrição" class="td-table column-hidden">
                                <?php echo $descricao ?>
                            </td>
                            <td data-label="Arquivo" class="td-table">
                                <a href="../img/documentos/<?php echo $arquivo ?>" target="_blank">
                                    <img class="profile_archives" src="../img/documentos/<?php echo $tumb_arquivo ?>" alt="Arquivo"
                                        title="<?php echo $arquivo ?>">
                                </a>
                            </td>
                            <td data-label="Data Cadastro" class="td-table">
                                <?php echo $dataF ?>
                            </td>
                            <td data-label="Usuário Cadastrou" class="td-table">
                                <?php echo $usuario_cad ?>
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
                                                onclick="excluir('<?php echo $id ?>', '<?php echo $nome ?>')">
                                                <i class="bi bi-trash3 icons_actions"></i>
                                                Excluir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="dados('<?php echo $nome ?>', 
                                            '<?php echo $descricao ?>', '<?php echo $tumb_arquivo ?>', '<?php echo $dataF ?>', 
                                            '<?php echo $usuario_cad ?>')">
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
                <h3 class="Cadastro">Documento: <span id="nome-dados"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body scroll-modal">
                <div class="user_area">
                    <img src="../img/svg/cpf.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-person-vcard icon_user"></i> -->
                    <span class="user_name">Descrição: </span>
                    <span class="texts_son" id="descricao-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-envelope-at icon_user"></i> -->
                    <span class="user_name">Data Cadastro:</span>
                    <span class="texts_son" id="data-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user-svgrepo-com.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-phone icon_user"></i> -->
                    <span class="user_name">Usuário Cadastrou: </span>
                    <span class="texts_son" id="usuario-dados"></span>
                </div>
                <div class="user_profile_area">
                    <img class="img_info_profile" src="" id="foto-dados">
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

    function dados(nome, descricao, arquivo, data, usuario) {

        $('#descricao-dados').text(descricao);
        $('#nome-dados').text(nome);
        $('#data-dados').text(data);
        $('#usuario-dados').text(usuario);
        $('#foto-dados').attr('src', '../img/documentos/' + arquivo);


        var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
        myModal.show();
        $('#mensagem').text('');
    }


</script>