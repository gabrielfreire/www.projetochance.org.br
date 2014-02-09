
/**
 * Matrícula
 * 
 * 1. Mascáras dos campos; 
 * 2. Submit do formulário.
 */


var matricula = {
    
    init: function (){        
        this.masks();
        this.onSubmit();
    },
    
    masks: function (){        
        $("#data-nasc").mask("99/99/9999");
        $("#rg").mask("99.999.999-*");
        $("#cpf").mask("999.999.999-99");        
        
        $("#cep").mask("99999-999", {
            completed: function (){
                
                // Consultar CEP
                $.post("ajax/webservice-cep.php", "cep="+$(this).val(), function (json){                    
                    switch (json.resultado) {
                        
                        // Logradouro completo 
                        case "1":                            
                            $("#endereco").val(json.tipo_logradouro+" "+json.logradouro);
                            $("#bairro").val(json.bairro);
                            $("#cidade").val(json.cidade);                            
                            $("#estado > option:contains('"+json.uf+"')").attr("selected", "selected");
                            break;
                        
                        // Logradouro único 
                        case "2":
                            $("#cidade").val(json.cidade);
                            $("#estado > option:contains('"+json.uf+"')").attr("selected", "selected");
                            break;
                    }
                    
                }, "json").fail(function (){
                    alert("error");
                });
            }
        });               
        
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
        $("#form-matricula").on("submit", function(event){
            event.preventDefault();
                        
            if ( me.validateFields() ) { 
                $.post("ajax/matricula-save.php", $(this).serialize(), function (html){

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
        else if ( $.trim( $("#estado-civil").val() ) === "" ) {
            alert("Selecione seu estado civil!");
            $("#estado-civil").focus();            
            return false;
        }
        else if ( $.trim( $("#cep").val() ) === "" ) {
            alert("Digite seu CEP!");
            $("#cep").focus();            
            return false;
        }
        else if ( $.trim( $("#endereco").val() ) === "" ) {
            alert("Digite seu endereço!");
            $("#endereco").focus();            
            return false;
        }
        else if ( $.trim( $("#numero").val() ) === "" ) {
            alert("Digite o número de seu endereço!");
            $("#numero").focus();            
            return false;
        }
        else if ( $.trim( $("#bairro").val() ) === "" ) {
            alert("Digite seu bairro!");
            $("#bairro").focus();            
            return false;
        }
        else if ( $.trim( $("#cidade").val() ) === "" ) {
            alert("Digite sua cidade!");
            $("#cidade").focus();            
            return false;
        }
        else if ( $.trim( $("#estado").val() ) === "" ) {
            alert("Digite seu estado!");
            $("#estado").focus();            
            return false;
        }
        else if ( $.trim( $("#data-nasc").val() ) === "" ) {
            alert("Digite sua data de nascimento!");
            $("#data-nasc").focus();            
            return false;
        }
        else if ( $.trim( $("#rg").val() ) === "" ) {
            alert("Digite seu RG!");
            $("#rg").focus();            
            return false;
        }
        else if ( $.trim( $("#cpf").val() ) === "" ) {
            alert("Digite seu CPF!");
            $("#cpf").focus();            
            return false;
        }
        else if ( $.trim( $("#telefone").val() ) === "" ) {
            alert("Digite seu telefone!");
            $("#telefone").focus();            
            return false;
        }
        else if ( $.trim( $("#email").val() ) === "" ) {
            alert("Digite seu email!");
            $("#email").focus();            
            return false;
        }
        else if ( $.trim( $("#senha").val() ) === "" ) {
            alert("Digite sua senha para o portal!");
            $("#senha").focus();            
            return false;
        }
        else if ( $.trim( $("#confirmar-senha").val() ) === "" ) {
            alert("Confirme sua senha!");
            $("#confirmar-senha").focus();            
            return false;
        }             
        else if ( $("#senha").val() !== $("#confirmar-senha").val() ) {
            alert("Senhas digitadas não conferem!");
            $("#senha").focus();            
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
matricula.init();