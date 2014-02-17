<!DOCTYPE html>
<html>
    <head>
        <title>.:: Projeto Chance ::.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
    </head>
    <body>
        <div id="main">    
            <?php include "./includes/header.php"; ?>

            
            <div id="content">                              
                <?php include "./includes/left.php"; ?>                
                
                <div id="sub-content">
                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" class="banner">
                        <param name="movie" value="banners/banner.swf" />
                        <param name="quality" value="high" />
                        <param name="bgcolor" value="#ffffff" />
                        <param name="play" value="true" />
                        <param name="loop" value="true" />
                        <param name="wmode" value="window" />
                        <param name="scale" value="showall" />
                        <param name="menu" value="true" />
                        <param name="devicefont" value="false" />
                        <param name="salign" value="" />
                        <param name="allowScriptAccess" value="sameDomain" />
                        <!--[if !IE]-->
                        <object type="application/x-shockwave-flash" data="banners/banner.swf" class="banner">
                                <param name="movie" value="banners/banner.swf" />
                                <param name="quality" value="high" />
                                <param name="bgcolor" value="#ffffff" />
                                <param name="play" value="true" />
                                <param name="loop" value="true" />
                                <param name="wmode" value="window" />
                                <param name="scale" value="showall" />
                                <param name="menu" value="true" />
                                <param name="devicefont" value="false" />
                                <param name="salign" value="" />
                                <param name="allowScriptAccess" value="sameDomain" />
                        <!--[endif]-->
                                <a href="http://www.adobe.com/go/getflash">
                                        <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash Player" />
                                </a>
                        <!--[if !IE]-->
                        </object>
                        <!--[endif]-->
                    </object>
                    
                    
                    <div id="home-artigos">
                        <div class="artigo">

                            <blockquote>
                                <h3>Por que fazer cursinho?</h3>
                                
                                <a href="porque-fazer-cursinho.html">
                                    <img src="./images/artigo1.jpg" alt="" />
                                    <div>
                                        Ingressar em uma universidade pública ou privada de renome é o 
                                        sonho de muitos jovens e pais. No Brasil, muitos estudantes que 
                                        concluem o ensino médio não estão preparados ...

                                        <br/><br/>
                                        <strong>Leia mais!</strong>
                                    </div>
                                </a>
                            </blockquote>
                        </div>


                        <div class="artigo">                            

                            <blockquote>
                                <h3>A importância de estudar</h3>
                                
                                
                                <a href="a-importancia-de-estudar.html">
                                    <img src="./images/artigo2.jpg" alt="" />
                                    <div>
                                        Você já deve ter ouvido a frase: “você tem que estudar para ser alguém na vida”. Pois é...
                                        Para muita gente, isso não passa de uma bobagem. ...
                                        <br/><br/>
                                        <strong>Leia mais!</strong>
                                    </div>
                                </a>
                            </blockquote>
                        </div>
                    
                    </div><!-- artigos lista -->
                    
                    
                    
                    <!-- vestibular -->
                    <div id="home-vestibular">
                        <a href="http://www.fuvest.br/b/chamada.php?anofuv=2014&chamada=3" target="_blank" class="home-link-vestibular">
                            
                            <img src="images/home-fuvest.png" alt="" />
                            <h4>Fuvest divulga 3ª Chamada</h4>
                        </a>
                        <a href="http://www.comvest.unicamp.br/vest2014/F2/aprova2/chamada2/chamada2.html" target="_blank" class="home-link-vestibular">
                            <img src="images/home-unicamp.png" alt="" />
                            <h4>Unicamp divulga 2ª Chamada</h4>
                        </a>
                        <a href="http://vestibular.unesp.br/" target="_blank" class="home-link-vestibular">                      
                            <img src="images/home-vunesp.png" alt="" />
                            <h4>Unesp divulga 3ª Chamada</h4>
                        </a>                        
                        <a href="http://vestibular.unifesp.br/" target="_blank" class="home-link-vestibular">
                            <img src="images/home-unifesp.png" alt="" />
                            <h4>Unifesp divulga 3ª Chamada</h4>
                        </a>
                    </div><!-- fim de vestibular -->
                    
                    
                    
                    
                    <!-- palavra presidente -->
                    <a href="palavra-do-presidente.html" class="home-info">
                        <img src="./images/misael.jpg" alt="" />
                        <h1>Palavra do presidente</h1>
                        <h4>"É preciso acreditar, com educação, o Brasil tem chance..."</h4>
                        
                        
                        <div>
                            Misael Silva é diretor do Projeto Chance, uma instituição sem fins 
                            lucrativos que tem o objetivo de unir educação e inclusão social.
                        </div>
                    </a>
                    
                    
                    <!-- banner de divulgação -->
                    <a href="matricula.html">
                        <img src="images/divulgacao.jpg" alt="" class="img-divulgacao">
                    </a>
                    
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
    </body>
</html>
