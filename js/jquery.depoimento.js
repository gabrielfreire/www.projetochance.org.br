
/*
 * Depoimentos
 */


var depoimentos = {
    
    init: function (){
        this.onAutoResize();
        this.onDepoAdd();
        this.onDepoEditar();
        this.onDepoExcluir();
        this.onDepoCancelar();
    },
    
    onAutoResize: function (){
        $("#mensagem").autoResize();
        $(".depo-textArea").autoResize(); 
        
        //deve vir após autoResize()
        $(".depo-editar").hide();
    },
    
    onAutoResizePrimeiroDepo: function (){
        $(".depo-textArea:eq(0)").autoResize(); 

        //deve vir após autoResize()
        $(".depo-editar", ".box-depo:eq(0)").hide();
    },
    
    onDepoAdd: function (){
        
        var me = this;
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
                me.onAutoResizePrimeiroDepo();
        
           }, "html");            
        });
    },
    
    onDepoEditar: function (){        
        
        // Mostrar a edição
        $("#pai-depos").on("click", ".depo-icon-editar", function (event){
            event.preventDefault();            
            var div_pai = $(this).parents(".box-depo");
  
            div_pai.find(".depo-msg").fadeOut(0);
            div_pai.find(".depo-editar").fadeIn(0); 
        });
        
        // Editar
        $("#pai-depos").on("click", ".depo-btn-alterar", function (){
            
        });
    },
    
    onDepoCancelar: function (){
        
        $("#pai-depos").on("click", ".depo-btn-cancelar", function (event){
            event.preventDefault();            
            var div_pai = $(this).parents(".box-depo");
  
            div_pai.find(".depo-editar").fadeOut(0);
            div_pai.find(".depo-msg").fadeIn(0);  
        });
    },
    
    onDepoExcluir: function (){
        
    }
};


/**
 * Iniciar
 */
depoimentos.init();




