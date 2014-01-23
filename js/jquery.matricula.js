

var matricula = {
    
    init: function (){
        
        this.masks();
    },
    
    masks: function (){
        $(":text[name=cep]").mask("99999-999");
        $(":text[name=data-nasc]").mask("99/99/9999");
        $(":text[name=rg]").mask("99.999.999-*");
        $(":text[name=cpf]").mask("999.999.999-99");
        
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


