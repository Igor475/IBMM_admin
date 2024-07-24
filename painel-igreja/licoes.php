<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
setlocale(LC_TIME, "portuguese");
require_once("../conexao.php");
$pagina = 'licoes';

if(@$documentos == 'ocultar') {
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
        Nova Lição
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
                    <th class="th-table">Nome</th>
                    <th class="th-table column-hidden">Descrição</th>
                    <th class="th-table column-hidden">Imagem</th>
                    <th class="th-table">Arquivo</th>
                    <th class="th-table">Data</th>
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
                        $imagem = $res[$i]['imagem'];
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

                        
                        if($descricao == '') {
                            $descricao = 'Nenhuma!';
                        }

                        $dataF = implode('/', array_reverse(explode('-', $data)));
                        ?>
                <tr class="column-body <?php echo $classe_linha ?>">
                    <td data-label="Nome" class="td-table" id="radius-column-foto">
                        <?php echo $nome ?>
                    </td>
                    <td data-label="Descrição" class="td-table column-hidden">
                        <?php echo $descricao ?>
                    </td>
                    <td data-label="Imagem" class="td-table">
                        <a href="../img/licoes/<?php echo $imagem ?>" target="_blank">
                            <img class="profile_archives" src="../img/licoes/<?php echo $imagem ?>" alt="Arquivo"
                                title="<?php echo $imagem ?>">
                        </a>
                    </td>
                    <td data-label="Arquivo" class="td-table">
                        <a href="../img/licoes/<?php echo $arquivo ?>" target="_blank">
                            <img class="profile_archives" src="../img/licoes/<?php echo $tumb_arquivo ?>" alt="Arquivo"
                                title="<?php echo $arquivo ?>">
                        </a>
                    </td>
                    <td data-label="Data Cadastro" class="td-table">
                        <?php echo strftime("%C, %B de %Y", strtotime($dataF)) ?>
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
                                    <a class="dropdown-item" href="#" onclick="editar('<?php echo $id ?>', 
                                            '<?php echo $nome ?>', '<?php echo $descricao ?>', '<?php echo $imagem ?>',
                                            '<?php echo $tumb_arquivo ?>', '<?php echo $data ?>')">
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
                                        onclick="dados('<?php echo $nome ?>', 
                                            '<?php echo $descricao ?>', '<?php echo $imagem ?>',
                                            '<?php echo $tumb_arquivo ?>', '<?php echo $dataF ?>', '<?php echo $usuario_cad ?>')">
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
                                    <div class="input-field flex_int_2">
                                        <label>Nome</label>
                                        <input type="text" name="nome" id="nome" placeholder="Nome do Documento"
                                            required>
                                    </div>

                                    <div class="input-field field_cpf_1">
                                        <label>Data Cadastro</label>
                                        <input type="date" name="data" id="data" value="<?php echo $data_atual ?>"
                                            required>
                                    </div>

                                    <div class="input-field flex_int_3">
                                        <label>Descrição (Max 255 Caracteres)</label>
                                        <input type="text" maxlength="255" name="descricao" id="descricao"
                                            placeholder="Insira a Descrição">
                                    </div>

                                    <div class="area_photo_rel">
                                        <div class="area_photo_flex">
                                            <label>Imagem de Destaque</label>
                                            <input type="file" class="input_file" id="imagemlicao" name="imglicao"
                                                onChange="carregarImgLicao();">
                                        </div>
                                        <div class="divImgRel">
                                            <img class="photo_file_rel" id="targetlicao"
                                                src="../img/licoes/sem-foto.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="area_photo_1">
                                        <div class="area_photo_flex">
                                            <label>Arquivo <small>(*pdf, *word, *imagens, *rar ou zip)</small></label>
                                            <input type="file" class="input_file" id="imagem" name="imagem"
                                                onChange="carregarImgArquivos();">
                                        </div>
                                        <div class="divImg">
                                            <img class="photo_file_archives" id="target"
                                                src="../img/licoes/sem-foto.jpg" alt="">
                                        </div>
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
                <h3 class="Cadastro">Documento: <span id="nome-dados"></span></h3>
                <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body scroll-modal">
                <div class="user_area">
                    <img src="../img/svg/descrition.svg" class="img_icon_data" alt="">
                    <span class="user_name">Descrição: </span>
                    <span class="texts_son" id="descricao-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <span class="user_name">Data Cadastro:</span>
                    <span class="texts_son" id="data-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/user.svg" class="img_icon_data" alt="">
                    <span class="user_name">Usuário Cadastrou: </span>
                    <span class="texts_son" id="usuario-dados"></span>
                </div>
                <div class="area_licao">
                    <div class="user_profile_area img_flex">
                        <img class="img_info_profile" src="" id="foto-dados">
                    </div>
                    <div class="user_profile_area img_flex_l">
                        <img class="img_info_profile" src="" id="foto-licao">
                    </div>
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
function editar(id, nome, descricao, imagem, arquivo, data) {
    $('#id').val(id);
    $('#descricao').val(descricao);
    $('#nome').val(nome);
    $('#data').val(data);
    $('#targetlicao').attr('src', '../img/licoes/' + imagem);
    $('#target').attr('src', '../img/licoes/' + arquivo);

    $('#tituloModal').text('Editar Registro');
    var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
    myModal.show();
    $('#mensagem').text('');
}


function dados(nome, descricao, imagem, arquivo, data, usuario) {

    $('#descricao-dados').text(descricao);
    $('#nome-dados').text(nome);
    $('#data-dados').text(data);
    $('#usuario-dados').text(usuario);
    $('#foto-dados').attr('src', '../img/licoes/' + arquivo);
    $('#foto-licao').attr('src', '../img/licoes/' + imagem);


    var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
    myModal.show();
    $('#mensagem').text('');
}


function limpar() {
    var data_at = "<?= $data_atual ?>"

    console.log(data_at)

    $('#id').val('');
    $('#descricao').val('');
    $('#nome').val('');

    $('#targetlicao').attr('src', '../img/licoes/sem-foto.jpg');
    $('#target').attr('src', '../img/licoes/sem-foto.jpg');
}
</script>


<script type="text/javascript">

function carregarImgLicao() {
    var target = document.getElementById('targetlicao');
    var file = document.querySelector("#imagemlicao").files[0];

    var reader = new FileReader();

    reader.onloadend = function() {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}

function carregarImgArquivos() {
    var target = document.getElementById('target');
    var file = document.querySelector("#imagem").files[0];
    var arquivo = file['name'];
    resultado = arquivo.split(".", 2);

    //console.log(resultado[1]);
    if (resultado[1] === 'pdf') {
        $('#target').attr('src', "../img/pdf.png");
        return;
    }

    if (resultado[1] === 'rar' || resultado[1] === 'zip') {
        $('#target').attr('src', "../img/rar.png");
        return;
    }

    if (resultado[1] === 'doc' || resultado[1] === 'docx') {
        $('#target').attr('src', "../img/word.png");
        return;
    }

    var reader = new FileReader();

    reader.onloadend = function() {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}
</script>