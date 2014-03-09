
/**
 * Modal
 */


var modal = {
    
    init: function (){        
        this.onModal();
    },
    
    onModal: function (){ 
        
        $("a[name=modal]").on("click", function(event) {
            event.preventDefault();
            
            // Máscara para cobrir a tela
            $("#sub-content").append("<div id=\"mask\"></div>");

            var id = $(this).attr("href");

            var maskHeight = $(document).height();
            var maskWidth = $(window).width();

            $("#mask").css({width:maskWidth, height:maskHeight});

            $("#mask").fadeIn(50);	
            $("#mask").fadeTo("slow", 0.8);	

            // Resgatar altura e largura do browser
            var winH = $(window).height();
            var winW = $(window).width();

            $(id).css("top",  winH/2-$(id).height()/2);
            $(id).css("left", winW/2-$(id).width()/2);
            $(id).css("position", "fixed");

            $(id).fadeIn(2000); 
	
	});
	
	$(".window .close").on("click", function (event) {
            event.preventDefault();

            $("#mask").hide();
            $(".window").hide();
	});		
	
	$("#mask").on("click", function () {
            $(this).hide();
            $(".window").hide();
	});		
    }
};


/**
 * Iniciar
 */
modal.init();