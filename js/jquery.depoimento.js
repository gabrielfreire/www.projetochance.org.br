
/*
 * Depoimentos
 */


var depoimentos = {
    
    init: function (){
        this.onAdd();
    },
    
    onAdd: function (){
        
        $("#btn-new-depo").on("click", function(){  
            
            $.post("ajax/ajax-depoimento.php", "mensagem="+$("#mensagem").val(), function (html){
               
                //apagar textarea e dar foco
                $("#mensagem").val("").focus();
                
                //se for o primeiro depoimento, apaga a mensagem
                if ( $(".depo-none").is(":visible") ) {
                    $(".depo-none").hide();
                }
                
                //inserir depoimento ao topo da div
                $("#pai-depos")
                    .prepend(html)
                        .find(".box-depo:eq(0)")
                            .fadeIn(2000);
               
           }, "html");            
        });
    }
};


/**
 * Iniciar
 */
depoimentos.init();




