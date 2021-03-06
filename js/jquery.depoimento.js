
/*
 * Depoimentos
 */


var depoimentos = {
    
    init: function (){
        this.onAutoResizeAll();
        this.onDepoAdd();
        this.onDepoShowEditar();
        this.onDepoEditar();
        this.onDepoCancelar();
        this.onDepoExcluir();
    },
    
    onAutoResizeAll: function (){
        $("#mensagem").autoResize();
        $(".depo-textArea").autoResize();
        
        //deve vir após autoResize()
        $(".depo-editar").hide();
    },
    
    onAutoResizePrimeiroDepo: function (){
        var div_pai = $(".box-depo:eq(0)");
        
        $(".depo-textArea", div_pai).autoResize(); 
        $(".depo-editar", div_pai).hide();
    },
    
    onAutoResizeDepoEspecifico: function (index){
        var div_pai = $(".box-depo").eq(index);

        $(".depo-textArea", div_pai).autoResize(); 
        $(".depo-editar", div_pai).hide();
    },
    
    onDepoAdd: function (){
        
        var me = this;
        $("#btn-new-depo").on("click", function(event){  
            event.preventDefault();            
            
            var msg = $.trim( $("#mensagem").val() );
            
            if ( msg !== "" ) {            
                $.post("ajax/depoimento-save.php", "mensagem="+msg, function (html){

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

               }, "html").fail(function (){
                    alert("error");
                }); 
           }            
        });
    },
    
    onDepoShowEditar: function (){        
        
        // Mostrar a edição
        $("#pai-depos").on("click", ".depo-icon-editar", function (event){
            event.preventDefault();            
            var div_pai = $(this).parents(".box-depo");
  
            div_pai.find(".depo-msg").fadeOut(0);
            div_pai.find(".depo-editar").fadeIn(0); 
        });        
        
    },
    
    onDepoEditar: function (){
        
        // Salvar
        var me = this;
        $("#pai-depos").on("click", ".depo-btn-alterar", function (event){
            event.preventDefault();            

            var div_pai = $(this).parents(".box-depo");
            
            var msg     = $.trim( div_pai.find(".depo-textArea").val() );
            var id_depo = div_pai.children(":hidden").val();
            
            if ( msg !== "" ) {    
                $.post("ajax/depoimento-save.php", "mensagem="+msg+"&id="+id_depo, function (html){
                    
                    var index = div_pai.index();
                    
                    /*
                     * ATENÇÃO, esta função precisa de um callback,
                     * pode ocorrer bug aqui!!
                     */
                    div_pai.replaceWith(html);                    
                    me.onAutoResizeDepoEspecifico( index );

                }, "html").fail(function (){
                    alert("error");
                });
            }
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
        
        $("#pai-depos").on("click", ".depo-icon-excluir", function (event){
            event.preventDefault(); 
          
            var div_pai = $(this).parents(".box-depo");
            var id_depo = div_pai.children(":hidden").val();
            
            if ( confirm("Tem certeza?") ) {
                div_pai.fadeOut(500, function (){
                    $.post("ajax/depoimento-delete.php", "id="+id_depo, function (){

                    }).fail(function (){
                        alert("error");
                    });
                });
            }
            return false;
        });
    }
};


/**
 * Iniciar
 */
depoimentos.init();




