
/*
 * Depoimentos
 */


var depoimentos = {
    
    init: function (){
        this.onAutoResize();
        this.onDepoAdd();
        this.onDepoEditar();
        this.onDepoExcluir();
    },
    
    onAutoResize: function (){
        $("#mensagem").autoResize();
        $(".depo-textArea").autoResize(); 
        
        //deve vir após autoResize()
        $(".depo-textArea").hide();
        $(".depo-btn-alterar").hide();
    },
    
    onDepoAdd: function (){
        
        $("#btn-new-depo").on("click", function(event){  
            event.preventDefault();            
            
            $.post("ajax/ajax-depoimento.php", "mensagem="+$("#mensagem").val(), function (html){
               
                //apagar textarea e dar foco
                $("#mensagem").val("").height(35).focus();
                
                //se for o primeiro depoimento, apaga a mensagem
                if ( $(".depo-none").is(":visible") ) {
                    $(".depo-none").hide();
                }
                
                //inserir depoimento ao topo da div
                $("#pai-depos")
                    .prepend(html)
                        .find(".box-depo:eq(0)")
                            .fadeIn(2000);
               
               /*
                * AutoResize para depoimento que acabou de ser inserido
                */
                $(".depo-textArea:eq(0)").autoResize(); 
        
                //deve vir após autoResize()
                $(".depo-textArea:eq(0)").hide();
                $(".depo-btn-alterar:eq(0)").hide();
        
           }, "html");            
        });
    },
    
    onDepoEditar: function (){        
        
        $("#pai-depos").on("click", ".depo-editar", function (event){
            event.preventDefault();            
            var div_pai = $(this).parents(".box-depo");
  
            div_pai.find(".depo-msg").fadeOut(function (){   
                
                div_pai.find(".depo-textArea").fadeIn();
                div_pai.find(".depo-btn-alterar").fadeIn();                
            });
        });
    },
    
    onDepoExcluir: function (){
        
    }
};


/**
 * Iniciar
 */
depoimentos.init();




