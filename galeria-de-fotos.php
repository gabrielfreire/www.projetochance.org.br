<!DOCTYPE html>
<html>
    <head>
        <title>.:: Projeto Chance ::.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
        <link rel="stylesheet" type="text/css" href="js/fancy/jquery.fancybox.css?v=2.1.0" media="screen"/>
    </head>
    <body>
        <div id="main">    
            <?php include "./includes/header.php"; ?>

            
            <div id="content">                              
                <?php include "./includes/left.php"; ?>                
                
                <div id="sub-content">
                    <h1>Fotos do projeto</h1>
                    
                    <div class="thumbnails">                    
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img1.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img1.jpg" alt="">
                        </a>
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img2.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img2.jpg" alt="">
                        </a>                   
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img3.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img3.jpg" alt="">
                        </a>
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img4.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img4.jpg" alt="">
                        </a>
                    </div>
                    
                    <div class="thumbnails"> 
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img5.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img5.jpg" alt="">
                        </a>                   
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img6.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img6.jpg" alt="">
                        </a>
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img7.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img7.jpg" alt="">
                        </a>
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img8.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img8.jpg" alt="">
                        </a>
                    </div>
                    
                    <div class="thumbnails">
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img9.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img9.jpg" alt="">
                        </a>                   
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img10.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img10.jpg" alt="">
                        </a>
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img11.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img11.jpg" alt="">
                        </a>
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img12.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img12.jpg" alt="">
                        </a>
                    </div>
                    
                    <div class="thumbnails">
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img13.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img13.jpg" alt="">
                        </a>                   
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img14.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img14.jpg" alt="">
                        </a>
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img15.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img15.jpg" alt="">
                        </a>
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img16.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img16.jpg" alt="">
                        </a>
                    </div>                    
                    
                    <div class="thumbnails">
                        <a class="rel thumbnail" data-fancybox-group="gallery" href="images/fotos-projeto/img17.jpg">
                            <img data-src="holder.js/300x200" src="images/fotos-projeto/img17.jpg" alt="">
                        </a>                   
                    </div>
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>        
        
        <!-- js do fancybox, manter a sequência -->
        <script src="js/fancy/jquery.fancybox.js?v=2.1.0" type="text/javascript"></script>	
        <script src="js/fancy/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>	
        <script src="js/jquery.galeria-fotos.js" type="text/javascript"></script>
    </body>
</html>