
/**
 * Home
 * 
 * 1. Submit do formulário de login.
 * 
 * IMPORTANTE: 
 * 1. script chamado em includes/footer.php
 * 2. Iniciado também pelo footer
 */


var home = {
    
    init: function (){  
        this.onSubmit_login();
    },
    
    onSubmit_login: function (){
        
        var me = this;
        $("a", "#form-login").on("click", function(event){
            event.preventDefault();
                        
            if ( me.validateFields() ) { 
                
                $.post("ajax/aluno-logar.php", $("#form-login").serialize(), function (login){                    
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
        
        if ( $.trim( $("#login-email").val() ) === "" ) {
            alert("Digite seu email!");
            $("#login-email").focus();            
            return false;
        }
        else if ( $.trim( $("#login-senha").val() ) === "" ) {
            alert("Digite sua senha!");
            $("#login-senha").focus();            
            return false;
        }
        return true;        
    }    
    
};


