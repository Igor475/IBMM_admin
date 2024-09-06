<?php
   require_once('sistema/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="sistema/img/logo-IBMM-preta.ico" type="image/x-icon">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
   <link rel="stylesheet" href="assets/css/styles.css">
   <title><?php echo $nome_igreja_sistema ?></title>
</head>

<body>
   <div class="ti_area_sel">
      <div class="img_church_sfl">
         <img src="assets/img/Logo-IBMM.png" alt="" class="des">
      </div>
      <h1 class="title_churchs">Selecione uma igreja</h1>
   </div>
   <div class="area_churchs">
      <?php
      $query = $pdo->query("SELECT * FROM igrejas order by matriz desc, nome asc");
      $res = $query->fetchAll(PDO::FETCH_ASSOC);
      $total_reg = count($res);

      for ($i = 0; $i < $total_reg; $i++) {
         foreach ($res[$i] as $key => $value) {
         }

         $nome = $res[$i]['nome'];
         $imagem = $res[$i]['imagem'];
         $matriz = $res[$i]['matriz'];
         $pastor = $res[$i]['pastor'];
         $id_ig = $res[$i]['id'];
         $url = $res[$i]['url'];

         if ($matriz == 'Sim') {
            $bordacard = 'bordacardsede';
            $classe = 'text_matriz';
            $texto_matriz = 'Sede';
         } else {
            $bordacard = 'bordacard';
            $classe = 'text_filiais';
            $texto_matriz = 'Filial';
         }

         $query_m = $pdo->query("SELECT *FROM membros WHERE  igreja = '$id_ig' and ativo = 'Sim'");
         $res_m = $query_m->fetchAll(PDO::FETCH_ASSOC);
         $membrosCad = @count($res_m);

         $query_con = $pdo->query("SELECT * FROM pastores where id = '$pastor'");
         $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
         if (count($res_con) > 0) {
            $nome_p = $res_con[0]['nome'];
         } else {
            $nome_p = 'Não Definido';
         }

         ?>
         <a href="igreja<?php echo $url?>" class="card_church">
            <div class="head_church_sel">
               <div class="info_church_sel">
                  <p class="names_chruchs_sel <?php echo $classe ?>">
                     <?php echo $nome ?>
                  </p>
                  <span class="names_ch_sel">
                     <b>Responsável: </b><?php echo $nome_p ?>
                  </span>
               </div>

               <div class="more_info_sel">
                  <div class="image_churchs_sel">
                     <img class="img_cards_churchs" src="sistema/img/igrejas/<?php echo $imagem ?>" alt="">
                  </div>
                  <p class="text_member"><?php echo $texto_matriz ?></p>
               </div>
            </div>
         </a>
      <?php } ?>
   </div>
</body>

</html>