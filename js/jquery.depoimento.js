
/*
 * Depoimentos
 */


var depoimentos = {
    
    init: function (){
        this.onAutoResize();
        this.onDepoAdd();
        this.onDepoEditar();
        this.onDepoExcluir();
        this.onDepoSalvar();
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
    
    onAutoResizeDepoEspecifico: function (index){
        $(".depo-textArea").eq(index).autoResize(); 

        //deve vir após autoResize()
        $(".depo-editar", $(".box-depo").eq(index)).hide();
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
                $("#pai-depos").prepend(html);
               
                //AutoResize para depoimento que acabou de ser inserido
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
        
    },
    
    onDepoSalvar: function (){
        
        // Salvar
        var me = this;
        $("#pai-depos").on("click", ".depo-btn-alterar", function (event){
            event.preventDefault();            

            var div_pai = $(this).parents(".box-depo");
            
            //mensagem e id do depoimento para salvar
            var parametros = "mensagem="+div_pai.find(".depo-textArea").val()
                    +"&id="+div_pai.children(":hidden").val();
            
            $.post("ajax/ajax-depoimento.php", parametros, function (html){
                
                var index = div_pai.index();
                div_pai.replaceWith(html);
                
                me.onAutoResizeDepoEspecifico( index );
            }, "html");
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




