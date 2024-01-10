<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'pastores_presidentes';
?>

<main id="container" class="buttons_register">
    <a href="#" onclick="inserir()" class="button_tables_register">
         Novo Pastor
         <i class="bi bi-plus-lg icon_tables_registers"></i>
    </a>
</main>








<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="Cadastro">Editar Dados</h3>
          <span class="bi bi-x mod_close" data-bs-dismiss="modal" aria-label="Close"></span>
        </div>
        <form id="form-usu" method="post">
            <div class="modal-body">
                <div action="#" class="form-modal">
                    <div class="form first">
                        <div class="details personal">
                            <span class="title-modal">Personalizar detalhes</span>
        
                            <div class="fields">
                                <div class="input-field">
                                    <label>Nome</label>
                                    <input type="text" name="nome_usu" id="nome_usu" placeholder="Insira o Nome" value="<?php echo $nome_usu ?>" required>
                                </div>
            
                                <div class="input-field field_cpf_1">
                                    <label>CPF</label>
                                    <input type="text" name="cpf_usu" id="cpf_usu" placeholder="Insira o CPF" value="<?php echo $cpf_usu ?>" required>
                                </div>
            
                                <div class="input-field">
                                    <label>Email</label>
                                    <input type="email" name="email_usu" id="email_usu" placeholder="Insira o Email" value="<?php echo $email_usu ?>" required>
                                </div>
            
                                <div class="input-field field_senha_1">
                                    <label>Senha</label>
                                    <input type="text" name="senha_usu" id="senha_usu" placeholder="Insira a Senha" value="<?php echo $senha_usu ?>" required>
                                </div>
                                
                                <input type="hidden" name="id_usu" value="<?php echo $id_usuario ?>">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="msg_usu"></div>
            <div class="modal-footer">
                <div class="area-buttons">
                    <button id="btn-fechar-usu" class="btn-close" data-bs-dismiss="modal">Fechar</button>

                    <button type="submit" class="btn-add">
                        Editar
                        <i class="bi bi-pencil-square icon-btn-form"></i>
                    </button>
                </div>
            </div>
          </div>
        </form>
    </div>
</div>



<script type="text/javascript">
   var pag = "<?= $pagina ?>" 
</script>
<script src="../js/ajax.js"></script>