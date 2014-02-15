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
                            <img src="./images/sem-imagem.gif" alt="" />

                            <blockquote>
                                <h3>Por que fazer cursinho?</h3>
                                <a href="porque-fazer-cursinho.html">
                                    <div>
                                        Ingressar em uma universidade pública ou privada de renome é o 
                                        sonho de muitos jovens e pais...

                                        <br/><br/>
                                        <strong>Leia mais!</strong>
                                    </div>
                                </a>
                            </blockquote>
                        </div>


                        <div class="artigo">
                            <img src="./images/sem-imagem.gif" alt="" />

                            <blockquote>
                                <h3>Por que fazer cursinho?</h3>
                                <a href="#">
                                    <div>
                                        Ingressar em uma universidade pública ou privada de renome é o 
                                        sonho de muitos jovens e pais...

                                        <br/><br/>
                                        <strong>Leia mais!</strong>
                                    </div>
                                </a>
                            </blockquote>
                        </div>


                        <div class="artigo">
                            <img src="./images/sem-imagem.gif" alt="" />

                            <blockquote>
                                <h3>Por que fazer cursinho?</h3>
                                <a href="#">
                                    <div>
                                        Ingressar em uma universidade pública ou privada de renome é o 
                                        sonho de muitos jovens e pais...

                                        <br/><br/>
                                        <strong>Leia mais!</strong>
                                    </div>
                                </a>
                            </blockquote>
                        </div>
                    
                    </div><!-- artigos lista -->
                    
                    
                    
                    <!-- vestibular -->
                    <div id="home-vestibular">
                        <div class="div-img-vestibular">
                            <img src="images/home-fuvest.png" alt="" />
                            <h4>Fuvest divulga 2ª Chamada</h4>
                        </div>
                        <div class="div-img-vestibular">
                            <img src="images/home-unicamp.png" alt="" />
                            <h4>Unicamp divulga 2ª Chamada</h4>
                        </div>
                        <div class="div-img-vestibular">                            
                            <img src="images/home-vunesp.png" alt="" />
                            <h4>Unesp divulga 2ª Chamada</h4>
                        </div>                        
                        <div class="div-img-vestibular">
                            <img src="images/home-unifesp.png" alt="" />
                            <h4>Unifesp divulga 2ª Chamada</h4>
                        </div>
                    </div><!-- fim de vestibular -->
                    
                    
                    
                    <!-- palavra presidente -->
                    <div class="home-info">
                        <h1>"É preciso acreditar, com educação, o Brasil tem chance..."</h1>
                        <img src="#" alt="" />
                        <div>Veja a palavra de <strong>Misael Silva</strong>, presidente do Projeto Chance.</div>
                    </div>
                    
                    <div class="home-info">
                        <h1>Nossa história</h1>
                        <div>Conheça a história do Projeto...</div>
                    </div>
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
    </body>
</html>
