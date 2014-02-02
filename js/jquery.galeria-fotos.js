
/**
 * Galeria de fotos
 * 
 * 1. Ativar efeito fancybox;
 * 2. Escolher propriedades de efeito.
 */


var galeria_de_fotos = {
    
    init: function (){        
        this.onFancybox();
    },
    
    onFancybox: function (){ 
        
        //ativar fancybox
        $("a.rel", "div.thumbnails").fancybox({
            openEffect : 'elastic',
            openSpeed  : 150,
            closeEffect : 'elastic',
            closeSpeed  : 350, 
            arrows: true,
            helpers : {
                title : {
                    type : 'float'//float, over, outside,inside
                }
            }                
        });
    }
};


/**
 * Iniciar
 */
galeria_de_fotos.init();