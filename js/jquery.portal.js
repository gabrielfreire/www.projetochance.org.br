
/**
 * Login no portal
 * 
 * 1. Submit do formulário.
 */


var portal = {
    
    init: function (){  
        this.onSubmit();
        this.onMouseoverEditarFoto();
        this.onUpload();
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
            $("#mask").hide();
            $(".window").hide();
            $(".portal-box-img-editar").hide();
            
            var form = $(this).parent();
            var box  = $(this).parents(".portal-box-img");
            
            box.children("img").hide();
            box.append("<iframe name=\"frame\" src=\"\"></iframe>");
            
            form.attr("action", "ajax/aluno-upload.php");
            form.attr("enctype", "multipart/form-data");
            form.attr("target", "frame");            
            form.submit();            
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


