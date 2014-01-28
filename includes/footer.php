<?php

/* 
 * Rodapé do site
 */

?>

<footer>
  <p>Projeto Chance - Todos os direitos reservados ® - Rua Melchior Giola, 646 - Paraisópolis - São Paulo - SP / 11 2866-3441</p>
</footer>


<!-- javascript padrão (cabeçalho) -->
<script src="js/jquery.min.js" type="text/javascript"></script>	
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
                    width: "80px"
                }, 250);
            },
            focusout: function (){
                $(this).animate({
                    width: "50px"
                }, 200);
            }
        });
        
        /* Ativar efeito no menu vertical */
        $("li > a", "ol#nav-left").on({
            mouseover: function (){
                $(this).animate({
                    marginLeft: "10px"
                }, 85);
            },
            mouseout: function (){
                $(this).animate({
                    marginLeft: 0
                }, 85);
            }
        });
    });
</script>