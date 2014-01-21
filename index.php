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
            </div>


            <?php include "./includes/footer.php"; ?>            
        </div>
    </body>
</html>