
/**
 * Contato
 * 
 * 1. Mascáras dos campos; 
 * 2. Submit do formulário.
 */


var contato = {
    
    init: function (){
        
        this.masks();
        this.onSubmit();
    },
    
    masks: function (){      
        
        // Número de telefone com 8 ou 9 dígitos
        $("#telefone").mask("(99) 9999-9999?9").ready(function(event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            
            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        });
    },
    
    onSubmit: function (){
        
        var me = this;
        $("#form-contato").on("submit", function(event){
            event.preventDefault();
                        
            if ( me.validateFields() ) {                
                $.post("ajax/salvar-contato.php", $(this).serialize(), function (html){
                    
                    $("#sub-content").fadeOut(500, function (){                        
                        $(this).html(html).slideDown(500);
                    });
                }, "html").fail(function (){
                    alert("error");
                });
            }
            me.pageUp();
        });
    },
    
    validateFields: function (){
        
        if ( $.trim( $("#nome").val() ) === "" ) {
            alert("Digite seu nome!");
            $("#nome").focus();            
            return false;
        }
        else if ( $.trim( $("#email").val() ) === "" ) {
            alert("Digite seu email!");
            $("#email").focus();            
            return false;
        }
        else if ( $.trim( $("#assunto").val() ) === "" ) {
            alert("Digite o assunto!");
            $("#assunto").focus();            
            return false;
        }
        else if ( $.trim( $("#mensagem").val() ) === "" ) {
            alert("Escreva sua mensagem!");
            $("#mensagem").focus();            
            return false;
        }            
        return true;        
    },
    
    pageUp: function (){
        $("html, body").animate({
            scrollTop: $("#content").offset().top
        }, 1000);
    }
    
    
};


/**
 * Iniciar
 */
contato.init();