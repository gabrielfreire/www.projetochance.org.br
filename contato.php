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
                    <h1>Contato</h1>
                    
                    <form action="#" method="post" id="form-contato" >
                        <table class="table-contato">      
                            <tr>
                                <td><label>*Nome</label></td>
                                <td><input type="text" name="nome" id="nome" class="text text-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>Telefone</label></td>
                                <td><input type="text" name="telefone" id="telefone" class="text text-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Email</label></td>
                                <td><input type="text" name="email" id="email" class="text text-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Assunto</label></td>
                                <td><input type="text" name="assunto" id="assunto" class="text text-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Mensagem</label></td>
                                <td><textarea name="mensagem" id="mensagem" class="text textArea"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Enviar" class="btn" />                                 
                                </td>                
                            </tr>
                        </table>
                    </form>
                    
                    <p>11 2866-3441<br/>
                    <a href="mailto:cursinho@projetochance.org.br">contato@projetochance.org.br</a></p>
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
        
        <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="js/jquery.contato.js"></script>
    </body>
</html>