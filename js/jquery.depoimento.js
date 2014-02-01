
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
        $(".depo-textArea").hide();
        $(".depo-btn-alterar").hide();
        $(".depo-btn-cancelar").hide();
    },
    
    onAutoResizePrimeiroDepo: function (){
        $(".depo-textArea:eq(0)").autoResize(); 
        
        //deve vir após autoResize()
        $(".depo-textArea:eq(0)").hide();
        $(".depo-btn-alterar:eq(0)").hide();
        $(".depo-btn-cancelar:eq(0)").hide();
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
        $("#pai-depos").on("click", ".depo-editar", function (event){
            event.preventDefault();            
            var div_pai = $(this).parents(".box-depo");
  
            div_pai.find(".depo-msg").fadeOut(0, function (){   
                
                div_pai.find(".depo-textArea").fadeIn(0);
                div_pai.find(".depo-btn-alterar").fadeIn(0);                
                div_pai.find(".depo-btn-cancelar").fadeIn(0);                
            });
        });
        
        // Editar
        $("#pai-depos").on("click", ".depo-btn-alterar", function (){
            
        });
    },
    
    onDepoCancelar: function (){
        
        $("#pai-depos").on("click", ".depo-btn-cancelar", function (event){
            event.preventDefault();            
            var div_pai = $(this).parents(".box-depo");
  
            div_pai.find(".depo-msg").fadeIn(0, function (){   
                
                div_pai.find(".depo-textArea").fadeOut(0);
                div_pai.find(".depo-btn-alterar").fadeOut(0);                
                div_pai.find(".depo-btn-cancelar").fadeOut(0);                
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




