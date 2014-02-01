
/**
 * Login
 * 
 * 1. Submit do formulário.
 * 
 * IMPORTANTE: 
 * 1. script chamado em includes/footer.php
 * 2. Iniciado também pelo footer
 */


var login = {
    
    init: function (){  
        this.onLogout();
        this.onSubmit();
    },
    
    onLogout: function (){
      
        $("#sair").on("click", function(event){
            event.preventDefault();
            
            $.post("ajax/ajax-logout.php", function (){
                
            });
        });
    },
    
    onSubmit: function (){
        
        var me = this;
        $("a", "#form-login").on("click", function(event){
            event.preventDefault();
                        
            if ( me.validateFields() ) { 
                
                $.post("ajax/ajax-login.php", $("#form-login").serialize(), function (login){                    
                    if (login === "true") {
                        $("#form-login").submit();
                    }
                    else {
                        alert("Dados inválidos");
                    }
                    
                }).fail(function (){
                    alert("error");
                });                
            }
        });
    },
    
    validateFields: function (){
        
        if ( $.trim( $("#email").val() ) === "" ) {
            alert("Digite seu email!");
            $("#email").focus();            
            return false;
        }
        else if ( $.trim( $("#senha").val() ) === "" ) {
            alert("Digite sua senha!");
            $("#senha").focus();            
            return false;
        }
        return true;        
    }    
    
};


