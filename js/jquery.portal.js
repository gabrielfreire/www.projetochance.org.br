
/**
 * Login no portal
 * 
 * 1. Submit do formulário.
 */


var portal = {
    
    init: function (){  
        this.onRedefinirSenha();
        this.onSubmit_login();
        this.onMouseoverEditarFoto();
        this.onUpload();
    },
    
    onRedefinirSenha: function () {
        
        $("#form-esqueci-senha").on("submit", function(event){
            event.preventDefault();
            
            var foo = $(this);
            
            
            $.post("ajax/aluno-email-senha.php", $(this).serialize(), function (status){                    

                // esconde mensagens já existentes (se houver)
                $(".p-msg").hide();

                // 1 = email enviado
                // 2 = falha ao enviar
                // 3 = email não cadastrado
                switch (status) {
                    case "1":
                        foo.find("input").hide(function (){                                
                            $(".status1").show();
                        });
                        break;

                    case "2":
                        $(".status2").show();
                        break;

                    case "3":
                        $(".status3").show();
                        break;
                }


            }).fail(function (){
                alert("error");
            });             
        });
    },
    
    onSubmit_login: function (){
        
        var me = this;
        $("#form-portal").on("submit", function(event){
            event.preventDefault();
                        
            if ( me.validateFields() ) {     
                
                $.post("ajax/aluno-logar.php", $(this).serialize(), function (login){                    
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
    
    onMouseoverEditarFoto: function (){
        
        $("div.portal-box-img").on({
            mouseover: function (){
                $("a.portal-box-img-editar").show();
            },
            mouseout: function (){
                $("a.portal-box-img-editar").hide();
            }
        });
    },
    
    onUpload: function (){
        
        $(":file", "#form-foto").on("change", function(){
            // Esconder modal
            $("#mask").hide();
            $(".window").hide();
            
            // Esconder edição da foto
            $(".portal-box-img-editar").hide(function (){
                $(this).remove();
            });
            
            var box_img  = $(this).parents(".portal-box-img");
            
            // Esconde imagem atual
            box_img.children("img").hide();
            
            // Mostrar carregamento e inserir o frame que será exibido 
            box_img.append("\
                <img src=\"images/ajax-loader.gif\" style=\"margin-left:27px\" alt=\"\" />\n\
                <iframe name=\"frame\" style=\"display:none\" src=\"\"></iframe>\n\
            ");
            
            // Atribuir elementos para upload e enviar
            var form = $(this).parent();
            form.attr("action", "ajax/aluno-upload.php");
            form.attr("enctype", "multipart/form-data");
            form.attr("target", "frame");            
            form.submit();     
            
            $("iframe").on("load", function (){
                var me = $(this);
                
                // Esconder carregamento e mostrar frame
                $(this).prev("img").fadeOut("slow", function (){
                    me.fadeIn("slow");
                });
            });
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


