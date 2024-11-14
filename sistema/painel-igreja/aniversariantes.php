<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/alerta-tempo.js"></script>


<?php
require_once("../conexao.php");
$pagina = 'aniversariantes';
$dataMes = Date('m');
$dataDia = Date('d');

if (@$_GET['filtrar'] == 'mes') {
    $classe_dia = 'background_transparent';
    $classe_mes = 'background_aniv';

    $query = $pdo->query("SELECT * FROM membros where igreja = '$id_igreja' and month(data_nasc) = '$dataMes' and day(data_nasc) = '$dataDia' order by data_nasc asc, id desc");

    $query_pastores = $pdo->query("SELECT * FROM pastores where igreja = '$id_igreja' and month(data_nasc) = '$dataMes' and day(data_nasc) = '$dataDia' order by data_nasc asc, id desc");
} else {
    $classe_dia = 'background_aniv';
    $classe_mes = 'background_transparent';


    $query = $pdo->query("SELECT * FROM membros where igreja = '$id_igreja' and month(data_nasc) = '$dataMes' order by data_nasc asc, id desc");

    $query_pastores = $pdo->query("SELECT * FROM pastores where igreja = '$id_igreja' and month(data_nasc) = '$dataMes' order by data_nasc asc, id desc");
}

if (@$membros == 'ocultar') {
    echo "<script>$(function() { 
                     alertaTempo('Você não tem permissão para estar nesta página! Verifique com o seu Pastor.');
                });
          </script>";
    /* echo "<script>window.location='index.php'</script>"; */
    exit();
}
?>

<div class="area__niv">
    <a href="index.php?pag=aniversariantes&filtrar=dia" class="<?php echo $classe_mes ?> p_niv">Aniversáriantes do
        Mês</a> /
    <a href="index.php?pag=aniversariantes&filtrar=mes" class="<?php echo $classe_dia ?> p_niv_tr">Aniversáriantes do
        Dia</a>
</div>

<div class="tabs">
    <div class="table-container">
        <?php
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = count($res);

        $res_pastores = $query_pastores->fetchAll(PDO::FETCH_ASSOC);
        $total_reg_pastores = count($res_pastores);
        if ($total_reg > 0 || $total_reg_pastores > 0) {
            ?>
            <table class="content-table" id="example">
                <thead class="thead-tabs">
                    <tr class="column-table">
                        <th class="th-table first_table" id="radius-foto">Foto</th>
                        <th class="th-table">Nome</th>
                        <th class="th-table">Data de Nascimento</th>
                        <th class="th-table">Email</th>
                        <th class="th-table column-hidden">Telefone</th>
                        <th class="th-table column-hidden">Cargo Ministerial</th>
                        <th class="th-table column-hidden">Ativo</th>
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
                        $telefone = $res[$i]['telefone'];
                        $endereco = $res[$i]['endereco'];
                        $foto = $res[$i]['foto'];
                        $data_nasc = $res[$i]['data_nasc'];
                        $data_cad = $res[$i]['data_cad'];
                        $obs = $res[$i]['obs'];
                        $igreja = $res[$i]['igreja'];
                        $cargo = $res[$i]['cargo'];
                        $data_bat = $res[$i]['data_batismo'];
                        $ativo = $res[$i]['ativo'];
                        $id = $res[$i]['id'];

                        if ($obs != "") {
                            $classe_obs = 'obs_filled';
                        } else {
                            $classe_obs = 'obs_empty';
                        }


                        $query_con = $pdo->query("SELECT * FROM igrejas where id = '$igreja'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_ig = $res_con[0]['nome'];
                        } else {
                            $nome_ig = $nome_igreja_sistema;
                        }

                        $query_con = $pdo->query("SELECT * FROM cargos where id = '$cargo'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_cargo = $res_con[0]['nome'];
                        } else {
                            $nome_cargo = '';
                        }

                        //Retira a quebra do texto das observações
                        $obs = str_replace(array("\n", "\r"), ' + ', $obs);

                        $data_nascF = implode('/', array_reverse(explode('-', $data_nasc)));
                        $data_cadF = implode('/', array_reverse(explode('-', $data_cad)));
                        $data_batF = implode('/', array_reverse(explode('-', $data_bat)));

                        $dia_mes = Date('d');
                        $partes = explode('-', $data_nasc);
                        $dia = $partes[2];

                        if ($dia == $dia_mes) {
                            $classe_aniv = 'background_aniv';
                        } else {
                            $classe_aniv = '';
                        }
                        ?>
                        <tr class="column-body <?php echo $classe_aniv ?>">
                            <td data-label="Foto" class="td-table" id="radius-column-foto">
                                <img class="profile_table" src="../img/membros/<?php echo $foto ?>" alt="Perfil" title="Perfil">
                            </td>
                            <td data-label="Nome" class="td-table">
                                <?php echo $nome ?>
                            </td>
                            <td data-label="Data de Nascimento" class="td-table">
                                <?php echo $data_nascF ?>
                            </td>
                            <td data-label="Email" class="td-table">
                                <?php echo $email ?>
                            </td>
                            <td data-label="Telefone" class="td-table column-hidden">
                                <?php echo $telefone ?>
                            </td>
                            <td data-label="Cadastro" class="td-table column-hidden">
                                <?php echo $nome_cargo ?>
                            </td>
                            <td data-label="Ativo" class="td-table column-hidden">
                                <?php echo $tab ?>
                            </td>
                            <td class="td-table" id="radius-column-action">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Opções
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="dados('<?php echo $nome ?>', '<?php echo $cpf ?>',
                                            '<?php echo $email ?>', '<?php echo $telefone ?>', '<?php echo $endereco ?>', '<?php echo $foto ?>', 
                                            '<?php echo $data_nascF ?>', '<?php echo $data_cadF ?>', '<?php echo $nome_ig ?>', 
                                            '<?php echo $data_batF ?>', '<?php echo $nome_cargo ?>')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>

                                        <?php if ($dia == $dia_mes) { ?>
                                            <li>
                                                <a class="dropdown-item" target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $telefone ?>&text=Ola <?php echo $nome ?>, 
                                                    nos da <?php echo $nome_ig ?> desejamos a você um feliz aniversário, que Deus te abençoe
                                                    e te ilumine..." title="Enviar Felicitações">
                                                    <i class="bi bi-whatsapp icons_actions"></i>
                                                    Enviar Felicitações
                                                </a>
                                            </li>
                                        <?php } else { ?>

                                        <?php } ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php
                    for ($i = 0; $i < $total_reg_pastores; $i++) {
                        foreach ($res_pastores[$i] as $key => $value) {
                        }

                        $nome = $res_pastores[$i]['nome'];
                        $cpf = $res_pastores[$i]['cpf'];
                        $email = $res_pastores[$i]['email'];
                        $telefone = $res_pastores[$i]['telefone'];
                        $endereco = $res_pastores[$i]['endereco'];
                        $foto = $res_pastores[$i]['foto'];
                        $data_nasc = $res_pastores[$i]['data_nasc'];
                        $data_cad = $res_pastores[$i]['data_cad'];
                        $obs = $res_pastores[$i]['obs'];
                        $igreja = $res_pastores[$i]['igreja'];
                        $id = $res_pastores[$i]['id'];

                        if ($obs != "") {
                            $classe_obs = 'text-warning';
                        } else {
                            $classe_obs = 'text-secondary';
                        }


                        $query_con = $pdo->query("SELECT * FROM igrejas where id = '$igreja'");
                        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res_con) > 0) {
                            $nome_ig = $res_con[0]['nome'];
                        } else {
                            $nome_ig = $nome_igreja_sistema;
                        }


                        //retirar quebra de texto do obs
                        $obs = str_replace(array("\n", "\r"), ' + ', $obs);

                        $data_nascF = implode('/', array_reverse(explode('-', $data_nasc)));
                        $data_cadF = implode('/', array_reverse(explode('-', $data_cad)));


                        $dia_mes = Date('d');
                        $partes = explode('-', $data_nasc);
                        $dia = $partes[2];

                        if ($dia == $dia_mes) {
                            $classe_aniv = 'background_aniv';
                            $classe_whats = '';
                        } else {
                            $classe_aniv = '';
                        }
                        ?>
                        <tr class="column-body <?php echo $classe_aniv ?>">
                            <td data-label="Foto" class="td-table" id="radius-column-foto">
                                <img class="profile_table" src="../img/membros/<?php echo $foto ?>" alt="Perfil" title="Perfil">
                            </td>
                            <td data-label="Nome" class="td-table">
                                <?php echo $nome ?>
                            </td>
                            <td data-label="Data de Nascimento" class="td-table">
                                <?php echo $data_nascF ?>
                            </td>
                            <td data-label="Email" class="td-table">
                                <?php echo $email ?>
                            </td>
                            <td data-label="Telefone" class="td-table column-hidden">
                                <?php echo $telefone ?>
                            </td>
                            <td data-label="Cadastro" class="td-table column-hidden">
                                Pastor
                            </td>
                            <td data-label="Ativo" class="td-table column-hidden">
                                <?php echo $tab ?>
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
                                                onclick="dados('<?php echo $nome ?>', '<?php echo $cpf ?>', 
                                    '<?php echo $email ?>', '<?php echo $telefone ?>', '<?php echo $endereco ?>', '<?php echo $foto ?>',
                                    '<?php echo $data_nascF ?>', '<?php echo $data_cadF ?>', '<?php echo $nome_ig ?>', 'Não Lançado', 'Pastor')">
                                                <i class="bi bi-info-circle icons_actions"></i>
                                                Ver Dados</a>
                                        </li>

                                        <?php if ($dia == $dia_mes) { ?>
                                            <li>
                                                <a class="dropdown-item" target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $telefone ?>&text=Ola <?php echo $nome ?>, 
                                                    nos da <?php echo $nome_ig ?> desejamos a você um feliz aniversário, que Deus te abençoe
                                                    e te ilumine..." title="Enviar Felicitações">
                                                    <i class="bi bi-whatsapp icons_actions"></i>
                                                    Enviar Felicitações
                                                </a>
                                            </li>
                                        <?php } else { ?>

                                        <?php } ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else {
            echo 'Não existem membros e pastores aniversariando este mês!';
        }
        ?>
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
                    <img src="../img/svg/cpf.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-person-vcard icon_user"></i> -->
                    <span class="user_name">CPF: </span>
                    <span class="texts_son" id="cpf-dados"></span>
                </div>
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
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Data de Cadastro: </span>
                    <span class="texts_son" id="cadastro-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Data de nascimento: </span>
                    <span class="texts_son" id="nasc-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/igreja.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Igreja: </span>
                    <span class="texts_son" id="igreja-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/calendario.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Data Batismo: </span>
                    <span class="texts_son" id="batismo-dados"></span>
                </div>
                <div class="user_area">
                    <img src="../img/svg/indicador.svg" class="img_icon_data" alt="">
                    <!-- <i class="bi bi-calendar4-event icon_user"></i> -->
                    <span class="user_name">Cargo Ministerial: </span>
                    <span class="texts_son" id="membro-dados"></span>
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
    function dados(nome, cpf, email, telefone, endereco, foto, data_nasc, data_cad, igreja, data_bat, cargo) {

        if (data_bat === '00/00/0000') {
            data_bat = 'Não Batizado!';
        }

        $('#nome-dados').text(nome);
        $('#cpf-dados').text(cpf);
        $('#email-dados').text(email);
        $('#telefone-dados').text(telefone);
        $('#endereco-dados').text(endereco);
        $('#cadastro-dados').text(data_cad);
        $('#nasc-dados').text(data_nasc);
        $('#igreja-dados').text(igreja);
        $('#batismo-dados').text(data_bat);
        $('#membro-dados').text(cargo);
        $('#foto-dados').attr('src', '../img/membros/' + foto);


        var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
        myModal.show();
        $('#mensagem').text('');
    }
</script>