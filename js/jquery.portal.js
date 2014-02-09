
/**
 * Login no portal
 * 
 * 1. Submit do formulário.
 */


var portal = {
    
    init: function (){  
        this.onSubmit();
        this.onMouseoverFoto();
    },
    
    onSubmit: function (){
        
        var me = this;
        $("#form-portal").on("submit", function(event){
            event.preventDefault();
                        
            if ( me.validateFields() ) {     
                
                $.post("ajax/aluno-login.php", $(this).serialize(), function (login){                    
                    if (login === "true") {
                        window.location.href = "portal.html";
                    }
                    else {
                        alert("Dados inválidos");
                        me.pageUp();
                    }
                    
                }).fail(function (){
                    alert("error");
                });                
            }
            else {
                me.pageUp();
            }
        });
    },
    
    validateFields: function (){
        
        if ( $.trim( $("#portal-email").val() ) === "" ) {
            alert("Digite seu email!");
            $("#portal-email").focus();            
            return false;
        }
        else if ( $.trim( $("#portal-senha").val() ) === "" ) {
            alert("Digite sua senha!");
            $("#portal-senha").focus();            
            return false;
        }
        return true;        
    },
    
    onMouseoverFoto: function (){
        
        $("div.portal-box-img").on({
            mouseover: function (){
                $("div.portal-box-img-editar").show();
            },
            mouseout: function (){
                $("div.portal-box-img-editar").hide();
            }
        });
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
portal.init();


