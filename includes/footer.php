<?php

/* 
 * Rodapé do site
 */

?>

<footer>
  <p>Projeto Chance - Todos os direitos reservados ® - Rua Melchior Giola, 646 - Paraisópolis - São Paulo - SP / 11 2866-3441</p>
</footer>

<!-- javascript at the bottom for fast page loading -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
<script type="text/javascript" src="js/jquery.sooperfish.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
        /* Ativar efeito no menu drop down */
        $('ul.sf-menu').sooperfish();
        
        /* Ativar efeito na caixa de busca */
        $("input:text", "#box-buscar").on({
            focus: function (){
                $(this).animate({
                    width: "100px"
                }, 300);
            },
            focusout: function (){
                $(this).animate({
                    width: "60px"
                }, 300);
            }
        });
    });
</script>