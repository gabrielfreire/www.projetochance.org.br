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
                    <h1>Deixe seu depoimento</h1>
                    
                    <h3>Depoimentos (1.132)</h3>

                    <div class="box-new-depo">
                        <div>Fulano da Silva</div>
                        <img src="images/sem-foto.jpg" alt="" title="<?php ?>" />

                        <textarea placeholder="Comentário..."></textarea>
                    </div>
                    

                    <div class="box-depo">                        
                        <img src="images/sem-foto.jpg" alt="" title="<?php ?>" />
                        <div>Fulano da Silva</div>
                        
                        <label>Minha mensagem sera de bla bla bla...</label>
                       
                        <span>em 23/06/2014 às 13:54</span>
                    </div>
                    
                    <div class="box-depo">                        
                        <img src="images/sem-foto.jpg" alt="" title="<?php ?>" />
                        <div>Fulano da Silva</div>
                        
                        <label>Minha mensagem sera de bla bla bla...</label>
                       
                        <span>em 23/06/2014 às 13:54</span>
                    </div>
                    
                    <div class="box-depo">                        
                        <img src="images/sem-foto.jpg" alt="" title="<?php ?>" />
                        <div>Fulano da Silva</div>
                        
                        <label>Minha mensagem sera de bla bla bla...</label>
                       
                        <span>em 23/06/2014 às 13:54</span>
                    </div>
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
        
        <script src="js/jquery.depoimento.js" type="text/javascript"></script>
    </body>
</html>