<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>..: Projeto Chance :..</title>
        <link href="_css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="_scripts/java_script.js"></script>
    </head>

    <body>

        <div id="site">

            <?php require "views/view_topo.php"; ?>

            <div id="content">

    <!--<img src="_imagens/banner.jpg" height="190" width="260" style="float:right;" />
    <img src="_imagens/texto.jpg" style="float:left" /> -->     

<!--                <a href="matricula">
                    <img src="_banners/banner_inscricoes.png" alt="Banner original" id="banner_inscricoes" />
                </a>-->
                <div id="banner_home">                
                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="600" height="180" id="banner" align="middle">
                            <param name="movie" value="_banners/banner.swf" />
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
                            <object type="application/x-shockwave-flash" data="_banners/banner.swf" width="600" height="180">
                                    <param name="movie" value="_banners/banner.swf" />
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
                </div>        


                <div class="info_home">
                    <h6>INSCRIÇÕES PARA O CURSINHO CHANCE</h6>
                    <p>Local de inscrição: Rua Ernest Renan, 1177 (ao lado da Clínica Sorriso) - Paraisópolis – São Paulo, SP</p>
                    <img src="_imagens/materiais.JPG" alt="" width="150px" height="100px" />
                    <p>Atendemos de segunda à sábado das 10h às 17:30h</p>
                    <p>Necessário Ensino Médio completo ou concluindo</p> 
                    <p>cursinhochance@hotmail.com</p>
                   
                </div>

                <div class="info_home2"> 
                    <div id="video_home">
                        <b>Discurso do presidente</b>
                        <br/>
                        <iframe title="YouTube video player" class="youtube-player" type="text/html" width="250" height="190" 
                                src="http://www.youtube.com/embed/cRY2msMZmZg" frameborder="0" allowFullScreen></iframe>
                    </div>
                </div>
                    
                <img src="_imagens/menina_home.png" alt="" style="float: right;"  />
                
                <div class="info_home">  
                    <h6>Saiba mais...</h6>
                    <p><b>NÃO TEM MENSALIDADE</b></p>
                    <img src="_imagens/aluna_home.JPG" alt="" width="100px" height="150px" id="aluna" />
                    <p><strong>Período:</strong> fim de semana</p>
                    <p><strong>Carga horária:</strong> 10 aulas semanais</p>
                    <p><strong>Duração:</strong> 40 minutos</p>
                    <p><strong>Dia e horário:</strong> sábado das 9h às 17:30h</p>
                </div>
                <div class="info_home2">  
                    <img src="_imagens/alunos.png" alt="" width="150px" height="100px" style="float:right" />
                    <p><i>-> Plantão de Dúvidas</i></p>
                    <p><i>-> Plantão de Redação</i></p>
                    <p><i>-> Palestra sobre carreiras</i>
                        <p>Informações: <b>(11)2866-3441</b></p>            
                </div>  



            </div>

            <?php require "views/view_rodape.php"; ?>

        </div>

    </body>
</html>

<?php if (isset($_GET['erroLogin'])): ?>
    <script type="text/javascript">alert('Dados incorretos!')</script>
<?php endif; ?>
