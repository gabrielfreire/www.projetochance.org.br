

var matricula = {
    
    init: function (){
        
        this.masks();
    },
    
    masks: function (){        
        $(":text[name=data-nasc]").mask("99/99/9999");
        $(":text[name=rg]").mask("99.999.999-*");
        $(":text[name=cpf]").mask("999.999.999-99");        
        
        $(":text[name=cep]").mask("99999-999", {
            completed: function (){
                
                // Consultar CEP
                $.post("cep-ajax.php", "cep="+$(this).val(), function (dados){                    
                    switch (dados.resultado) {
                        
                        // Logradouro completo 
                        case "1":                            
                            $(":text[name=endereco]").val(dados.tipo_logradouro+" "+dados.logradouro);
                            $(":text[name=bairro]").val(dados.bairro);
                            $(":text[name=cidade]").val(dados.cidade);                            
                            $("select[name=estado] > option:contains('"+dados.uf+"')").attr("selected", "selected");
                            break;
                        
                        // Logradouro único 
                        case "2":
                            $(":text[name=cidade]").val(dados.cidade);
                            $("select[name=estado] > option:contains('"+dados.uf+"')").attr("selected", "selected");
                            break;
                    }
                    
                }, "json").fail(function (){
                    alert("error");
                });
            }
        });               
        
        // Número de telefone com 8 ou 9 dígitos
        $(":text[name=telefone]").mask("(99) 9999-9999?9").ready(function(event) {
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
    }
};


