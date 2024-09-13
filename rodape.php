<footer class="footer__church">
      <div class="box__footer">
         <div class="footer__ch">

            <div class="footer__flex">
               <div class="container__logo__footer">
                  <div class="logo__footer">
                     <img src="assets/img/Logo-IBMM.png" alt="" class="img__footer">
                  </div>
               </div>
               <div class="area__footer__1">
                  <h3 class="title__footer">Contato</h3>
                  <ul class="items__footer__1">
                     <li>
                        <i class="ri-mail-line icon__footer"></i>
                        <?php echo $email_igreja ?>
                     </li>
                     <li>
                        <i class="ri-phone-line icon__footer"></i>
                        <?php echo $telefone_igreja ?>
                     </li>
                     <li>
                        <i class="ri-whatsapp-line icon__footer"></i>
                        (21) 998867793
                     </li>
                     <li>
                        <i class="ri-map-pin-line icon__footer"></i>
                        <?php echo $endereco_igreja ?>
                     </li>
                  </ul>
               </div>
               <div class="area__footer__2">
                  <h3 class="title__footer">Links Úteis</h3>
                  <ul class="items__footer__2">
                     <li>
                        <a href="#" class="links__footer">
                           Início
                        </a>
                     </li>
                     <li>
                        <a href="#" class="links__footer">
                           ECM
                        </a>
                     </li>
                     <li>
                        <a href="#" class="links__footer">
                           Sobre
                        </a>
                     </li>
                     <li>
                        <a href="#" class="links__footer">
                           Palavra
                        </a>
                     </li>
                     <li>
                        <a href="#" class="links__footer">
                           Notícias
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="links__socials">
            <?php if($facebook != "") { ?>
               <a href="<?php echo $facebook ?>" target="_blank" class="socials">
                  <i class="ri-facebook-fill icons__footer__socials"></i>
               </a>
            <?php } ?>
            <?php if($instagram != "") { ?>
               <a href="<?php echo $instagram ?>" target="_blank" class="socials">
                  <i class="ri-instagram-fill icons__footer__socials"></i>
               </a>
            <?php }?>
            <?php if($youtube != "") { ?>
               <a href="<?php echo $youtube ?>" target="_blank" class="socials">
                  <i class="ri-youtube-fill icons__footer__socials"></i>
               </a>
            <?php }?>
         </div>
         <div class="copyright__footer">
            <span class="txt__copyright">Copyright © 2024 IBMM. All rights reserved. CNPJ: 18.829.333.0001/93</span>
         </div>
      </div>
   </footer>